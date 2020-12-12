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

function MITS_get_imageslider($group = 'mits_imageslider') {
  if (defined('MODULE_MITS_IMAGESLIDER_STATUS') && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {

    $group = strtolower($group);

    require_once(DIR_FS_INC . 'xtc_get_products_name.inc.php');
    require_once(DIR_FS_EXTERNAL . 'mits_imageslider/functions/mits_get_categories_name.inc.php');

    $mits_imagesliders_query = xtDBquery("SELECT * FROM " . TABLE_MITS_IMAGESLIDER . " i, " . TABLE_MITS_IMAGESLIDER_INFO . " ii
													 WHERE languages_id='" . (int)$_SESSION['languages_id'] . "'
													 AND i.imagesliders_id = ii.imagesliders_id
													 AND ii.imagesliders_image != ''
													 AND i.status = '0'
													 AND i.imagesliders_group = '" . xtc_db_input($group) . "'
													 ORDER BY i.sorting, i.imagesliders_id ASC");
    if (xtc_db_num_rows($mits_imagesliders_query, true)) {
      $mits_imagesliders_string = '';
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
            $url = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link((int)$mits_imageslider_data['imagesliders_url'], xtc_get_products_name((int)$mits_imageslider_data['imagesliders_url'])));
            break;
          case 3:
            $url = xtc_href_link(FILENAME_DEFAULT, xtc_category_link((int)$mits_imageslider_data['imagesliders_url'], mits_get_categories_name((int)$mits_imageslider_data['imagesliders_url'])));
            break;
          case 4:
            $url = xtc_href_link(FILENAME_CONTENT, 'coID=' . (int)$mits_imageslider_data['imagesliders_url']);
            break;
          default:
            $url = xtc_href_link(FILENAME_DEFAULT);
        }

        $sliderdata[] = array(
          'id' => $mits_imageslider_data['imagesliders_id'],
          'link' => $url,
          'target' => $target,
          'bild' => DIR_WS_BASE . DIR_WS_IMAGES . $mits_imageslider_data['imagesliders_image'],
          'titel' => strip_tags(str_replace(array('"', "'"), array('&quot;', '&apos;'), $mits_imageslider_data['imagesliders_title'])),
          'alt' => strip_tags(str_replace(array('"', "'"), array('&quot;', '&apos;'), $mits_imageslider_data['imagesliders_title'])),
          'text' => $mits_imageslider_data['imagesliders_description']
        );

      }
    }

    if (defined('MODULE_MITS_IMAGESLIDER_TYPE') && MODULE_MITS_IMAGESLIDER_TYPE == 'bxSlider') {
      if (sizeof($sliderdata) > 0) {
        $mits_imagesliders_string .= '
					<ul class="mits_bxslider">';
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $mits_imagesliders_string .= '
						<li>
							<a href="' . $sliderdata[$i]['link'] . '" title="' . $sliderdata[$i]['titel'] . '"' . $sliderdata[$i]['target'] . '>
								<img src="' . $sliderdata[$i]['bild'] . '" alt="' . $sliderdata[$i]['alt'] . '" title="' . $sliderdata[$i]['text'] . '" />
							</a>
						</li>';
        }
        $mits_imagesliders_string .= '
					</ul>';
      }
    }

    if (defined('MODULE_MITS_IMAGESLIDER_TYPE') && MODULE_MITS_IMAGESLIDER_TYPE == 'bxSlider tpl_modified') {
      if (sizeof($sliderdata) > 0) {
        $mits_imagesliders_string  .= '<div class="content_banner cf">
					<ul class="bxcarousel_slider">';
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $mits_imagesliders_string .= '
						<li>
							<a href="' . $sliderdata[$i]['link'] . '" title="' . $sliderdata[$i]['titel'] . '"' . $sliderdata[$i]['target'] . '>
								<img src="' . $sliderdata[$i]['bild'] . '" alt="' . $sliderdata[$i]['alt'] . '" title="' . $sliderdata[$i]['text'] . '" />
							</a>
						</li>';
        }
        $mits_imagesliders_string .= '
					</ul>
				</div>';
      }
    }

    if (defined('MODULE_MITS_IMAGESLIDER_TYPE') && MODULE_MITS_IMAGESLIDER_TYPE == 'NivoSlider') {
      if (sizeof($sliderdata) > 0) {
        $mits_imagesliders_string .= '
					<div class="slider-wrapper theme-default">
						<div class="ribbon"></div>';
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $mits_imagesliders_string .= chr(9) . '<div id="' . $sliderdata[$i]['id'] . '" class="nivo-html-caption">' . chr(13);
          if ($sliderdata[$i]['titel'] != '') $mits_imagesliders_string .= chr(9) . chr(9) . '<h3>' . strip_tags($sliderdata[$i]['titel']) . '</h3>' . chr(13);
          if ($sliderdata[$i]['text'] != '') $mits_imagesliders_string .= chr(9) . chr(9) . '<div>' . strip_tags($sliderdata[$i]['text']) . '</div>' . chr(13);
          $mits_imagesliders_string .= chr(9) . '</div>' . chr(13);
        }
        $mits_imagesliders_string .= '
						<div class="nivoSlider mits_nivoSlider">' . chr(13);
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $mits_imagesliders_string .= '<a href="' . $sliderdata[$i]['link'] . '" title="' . $sliderdata[$i]['titel'] . '"' . $sliderdata[$i]['target'] . '><img src="' . $sliderdata[$i]['bild'] . '" title="#' . $sliderdata[$i]['id'] . '" alt="' . $sliderdata[$i]['alt'] . '" /></a>' . chr(13);
        }
        $mits_imagesliders_string .= '
						</div>
					</div>' . chr(13);
      }
    }

    if (defined('MODULE_MITS_IMAGESLIDER_TYPE') && MODULE_MITS_IMAGESLIDER_TYPE == 'FlexSlider') {
      if (sizeof($sliderdata) > 0) {
        $mits_imagesliders_string .= '
					<div class="flex-container">
						<div class="flexslider">
							<ul class="slides">';
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $slidertext = (($sliderdata[$i]['text'] != '') ? '<div class="flex-caption"><div class="flex-caption-header">' . $sliderdata[$i]['titel'] . '</div><div>' . $sliderdata[$i]['text'] . '</div></div>' : '<div class="flex-caption"><div class="flex-caption-header">' . $sliderdata[$i]['titel'] . '</div></div>');
          $mits_imagesliders_string .= '
								<li>
									<a href="' . $sliderdata[$i]['link'] . '" title="' . $sliderdata[$i]['titel'] . '"' . $sliderdata[$i]['target'] . '>
										<img src="' . $sliderdata[$i]['bild'] . '" alt="' . $sliderdata[$i]['alt'] . '" title="' . $sliderdata[$i]['titel'] . '" />
										' . $slidertext . '
									</a>
								</li>';
        }
        $mits_imagesliders_string .= '
							</ul>
						</div>
					</div>';
      }
    }

    if (defined('MODULE_MITS_IMAGESLIDER_TYPE') && MODULE_MITS_IMAGESLIDER_TYPE == 'jQuery.innerfade') {
      if (sizeof($sliderdata) > 0) {
        $mits_imagesliders_string .= '				
					<div class="mits_imageslider">
						<ul class="imageslider">';
        for ($i = 0, $n = sizeof($sliderdata); $i < $n; $i++) {
          $mits_imagesliders_string .= '
							<li>
								<a href="' . $sliderdata[$i]['link'] . '" title="' . $sliderdata[$i]['titel'] . '"' . $sliderdata[$i]['target'] . '>
									<img src="' . $sliderdata[$i]['bild'] . '" alt="' . $sliderdata[$i]['alt'] . '" title="' . $sliderdata[$i]['titel'] . '" />
								</a>';
          if ($sliderdata[$i]['text'] != '') $mits_imagesliders_string .= '<div class="slidercontent"><div class="slidercontentinner">' . $sliderdata[$i]['text'] . '</div></div>';
          $mits_imagesliders_string .= '
							</li>';
        }
        $mits_imagesliders_string .= '
						</ul>
						<ul class="imageslider-nav">
							<li class="slideprev"><a class="prev" href="#">' . PREVNEXT_BUTTON_PREV . '</a></li>
							<li class="slidepause"><a class="pause" href="#">Pause</a></li>
							<li class="slidenext"><a class="next" href="#">' . PREVNEXT_BUTTON_NEXT . '</a></li>
						</ul>
						<div class="innerfadeclear"></div>
					</div>';
      }
    }

    if (!empty($mits_imagesliders_string)) {
      return '<!-- MITS Imageslider v2.03 (c)2008-2020 by Hetfield - www.MerZ-IT-SerVice.de - Begin --><div class="mits_imageslider_container">' . $mits_imagesliders_string . '</div><!-- MITS Imageslider v2.03 (c)2008-2020 by Hetfield - www.MerZ-IT-SerVice.de - End -->';
    } else {
      return false;
    }
  }
}

?>