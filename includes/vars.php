<?php

define('ROMPR_ARTIST', 0);
define('ROMPR_ALBUM', 1);
define('ROMPR_FILE', 2);
define('ROMPR_MAX_TRACKS_PER_TRANSACTION', 1000);
define('ROMPR_COLLECTION_VERSION', 2);
define('ROMPR_SCHEMA_VERSION', 11);
define('ROMPR_PLAYLIST_FILE', 'prefs/playlist.json');
define('ROMPR_XML_COLLECTION', 'prefs/albums_'.ROMPR_COLLECTION_VERSION.'.xml');
define('ROMPR_XML_SEARCH', 'prefs/albumsearch_'.ROMPR_COLLECTION_VERSION.'.xml');
define('ROMPR_FILEBROWSER_LIST', 'prefs/files_'.ROMPR_COLLECTION_VERSION.'.xml');
define('ROMPR_FILESEARCH_LIST', 'prefs/filesearch_'.ROMPR_COLLECTION_VERSION.'.xml');
define('ROMPR_ITEM_ARTIST', 0);
define('ROMPR_ITEM_ALBUM', 1);

$connection = null;
$is_connected = false;
$covernames = array("cover", "albumart", "thumb", "albumartsmall", "front");
$mysqlc = null;
$backend_in_use = "";

// Note that mpd_host is relative to the APACHE SERVER not the browser.

$prefs = array( "mpd_host" => "localhost",
                "mpd_port" => 6600,
                "mpd_password" => "",
                "unix_socket" => '',
                'crossfade_duration' => 5,
                "volume" => 100,
                "lastfm_user" => "",
                "lastfm_scrobbling" => "false",
                "lastfm_autocorrect" => "false",
                "theme" => "Darkness.css",
                "scrobblepercent" => 50,
                "sourceshidden" => "false",
                "playlisthidden" => "false",
                "showfileinfo" => "true",
                "infosource" => "lastfm",
                "chooser" => "albumlist",
                "sourceswidthpercent" => 22,
                "playlistwidthpercent" => 22,
                "shownupdatewindow" => "false",
                "updateeverytime" => "false",
                "downloadart" => "true",
                "autotagname" => "",
                "sortbydate" => "false",
                "notvabydate" => "false",
                "playlistcontrolsvisible" => "false",
                "clickmode" => "double",
                "lastfm_country_code" => "GB",
                "country_userset" => "false",
                "hide_albumlist" => "false",
                "hide_filelist" => "false",
                "hide_radiolist" => "false",
                "hidebrowser" => "false",
                "fullbiobydefault" => "true",
                "lastfmlang" => "default",
                "lastfm_session_key" => "",
                "user_lang" => "en",
                "twocolumnsinlandscape" => "false",
                "music_directory_albumart" => "",
                "mopidy_http_port" => 6680,
                "search_limit_limitsearch" => 0,
                "search_limit_local" => 0,
                "search_limit_spotify" => 0,
                "search_limit_soundcloud" => 0,
                "search_limit_beets" => 0,
                "search_limit_gmusic" => 0,
                "scrolltocurrent" => "false",
                "mopidy_version" => "0.18.3",
                "debug_enabled" => 0,
                "radiocountry" => "http://www.listenlive.eu/uk.html",
                "mysql_host" => "localhost",
                "mysql_database" => "romprdb",
                "mysql_user" => "rompr",
                "mysql_password" => "romprdbpass",
                "mysql_port" => "3306",
                "fontsize" => "02-Normal.css",
                "fontfamily" => "Verdana.css",
                "alarmtime" => 43200,
                "alarmon" => "false",
                "alarmramp" => "false",
                "synctags" => "false",
                "synclove" => "false",
                "synclovevalue" => "5",
                "proxy_host" => "",
                "proxy_user" => "",
                "proxy_password" => "",
                "ignore_unplayable" => "true",
                "remote" => "false",
                "icontheme" => "Colourful",
                "radiomode" => "",
                "radioparam" => "",
                "onthefly" => "true",
                "sortbycomposer" => "false",
                "composergenre" => "false",
                "composergenrename" => "Classical",
                "displaycomposer" => "true",
                "custom_logfile" => "",
                "consumeradio" => "false",
                "artistsfirst" => "Various Artists,Soundtracks",
                "prefixignore" => "The",
                "sortcollectionby" => "artist",
                "lowmemorymode" => "true",
                );

