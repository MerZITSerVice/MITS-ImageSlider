<?php

/* -----------------------------------------------------------------------------------------
   $Id: imagesliders.php 002 2017-03-03 11:00:00Z Hetfield $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   Copyright (c) 2008 - 2017 Hetfield - www.MerZ-IT-SerVice.de
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(specials.php,v 1.30 2003/02/10); www.oscommerce.com 
   (c) 2003	nextcommerce (specials.php,v 1.10 2003/08/17); www.nextcommerce.org
   (c) 2003 XT-Commerce (specials.php 1292 2005-10-07 mz); www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
	$slidergroup = 'mits_imageslider';
	
	// include smarty
	include(DIR_FS_BOXES_INC . 'smarty_default.php');
	
	@require_once(DIR_FS_INC.'xtc_get_products_name.inc.php');
	@require_once(DIR_FS_EXTERNAL.'mits_imageslider/functions/mits_get_categories_name.inc.php');
	
	// reset cache id
	$cache_id = '';
	
	$mits_imagesliders_string = '';
				
	$mits_imagesliders_query = xtc_db_query("SELECT * FROM ".TABLE_MITS_IMAGESLIDER." i, ".TABLE_MITS_IMAGESLIDER_INFO." ii
											 WHERE languages_id='".xtc_db_input((int) $_SESSION['languages_id'])."'
											 AND i.imagesliders_id = ii.imagesliders_id
											 AND ii.imagesliders_image != ''
											 AND i.status = '0'
											 AND i.imagesliders_group = '".xtc_db_input($slidergroup)."'
											 ORDER BY i.sorting, i.imagesliders_id ASC");
	if (xtc_db_num_rows($mits_imagesliders_query)) {	
		$sliderdata = array();
		while ($mits_imageslider_data = xtc_db_fetch_array($mits_imagesliders_query, true)) {  
							
			switch ($mits_imageslider_data['imagesliders_url_target']) {
				case 1:
					$target = ' target="_blank"';
					break;
				case 2:
					$target = ' target="_top"';
					break;
				case 3:
					$target = ' target="_self"';
					break;
				case 4:
					$target = ' target="_parent"';
					break;
				default:
					$target = '';
			}
			
			switch ($mits_imageslider_data['imagesliders_url_typ']) {
				case 0:
					$url = $mits_imageslider_data['imagesliders_url'];
					break;
				case 1:
					$url = xtc_href_link($mits_imageslider_data['imagesliders_url']);
					break;
				case 2:
					$url = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link((int)$mits_imageslider_data['imagesliders_url'],xtc_get_products_name((int)$mits_imageslider_data['imagesliders_url'])));
					break;
				case 3:
					$url = xtc_href_link(FILENAME_DEFAULT, xtc_category_link((int)$mits_imageslider_data['imagesliders_url'],mits_get_categories_name((int)$mits_imageslider_data['imagesliders_url'])));
					break;
				case 4:
					$url = xtc_href_link(FILENAME_CONTENT, 'coID='.(int)$mits_imageslider_data['imagesliders_url']);
					break;
				default:
					$url = xtc_href_link(FILENAME_DEFAULT);
			}
			
			$sliderdata[] = array(
				'id' 		=> $mits_imageslider_data['imagesliders_id'],
				'link'		=> $url,
				'target'	=> $target,
				'bild' 		=> DIR_WS_BASE.DIR_WS_IMAGES.$mits_imageslider_data['imagesliders_image'],
				'titel'		=> strip_tags($mits_imageslider_data['imagesliders_title']),
				'text' 		=> strip_tags($mits_imageslider_data['imagesliders_description'])
			);
			
		}
		
		// set cache id
		$cache_id = md5($_SESSION['language'].$slidergroup);
	
		if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_imagesliders.html', $cache_id) || !$cache) {
			$box_smarty->assign('slider_content', $sliderdata);
		}
					
	}
	
	if (!$cache) {
		$box_imagesliders = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_imagesliders.html');
	} else {
		$box_imagesliders = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_imagesliders.html', $cache_id);
	}
	$smarty->assign('box_IMAGESLIDERS', $box_imagesliders);
}
?>