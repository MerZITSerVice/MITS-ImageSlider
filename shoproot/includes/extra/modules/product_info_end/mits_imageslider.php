<?php
/**
 * --------------------------------------------------------------
 * File: mits_imageslider.php
 * Date: 17.07.2020
 * Time: 18:24
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined(MODULE_MITS_IMAGESLIDER_STATUS) && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
  if (strstr($PHP_SELF, FILENAME_PRODUCT_INFO) && is_object($product) && $product->isProduct() === true && is_object($info_smarty)) {
    if (isset($product->data['products_id']) && isset($product->data['imagesliders_group']) && $product->data['imagesliders_group'] != '') {
      $mits_imageslider_active = true;
      $info_smarty->assign('MITS_PRODUCTS_IMAGESLIDER', MITS_get_imageslider($product->data['imagesliders_group']));
    }
  }
}