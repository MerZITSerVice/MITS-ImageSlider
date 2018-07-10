<?php

	// Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
	// only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

// include needed functions
class mits_imageslider {
  var $code, $title, $description, $enabled;

  function __construct() {
     $this->code = 'mits_imageslider';
     $this->title = MODULE_MITS_IMAGESLIDER_TEXT_TITLE;
     $this->description = MODULE_MITS_IMAGESLIDER_TEXT_DESCRIPTION;
     $this->sort_order = defined('MODULE_MITS_IMAGESLIDER_SORT_ORDER') ? MODULE_MITS_IMAGESLIDER_SORT_ORDER : 0;
     $this->enabled = ((MODULE_MITS_IMAGESLIDER_STATUS == 'true') ? true : false);
   }

  function process($file) {
    if (isset($_POST['configuration']) && $_POST['configuration']['MODULE_MITS_IMAGESLIDER_STATUS'] == 'true') {
      //xtc_redirect(xtc_href_link(FILENAME_MITS_IMAGESLIDER));
    }
  }

  function display() {
    return array('text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
                           xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=mits_imageslider')) . "</div>");
  }

  function check() {    
	if (!isset($this->_check)) {
      $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_MITS_IMAGESLIDER_STATUS'");
      $this->_check = xtc_db_num_rows($check_query);
    }
    return $this->_check;
  }
    
  function install() {
	if (xtc_db_num_rows(xtc_db_query("SHOW TABLES LIKE '".TABLE_MITS_IMAGESLIDER."'")) && (!xtc_db_num_rows("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_MITS_IMAGESLIDER_STATUS'"))) { 
	  	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
	  	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_SHOW', 'start',  '6', '2', 'xtc_cfg_select_option(array(\'start\', \'general\'), ', now())"); 
      	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_TYPE', 'bxSlider',  '6', '4', 'xtc_cfg_select_option(array(\'bxSlider\', \'NivoSlider\', \'FlexSlider\', \'jQuery.innerfade\'), ', now())");
	  	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT', 'true',  '6', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
	  	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_LOADCSS', 'true',  '6', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
	  	xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MAX_DISPLAY_IMAGESLIDERS_RESULTS', '20',  '6', '7', NULL, now())");
	  	xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " CHANGE COLUMN `imagesliders` `mits_imageslider` INT(1) NOT NULL DEFAULT '0'");
	  	xtc_db_query("ALTER TABLE " . TABLE_MITS_IMAGESLIDER  ." ADD COLUMN `imagesliders_group` VARCHAR(64) NOT NULL DEFAULT 'mits_imageslider'");
		@unlink(DIR_FS_DOCUMENT_ROOT.(defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/').'imagesliders.php');
		@unlink(DIR_FS_DOCUMENT_ROOT.(defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/').'includes/application_top.php.txt');
		@unlink(DIR_FS_DOCUMENT_ROOT.(defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/').'includes/column_left.php.txt');
		@unlink(DIR_FS_DOCUMENT_ROOT.'lang/german/admin/imagesliders.php');
		@unlink(DIR_FS_DOCUMENT_ROOT.'lang/german/admin/german.php.txt');
		@unlink(DIR_FS_DOCUMENT_ROOT.'lang/english/admin/imagesliders.php');
		@unlink(DIR_FS_DOCUMENT_ROOT.'lang/english/admin/english.php.txt');
		@unlink(DIR_FS_DOCUMENT_ROOT.'inc/xtc_get_categories_name.inc.php');
	} else {
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_SHOW', 'start',  '6', '2', 'xtc_cfg_select_option(array(\'start\', \'general\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_TYPE', 'bxSlider',  '6', '4', 'xtc_cfg_select_option(array(\'bxSlider\', \'NivoSlider\', \'FlexSlider\', \'jQuery.innerfade\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT', 'true',  '6', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MITS_IMAGESLIDER_LOADCSS', 'true',  '6', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MAX_DISPLAY_IMAGESLIDERS_RESULTS', '20',  '6', '7', NULL, now())");
		xtc_db_query("CREATE TABLE IF NOT EXISTS ".TABLE_MITS_IMAGESLIDER." (
					  `imagesliders_id` int(11) NOT NULL auto_increment,
					  `imagesliders_name` varchar(255) NOT NULL default '',
					  `date_added` datetime default NULL,
					  `last_modified` datetime default NULL,
					  `status` tinyint(1) NOT NULL default '0',
					  `sorting` tinyint(1) NOT NULL default '0',
					  `imagesliders_group` varchar(128) NOT NULL default 'mits_imageslider',
					  PRIMARY KEY  (`imagesliders_id`)
					)");
		xtc_db_query("CREATE TABLE IF NOT EXISTS ".TABLE_MITS_IMAGESLIDER_INFO." (
					  `imagesliders_id` int(11) NOT NULL,
					  `languages_id` int(11) NOT NULL,
					  `imagesliders_title` varchar(255) NOT NULL,
					  `imagesliders_url` varchar(255) NOT NULL,
					  `imagesliders_url_target` tinyint(1) NOT NULL default '0',
					  `imagesliders_url_typ` tinyint(1) NOT NULL default '0',
					  `imagesliders_description` text,
					  `imagesliders_image` varchar(255) default NULL,
					  `url_clicked` int(5) NOT NULL default '0',
					  `date_last_click` datetime default NULL,
					  PRIMARY KEY  (`imagesliders_id`,`languages_id`)
					)");
		xtc_db_query("ALTER TABLE ".TABLE_ADMIN_ACCESS." ADD `mits_imageslider` INT( 1 ) NOT NULL DEFAULT '0'");
		xtc_db_query("UPDATE ".TABLE_ADMIN_ACCESS." SET `mits_imageslider` = 1");
	}
  }

  function remove() {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
    xtc_db_query("DROP TABLE ".TABLE_MITS_IMAGESLIDER);
	xtc_db_query("DROP TABLE ".TABLE_MITS_IMAGESLIDER_INFO);
	xtc_db_query("ALTER TABLE ".TABLE_ADMIN_ACCESS." DROP COLUMN `mits_imageslider`");
  }

  function keys() {
    $key = array('MODULE_MITS_IMAGESLIDER_STATUS',
				 'MODULE_MITS_IMAGESLIDER_SHOW',
				 'MODULE_MITS_IMAGESLIDER_TYPE',
				 'MODULE_MITS_IMAGESLIDER_LOADJAVASCRIPT',
				 'MODULE_MITS_IMAGESLIDER_LOADCSS',
				 'MAX_DISPLAY_IMAGESLIDERS_RESULTS'
				 );

    return $key;
  }
}
?>