loadPrefs();

$ipath = "iconsets/".$prefs['icontheme']."/";

$searchlimits = array(  "local" => "Local Files",
                        "spotify" => "Spotify",
                        "soundcloud" => "Soundcloud",
                        "beets" => "Beets",
                        "gmusic" => "Google Play Music",
                        "youtube" => "YouTube",
                        "internetarchive" => "Internet Archive",
                        "leftasrain" => "Left As Rain",
                        "podcast" => "Podcasts",
                        "tunein" => "Tunein Radio",
                        "radio_de" => "Radio.de"
                        // BassDrive and Drible aren't yet searchable
                        // "bassdrive" => "BassDrive",
                        // "dirble" => "Dirble",
                        );

if ($prefs['debug_enabled'] == 1) {
    function debug_print($out, $module = "") {
        global $prefs;
        $indent = 20 - strlen($module);
        $in = "";
        while ($indent > 0) {
            $in .= " ";
            $indent--;
        }
        if ($prefs['custom_logfile'] != "") {
            error_log($module.$in.": ".$out."\n",3,$prefs['custom_logfile']);
        } else {
            error_log($module.$in.": ".$out,0);
        }
    }
} else {
    function debug_print($a, $b = "") {

    }
}

function savePrefs() {
    global $prefs;
    $fp = fopen('prefs/prefs', 'w');
    if($fp) {
        $crap = true;
        if (flock($fp, LOCK_EX, $crap)) {
            foreach($prefs as $key=>$value) {
                if ($key != "albumslist" && $key != "fileslist" && $key != "mopidy_version") {
                    fwrite($fp, $key . "||||" . $value . "\n");
                }
            }
            flock($fp, LOCK_UN);
            if(!fclose($fp)) {
                error_log("ERROR!              : Couldn't close the prefs file.");
            }
        } else {
            error_log("=================================================================");
            error_log("ERROR!              : COULD NOT GET WRITE FILE LOCK ON PREFS FILE");
            error_log("=================================================================");
        }
    }
}

function loadPrefs() {
    global $prefs;
    if (file_exists('prefs/prefs')) {
        $fp = fopen('prefs/prefs', 'r');
        if($fp) {
            $crap = true;
            if (flock($fp, LOCK_EX, $crap)) {
                $fcontents = array();
                while (!feof($fp)) {
                    array_push($fcontents, fgets($fp));
                }
                flock($fp, LOCK_UN);
                if(!fclose($fp)) {
                    error_log("ERROR!              : Couldn't close the prefs file.");
                    exit(1);
                }
                if (count($fcontents) > 0) {
                    foreach($fcontents as $line) {
                        $a = explode("||||", $line);
                        if (is_array($a) && count($a) > 1) {
                            $prefs[$a[0]] = trim($a[1]);
                        }
                    }
                } else {
                    error_log("===============================================");
                    error_log("ERROR!              : COULD NOT READ PREFS FILE");
                    error_log("===============================================");
                    exit(1);
                }
            } else {
                error_log("================================================================");
                error_log("ERROR!              : COULD NOT GET READ FILE LOCK ON PREFS FILE");
                error_log("================================================================");
                fclose($fp);
                exit(1);
            }
        } else {
            error_log("=========================================================");
            error_log("ERROR!              : COULD NOT GET HANDLE FOR PREFS FILE");
            error_log("=========================================================");
            exit(1);
        }
    }
}

?>
