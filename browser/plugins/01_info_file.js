var info_file = function() {

	var me = "file";

	function createInfoFromPlayerInfo(info) {

        var html = "";
        var file = unescape(info.file);
        file = file.replace(/^file:\/\//, '');
        var filetype = "";
        if (file) {
            var n = file.match(/.*\.(.*?)$/);
            if (n) {
                filetype = n[n.length-1];
                filetype = filetype.toLowerCase();
                if (filetype.match(/\/|\?|\=/)) {
                    filetype = "";
                }
            }
        }
        if (file == "null" || file == "undefined") file = "";
        html += '<div class="indent"><table><tr><td class="fil">'+language.gettext("info_file")+'</td><td>'+file;
        if (file.match(/^http:\/\/.*item\/\d+\/file/)) html += ' <i>'+language.gettext("info_from_beets")+'</i>';
        if (info.file) {
            var f = info.file.match(/^podcast[\:|\+](http.*?)\#/);
            if (f && f[1]) {
                html += '<button onclick="podcasts.doPodcast(\'filepodiput\')">'+language.gettext('button_subscribe')+'</button>'+
                                '<input type="hidden" id="filepodiput" value="'+f[1]+'" />';
            }
        }
        html += '</td></tr>';
        if (filetype != "" && !file.match(/^http/)) {
            html += '<tr><td class="fil">'+language.gettext("info_format")+'</td><td>'+filetype+'</td></tr>';
        }
        if (info.bitrate && info.bitrate != 'None' && info.bitrate != 0) {
            html += '<tr><td class="fil">'+language.gettext("info_bitrate")+'</td><td>'+info.bitrate+'</td></tr>';
        }
        var ai = info.audio;
        if (ai) {
            var p = ai.split(":");
            html += '<tr><td class="fil">'+language.gettext("info_samplerate")+'</td><td>'+p[0]+' Hz, '+p[1]+' Bit, ';
            if (p[2] == 1) {
                html += language.gettext("info_mono");
            } else if (p[2] == 2) {
                html += language.gettext("info_stereo");
            } else {
                html += p[2]+' '+language.gettext("info_channels");
            }
            '</td></tr>';
        }
        if (info.Date) {
            if (typeof info.Date == "string") {
                info.Date = info.Date.split(';');
            }
            html += '<tr><td class="fil">'+language.gettext("info_date")+'</td><td>'+info.Date[0]+'</td></tr>';
        }

        if (info.Genre) {
            if (typeof info.Genre == "string") {
                info.Genre = info.Genre.split(';');
            }
            html += '<tr><td class="fil">'+language.gettext("info_genre")+'</td><td>'+info.Genre.join(', ')+'</td></tr>';
        }

        if (info.Performer) {
            if (typeof info.Performer == "object") {
                info.Performer = info.Performer.join(';');
            }
            html += '<tr><td class="fil">'+language.gettext("info_performers")+'</td><td>'+concatenate_artist_names(info.Performer.split(';'))+'</td></tr>';
        }
        if (info.Composer) {
            if (typeof info.Composer == "object") {
                info.Composer = info.Composer.join(';');
            }
            html += '<tr><td class="fil">'+language.gettext("info_composers")+'</td><td>'+concatenate_artist_names(info.Composer.split(';'))+'</td></tr>';
        }
        if (info.Comment) {
            if (typeof info.Comment == "object") {
                info.Comment = info.Comment.join('<br>');
            }
            html += '<tr><td class="fil">'+language.gettext("info_comment")+'</td><td>'+info.Comment+'</td></tr>';
        }
        return html;
    }

	function createInfoFromBeetsInfo(data) {

        var html = "";
        var file = unescape(player.status.file);
        var gibbons = [ 'year', 'genre', 'label', 'disctitle', 'encoder'];
        if (!file) { return "" }
        html += '<div class="indent"><table class="motherfucker"><tr><td class="fil">'+language.gettext("info_file")+'</td><td>'+file;
        html += ' <i>'+language.gettext("info_from_beets")+'</i>';
        html = html +'</td></tr>';
        html += '<tr><td class="fil">'+language.gettext("info_format")+'</td><td>'+data.format+'</td></tr>';
        if (data.bitrate)  html += '<tr><td class="fil">'+language.gettext("info_bitrate")+'</td><td>'+data.bitrate+'</td></tr>';
        html += '<tr><td class="fil">'+language.gettext("info_samplerate")+'</td><td>'+data.samplerate+' Hz, '+data.bitdepth+' Bit, ';
        if (data.channels == 1) {
            html += language.gettext("info_mono");
        } else if (data.channels == 2) {
            html = html +language.gettext("info_stereo");
        } else {
            html += data.channels +' '+language.gettext("info_channels");
        }
        html += '</td></tr>';
        $.each(gibbons, function (i,g) {
            if (data[g]) html += '<tr><td class="fil">'+language.gettext("info_"+g)+'</td><td>'+data[g]+'</td></tr>';
        });
        if (data.composer) html += '<tr><td class="fil">'+language.gettext("info_composers")+'</td><td>'+data.composer+'</td></tr>';
        if (data.comments) html += '<tr><td class="fil">'+language.gettext("info_comment")+'</td><td>'+data.comments+'</td></tr>';
        return html;
    }

	return {
		getRequirements: function(parent) {
			return [];
		},

		collection: function(parent, artistmeta, albummeta, trackmeta) {

			debug.trace("FILE PLUGIN", "Creating data collection");

			var self = this;
			var displaying = false;

			this.displayData = function() {
				displaying = true;
				self.doBrowserUpdate();
                browser.Update(null, 'album', me, parent.nowplayingindex,
                                { name: "", link: "", data: null }
                );
                browser.Update(null, 'artist', me, parent.nowplayingindex,
                                { name: "", link: "", data: null }
                );
			}

			this.stopDisplaying = function() {
				displaying = false;
			}

            this.handleClick = function(source, element, event) {
                if (element.hasClass("clicksetrating")) {
                    nowplaying.setRating(event);
                } else if (element.hasClass("clickremtag")) {
                    nowplaying.removeTag(event, parent.nowplayingindex);
                } else if (element.hasClass("clickaddtags")) {
                    tagAdder.show(event, parent.nowplayingindex);
                }
            }

			this.populate = function() {
                if (trackmeta.fileinfo === undefined) {
    				var file = parent.playlistinfo.location;
    				var m = file.match(/(^http:\/\/.*item\/\d+)\/file/)
    		        if (m && m[1]) {
    		        	debug.trace("FILE PLUGIN","File is from beets server",m[1]);
                        self.updateBeetsInformation(m[1]);
    		        } else {
        	            setTimeout(function() {
                    		player.controller.do_command_list([], self.updateFileInformation)
                		}, 1000);
    		        }
                } else {
                    debug.mark("FILE PLUGIN",parent.nowplayingindex,"is already populated");
                }
		    }

		    this.updateFileInformation = function() {
                trackmeta.fileinfo = {beets: null, player: cloneObject(player.status)};
		    	trackmeta.lyrics = null;
                player.controller.checkProgress();
		    	self.doBrowserUpdate();
		    }

            this.updateBeetsInformation = function(thing) {
                // Get around possible same origin policy restriction by using a php script
                $.getJSON('browser/backends/getBeetsInfo.php', 'uri='+thing)
                .done(function(data) {
                    debug.trace("FILE PLUGIN",'Got info from beets server',data);
                    trackmeta.fileinfo = {beets: data, player: null};
                    if (data.lyrics) {
                        trackmeta.lyrics = data.lyrics;
                    } else {
                        trackmeta.lyrics = null;
                    }
                    self.doBrowserUpdate();

                })
                .fail( function() {
                    debug.error("FILE PLUGIN", "Error getting info from beets server");
                    self.updateFileInformation();
                });
            }

            this.ratingsInfo = function() {
                var html = "";
                if (trackmeta.usermeta) {
                    if (trackmeta.usermeta.Playcount) {
                        html += '<tr><td class="fil">Play Count:</td><td>'+trackmeta.usermeta.Playcount;
                        html += '</td></tr>';
                    }
                    html += '<tr><td class="fil">Rating:</td><td>';
                    html += '<i class="icon-'+trackmeta.usermeta.Rating+'-stars rating-icon-big infoclick clicksetrating"></i>';
                    html += '<input type="hidden" value="'+parent.nowplayingindex+'" />';
                    html += '</td></tr>';
                    html += '<tr><td class="fil" style="vertical-align:top">'+language.gettext("musicbrainz_tags")+'</td><td>';
                    html += '<table cellpadding="0" cellspacing="0">';
                    for(var i = 0; i < trackmeta.usermeta.Tags.length; i++) {
                        html += '<tr><td><span>'+trackmeta.usermeta.Tags[i]+'<i class="icon-cancel-circled clickicon tagremover playlisticon" onclick="nowplaying.removeTag(event)"></i></span></td></tr>';
                    }
                    html += '<tr><td><i class="icon-plus infoclick smallicon clickaddtags" style="margin:0"></i></td></tr>';
                    html += '</table>';
                    html += '</td></tr>';
                }
                html += '</table>';
                html += '</div>';
                return html;
            }

			this.doBrowserUpdate = function() {
				if (displaying && trackmeta.fileinfo !== undefined) {
                    var data = (trackmeta.fileinfo.player !== null) ? createInfoFromPlayerInfo(trackmeta.fileinfo.player) : createInfoFromBeetsInfo(trackmeta.fileinfo.beets);
                    data = data + self.ratingsInfo();
	                browser.Update(
                        null,
                        'track',
                        me,
                        parent.nowplayingindex,
                        { name: trackmeta.name,
	                      link: "",
	                      data: data
	                	}
					);
				}
			}
		}
	}
}();

nowplaying.registerPlugin("file", info_file, "icon-library", "button_fileinfo");
