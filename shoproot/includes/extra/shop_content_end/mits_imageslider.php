<?php
/**
 * --------------------------------------------------------------
 * File: mits_imageslider.php
 * Date: 17.07.2020
 * Time: 18:33
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_IMAGESLIDER_STATUS') && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
  if (basename($PHP_SELF) == FILENAME_CONTENT && isset($_GET['coID']) && (int)$_GET['coID'] > 0) {
    $mits_imageslider_content_query_raw = "SELECT imagesliders_group FROM " . TABLE_CONTENT_MANAGER . " WHERE content_group = " . (int)$_GET['coID'] . " AND languages_id = " . (int)$_SESSION['languages_id'] . " LIMIT 1";
    $mits_imageslider_content_query = xtDBquery($mits_imageslider_content_query_raw);
    $mits_imageslider_content = xtc_db_fetch_array($mits_imageslider_content_query, true);

    if (isset($mits_imageslider_content['imagesliders_group']) && $mits_imageslider_content['imagesliders_group'] != '' && is_object($smarty)) {
      $mits_imageslider_active = true;
      $smarty->assign('MITS_CONTENT_IMAGESLIDER', MITS_get_imageslider($mits_imageslider_content['imagesliders_group']));
    }
  }
}