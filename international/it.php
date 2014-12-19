<?php

// The first term here is the name that will appear in the drop-down list
// This has the form $langname['file_name without .php extension'] = "Display Name";
// Try to name your file as the two-letter language code so RompR can pick a suitable
// default language automatically.

$langname['it'] = "Italiano";

$languages['it'] = array (

	// The Sources Chooser Button tooltips
	"button_local_music" => "Collezione Musicale",
	"button_file_browser" => "Esplora File",
	"button_internet_radio" => "Internet Radio e Podcast",
	"button_albumart" => "Gestione Copertine Album",

	// Tooltips for Buttons across the top of the information panel
	"button_togglesources" => "Mostra/Nascondi Pannello Sorgenti",
	"button_back" => "Indietro",
	"button_history" => "Cronologia",
	"button_forward" => "Avanti",
	"button_toggleplaylist" => "Mostra/Nascondi Playlist",

	// Tooltips for playlist buttons
	"button_alarm" => "Sveglia",
	"button_prefs" => "Preferenze di RompR",
	"button_clearplaylist" => "Cancella Playlist",
	"button_loadplaylist" => "Carica Playlist Salvata",
	"button_saveplaylist" => "Salva Playlist",

	// Tooltips for playback controls
	"button_previous" => "Brano Precedente",
	"button_play" => "Play/Pausa",
	"button_stop" => "Stop",
	"button_stopafter" => "Stop Dopo il Brano Corrente",
	"button_next" => "Brano Successivo",
	"button_love" => "Aggiungi ai Brani Preferiti",
	"button_ban" => "Escludi questo Brano",
	"button_volume" => "Trascina per regolare il volume",
	"button_closewindow" => "Chiudi finestra",

	// Titles for drop-down menus
	"menu_history" => "CRONOLOGIA",
	"menu_config" => "CONFIGURAZIONE",
	"menu_clearplaylist" => "CANCELLA PLAYLIST",
	"menu_saveplaylist" => "SALVA PLAYLIST COME",
	"menu_playlists" => "PLAYLIST",

	// Configuration menu entries
	"config_language" => "LINGUA",
	"config_theme" => "TEMA",
	"config_hidealbumlist" => "Nascondi Collezione Musicale",
	"config_keepsearch" => "...ma mantieni visibile le funzioni di Ricerca",
	"config_hidefileslist" => "Nascondi Elenco File",
	"config_hidelastfm" => "Nascondi le Stazioni Last.FM",
	"config_hideradio" => "Nascondi le Stazioni Radio",
	"config_hidebrowser" => "Nascondi Pannello Informazioni",
	"config_fullbio" => "Recupera le biografie complete dell'artista da Last.FM",
	"config_lastfmlang" => "Lingua per Last.FM e Wikipedia",
	"config_lastfmdefault" => "Lingua predefinita (inglese)",
	"config_lastfminterface" => "Lingua dell'interfaccia di RompR",
	"config_lastfmbrowser" => "Lingua predefinita del Browser",
	"config_lastfmlanguser" => "Questa lingua specifica:",
	"config_langinfo" => "Last.FM e Wikipedia useranno l'inglese se le informazioni non sono disponibili nella tua lingua",
	"config_autoscroll" => "Scorri automaticamente la playlist al brano corrente",
	"config_autocovers" => "Scarica automaticamente le copertine",
	"config_musicfolders" => "Per utilizzare le immagini dalla tua cartella musica o per recuperare i testi dai tuoi file, inserisci qui il percorso alla tua musica:",
	"config_crossfade" => "Durata dissolvenza incrociata (secondi)",
	"config_clicklabel" => "Comportamento del clic per la selezione della musica",
	"config_doubleclick" => "Doppio-clic per aggiungere, clic per selezionare",
	"config_singleclick" => "Clic per aggiungere, nessuna selezione",
	"config_sortbydate" => "Ordina Album per Data",
	"config_notvabydate" => "Non applicare l'ordinamento per data a 'Artisti Vari'",
	"config_dateinfo" => "Devi aggiornare la tua collezione musicale dopo aver modificato le impostazioni sulla data",
	"config_updateonstart" => "Aggiorna Collezione Musicale all'Avvio",
	"config_updatenow" => "Aggiorna Collezione Musicale Adesso",
	"config_rescan" => "Ricerca nuovamente tutta la Musica in locale",
	"config_editshortcuts" => "Modifica le Scorciatoie da Tastiera...",
	"config_audiooutputs" => "Uscite Audio",
	"config_lastfmusername" => "Nome utente Last.FM",
	"config_loginbutton" => "Accedi",
	"config_scrobbling" => "Abilita lo Scrobbling di Last.FM",
	"config_scrobblepercent" => "Percentuale di brano riprodotto prima di effettuare lo scrobbling",
	"config_autocorrect" => "Abilita autocorrezione di Last.FM",
	"config_tagloved" => "Tagga il Brano come Preferito con:",
	"config_country" => "NAZIONE (per Last.FM)",
	"config_fontsize" => "DIMENSIONE CARATTERI",
	"config_fontname" => "STILE CARATTERI",
	"config_alarm_on" => "Sveglia Attivata",

	// Various buttons for the playlist dropdowns
	"button_imsure" => "Sono sicuro!",
	"button_save" => "Salva",

	// General Labels and buttons in the main layout
	"label_lastfm" => "Last.FM",
	"button_searchmusic" => "Cerca Musica",
	"button_searchfiles" => "Cerca File",
	"label_yourradio" => "Le Tue Stazioni Radio",
	"label_podcasts" => "Podcast",
	"label_somafm" => "Soma FM",
	"label_bbcradio" => "Radio BBC Live",
	"label_icecast" => "Radio Icecast",
	"label_emptyinfo" => "Questo è il pannello informazioni. Diverse cose interessanti appariranno qui quando riprodurrai della musica.",
	"button_playlistcontrols" => "Controlli Playlist",
	"button_random" => "CASUALE",
	"button_crossfade" => "DISSOLVENZA INCROCIATA",
	"button_repeat" => "RIPETI",
	"button_consume" => "CONSUMA",
	"label_yes" => "Sì",
	"label_no" => "No",
	"mopidy_down" => "La connessione a Mopidy è stata persa!",
	"label_updating" => "Aggiornamento Collezione Musicale",
	"label_update_error" => "Creazione della Collezione Musicale fallita!",
	"label_notsupported" => "Operazione non supportata!",
	"label_playlisterror" => "Qualcosa è andato storto recuperando la playlist!",
	"label_mpd_no" => "MPD non può regolare il volume mentre la riproduzione è arrestata",
	"label_downloading" => "Scaricamento...",
	"button_OK" => "OK",
	"button_cancel" => "Annulla",
	"error_playlistname" => "Il nome della Playlist non può contenere 'barre'",
	"label_savedpl" => "Playlist salvata come %s",
	"label_loadingstations" => "Caricamento Stazioni...",

	// Search Forms
	"label_searchfor" => "Cerca Per",
	"label_searching" => "Sto Cercando...",
	"button_search" => "Cerca",
	"label_searchresults" => "Risultati della Ricerca",
	"label_multiterms" => "Più termini di ricerca possono essere usati simultaneamente",
	"label_limitsearch" => "Cerca in un Backend Specifico",
	"label_filesearch" => "Cerca File Contenenti",

	// General multipurpose labels
	"label_tracks" => "brani",
	"label_albums" => "album",
	"label_artists" => "artisti",
	"label_track" => "Brano",
	"label_album" => "Album",
	"label_artist" => "Artista",
	"label_anything" => "Qualsiasi",
	"label_genre" => "Genere",
	"label_composer" => "Compositore",
	"label_performer" => "Esecutore",
	"label_rating" => "Valutazione",
	"label_tag" => "Tag",
	"label_discogs" => "Discogs",
	"label_musicbrainz" => "Musicbrainz",
	"label_wikipedia" => "Wikipedia",
	"label_general_error" => "C'è stato un errore. Ricarica la pagina e riprova.",
	"label_days" => "giorni",
	"label_hours" => "ore",
	"label_minutes" => "minuti",
	"label_noalbums" => "La ricerca non ha trovato l'album specificato",
	"label_notracks" => "La ricerca non ha trovato il brano specificato",
	"label_duration" => "Durata",
	"label_playererror" => "Errore del riproduttore",
	"label_tunefailed" => "Sintonizzazione della Stazione Radio fallita",
	"label_noneighbours" => "Non è stato trovato nessun vicino",
	"label_nofreinds" => "Hai 0 amici",
	"label_notags" => "Nessun Tag trovato",
	"label_noartists" => "Nessun artista top trovato",
	"mopidy_tooold" => "La tua versione di Mopidy è troppo vecchia. Aggiorna alla versione %s o successiva",
	"button_playradio" => "Play",

	// Playlist and Now Playing
	"label_waitingforstation" => "In attesa delle informazione sulla stazione...",
	"label_notforradio" => "Non supportato per gli stream radio",
	"label_incoming" => "In arrivo...",
	"label_addingtracks" => "Aggiungo Brani",
	// Now Playing - [track name] by [artist] on [album]
	"label_by" => "di",
	"label_on" => "da",
	// Now playing - 1:45 of 6:50
	"label_of" => "di",

	// Podcasts
	"podcast_rss_error" => "Scaricamento del feed RSS fallito",
	"podcast_remove_error" => "Eliminazione del podcast fallita",
	"podcast_general_error" => "Operazione fallita :(",
	"podcast_entrybox" => "Inserisci l'URL al feed RSS del podcast, o trascina la sua icona qui",
	// Podcast tooltips
	"podcast_delete" => "Elimina questo Podcast",
	"podcast_configure" => "Configura questo Podcast",
	"podcast_refresh" => "Aggiorna questo Podcast",
	"podcast_download_all" => "Scarica Tutti gli Episodi di questo Podcast",
	"podcast_mark_all" => "Segna Tutti gli Episodi come Ascoltati",
	// Podcast display options
	"podcast_display" => "Mostra",
	"podcast_display_all" => "Qualsiasi",
	"podcast_display_onlynew" => "Solo Nuovi",
	"podcast_display_unlistened" => "Nuovi e non Ascoltati",
	"podcast_display_downloadnew" => "Nuovi e Scaricati",
	"podcast_display_downloaded" => "Solo Scaricati",
	// Podcast refresh options
	"podcast_refresh" => "Aggiorna",
	"podcast_refresh_never" => "Manualmente",
	"podcast_refresh_hourly" => "Ogni Ora",
	"podcast_refresh_daily" => "Ogni Giorno",
	"podcast_refresh_weekly" => "Ogni Settimana",
	"podcast_refresh_monthly" => "Ogni Mese",
	// Podcast auto expire
	"podcast_expire" => "Conserva Episodi Per",
	"podcast_expire_tooltip" => "Qualsiasi episodio più vecchio di questo valore sarà rimosso dall'elenco. Le modifiche avranno effetto al prossimo aggiornamento del podcast",
	"podcast_expire_never" => "Sempre",
	"podcast_expire_week" => "Una Settimana",
	"podcast_expire_2week" => "Due Settimane",
	"podcast_expire_month" => "Un Mese",
	"podcast_expire_2month" => "Due Mesi",
	"podcast_expire_6month" => "Sei Mesi",
	"podcast_expire_year" => "Un Anno",
	// Podcast number to keep
	"podcast_keep" => "Numero di Episodi da Conservare",
	"podcast_keep_tooltip" => "Questo elenco mostrerà sempre questo numero di episodi. Le modifiche avranno effetto al prossimo aggiornamento del podcast",
	"podcast_keep_0" => "Illimitato",
	// Podcast other options
	"podcast_keep_downloaded" => "Conserva tutti gli episodi scaricati",
	"podcast_kd_tooltip" => "Abilita questa opzione per conservare tutti gli episodi scaricati. Le due opzioni precedenti si applicheranno solo agli episodi che non sono stati scaricati",
	"podcast_auto_download" => "Scarica Automaticamente Nuovi Episodi",
	"podcast_tooltip_new" => "Questo è un nuovo episodio",
	"podcast_tooltip_notnew" => "Questo episodio non è nuovo, ma non è stato ascoltato",
	"podcast_tooltip_downloaded" => "Questo episodio è stato scaricato",
	"podcast_tooltip_download" => "Scarica questo episodio sul tuo computer",
	"podcast_tooltip_mark" => "Segna come ascoltato",
	"podcast_tooltip_delepisode" => "Elimina questo episodio",
	"podcast_expired" => "Questo episodio è scaduto",
	// eg 2 days left to listen
	"podcast_timeleft" => "%s rimasti per ascoltare",

	// Soma FM Chooser Panel
	"label_soma" => "Soma.FM è una stazione radio di San Francisco priva di pubblicità supportata dagli ascoltatori",
	"label_soma_beg" => "Se ti piacciono queste stazioni, prendi in considerazione di supportare economicamente Soma.FM",

	// Your radio stations
	"label_radioinput" => "Inserisci un URL di una stazione internet, o trascina il suo tasto Play qui",

	//Album Art Manager
	"albumart_title" => "Copertine Album",
	"albumart_getmissing" => "Recupera Copertine Mancanti",
	"albumart_showall" => "Mostra tutte le copertine",
	"albumart_instructions" => "Fai clic su una copertina per cambiarla, o trascina un'immagine dal tuo hard disk o da un'altra finestra del browser",
	"albumart_onlyempty" => "Mostra solo gli album senza copertine",
	"albumart_allartists" => "Tutti gli Artisti",
	"albumart_unused" => "Immagini non utilizzate",
	"albumart_deleting" => "Sto eliminando...",
	"albumart_error" => "Non funziona",
	"albumart_googlesearch" => "Cerca su Google",
	"albumart_local" => "Immagini in Locale",
	"albumart_upload" => "Carica File",
	"albumart_uploadbutton" => "Carica",
	"albumart_newtab" => "Ricerca Google in una nuova scheda",
	"albumart_dragdrop" => "Puoi trascinare le immagini dal tuo hard disk o direttamente da un'altra finestra del browser (nella maggior parte dei browser)",
	"albumart_showmore" => "Mostra più risultati",
	"albumart_googleproblem" => "Si è verificato un problema. Lo ha detto Google",
	"albumart_getthese" => "Recupera queste copertine",
	"albumart_deletethese" => "Elimina queste copertine",
	"albumart_nocollection" => "Prima di scaricare le copertine devi creare la tua collezione musicale",
	"albumart_nocovercount" => "album senza copertina",
	"albumart_getting" => "Sto recuperando",

	// Setup page (rompr/?setup)
	"setup_connectfail" => "Rompr non riesce a connettersi ad un server mpd o mopidy",
	"setup_connecterror" => "Si è verificato un errore nella comunicazione con il tuo server mpd o mopidy : ",
	"setup_request" => "Hai richiesto la pagina di configurazione",
	"setup_labeladdresses" => "Inserisci l'indirizzo IP e la porta del tuo server mpd",
	"setup_addressnote" => "Nota: localhost in questo contesto indica il computer dove è in esecuzione il server Apache",
	"setup_ipaddress" => "Indirizzo IP o nome host",
	"setup_port" => "Porta",
	"setup_advanced" => "Opzioni avanzate",
	"setup_leaveblank" => "Lasciale vuote se non sei sicuro di averne bisogno",
	"setup_password" => "Password",
	"setup_unixsocket" => "Socket dominio UNIX",
	"setup_mopidy" => "Impostazioni specifiche di Mopidy",
	"setup_mopidyport" => "Porta HTTP di Mopidy:",
	"setup_debug" => "Abilita i log di Debug",

	// Intro Window
	"intro_title" => "Informazioni su questa versione",
	"intro_welcome" => "Benvenuti in RompR versione",
	"intro_viewingmobile" => "Stai visualizzando la versione mobile di RompR. Per visualizzare la versione standard vai a",
	"intro_viewmobile" => "Per visualizzare la versione mobile vai a",
	"intro_basicmanual" => "Il manuale base di RompR è disponibile su:",
	"intro_forum" => "Il Forum di discussione è su:",
	"intro_mopidy" => "IMPORTANTE Informazione per gli utenti di Mopidy",
	"intro_mopidywiki" => "Se stai eseguendo Mopidy, sei pregato di leggere il relativo Wiki",
	"intro_mopidyversion" => "Devi utilizzare Mopidy %s o successivo",

	// Last.FM
	"lastfm_loginwindow" => "Accedi a Last.FM",
	"lastfm_login1" => "Fai clic sul bottone in basso per aprire il sito di Last.FM in una nuova scheda. Inserisci le tue credenziali Last.FM se richieste quindi concedi a RompR il permesso di accedere al tuo account",
	"lastfm_login2" => "Puoi chiudere la nuova scheda quando hai finito ma non chiudere questa finestra di dialogo!",
	"lastfm_loginbutton" => "Fai clic qui per accedere",
	"lastfm_login3" => "Una volta effettuato l'accesso a Last.FM, fai clic sul bottone OK qui sotto per completare la procedura",
	"lastfm_loginfailed" => "Accesso a Last.FM fallito",
	"label_loved" => "Preferiti",
	"label_lovefailed" => "Aggiunta ai preferiti fallita",
	"label_unloved" => "Rimosso da preferiti",
	"label_unlovefailed" => "Rimozione dai preferiti fallita",
	"label_banned" => "Escluso",
	"label_banfailed" => "Non Escluso",
	"label_scrobbled" => "Scrobble",
	"label_scrobblefailed" => "Scrobble fallito",

	// Info Panel
	"info_gettinginfo" => "Recupero informazioni...",
	"info_newtab" => "Visualizza in una nuova scheda",

	// File Info panel
	"button_fileinfo" => "Pannello Informazioni (Informazioni File)",
	"info_file" => "File:",
	"info_from_beets" => "(dal server beets)",
	"info_format" => "Formato:",
	"info_bitrate" => "Bitrate:",
	"info_samplerate" => "Campionamento:",
	"info_mono" => "Mono",
	"info_stereo" => "Stereo",
	"info_channels" => "Canali",
	"info_date" => "Data:",
	"info_genre" => "Genere:",
	"info_performers" => "Esecutori:",
	"info_composers" => "Compositori:",
	"info_comment" => "Commenti:",
	"info_label" => "Etichetta:",
	"info_disctitle" => "Titolo Disco:",
	"info_encoder" => "Encoder:",
	"info_year" => "Anno:",

	// Last.FM Info Panel
	"button_infolastfm" => "Pannello Informazioni (Last.FM)",
	"label_notrackinfo" => "Impossibile trovare informazioni su questo brano",
	"label_noalbuminfo" => "Impossibile trovare informazioni su questo album",
	"label_noartistinfo" => "Impossibile trovare informazioni su questo artista",
	"lastfm_listeners" => "Ascoltatori:",
	"lastfm_plays" => "Riproduzioni:",
	"lastfm_yourplays" => "Tue riproduzioni:",
	"lastfm_toptags" => "TOP TAG:",
	"lastfm_readfullbio" => "Leggi la biografia intera",
	"lastfm_addtags" => "AGGIUNGI TAG",
	"lastfm_addtagslabel" => "Aggiungi tag separati da virgola",
	"button_add" => "AGGIUNGI",
	"lastfm_yourtags" => "TUOI TAG:",
	"lastfm_buyoncd" => "ACQUISTA SU CD:",
	"lastfm_download" => "SCARICA:",
	"lastfm_simar" => "Artisiti simili",
	"lastfm_removetag" => "Rimuovi Tag",
	"lastfm_buyalbum" => "ACQUISTA QUESTO ALBUM",
	"lastfm_releasedate" => "Data di rilascio",
	"lastfm_viewtrack" => "Visualizza il brano su Last.FM",
	"lastfm_buytrack" => "ACQUISTA QUESTO BRANO",
	"lastfm_tagerror" => "Modifica dei tag fallita",
	"lastfm_loved" => "Aggiunto ai preferiti",
	"lastfm_lovethis" => "Aggiungi brano ai preferiti",
	"lastfm_unlove" => "Rimuovi brano dai preferiti",
	"lastfm_notfound" => "%s non trovato",
	"lastfm_nobio" => "Nessuna biografia completa disponibile",

	// Lyrics info panel
	"button_lyrics" => "Pannello Informazioni (Testi)",
	"lyrics_lyrics" => "Testi",
	"lyrics_nonefound" => "Nessun testo trovato",
	"lyrics_info" => "Per visualizzare i testi delle canzoni devi assicurarti che i tuoi file locali siano correttamente etichettati con i testi",
	"lyrics_nopath" => "Per visualizzare i testi delle canzoni devi assicurarti che i tuoi file locali siano correttamente etichettati con i testi e impostare il percorso della musica nelle preferenze",

	// For Discogs/Musicbrainz release tables. LABEL in this context means record label
	// These are all section headers and so should all be UPPER CASE, unless there's a good linguistic
	// reason not to do that
	"title_year" => "ANNO",
	"title_title" => "TITOLO",
	"title_artist" => "ARTISTA",
	"title_type" => "TIPO",
	"title_label" => "ETICHETTA",
	"label_pages" => "PAGINE",

	// For discogs/musicbrains album info. discogs_companies means the companies involved in producing the album
	// These are all section headers and so should all be UPPER CASE, unless there's a good linguistic
	// reason not to do that
	"discogs_companies" => "COMPAGNIE",
	"discogs_personnel" => "PERSONALE",
	"discogs_videos" => "VIDEO",
	"discogs_styles" => "STILI",
	"discogs_genres" => "GENERI",
	"discogs_tracklisting" => "ELENCO BRANI",
	"discogs_realname" => "VERO NOME:",
	"discogs_aliases" => "ALIAS:",
	"discogs_alsoknown" => "CONOSCIUTO ANCHE COME:",
	"discogs_external" => "COLLEGAMENTI ESTERNI",
	"discogs_bandmembers" => "MEMBRI DELLA BAND",
	"discogs_memberof" => "MEMBRO DI",
	"discogs_discography" => "DISCOGRAFIA %s",

	// Discogs info panel
	"button_discogs" => "Pannello Informazioni (Discogs)",
	"discogs_error" => "Si è verificato un errore di rete o Discogs non ha risposto",
	"discogs_nonsense" => "Impossibile ottenere una risposta sensata da Discogs",
	"discogs_noalbum" => "Impossibile trovare questo album su Discogs",
	"discogs_notrack" => "Impossibile trovare questo brano su Discogs",

	// Musicbrainz info panel
	"button_musicbrainz" => "Pannello Informazioni (Musicbrainz)",
	"musicbrainz_error" => "Nessuna risposta da from MusicBrainz",
	"musicbrainz_contacterror" => "Si è verificato un errore connettendosi a Musicbrainz",
	"musicbrainz_noartist" => "Impossibile trovare questo artista su Musicbrainz",
	"musicbrainz_noalbum" => "Impossibile trovare questo album su Musicbrainz",
	"musicbrainz_notrack" => "Impossibile trovare questo brano su Musicbrainz",
	"musicbrainz_noinfo" => "Impossibile ottenere informazioni da Musicbrainz",
	// This is used for date ranges -  eg 2005 - Present
	"musicbrainz_now" => "Presente",
	"musicbrainz_origin" => "ORIGINE",
	"musicbrainz_active" => "ATTIVO",
	"musicbrainz_rating" => "VALUTAZIONE",
	"musicbrainz_notes" => "NOTE",
	"musicbrainz_tags" => "TAG",
	"musicbrainz_externaldiscography" => "Discografia (%s)",
	"musicbrainz_officalhomepage" => "Sito ufficiale (%s)",
	"musicbrainz_fansite" => "Fan Site (%s)",
	"musicbrainz_lyrics" => "Testi (%s)",
	"musicbrainz_social" => "Social Network",
	"musicbrainz_microblog" => "Microblog",
	"musicbrainz_review" => "Recensioni (%s)",
	"musicbrainz_novotes" => "(Nessun voto)",
	// eg: 3/5 from 15 votes
	"musicbrainz_votes" => "%s/5 su %s voti",
	"musicbrainz_appears" => "QUESTO BRANO E' PRESENTE IN",
	"musicbrainz_credits" => "CREDITI",
	"musicbrainz_status" => "STATO",
	"musicbrainz_date" => "DATA",
	"musicbrainz_country" => "NAZIONE",
	"musicbrainz_disc" => "DISCO",

	// SoundCloud info panel
	"button_soundcloud" => "Pannello Informazioni (SoundCloud)",
	"soundcloud_trackinfo" => "Info Brano",
	"soundcloud_plays" => "Riprodotti",
	"soundcloud_downloads" => "Scaricati",
	"soundcloud_faves" => "Favoriti",
	// State means eg State: Finished or State: Unfinished
	"soundcloud_state" => "Stato",
	"soundcloud_license" => "Licenza",
	"soundcloud_buy" => "Acquista brano",
	"soundcloud_view" => "Visualizza su SoundCloud",
	"soundcloud_user" => "Utente SoundCloud",
	"soundcloud_fullname" => "Nome completo",
	"soundcloud_Country" => "Nazione",
	"soundcloud_city" => "Città",
	"soundcloud_website" => "Visita il sito web",
	"soundcloud_not" => "Questo pannello mostra solo informazioni sulla musica di SoundCloud",

	// Wikipedia Info Panel
	"button_wikipedia" => "Pannello Informazioni (Wikipedia)",
	"wiki_nothing" => "Nessun risultato da Wikipedia",
	"wiki_fail" => "Wikipedia non ha trovato nulla riguardo '%s'",
	"wiki_suggest" => "Wikipedia non è riuscita a trovare nessuna pagina corrispondente a '%s'",
	"wiki_suggest2" => "Alcuni suggerimenti che sono usciti a riguardo",

	// Keybindings editor
	"title_keybindings" => "Scorciatoie da Tastiera",
	"button_volup" => "Volume Su",
	"button_voldown" => "Volume Giù",

	// Extras for mobile version
	"button_playlist" => "Playlist",
	"button_playman" => "Gestione Playlist",
	"button_mob_history" => "Pannello Informazioni Cronologia",
	"config_2columns" => "Utilizza 2 colonne nella modalità 'landscape'",
	"label_streamradio" => "Radio Locali e Nazionali",

	// Various Plugins, Rating, and Tagging
	"lastfm_import" => "Importa la tua libreria da Last.FM",
	"lastfm_pleaselogin" => "Devi accedere a Last.FM per poterlo fare",
	"label_nosql" => "Non è possibile con la tua configurazione",
	"label_onlyloved" => "Solo brani preferiti",
	"label_onlytagged" => "Solo brani taggati",
	"label_tagandlove" => "Brani taggati e brani preferiti",
	"label_everything" => "Tutto",
	"label_giveloved" => "I brani preferiti ottengono:",
	"stars" => "stelle",
	"star" => "stella",
	"norating" => "Nessuna valutazione",
	"button_importnow" => "Importa ora",
	"label_review" => "Rivedi i risultati prima di importarli",
	"label_addtowish" => "Se un brano non può essere trovato, aggiungilo alla Lista dei Desideri",
	"label_tags" => "Tag",
	"label_oneresult" => "Risultati ricerca",
	"label_progress" => "Avanzamento",
	"label_wishlist" => "Lista dei Desideri",
	"label_viewwishlist" => "Visualizza la tua Lista dei Desideri",
	"label_addtow" => "Aggiunto alla Lista dei Desideri",
	"label_finished" => "Finito",
	"config_tagrat" => "Valutazioni e Tag",
	"config_synctags" => "Mantieni sincronizzati i Tag con Last.FM",
	"config_loveis" => "Preferito in Last.FM significa",
	"playlist_xstar" => "%s o più stelle",
	"playlist_5star" => "Brani con 5 stelle",
	"button_about" => "Informazioni su Rompr",
	"label_notfound" => "Brano non trovato",
	// Eg + 3 more
	"label_moreresults" => "+ %s altri",
	"label_tagmanager" => "Gestione Tag",
	"label_ratingmanager" => "Gestione Valutazione",
	"label_tagmanagertop" => "Trascina dalla Collezione Musicale per aggiungere i tag ai brani",
	"label_ratingmanagertop" => "Trascina dalla Collezione Musicale per aggiungere le valutazioni ai brani",
	"button_createtag" => "CREA TAG",

	//New in 0.52
	"config_alarm_ramp" => "Dissolvenza in Ingresso",
	"config_ignore_unplayable" => "Ignora brani non riproducibili"


);

?>
