<?php
	// ImageSlider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-ImageSlider-v1-5::74.html
		
	define('HEADING_TITLE_IMAGESLIDERS', 'ImageSlider v2.01 <small style="font-weight:normal;font-size:0.6em;">&copy; 2008-2016 by <a href="http://www.merz-it-service.de/" target="_blank">Hetfield</a></small>');
	define('HEADING_SUBTITLE_IMAGESLIDERS', '<a href="https://www.merz-it-service.de/" target="_blank"><img src="'.DIR_WS_EXTERNAL.'mits_imageslider/images/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;max-height:40px;margin-top:6px;margin-bottom:6px;" /></a>');
	define('TABLE_HEADING_IMAGESLIDERS', 'ImageSlider');
	define('TABLE_HEADING_SLIDERGROUP', 'ImageSlider-Gruppe');
	define('TABLE_HEADING_SORTING', 'Sortierung');
	define('TABLE_HEADING_STATUS', 'Status');
	define('TABLE_HEADING_ACTION', 'Aktion');
	define('TEXT_HEADING_NEW_IMAGESLIDER', 'Neues Bild');
	define('TEXT_HEADING_EDIT_IMAGESLIDER', 'Bild bearbeiten');
	define('TEXT_HEADING_DELETE_IMAGESLIDER', 'Bild l&ouml;schen');
	define('TEXT_IMAGESLIDERS', 'Bild:');
	define('TEXT_DATE_ADDED', 'hinzugef&uuml;gt am:');
	define('TEXT_LAST_MODIFIED', 'letzte &Auml;nderung am:');
	define('TEXT_IMAGE_NONEXISTENT', 'BILD NICHT VORHANDEN');
	define('TEXT_NEW_INTRO', 'Bitte legen Sie das neue Bild mit allen relevanten Daten ein.');
	define('TEXT_EDIT_INTRO', 'Bitte f&uuml;hren Sie alle notwendigen &Auml;nderungen durch');
	define('TEXT_IMAGESLIDERS_TITLE', 'Title f&uuml;r Bild:');
	define('TEXT_IMAGESLIDERS_NAME', 'Name für Bildeintrag:');
	define('TEXT_IMAGESLIDERS_IMAGE', 'Bild:');
	define('TEXT_IMAGESLIDERS_URL', 'Bild verlinken: ');
	define('TEXT_TARGET', 'Zielfenster:');
	define('TEXT_TYP', 'Linkart:');
	define('TEXT_URL', 'Linkadresse:');
	define('NONE_TARGET', 'Kein Ziel festlegen');
	define('TARGET_BLANK', '_blank');
	define('TARGET_TOP', '_top');
	define('TARGET_SELF', '_self');
	define('TARGET_PARENT', '_parent');
	define('TYP_PRODUCT', 'Link zum Produkt (bitte nur die productsID bei Linkadresse eintragen)');
	define('TYP_CATEGORIE', 'Link zur Kategorie (bitte nur die catID bei Linkadresse eintragen)');
	define('TYP_CONTENT', 'Link zur Contentseite (bitte nur die coID bei Linkadresse eintragen)');
	define('TYP_INTERN', 'Interner Shoplink (z.B. account.php oder newsletter.php)');
	define('TYP_EXTERN', 'Externer Link (z.B. http://www.example.org)');
	define('TEXT_IMAGESLIDERS_DESCRIPTION', 'Bildbeschreibung:');
	define('TEXT_DELETE_INTRO', 'Sind Sie sicher, dass Sie dieses Bild l&ouml;schen m&ouml;chten?');
	define('TEXT_DELETE_IMAGE', 'Bild ebenfalls l&ouml;schen?');
	define('ERROR_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Verzeichnis %s ist schreibgesch&uuml;tzt. Bitte korrigieren Sie die Zugriffsrechte zu diesem Verzeichnis!');
	define('ERROR_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Verzeichnis %s existiert nicht!');
	define('TEXT_DISPLAY_NUMBER_OF_IMAGESLIDERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> ImageSlider-Eintr&auml;gen)');
	define('IMAGE_ICON_STATUS_GREEN', 'Aktiv');
	define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Aktivieren');
	define('IMAGE_ICON_STATUS_RED', 'Nicht aktiv');
	define('IMAGE_ICON_STATUS_RED_LIGHT', 'Deaktivieren');
	define('MITS_ACTIVE','Aktivieren');
	define('MITS_NOTACTIVE','Deaktivieren');
	define('TEXT_IMAGESLIDERS_GROUP', 'ImageSlider-Gruppe:'); 
    define('TEXT_IMAGESLIDERS_NEW_GROUP', 'W&auml;hlen Sie im Dropdown-Feld die gew&uuml;nschte ImageSlider-Gruppe aus (falls vorhanden) oder geben Sie im Textfeld darunter eine neue ImageSlider-Gruppe ein.'); 
    define('TEXT_IMAGESLIDERS_NEW_GROUP_NOTE', 'Damit ein ImageSlider im Template angezeigt wird, muss das Template erweitert werden.<br/>Beispiel: ImageSlider Gruppe ist mits_imageslider, dann kann im Template in der index.html dieser ImageSlider mitder Smarty-Variable {$MITS_IMAGESLIDER} an der gew&uuml;nschten Position angezeigt werden'); 
	define('ERROR_IMAGESLIDER_NAME_REQUIRED', 'Fehler: Ein Titel wird ben&ouml;tigt.');
	define('ERROR_IMAGESLIDER_GROUP_REQUIRED', 'Fehler: Eine ImageSlider-Gruppe wird ben&ouml;tigt.');
	define('ERROR_IMAGESLIDER_IMAGE_REQUIRED', 'Fehler: Ein Bild wird selbstverst&auml;ndlich ben&ouml;tigt.');
?>