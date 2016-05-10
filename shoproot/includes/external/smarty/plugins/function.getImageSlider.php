<?php

    // Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
	
	function smarty_function_getImageSlider($params, &$smarty) {
		
		$slider_active = false;
		if (MODULE_MITS_IMAGESLIDER_SHOW == 'start' && basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) {
			$slider_active = true;
		} elseif (MODULE_MITS_IMAGESLIDER_SHOW == 'general') {
			$slider_active = true;		
		}		
		
		$slidergroup = (!isset($params['slidergroup'])) ? 'mits_imageslider' : strtolower($params['slidergroup']);
  				
		if ($slider_active == true) {
			$mits_slidergroups_query = xtc_db_query("SELECT DISTINCT imagesliders_group FROM " . TABLE_MITS_IMAGESLIDER . " WHERE imagesliders_group = '".xtc_db_input($slidergroup)."' ORDER BY imagesliders_group");
			if (xtc_db_num_rows($mits_slidergroups_query)) {
				$mits_slidergroups = xtc_db_fetch_array($mits_slidergroups_query);
				$mits_slider = MITS_get_imageslider($mits_slidergroups['imagesliders_group']);
				if (isset($params['nivotheme']) && $params['nivotheme'] != '') {
					$mits_slider = str_replace('theme-default',$params['nivotheme'],$mits_slider);
				}
				return $mits_slider;
			} else {
				return false;
			}
		} else {
			return false;
		}
	
	}
	
?>