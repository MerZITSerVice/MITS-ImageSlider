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

if (defined('MODULE_MITS_IMAGESLIDER_STATUS') && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
  // Products
  $check_proslidergroup_field = false;
  $check_proslidergroup_rows = xtc_db_query('DESCRIBE ' . TABLE_PRODUCTS);
  while ($proslidergroup_row = xtc_db_fetch_array($check_proslidergroup_rows)) {
    if ($proslidergroup_row['Field'] == 'imagesliders_group') {
      $check_proslidergroup_field = true;
    }
  }
  if ($check_proslidergroup_field == false) {
    xtc_db_query('ALTER TABLE ' . TABLE_PRODUCTS . ' ADD COLUMN imagesliders_group VARCHAR(255) NULL');
  }
  $add_products_fields[] = 'imagesliders_group';

  // Categories
  $check_catslidergroup_field = false;
  $check_catslidergroup_rows = xtc_db_query('DESCRIBE ' . TABLE_CATEGORIES);
  while ($catslidergroup_row = xtc_db_fetch_array($check_catslidergroup_rows)) {
    if ($catslidergroup_row['Field'] == 'imagesliders_group') {
      $check_catslidergroup_field = true;
    }
  }
  if ($check_catslidergroup_field == false) {
    xtc_db_query('ALTER TABLE ' . TABLE_CATEGORIES . ' ADD COLUMN imagesliders_group VARCHAR(255) NULL');
  }
  $add_categories_fields[] = 'imagesliders_group';

  // Content
  $check_cmsslidergroup_field = false;
  $check_cmsslidergroup_rows = xtc_db_query('DESCRIBE ' . TABLE_CONTENT_MANAGER);
  while ($cmsslidergroup_row = xtc_db_fetch_array($check_cmsslidergroup_rows)) {
    if ($cmsslidergroup_row['Field'] == 'imagesliders_group') {
      $check_cmsslidergroup_field = true;
    }
  }
  if ($check_cmsslidergroup_field == false) {
    xtc_db_query('ALTER TABLE ' . TABLE_CONTENT_MANAGER . ' ADD COLUMN imagesliders_group VARCHAR(255) NULL');
  }
  $add_categories_fields[] = 'imagesliders_group';

  if ($check_cmsslidergroup_field === false && $check_catslidergroup_field === false && $check_proslidergroup_field === false) {
    if (MODULE_MITS_IMAGESLIDER_TYPE != '') {
      $slidertype = MODULE_MITS_IMAGESLIDER_TYPE;
    } else {
      $slidertype = 'bxSlider';
    }
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_MITS_IMAGESLIDER_TYPE'");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_TYPE', '" . $slidertype . "',  '6', '4', 'xtc_cfg_select_option(array(\'bxSlider\', \'bxSlider tpl_modified\', \'NivoSlider\', \'FlexSlider\', \'jQuery.innerfade\'), ', now())");
    xtc_db_query("ALTER TABLE " . TABLE_MITS_IMAGESLIDER . " CHANGE `imagesliders_name` `imagesliders_name` VARCHAR(255) NOT NULL DEFAULT ''");
    xtc_db_query("ALTER TABLE " . TABLE_MITS_IMAGESLIDER_INFO . " CHANGE `imagesliders_title` `imagesliders_title ` VARCHAR(255) NOT NULL");
    xtc_db_query("ALTER TABLE " . TABLE_MITS_IMAGESLIDER_INFO . " CHANGE `imagesliders_image` `imagesliders_image ` VARCHAR(255) NOT NULL");
  }
}