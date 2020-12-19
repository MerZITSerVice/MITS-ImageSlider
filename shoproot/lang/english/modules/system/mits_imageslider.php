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

$available_slider_vars = draw_tooltip('<p><strong>IMPORTANT:</strong> Before and after the repeating area, <strong>###SLIDERITEM###</strong> must be entered as a placeholder (see standard example).</p>
<p>The following placeholders are available:</p>
<ul>
  <li><strong>{ID}</strong> (ID of the slider entry)</li>
  <li><strong>{IMAGE}</strong> (Image address of the slider entry)</li>
  <li><strong>{LINK}</strong> (URL des Slidereintrags)</li>
  <li><strong>{LINKTARGET}</strong> (URL of the slider entry)</li>
  <li><strong>{IMAGEALT}</strong> (Alt text for picture)</li>
  <li><strong>{TITLE}</strong> (Title for picturd)</li>
  <li><strong>{TEXT}</strong> (Text from the editor)</li>
</ul>
');

define('MODULE_MITS_IMAGESLIDER_TEXT_TITLE', 'MITS ImageSlider <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MODULE_MITS_IMAGESLIDER_TEXT_DESCRIPTION', '<a href="https://www.merz-it-service.de/" target="_blank"><img src="' . DIR_WS_EXTERNAL . 'mits_imageslider/images/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;" /></a><br />With MITS ImageSlider module allows you to create a photo slideshow on the home page of your shop. You can also link changing images with categories, products, content, or other shop sites without session loss or link to an external address.<br/><br/>The already several thousand times proven MITS ImageSlider Module &copy; by Hetfield see the original by the manufacturer under <a target="_blank" href="https://www.merz-it-service.de/"><strong><u>MerZ IT-SerVice</u></strong></a> your modified eCommerce Shopsoftware.<br /><br /><a href="https://imageslider.merz-it-service.de/readme.html" target="_blank" onclick="window.open(\'https://imageslider.merz-it-service.de/readme.html\', \'Instructions for the module MITS ImageSlider\', \'scrollbars=yes,resizable=yes,menubar=yes,width=960,height=600\'); return false"><strong><u>Instructions for the module MITS ImageSlider</u></strong></a>');
define('MODULE_MITS_IMAGESLIDER_STATUS_TITLE', 'Enable MITS ImageSlider Module?');
define('MODULE_MITS_IMAGESLIDER_STATUS_DESC', 'Activate the module MITS ImageSlider');
define('MODULE_MITS_IMAGESLIDER_SHOW_TITLE', 'Displaying the MITS ImageSlider');
define('MODULE_MITS_IMAGESLIDER_SHOW_DESC', 'Where to display the MITS ImageSlider, or be available? <br /><ul><li>start = only on the home page (default)</li><li>general = display on all pages (necessary when using the MITS ImageSlider on Smarty plugin with<br /><i>{getImageSlider slidergroup=mits_imageslider}</i> <br />in other template files except the index.html)</li></ul>');
define('MODULE_MITS_IMAGESLIDER_TYPE_TITLE', 'Select Slider Plugin');
define('MODULE_MITS_IMAGESLIDER_TYPE_DESC', 'Note: Set all plugins advance an existing jQuery library. If the template used in the shop do not meet this requirement, you bind this please before activating the module into your template. Also be sure that their chosen plugin is not already used to template (e.g. the bxSlider plugin in standard template tpl modified).');
define('MODULE_MITS_IMAGESLIDER_CUSTOM_CODE_TITLE', 'Custom code for  Slider Plugin');
define('MODULE_MITS_IMAGESLIDER_CUSTOM_CODE_DESC', 'You can use your own code for the MITS ImageSlider. To do this, select the <i>custom</i> option as a plugin. Then enter your own code in this text field and insert the necessary placeholders. You must implement the necessary Javascript and CSS files including Javascript function calls for the slider yourself when making this selection. As an example, the standard code from the tpl_modified_resonsive matching the bxslider is stored during the module installation.' . $available_slider_vars);
define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_TITLE', 'JavaScript files loaded from Slider Plugin?');
define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_DESC', 'The module uses the MITS ImageSlider JavaScript files from the MITS ImageSlider module when "true". When set to "alse" the javascript files are not loaded. The "false" is really only necessary if the desired slider plugin is already available through other customizations in the shop (for example, by manually installing the template or similar). When set to "false" only the file is mits_imageslider.js the respective plug-in folder (<i>includes/external/mits_imageslider/plugins/PLUGINNAME/</i>) loaded. If the plugin is selected <i>custom</i> no files are loaded and this setting is ignored.');
define('MODULE_MITS_IMAGESLIDER_LOADCSS_TITLE', 'CSS files loaded from Slider Plugin?');
define('MODULE_MITS_IMAGESLIDER_LOADCSS_DESC', 'The module MITS ImageSlider used when "true" the CSS files from the MITS ImageSlider module. When set to "alse" CSS files are not loaded. The "false" is really only necessary if the desired slider plugin is already available through other customizations in the shop (for example, by manual installation/adjustments in the template or similar). If the plugin is selected <i>custom</i> no files are loaded and this setting is ignored.');
define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_TITLE', 'Display MITS ImageSlider entries per page in the Administration');
define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_DESC', 'How much MITS ImageSlider entries to be displayed per page in the administration area of the store? The setting can be changed directly in the overview.');
define('MODULE_MITS_IMAGESLIDER_UPDATE_TITLE', 'Modulupdate');
define('MODULE_MITS_IMAGESLIDER_DO_UPDATE', 'Do the database updates for the MITS ImageSlider?');
?>