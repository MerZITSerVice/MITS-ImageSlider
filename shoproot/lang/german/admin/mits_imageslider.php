<?php
/**
 * --------------------------------------------------------------
 * File: mits_imageslider.php
 * Date: 16.07.2020
 * Time: 17:37
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

define('HEADING_TITLE_IMAGESLIDERS', 'MITS ImageSlider <small style="font-weight:normal;font-size:0.6em;">&copy; 2008-' . date('Y') . ' by <a href="http://www.merz-it-service.de/" target="_blank">Hetfield</a></small>');
define('HEADING_SUBTITLE_IMAGESLIDERS', '<a href="https://www.merz-it-service.de/" target="_blank"><img src="' . DIR_WS_EXTERNAL . 'mits_imageslider/images/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;max-height:40px;margin-top:6px;margin-bottom:6px;" /></a>');
define('TABLE_HEADING_IMAGESLIDERS', 'MITS ImageSlider');
define('TABLE_HEADING_IMAGESLIDERS_NAME', 'ImageSlider Name');
define('TABLE_HEADING_IMAGESLIDERS_IMAGE', 'Bild');
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
define('TEXT_IMAGESLIDERS_NAME', 'Name f&uuml;r Bildeintrag:');
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
define('MITS_ACTIVE', 'Aktivieren');
define('MITS_NOTACTIVE', 'Deaktivieren');
define('TEXT_IMAGESLIDERS_GROUP', 'ImageSlider-Gruppe:');
define('TEXT_IMAGESLIDERS_NEW_GROUP', 'W&auml;hlen Sie im Dropdown-Feld die gew&uuml;nschte ImageSlider-Gruppe aus (falls vorhanden) oder geben Sie im Textfeld darunter eine neue ImageSlider-Gruppe ein.');
define('TEXT_IMAGESLIDERS_NEW_GROUP_NOTE', 'Damit ein ImageSlider im Template angezeigt wird, muss das Template erweitert werden. Beispiel: ImageSlider-Gruppe ist <i>MITS_IMAGESLIDER</i>, dann kann im Template in der index.html dieser ImageSlider mit der Smarty-Variable <i>{$MITS_IMAGESLIDER}</i> an der gew&uuml;nschten Position angezeigt werden.<br /><br /><a href="https://imageslider.merz-it-service.de/readme.html" target="_blank" onclick="window.open(\'https://imageslider.merz-it-service.de/readme.html\', \'Anleitung f&uuml;r das Modul MITS ImageSlider\', \'scrollbars=yes,resizable=yes,menubar=yes,width=960,height=600\'); return false"><strong><u>Anleitung f&uuml;r das Modul MITS ImageSlider &raquo;</u></strong></a>');
define('ERROR_IMAGESLIDER_NAME_REQUIRED', 'Fehler: Ein Titel wird ben&ouml;tigt.');
define('ERROR_IMAGESLIDER_GROUP_REQUIRED', 'Fehler: Eine ImageSlider-Gruppe wird ben&ouml;tigt.');
define('ERROR_IMAGESLIDER_IMAGE_REQUIRED', 'Fehler: Ein Bild wird selbstverst&auml;ndlich ben&ouml;tigt.');

define('TEXT_IMAGESLIDERS_DATE_FORMAT', 'JJJJ-MM-TT');
define('TEXT_IMAGESLIDERS_EXPIRES_ON', 'G&uuml;ltigkeit bis:');
define('TEXT_IMAGESLIDERS_SCHEDULED_AT', 'G&uuml;ltigkeit ab:');
define('TEXT_IMAGESLIDERS_EXPIRCY_NOTE', '<b>G&uuml;ltigkeit Bemerkung:</b><ul><li>Nur ein Feld ausf&uuml;llen!</li><li>Wenn das Sliderbild unbegrenzt angezeigt werden soll, tragen Sie in diesen Feldern nichts ein.</li></ul>');
define('TEXT_IMAGESLIDERS_SCHEDULE_NOTE', '<b>G&uuml;ltigkeit ab Bemerkung:</b><ul><li>Bei Verwendung dieser Funktion, wird das Sliderbild erst ab dem angegeben Datum angezeigt.</li><li>Alle Sliderbilder mit dieser Funktion werden bis zu ihrer Aktivierung als deaktiviert angezeigt.</li></ul>');

define('TEXT_IMAGESLIDERS_DATE_ADDED', 'hinzugef&uuml;gt am:');
define('TEXT_IMAGESLIDERS_SCHEDULED_AT_DATE', 'G&uuml;ltigkeit ab: <b>%s</b>');
define('TEXT_IMAGESLIDERS_EXPIRES_AT_DATE', 'G&uuml;ltigkeit bis zum: <b>%s</b>');
?>