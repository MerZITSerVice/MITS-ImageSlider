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

if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {

  $mits_imageslider_active = false;
  if (MODULE_MITS_IMAGESLIDER_SHOW == 'start' && basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) {
    $mits_imageslider_active = true;
  } elseif (MODULE_MITS_IMAGESLIDER_SHOW == 'general') {
    $mits_imageslider_active = true;
  }

  if ($mits_imageslider_active == true && is_object($smarty)) {
    $mits_slidergroups_query = xtDBquery("SELECT DISTINCT imagesliders_group FROM " . TABLE_MITS_IMAGESLIDER . " WHERE imagesliders_group != 'mits_imageslider' ORDER BY imagesliders_group");
    while ($mits_slidergroups = xtc_db_fetch_array($mits_slidergroups_query, true)) {
      $smarty->assign(strtoupper($mits_slidergroups['imagesliders_group']), MITS_get_imageslider($mits_slidergroups['imagesliders_group']));
    }
    $mits_mainslider = MITS_get_imageslider('mits_imageslider');
    $smarty->assign('MITS_IMAGESLIDER', $mits_mainslider);
    $smarty->assign('box_IMAGESLIDER', $mits_mainslider);
  }

}