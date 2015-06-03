<?php
chdir('../..');
include ("includes/vars.php");
include ("includes/functions.php");
include ("player/mpd/sockets.php");
$apache_backend = "xml";
foreach($_POST['commands'] as $cmd) {
    $cmdstart = strpos($cmd, " ");
    $part1 = substr($cmd, 0, $cmdstart);
    if ($part1 == "additem") {
        $part2 = substr($cmd, $cmdstart+1, strlen($cmd));
        if (substr($part2,0,2) == "aa") {
            $apache_backend = $prefs['apache_backend'];
            break;
        }
    }
}

include ("backends/".$apache_backend."/backend.php");

$mpd_status = array();
$mpd_status['albumart'] = "";

@open_mpd_connection();

if($is_connected) {

    $cmd_status = true;

    fputs($connection, "command_list_begin\n");
    $cmds = array();
    foreach($_POST['commands'] as $cmd) {
        $cmdstart = strpos($cmd, " ");
        $part1 = substr($cmd, 0, $cmdstart);
        if ($part1 == "additem") {
            $part2 = substr($cmd, $cmdstart+1, strlen($cmd));
            debug_print("Adding Item ".$part2,"POSTCOMMAND");
            $cmds = array_merge($cmds, getItemsToAdd($part2));
        } else {
            array_push($cmds, $cmd);
        }
    }

    $done = 0;
    foreach ($cmds as $cmd) {
        $cmdstart = strpos($cmd, " ");
        $part1 = substr($cmd, 0, $cmdstart);
        if ($part1 == "move") {
            // NASTY HACK! Not even sure we use this file for move commands!!
            debug_print("Command List: ".$cmd,"POSTCOMMAND");
            fputs($connection, $cmd."\n");
        } else {
            if ($cmdstart === false) {
                debug_print("Command List: ".$cmd,"POSTCOMMAND");
                fputs($connection, $cmd."\n");
            } else {
                $part2 = substr($cmd, $cmdstart+1, strlen($cmd));
                debug_print("Command List: ".$part1.' "'.format_for_mpd(trim($part2, '"')).'"',"POSTCOMMAND");
                fputs($connection, $part1.' "'.format_for_mpd(trim($part2, '"')).'"'."\n");
            }
        }
        $done++;
        // Command lists have a maximum length, 50 seems to be the default
        if ($done == 50) {
            do_mpd_command($connection, "command_list_end", null, true);
            fputs($connection, "command_list_begin\n");
            $done = 0;
        }
    }

    $cmd_status = do_mpd_command($connection, "command_list_end", null, true);
    if (array_key_exists('extra', $_POST)) {
        do_mpd_command($connection, $_POST['extra'], null, true);
    }
    $mpd_status = do_mpd_command ($connection, "status", null, true);
    if (is_array($cmd_status) && !array_key_exists('error', $mpd_status)) {
        debug_print("Command List Error ".$cmd_status['error'],"POSTCOMMAND");
        $mpd_status = array_merge($mpd_status, $cmd_status);
    }

    if (array_key_exists('song', $mpd_status) && !array_key_exists('error', $mpd_status)) {
        $songinfo = array();
        $songinfo = do_mpd_command($connection, 'playlistinfo "' . $mpd_status['song'] . '"', null, true);
        $mpd_status = array_merge($mpd_status, $songinfo);
    }

    $arse = array();
    $arse = do_mpd_command($connection, 'replay_gain_status', null, true);
    $mpd_status = array_merge($mpd_status, $arse);

} else {
    if ($prefs['unix_socket'] != "") {
        $mpd_status['error'] = "Unable to Connect to MPD server at\n".$prefs["unix_socket"];
    } else {
        $mpd_status['error'] = "Unable to Connect to MPD server at\n".$prefs["mpd_host"].":".$prefs["mpd_port"];
    }
}

close_mpd($connection);
print json_encode($mpd_status);

?>