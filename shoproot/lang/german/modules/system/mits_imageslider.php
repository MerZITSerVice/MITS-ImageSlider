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

define('MODULE_MITS_IMAGESLIDER_TEXT_TITLE', 'MITS ImageSlider v2.03 <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MODULE_MITS_IMAGESLIDER_TEXT_DESCRIPTION', '<a href="https://www.merz-it-service.de/" target="_blank"><img src="' . DIR_WS_EXTERNAL . 'mits_imageslider/images/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;" /></a><br />Mit dem MITS ImageSlider-Modul k&ouml;nnen Sie eine Bilderslideshow auf der Startseite Ihres Shops erstellen. Sie k&ouml;nnen dort wechselnde Bilder mit Kategorien, Produkten, Content oder anderen Shopseiten ohne Sessionverlust verlinken oder zu einer externen Adresse verlinken.<br/><br/>Das bereits mehrere tausendfach bew&auml;hrte MITS ImageSlider-Modul &copy by Hetfield erhalten Sie im Original nur vom Hersteller unter <a target="_blank" href="https://www.merz-it-service.de"><strong><u>MerZ IT-SerVice</u></strong></a> f&uuml;r Ihre modified eCommerce Shopsoftware.<br /><br /><a href="https://imageslider.merz-it-service.de/readme.html" target="_blank" onclick="window.open(\'https://imageslider.merz-it-service.de/readme.html\', \'Anleitung f&uuml;r das Modul MITS ImageSlider v2.03\', \'scrollbars=yes,resizable=yes,menubar=yes,width=960,height=600\'); return false"><strong><u>Anleitung f&uuml;r das Modul MITS ImageSlider v2.03</u></strong></a>');
define('MODULE_MITS_IMAGESLIDER_STATUS_TITLE', 'MITS ImageSlider-Modul aktivieren?');
define('MODULE_MITS_IMAGESLIDER_STATUS_DESC', 'Das Modul MITS ImageSlider v2.03 aktivieren');
define('MODULE_MITS_IMAGESLIDER_SHOW_TITLE', 'Anzeige des MITS ImagSlider');
define('MODULE_MITS_IMAGESLIDER_SHOW_DESC', 'Wo soll der MITS ImageSlider angezeigt werden, bzw. verf&uuml;gbar sein? <br /><ul><li>start = nur auf der Startseite (default)</li><li>general = Anzeige auf allen Seiten (notwenig bei der Nutzung des MITS ImageSliders &uuml;ber Smarty-Plugin mit <br /><i>{getImageSlider slidergroup=mits_imageslider}</i> <br />in anderen Templatedateien ausser der index.html)</li></ul>');
define('MODULE_MITS_IMAGESLIDER_TYPE_TITLE', 'Slider-Plugin ausw&auml;hlen');
define('MODULE_MITS_IMAGESLIDER_TYPE_DESC', 'Hinweis: Alle Plugins setzen eine vorhandene jQuery-Bibliothek voraus. Sollte das im Shop verwendete Template diese Voraussetzung nicht erf&uuml;llen, binden Sie diese bitte vor der Aktivierung des Moduls in Ihr Template ein. Achten Sie auch bitte darauf, dass ihr gew&auml;hltes Plugin nicht schon bereits im Template vorhanden ist (z.B. das bxSlider-Plugin im Standard-Template tpl_modified, tpl_modified_responsive usw.). Setzen Sie eines der Standard-Templates, wie z.B. tpl_modified, tpl_modified_responsive (nicht xtc5) von modified ein und m&ouml;chten Sie den bxSlider f&uuml;r den ImageSlider benutzen, dann w&auml;hlen Sie einfach das Plugin <i>bxSlider tpl_modified</i> aus.<br /><br />Hinweise zu &auml;teren Plugins: Das Plugin NivoSlider ist veraltet und wird nicht weiter gepflegt. Die Nutzung wird nicht weiter empfohlen. Das Plugin FlexSlider funktioniert nur mit jQuery 1.x. F&uuml;r jQuery 3.x wird das Plugin jQuery-Migrate ben&ouml;tigt!');
define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_TITLE', 'JavaScript-Files vom Slider-Plugin laden?');
define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_DESC', 'Das Modul MITS ImageSlider verwendet bei der Einstellung "true" die Javascript-Dateien vom MITS ImageSlider-Modul. Bei der Einstellung "false" werden die Javascript-Dateien nicht geladen. Die Einstellung "false" ist eigentlich nur dann notwendig, wenn das gew&uuml;nschte Slider-Plugin bereits durch andere Anpassungen im Shop verf&uuml;gbar ist (z.B. durch manuelle Installation im Template o.&auml;). Bei der Einstellung "false" wird nur die Datei <i>mits_imageslider.js</i> im jeweiligen Plugin-Ordner (<i>includes/external/mits_imageslider/plugins/PLUGINNAME/</i>) geladen.');
define('MODULE_MITS_IMAGESLIDER_LOADCSS_TITLE', 'CSS-Files vom Slider-Plugin laden?');
define('MODULE_MITS_IMAGESLIDER_LOADCSS_DESC', 'Das Modul MITS ImageSlider verwendet bei der Einstellung "true" die CSS-Dateien vom MITS ImageSlider-Modul. Bei der Einstellung "false" werden die CSS-Dateien nicht geladen. Die Einstellung "false" ist eigentlich nur dann notwendig, wenn das gew&uuml;nschte Slider-Plugin bereits durch andere Anpassungen im Shop verf&uuml;gbar ist (z.B. durch manuelle Installation/Anpassungen im Template o.&auml;).');
define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_TITLE', 'Anzeige MITS ImageSlider-Eintr&auml;ge pro Seite in der Administration');
define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_DESC', 'Wieviel MITS ImageSlider-Eintr&auml;ge sollen pro Seite im Administrationsbereich des Shops angezeigt werden? Die Einstellung kann auch direkt in der &Uuml;bersicht ge&auml;ndert werden.');
define('MODULE_MITS_IMAGESLIDER_UPDATE_TITLE', 'Modulaktualisierung');
define('MODULE_MITS_IMAGESLIDER_DO_UPDATE', 'Datenbankaktualisierung f&uuml;r den MITS ImageSlider durchf&uuml;hren?');
?>