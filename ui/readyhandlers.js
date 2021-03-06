$(document).ready(function(){
    debug.log("INIT","Document Ready Event has fired");
    infobar.createProgressBar();
    pluginManager.doEarlyInit();
    player.controller.initialise();
    layoutProcessor.initialise();
    checkServerTimeOffset();
    $.get('utils/cleancache.php', function() {
        debug.shout("INIT","Cache Has Been Cleaned");
    });
    if (prefs.country_userset == false) {
        // Have to pull this data in via the webserver as it's cross-domain
        // It's helpful and important to get the country code set, as many users won't see it
        // and it's necessary for the Spotify info panel to return accurate data
        $.getJSON("utils/getgeoip.php", function(result) {
            debug.shout("GET COUNTRY", 'Country:',result.country_name,'Code:',result.country_code);
            if (result.country_name && result.country_name != 'ERROR') {
                $("#lastfm_country_codeselector").val(result.country_code);
                prefs.save({lastfm_country_code: result.country_code});
            } else {
                debug.error("GET COUNTRY","Country code error",result);
            }
        });
    }
    $('.combobox').makeTagMenu({textboxextraclass: 'searchterm', textboxname: 'tag', labelhtml: '<div class="fixed searchlabel"><b>'+language.gettext("label_tag")+'</b></div>', populatefunction: populateTagMenu});
    $('.tagaddbox').makeTagMenu({textboxname: 'newtags', populatefunction: populateTagMenu, buttontext: language.gettext('button_add'), buttonfunc: tagAdder.add});
    browser.createButtons();
    setClickHandlers();
    setChooserButtons();
    replacePlayerOptions();
    $(".toggle").click(togglePref);
    $(".saveotron").keyup(saveTextBoxes);
    $(".saveomatic").change(saveSelectBoxes);
    $(".savulon").click(toggleRadio);
    $(".clickreplaygain").click(player.controller.replayGain);
    setPrefs();
    if (prefs.playlistcontrolsvisible) {
        $("#playlistbuttons").show();
    }
    if (prefs.collectioncontrolsvisible) {
        $("#collectionbuttons").show();
    }
    showUpdateWindow();
    window.addEventListener("storage", onStorageChanged, false);
    $("#sortable").click(onPlaylistClicked);
    layoutProcessor.sourceControl(prefs.chooser, setSearchLabelWidth);
    layoutProcessor.adjustLayout();
    $(window).bind('resize', layoutProcessor.adjustLayout);
    pluginManager.setupPlugins();
    setTheme(prefs.theme);
    ferretMaster();
});
