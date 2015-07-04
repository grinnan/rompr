
<?php
include ("includes/vars.php");
include ("includes/functions.php");
include("international.php");
include ("player/mpd/connection.php");
$error = 0;
$dbterms = array( 'tags' => null, 'rating' => null );

$path = (array_key_exists('path', $_REQUEST)) ? rawurldecode($_REQUEST['path']) : "";
$prefix = (array_key_exists('prefix', $_REQUEST)) ? $_REQUEST['prefix'].'_' : "dirholder";

@open_mpd_connection();

if ($is_connected) {
    htmlHeaders();
    if ($path == "") {
        print '<div class="menuitem containerbox" style="margin-top:12px;padding-left:8px">
                <div class="expand" style="font-weight:bold;font-size:120%;padding-top:0.4em">'.get_int_text('button_file_browser').'</div>
                </div>';
    }
	doFileBrowse($path, $prefix);
} else {
    header("HTTP/1.1 500 Internal Server Error");	
}

close_mpd();

function doFileBrowse($path, $prefix) {
	global $connection, $prefs;
	debug_print("Browsing ".$path,"DIRBROWSER");
	$parts = true;
    $foundfile = false;
    $filedata = array();
    $dircount = 0;
	fputs($connection, 'lsinfo "'.format_for_mpd($path).'"'."\n");
    while(!feof($connection) && $parts) {
        $parts = getline($connection, true);
        if (is_array($parts)) {
			$s = trim($parts[1]);
			if (substr($s,0,1) != ".") {
	        	switch ($parts[0]) {
	        		case "file":
                        if (!$foundfile) {
                            $foundfile = true;
                        } else {
                            if (!($prefs['ignore_unplayable']) || substr($filedata['Title'], 0, 12) != "[unplayable]") {
                                printFileItem(getFormatName($filedata), $filedata['file'], $filedata['Time']);
                            }
                            $filedata = array();
                        }
                        $filedata[$parts[0]] = $parts[1];
	        			break;

                    case "playlist":
                        if ($path != "") {
                            // Ignore playlists located at the root. This is cleaner and makes more sense
                            printPlaylistItem(basename($parts[1]), $parts[1]);
                        }
                        break;

	        		case "directory":
	        			printDirectoryItem($parts[1], basename($parts[1]), $prefix, $dircount, false);
				        $dircount++;
	        			break;

                    case "Title":
                    case "Time":
                    case "Artist":
                    case "Album":
                        $filedata[$parts[0]] = $parts[1];
                        break;

	        	}
	        }
        }
    }

    if (array_key_exists('file', $filedata)) {
        if (!($prefs['ignore_unplayable']) || substr($filedata['Title'], 0, 12) != "[unplayable]") {
            printFileItem(getFormatName($filedata), $filedata['file'], $filedata['Time']);
        }
    }

    print '</body></html>';
}

function getFormatName($filedata) {
    global $prefs;
    if ($prefs['player_backend'] == "mopidy" && !preg_match('/local:track:/', $filedata['file'])) {
        if (array_key_exists('Title', $filedata) && array_key_exists('Artist', $filedata)) {
            return $filedata['Artist'].' - '.$filedata['Title'];
        }
        if (array_key_exists('Title', $filedata)) {
            return $filedata['Title'];
        }
        if (array_key_exists('Album', $filedata)) {
            return "Album: ".$filedata['Album'];
        }
    }
    return basename(rawurldecode($filedata['file']));
}

?>