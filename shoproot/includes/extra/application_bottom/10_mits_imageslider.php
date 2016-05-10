<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
	
	if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true' && $mits_imageslider_active == true) {
		switch(MODULE_MITS_IMAGESLIDER_TYPE) {
	
			case 'bxSlider':
				if (CURRENT_TEMPLATE != 'tpl_modified') {
					if(MODULE_MITS_IMAGESLIDER_LOADCSS == 'true')
						echo '<link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/bxslider/jquery.bxslider.css','',$request_type,false).'" type="text/css" media="screen" />';
					if(MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true')
						echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/bxslider/plugins/jquery.easing.1.3.js','',$request_type,false).'" type="text/javascript"></script>
							  <script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/bxslider/jquery.bxslider.min.js','',$request_type,false).'" type="text/javascript"></script>';
					echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/bxslider/mits_imageslider.js','',$request_type,false).'" type="text/javascript"></script>'; 
				}
				break;
				
			case 'NivoSlider':
				if(MODULE_MITS_IMAGESLIDER_LOADCSS == 'true')
					echo '<link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/themes/default/default.css','',$request_type,false).'" type="text/css" media="screen" />
						  <link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/themes/light/light.css','',$request_type,false).'" type="text/css" media="screen" />
						  <link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/themes/dark/dark.css','',$request_type,false).'" type="text/css" media="screen" />
						  <link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/themes/bar/bar.css','',$request_type,false).'" type="text/css" media="screen" />
						  <link href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/nivo-slider.css','',$request_type,false).'" type="text/css" media="screen" />';
				if(MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true')
					echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/jquery.nivo.slider.pack.js','',$request_type,false).'" type="text/javascript"></script>';
				echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/nivoslider/mits_imageslider.js','',$request_type,false).'" type="text/javascript"></script>';      		
				break;
				
			case 'FlexSlider':
				if(MODULE_MITS_IMAGESLIDER_LOADCSS == 'true')
					echo '<link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/flexslider/flexslider.css','',$request_type,false).'" type="text/css" media="screen" />';
				if(MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true')
					echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/flexslider/jquery.flexslider-min.js','',$request_type,false).'" type="text/javascript"></script>';
				echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/flexslider/mits_imageslider.js','',$request_type,false).'" type="text/javascript"></script>';      		
				break;
				
			case 'jQuery.innerfade':
				if(MODULE_MITS_IMAGESLIDER_LOADCSS == 'true')
					echo '<link rel="stylesheet" href="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/jqueryinnerfade/mits_imageslider.css','',$request_type,false).'" type="text/css" media="screen" />';
				if(MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true')
					echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/jqueryinnerfade/jquery.innerfade.min.js','',$request_type,false).'" type="text/javascript"></script>';
				echo '<script src="'.xtc_href_link(DIR_WS_EXTERNAL.'mits_imageslider/plugins/jqueryinnerfade/mits_imageslider.js','',$request_type,false).'" type="text/javascript"></script>';      		
				break;
				
		}
	}
?>