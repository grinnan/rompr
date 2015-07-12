function getPosition(e) {
    e = e || window.event;
    var cursor = {x:0, y:0};
    if (e.pageX || e.pageY) {
        cursor.x = e.pageX;
        cursor.y = e.pageY;
    }
    else {
        var de = document.documentElement;
        var b = document.body;
        cursor.x = e.clientX +
            (de.scrollLeft || b.scrollLeft) - (de.clientLeft || 0);
        cursor.y = e.clientY +
            (de.scrollTop || b.scrollTop) - (de.clientTop || 0);
    }
    return cursor;
}

function getWindowSize() {
    var size = {x:0, y:0};
    if (document.body && document.body.offsetWidth) {
        size.x = document.body.offsetWidth;
        size.y = document.body.offsetHeight;
    }
    if (document.compatMode=='CSS1Compat' &&
        document.documentElement &&
        document.documentElement.offsetWidth ) {
            size.x = document.documentElement.offsetWidth;
            size.y = document.documentElement.offsetHeight;
    }
    if (window.innerWidth && window.innerHeight) {
        size.x = window.innerWidth;
        size.y = window.innerHeight;
    }
    size.o = window.orientation;
    return size;
}

function getScrollXY() {
    var scroll = {x:0, y:0};
    if( typeof( window.pageYOffset ) == 'number' ) {
        //Netscape compliant
        scroll.y = window.pageYOffset;
        scroll.x = window.pageXOffset;
    } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
        //DOM compliant
        scroll.y = document.body.scrollTop;
        scroll.x = document.body.scrollLeft;
    } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
        //IE6 standards compliant mode
        scroll.y = document.documentElement.scrollTop;
        scroll.x = document.documentElement.scrollLeft;
    }
    return scroll;
}

function zeroPad(num, count)
{
    var numZeropad = num + '';
    while(numZeropad.length < count) {
        numZeropad = "0" + numZeropad;
    }
    return numZeropad;
}

function cloneObject(obj) {
    var clone = {};
    for(var i in obj) {
        if(obj[i] !== null && typeof(obj[i])=="object")
            clone[i] = cloneObject(obj[i]);
        else
            clone[i] = obj[i];
    }
    return clone;
}

function rawurlencode (str) {
    str = (str+'').toString();
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A');
}

function htmlspecialchars_decode(string) {
    string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&#0*39;/g, "'").replace(/&quot;/g, '"');
    string = string.replace(/&amp;/g, '&');
    return string;
}

// The world's smallest jQuery plugin :)
jQuery.fn.reverse = [].reverse;
// http://www.mail-archive.com/discuss@jquery.com/msg04261.html

jQuery.fn.isOpen = function() {
    return this.hasClass('icon-toggle-open');
}

jQuery.fn.isClosed = function() {
    return this.hasClass('icon-toggle-closed');
}

jQuery.fn.toggleOpen = function() {
    this.removeClass('icon-toggle-closed').addClass('icon-toggle-open');
    return this;
}

jQuery.fn.toggleClosed = function() {
    this.removeClass('icon-toggle-open').addClass('icon-toggle-closed');
    return this;
}

jQuery.fn.removeInlineCss = function(property) {

    if(property == null)
        return this.removeAttr('style');

    var proporties = property.split(/\s+/);

    return this.each(function(){
        var remover =
            this.style.removeProperty   // modern browser
            || this.style.removeAttribute   // old browser (ie 6-8)
            || jQuery.noop;  //eventual

        for(var i = 0 ; i < proporties.length ; i++)
            remover.call(this.style,proporties[i]);

    });
};

jQuery.fn.makeSpinner = function() {

    return this.each(function() {
        var originalclasses = new Array();
        var classes = $(this).attr("class").split(/\s/);
        for (var i = 0, len = classes.length; i < len; i++) {
            if (classes[i] == "invisible" || (/^icon/.test(classes[i]))) {
                originalclasses.push(classes[i]);
                $(this).removeClass(classes[i]);
            }
        }
        $(this).attr("originalclass", originalclasses.join(" "));
        $(this).addClass('icon-spin6 spinner');
    });
}

jQuery.fn.stopSpinner = function() {

    return this.each(function() {
        $(this).removeClass('icon-spin6 spinner');
        if ($(this).attr("originalclass")) {
            $(this).addClass($(this).attr("originalclass"));
            $(this).removeAttr("originalclass");
        }
    });
}

jQuery.fn.makeFlasher = function(options) {
    var settings = $.extend({
        flashtime: 4,
        easing: "ease",
        repeats: "infinite"
    }, options);

    return this.each(function() {
        var anistring = "pulseit "+settings.flashtime+"s "+settings.easing+" "+settings.repeats;
        $(this).css({"-webkit-animation": "",
                    "-moz-animation": "",
                    "animation": "",
                    "opacity": ""});
        // Without this the animation won't re-run (unless we put a delay in here),
        // which is far from ideal. As is this, but it's better.
        $(this).hide().show();
        $(this).on('animationend', flashStopper);
        $(this).on('webkitAnimationEnd', flashStopper);
        $(this).on('oanimationend', flashStopper);
        $(this).on('MSAnimationEnd', flashStopper);
        $(this).css({"-webkit-animation": anistring,
                    "-moz-animation": anistring,
                    "animation": anistring});
    });
}

