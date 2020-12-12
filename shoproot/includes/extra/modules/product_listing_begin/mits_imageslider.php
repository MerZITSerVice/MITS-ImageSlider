<?php
/**
 * --------------------------------------------------------------
 * File: mits_imageslider.php
 * Date: 17.07.2020
 * Time: 18:34
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
  if (strstr($PHP_SELF, FILENAME_DEFAULT) && isset($current_category_id) && (int)$current_category_id > 0) {
    $mits_imageslider_categories_query_raw = "SELECT imagesliders_group FROM " . TABLE_CATEGORIES . " WHERE categories_id = " . (int)$current_category_id . " LIMIT 1";
    $mits_imageslider_categories_query = xtDBquery($mits_imageslider_categories_query_raw);
    $mits_imageslider_categories = xtc_db_fetch_array($mits_imageslider_categories_query, true);

    if (isset($mits_imageslider_categories['imagesliders_group']) && $mits_imageslider_categories['imagesliders_group'] != '') {
      $mits_imageslider_active = true;
      if (is_object($module_smarty)) {
        $module_smarty->assign('MITS_CATEGORIES_IMAGESLIDER', MITS_get_imageslider($mits_imageslider_categories['imagesliders_group']));
      }
    }
  }
}