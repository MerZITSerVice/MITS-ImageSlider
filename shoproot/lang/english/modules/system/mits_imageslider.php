<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html

	define('MODULE_MITS_IMAGESLIDER_TEXT_TITLE', 'ImageSlider v2.01 &copy; by Hetfield (MerZ IT-SerVice)');
	define('MODULE_MITS_IMAGESLIDER_TEXT_DESCRIPTION', '<a href="https://www.merz-it-service.de/" target="_blank"><img src="'.DIR_WS_EXTERNAL.'mits_imageslider/images/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;" /></a><br />
		With Image Slider module allows you to create a photo slideshow on the home page of your shop. You can also link changing images with categories, products, content, or other shop sites without session loss or link to an external address.
		<br/><br/>
	The already several thousand times proven ImageSlider Module &copy; by Hetfield see the original by the manufacturer under <a target="_blank" href="https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html"><strong><u>MerZ IT-SerVice</u></strong></a> your modified eCommerce Shopsoftware.<br /><br /><a href="http://imageslider.merz-it-service.de/readme.html" target="_blank" onclick="window.open(\'http://imageslider.merz-it-service.de/readme.html\', \'Instructions for the module ImageSlider v2.01\', \'scrollbars=yes,resizable=yes,menubar=yes,width=960,height=600\'); return false"><strong><u>Instructions for the module ImageSlider v2.01</u></strong></a>');
	define('MODULE_MITS_IMAGESLIDER_STATUS_TITLE', 'Enable ImageSlider Module?');
	define('MODULE_MITS_IMAGESLIDER_STATUS_DESC', 'Activate the module ImageSlider v2.01');
	define('MODULE_MITS_IMAGESLIDER_SHOW_TITLE', 'Displaying the ImageSlider');
	define('MODULE_MITS_IMAGESLIDER_SHOW_DESC', 'Where to display the image slider, or be available? <br /><ul><li>start = only on the home page (default)</li><li>general = display on all pages (necessary when using the Image Slider on Smarty plugin with<br /><i>{getImageSlider slidergroup=mits_imageslider}</i> <br />in other template files except the index.html)</li></ul>');
	define('MODULE_MITS_IMAGESLIDER_TYPE_TITLE', 'Select Slider Plugin');
	define('MODULE_MITS_IMAGESLIDER_TYPE_DESC', 'Note: Set all plugins advance an existing jQuery library. If the template used in the shop do not meet this requirement, you bind this please before activating the module into your template. Also be sure that their chosen plugin is not already used to template (e.g. the bxSlider plugin in standard template tpl modified).');
	define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_TITLE', 'JavaScript files loaded from Slider Plugin?');
	define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT_DESC', 'The module uses the Image Slider JavaScript files from the Image Slider module when "true". When set to "alse" the javascript files are not loaded. The "false" is really only necessary if the desired slider plugin is already available through other customizations in the shop (for example, by manually installing the template or similar). When set to "false" only the file is mits_imageslider.js the respective plug-in folder (<i>includes/external/mits_imageslider/plugins/PLUGINNAME/</i>) loaded.');
	define('MODULE_MITS_IMAGESLIDER_LOADCSS_TITLE', 'CSS files loaded from Slider Plugin?');
	define('MODULE_MITS_IMAGESLIDER_LOADCSS_DESC', 'The module image slider used when "true" the CSS files from the Image Slider module. When set to "alse" CSS files are not loaded. The "false" is really only necessary if the desired slider plugin is already available through other customizations in the shop (for example, by manual installation/adjustments in the template or similar).');
	define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_TITLE', 'Display ImageSlider entries per page in the Administration');
	define('MAX_DISPLAY_IMAGESLIDERS_RESULTS_DESC', 'How much ImageSlider entries to be displayed per page in the administration area of the store? The setting can be changed directly in the overview.');
?>