function flashStopper() {
    $(this).css({"-webkit-animation": "",
                "-moz-animation": "",
                "animation": "",
                "opacity": ""});
    $(this).off('animationend', flashStopper);
    $(this).off('webkitAnimationEnd', flashStopper);
    $(this).off('oanimationend', flashStopper);
    $(this).off('MSAnimationEnd', flashStopper);
}

jQuery.fn.stopFlasher = function() {
    return this.each(function() {
        $(this).css({"-webkit-animation": "",
                    "-moz-animation": "",
                    "animation": "",
                    "opacity": ""
        });
    });
}

jQuery.fn.switchToggle = function(state) {
    return this.each(function() {
        var st = (state == 0 || state == "off" || !state) ? "icon-toggle-off" : "icon-toggle-on";
        $(this).removeClass("icon-toggle-on icon-toggle-off").addClass(st);
    });
}

function formatTimeString(duration) {
    if (duration > 0) {
        var secs=duration%60;
        var mins = (duration/60)%60;
        var hours = duration/3600;
        if (hours >= 1) {
            return parseInt(hours.toString()) + ":" + zeroPad(parseInt(mins.toString()), 2) + ":" + zeroPad(parseInt(secs.toString()),2);
        } else {
            return parseInt(mins.toString()) + ":" + zeroPad(parseInt(secs.toString()),2);
        }
    } else {
        return "";
    }
}

function getArray(data) {
    try {
        switch (typeof data) {
            case "object":
                if (data.length) {
                    return data;
                } else {
                    return [data];
                }
                break;
            case "undefined":
                return [];
                break;
            default:
                return [data];
                break;
        }
    } catch(err) {
        return [];
    }
}

function utf8_encode(s) {
  return unescape(encodeURIComponent(s));
}

function escapeHtml(text) {
    if (!text) return '';
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}

function unescapeHtml(text) {
    if (!text) return '';
  return text
      .replace(/&amp;/g, "&")
      .replace(/&lt;/g, "<")
      .replace(/&gt;/g, ">")
      .replace(/&quot;/g, '"')
      .replace(/&#039;/g, "'");
}

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

String.prototype.initcaps = function() {
    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
}

String.prototype.removePunctuation = function() {
    var punctRE = /[\u2000-\u206F\u2E00-\u2E7F\\'!"#\$%&\(\)\*\+,\-\.\/:;<=>\?@\[\]\^_`\{\|\}~]/g;
    return this.replace(/\s*\&\s*/, ' and ').replace(punctRE,'').replace(/\s+/g, ' ');
}

function dropProcessor(evt, imgobj, imagekey, success, fail) {

    evt.stopPropagation();
    evt.preventDefault();
    if (evt.dataTransfer.types) {
        for (var i in evt.dataTransfer.types) {
            type = evt.dataTransfer.types[i];
            debug.log("ALBUMART","Checking...",type);
            var data = evt.dataTransfer.getData(type);
            switch (type) {

                case "text/html":       // Image dragged from another browser window (Chrome and Firefox)
                    var srces = data.match(/src\s*=\s*"(.*?)"/);
                    if (srces && srces[1]) {
                        src = srces[1];
                        debug.log("ALBUMART","Image Source",src);
                        imgobj.removeClass('nospin notexist notfound').addClass('spinner notexist');
                        if (src.match(/image\/.*;base64/)) {
                            debug.log("ALBUMART","Looks like Base64");
                            // For some reason I no longer care about, doing this with jQuery.post doesn't work
                            var formData = new FormData();
                            formData.append('base64data', src);
                            formData.append('key', imagekey);
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'getalbumcover.php');
                            xhr.responseType = "json";
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    success(xhr.response);
                                } else {
                                    fail();
                                }
                            };
                            xhr.send(formData);
                        } else {
                            $.ajax({
                                url: "getalbumcover.php",
                                type: "POST",
                                data: { key: imagekey,
                                        src: src
                                },
                                cache:false,
                                success: success,
                                error: fail,
                            });
                        }
                        return false;
                    }
                    break;

                case "Files":       // Local file upload
                    debug.log("ALBUMART","Found Files");
                    var files = evt.dataTransfer.files;
                    if (files[0]) {
                        imgobj.removeClass('nospin notexist notfound').addClass('spinner notexist');
                        // For some reason I no longer care about, doing this with jQuery.post doesn't work
                        var formData = new FormData();
                        formData.append('ufile', files[0]);
                        formData.append('key', imagekey);
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'getalbumcover.php');
                        xhr.responseType = "json";
                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                success(xhr.response);
                            } else {
                                fail();
                            }
                        };
                        xhr.send(formData);
                        return false;
                    }
                    break;
            }

        }
    }
    // IF we get here, we didn't find anything. Let's try the basic text,
    // which might give us something if we're lucky.
    // Safari returns a plethora of MIME types, but none seem to be useful.
    var data = evt.dataTransfer.getData('Text');
    var src = data;
    debug.log("ALBUMART","Trying last resort methods",src);
    if (src.match(/^http:\/\//)) {
        debug.log("ALBUMART","Appears to be a URL");
        var u = src.match(/images.google.com.*imgurl=(.*?)&/)
        if (u && u[1]) {
            src = u[1];
            debug.log("ALBUMART","Found possible Google Image Result",src);
        }
        $.ajax({
            url: "getalbumcover.php",
            type: "POST",
            data: { key: imagekey,
                    src: src
            },
            cache:false,
            success: success,
            error: fail,
        });
    }
    return false;    
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

