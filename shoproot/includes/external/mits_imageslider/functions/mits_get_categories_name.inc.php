<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
   
  	function mits_get_categories_name($categories_id) {

    	if (GROUP_CHECK == 'true') $group_check = " AND c.group_permission_".xtc_db_input((int)$_SESSION['customers_status']['customers_status_id'])." = 1 ";
    
		$categories_name_query = xtc_db_query("SELECT cd.categories_name FROM ".TABLE_CATEGORIES_DESCRIPTION." cd, ".TABLE_CATEGORIES." c WHERE cd.categories_id = '".xtc_db_input((int)$categories_id)."' AND c.categories_id = cd.categories_id ".$group_check." AND cd.language_id = '".xtc_db_input((int)$_SESSION['languages_id'])."'");
    	$categories_name = xtc_db_fetch_array($categories_name_query,true);	
    	return $categories_name['categories_name'];
	
  	}
	
?>