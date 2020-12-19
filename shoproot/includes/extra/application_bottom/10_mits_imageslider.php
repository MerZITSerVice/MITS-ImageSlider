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

if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true' && $mits_imageslider_active == true) {
  defined('MODULE_MITS_IMAGESLIDER_LOADCSS') or define('MODULE_MITS_IMAGESLIDER_LOADCSS', 'true');
  defined('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT') or define('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT', 'true');

  if (!empty(MODULE_MITS_IMAGESLIDER_TYPE)) {
    switch (MODULE_MITS_IMAGESLIDER_TYPE) {

      case 'bxSlider':
        if (MODULE_MITS_IMAGESLIDER_LOADCSS == 'true') {
          echo '<link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/jquery.bxslider.min.css', '', $request_type, false) . '" type="text/css" media="screen" />';
        }
        if (MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true') {
          echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/jquery.bxslider.min.js', '', $request_type, false) . '" type="text/javascript"></script>';
        }
        echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/mits_imageslider.js', '', $request_type, false) . '" type="text/javascript"></script>';
        break;

      case 'bxSlider tpl_modified':

        break;

      case 'NivoSlider':
        if (MODULE_MITS_IMAGESLIDER_LOADCSS == 'true') {
          echo '<link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/themes/default/default.css', '', $request_type, false) . '" type="text/css" media="screen" />
						    <link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/themes/light/light.css', '', $request_type, false) . '" type="text/css" media="screen" />
						    <link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/themes/dark/dark.css', '', $request_type, false) . '" type="text/css" media="screen" />
						    <link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/themes/bar/bar.css', '', $request_type, false) . '" type="text/css" media="screen" />
						    <link href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/nivo-slider.css', '', $request_type, false) . '" type="text/css" media="screen" />';
        }
        if (MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true') {
          echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/jquery.nivo.slider.pack.js', '', $request_type, false) . '" type="text/javascript"></script>';
        }
        echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/nivoslider/mits_imageslider.js', '', $request_type, false) . '" type="text/javascript"></script>';
        break;

      case 'FlexSlider':
        if (MODULE_MITS_IMAGESLIDER_LOADCSS == 'true') {
          echo '<link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/flexslider/flexslider.css', '', $request_type, false) . '" type="text/css" media="screen" />';
        }
        if (MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true') {
          echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/flexslider/jquery.flexslider-min.js', '', $request_type, false) . '" type="text/javascript"></script>';
        }
        echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/flexslider/mits_imageslider.js', '', $request_type, false) . '" type="text/javascript"></script>';
        break;

      case 'jQuery.innerfade':
        if (MODULE_MITS_IMAGESLIDER_LOADCSS == 'true') {
          echo '<link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/jqueryinnerfade/mits_imageslider.css', '', $request_type, false) . '" type="text/css" media="screen" />';
        }
        if (MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true') {
          echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/jqueryinnerfade/jquery.innerfade.min.js', '', $request_type, false) . '" type="text/javascript"></script>';
        }
        echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/jqueryinnerfade/mits_imageslider.js', '', $request_type, false) . '" type="text/javascript"></script>';
        break;

      default:
        if (strpos(CURRENT_TEMPLATE,'tpl_modified') === false) {
          if (MODULE_MITS_IMAGESLIDER_LOADCSS == 'true') {
            echo '<link rel="stylesheet" href="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/jquery.bxslider.min.css', '', $request_type, false) . '" type="text/css" media="screen" />';
          }
          if (MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT == 'true') {
            echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/jquery.bxslider.min.js', '', $request_type, false) . '" type="text/javascript"></script>';
          }
          echo '<script src="' . xtc_href_link(DIR_WS_EXTERNAL . 'mits_imageslider/plugins/bxslider/mits_imageslider.js', '', $request_type, false) . '" type="text/javascript"></script>';
        }

    }
  }
}
