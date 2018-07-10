<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html
	
	function MITS_get_imageslider($group = 'mits_imageslider') {	
		if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
			
			$group = strtolower($group);
			
			require_once (DIR_FS_INC.'xtc_get_products_name.inc.php');
			require_once (DIR_FS_EXTERNAL.'mits_imageslider/functions/mits_get_categories_name.inc.php');
			
			$mits_imagesliders_string = '';
			
			$mits_imagesliders_query = xtDBquery("SELECT * FROM ".TABLE_MITS_IMAGESLIDER." i, ".TABLE_MITS_IMAGESLIDER_INFO." ii
													 WHERE languages_id='".(int) $_SESSION['languages_id']."'
													 AND i.imagesliders_id = ii.imagesliders_id
													 AND ii.imagesliders_image != ''
													 AND i.status = '0'
													 AND i.imagesliders_group = '".xtc_db_input($group)."'
													 ORDER BY i.sorting, i.imagesliders_id ASC");
			if (xtc_db_num_rows($mits_imagesliders_query, true)) {	
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
			}
	
			if (MODULE_MITS_IMAGESLIDER_TYPE == 'bxSlider') {
				if (sizeof($sliderdata) > 0) {
					$sliderclass = ((strpos(CURRENT_TEMPLATE,'tpl_modified') !== false) ? ' class="bxcarousel_slider"' : ' class="mits_bxslider"');
                    if(strpos(CURRENT_TEMPLATE,'tpl_modified') !== false) $mits_imagesliders_string .= '<div class="content_banner cf">';
					$mits_imagesliders_string .= '
					<ul'.$sliderclass.'>';
					for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
						$mits_imagesliders_string .= '
						<li>
							<a href="'.$sliderdata[$i]['link'].'" title="'.$sliderdata[$i]['titel'].'"'.$sliderdata[$i]['target'].'>
								<img src="'.$sliderdata[$i]['bild'].'" alt="'.$sliderdata[$i]['titel'].'" title="'.$sliderdata[$i]['text'].'" />
							</a>
						</li>';
					}
					$mits_imagesliders_string .= '
					</ul>';
                    if(strpos(CURRENT_TEMPLATE,'tpl_modified') !== false) $mits_imagesliders_string .= '</div>';
				}			
			}
					
			if (MODULE_MITS_IMAGESLIDER_TYPE == 'NivoSlider') {
				if (sizeof($sliderdata) > 0) {
					$mits_imagesliders_string .= '
					<div class="slider-wrapper theme-default">
						<div class="ribbon"></div>';
					for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {					
						$mits_imagesliders_string .= chr(9).'<div id="'.$sliderdata[$i]['id'].'" class="nivo-html-caption">'.chr(13);					
						if ($sliderdata[$i]['titel'] != '') $mits_imagesliders_string .= chr(9).chr(9).'<h3>'.strip_tags($sliderdata[$i]['titel']).'</h3>'.chr(13);
						if ($sliderdata[$i]['text'] != '') $mits_imagesliders_string .= chr(9).chr(9).'<div>'.strip_tags($sliderdata[$i]['text']).'</div>'.chr(13);
						$mits_imagesliders_string .= chr(9).'</div>'.chr(13);
					}
					$mits_imagesliders_string .= '
						<div class="nivoSlider mits_nivoSlider">'.chr(13);
					for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
						$mits_imagesliders_string .= '<a href="'.$sliderdata[$i]['link'].'" title="'.$sliderdata[$i]['titel'].'"'.$sliderdata[$i]['target'].'><img src="'.$sliderdata[$i]['bild'].'" title="#'.$sliderdata[$i]['id'].'" alt="'.$sliderdata[$i]['titel'].'" /></a>'.chr(13);
					}				
					$mits_imagesliders_string .= '
						</div>
					</div>'.chr(13);
				}
			}
			
			if (MODULE_MITS_IMAGESLIDER_TYPE == 'FlexSlider') {
				if (sizeof($sliderdata) > 0) {
					$mits_imagesliders_string .= '
					<div class="flex-container">
						<div class="flexslider">
							<ul class="slides">';
					for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {					
						$slidertext = (($sliderdata[$i]['text'] != '') ? '<p class="flex-caption">'.$sliderdata[$i]['text'].'</p>' : '');
						$mits_imagesliders_string .= '
								<li>
									<a href="'.$sliderdata[$i]['link'].'" title="'.$sliderdata[$i]['titel'].'"'.$sliderdata[$i]['target'].'>
										<img src="'.$sliderdata[$i]['bild'].'" alt="'.$sliderdata[$i]['titel'].'" title="'.$sliderdata[$i]['titel'].'" />
										'.$slidertext.'
									</a>
								</li>';
					}
					$mits_imagesliders_string .= '
							</ul>
						</div>
					</div>';
				}			
			}
			
			if (MODULE_MITS_IMAGESLIDER_TYPE == 'jQuery.innerfade') {
				if (sizeof($sliderdata) > 0) {
					$mits_imagesliders_string .= '				
					<div class="mits_imageslider">
						<ul class="imageslider">';
					for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
						$mits_imagesliders_string .= '
							<li>
								<a href="'.$sliderdata[$i]['link'].'" title="'.$sliderdata[$i]['titel'].'"'.$sliderdata[$i]['target'].'>
									<img src="'.$sliderdata[$i]['bild'].'" alt="'.$sliderdata[$i]['titel'].'" title="'.$sliderdata[$i]['titel'].'" />
								</a>';
						if ($sliderdata[$i]['text'] != '') $mits_imagesliders_string .= '<div class="slidercontent"><div class="slidercontentinner">'.$sliderdata[$i]['text'].'</div></div>';
						$mits_imagesliders_string .= '
							</li>';
					}
					$mits_imagesliders_string .= '
						</ul>
						<ul class="imageslider-nav">
							<li class="slideprev"><a class="prev" href="#">'.PREVNEXT_BUTTON_PREV.'</a></li>
							<li class="slidepause"><a class="pause" href="#">Pause</a></li>
							<li class="slidenext"><a class="next" href="#">'.PREVNEXT_BUTTON_NEXT.'</a></li>
						</ul>
						<div class="innerfadeclear"></div>
					</div>';
				}
			}
						
			if (!empty($mits_imagesliders_string)) {
				return '<!-- Imageslider v2.02 (c)2008-2016 by Hetfield - www.MerZ-IT-SerVice.de - Begin --><div class="mits_imageslider_container">'.$mits_imagesliders_string.'</div><!-- Imageslider v2.02 (c)2008-2016 by Hetfield - www.MerZ-IT-SerVice.de - End -->';
			} else {
				return false;	
			}
		}
	}
?>