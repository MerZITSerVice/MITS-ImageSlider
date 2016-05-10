<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
	
	$mits_imageslider_active = false;
	if (MODULE_MITS_IMAGESLIDER_SHOW == 'start' && basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) {
		$mits_imageslider_active = true;
	} elseif (MODULE_MITS_IMAGESLIDER_SHOW == 'general') {
		$mits_imageslider_active = true;		
	}
	
	if ($mits_imageslider_active == true) {
		$mits_slidergroups_query = xtc_db_query("SELECT DISTINCT imagesliders_group FROM " . TABLE_MITS_IMAGESLIDER . " WHERE imagesliders_group != 'mits_imageslider' ORDER BY imagesliders_group");
		while ($mits_slidergroups = xtc_db_fetch_array($mits_slidergroups_query)) {			
			$smarty->assign(strtoupper($mits_slidergroups['imagesliders_group']), MITS_get_imageslider($mits_slidergroups['imagesliders_group']));
		}
		$mits_mainslider = MITS_get_imageslider('mits_imageslider');
		$smarty->assign('MITS_IMAGESLIDER', $mits_mainslider);
		$smarty->assign('box_IMAGESLIDER', $mits_mainslider);
	}

?>