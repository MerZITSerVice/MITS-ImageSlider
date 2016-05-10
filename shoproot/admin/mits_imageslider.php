<?php

  // Imageslider - (c) Copyright 2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
  // only original from https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html

  require_once ('includes/application_top.php');
  
  // include needed function
  require_once (DIR_FS_INC.'xtc_wysiwyg.inc.php');

  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  
  // languages
  $languages = xtc_get_languages(); 

  //display per page
  $cfg_max_display_results_key = 'MAX_DISPLAY_IMAGESLIDERS_RESULTS';
  $page_max_display_results = xtc_cfg_save_max_display_results($cfg_max_display_results_key);

	function xtc_get_imageslider_image($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_image FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_image'];
	}
	function xtc_get_imageslider_url($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_url FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_url'];
	}
	function xtc_get_imageslider_url_target($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_url_target FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_url_target'];
	}
	function xtc_get_imageslider_url_typ($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_url_typ FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_url_typ'];
	}
	function xtc_get_imageslider_title($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_title FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_title'];
	}
	function xtc_get_imageslider_description($imageslider_id, $language_id) {
		$imageslider_query = xtc_db_query("SELECT imagesliders_description FROM ".TABLE_MITS_IMAGESLIDER_INFO." WHERE imagesliders_id = '".(int)xtc_db_input($imageslider_id)."' AND languages_id = '".(int)xtc_db_input($language_id)."'");
		$imageslider = xtc_db_fetch_array($imageslider_query);	
		return $imageslider['imagesliders_description'];
	}
	
  switch ($action) {
    case 'insert':
    case 'save':
      $imagesliders_id = xtc_db_prepare_input((int)$_GET['iID']);
      $imagesliders_name = xtc_db_prepare_input($_POST['imagesliders_name']);	  
	  $imagesliders_status = xtc_db_prepare_input($_POST['imagesliders_status']);
	  $imagesliders_sorting = xtc_db_prepare_input($_POST['imagesliders_sorting']);
	  $new_imagesliders_group = xtc_db_prepare_input(strtolower($_POST['new_imagesliders_group']));
      $imagesliders_group = ((empty($new_imagesliders_group)) ? xtc_db_prepare_input($_POST['imagesliders_group']) : $new_imagesliders_group);
	  $imagesliders_image_exist = xtc_db_prepare_input($_POST['imagesliders_image_exist']);
	  
	  $imageslider_error = false;
      if (empty($imagesliders_name)) {
       	$messageStack->add(ERROR_IMAGESLIDER_NAME_REQUIRED, 'error');
        $imageslider_error = true;
      }
      if (empty($imagesliders_group)) {
        $messageStack->add(ERROR_IMAGESLIDER_GROUP_REQUIRED, 'error');
        $imageslider_error = true;
      }
	  
	  $sql_data_array = array('imagesliders_name' => $imagesliders_name,
	  						  'status' => $imagesliders_status,
							  'sorting' => $imagesliders_sorting,
							  'imagesliders_group' => $imagesliders_group
	  );
	  if ($imageslider_error != true) {
		  if ($_GET['action'] == 'insert') {
			$insert_sql_data = array('date_added' => 'now()');
			$sql_data_array = xtc_array_merge($sql_data_array, $insert_sql_data);
			xtc_db_perform(TABLE_MITS_IMAGESLIDER, $sql_data_array);
			$imagesliders_id = xtc_db_insert_id();
		  } elseif ($_GET['action'] == 'save') {
			$update_sql_data = array('last_modified' => 'now()');
			$sql_data_array = xtc_array_merge($sql_data_array, $update_sql_data);
			xtc_db_perform(TABLE_MITS_IMAGESLIDER, $sql_data_array, 'update', "imagesliders_id = '" . xtc_db_input($imagesliders_id) . "'");
		  }
	  }

      $languages = xtc_get_languages();
	  $accepted_imagesliders_image_files_extensions = array("jpg","jpeg","jpe","gif","png","bmp","tiff","tif","bmp");
      $accepted_imagesliders_image_files_mime_types = array("image/jpeg","image/gif","image/png","image/bmp");
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {		  
	  	  if ($_POST['imagesliders_image_delete'. $i] == true) {
		  	 $image_location = DIR_FS_CATALOG_IMAGES.xtc_get_imageslider_image($imagesliders_id, $languages[$i]['id']);
          	 if (file_exists($image_location)) @unlink($image_location);
			 $imagepfad = '';
		  }
	  	  if ($image = xtc_try_upload('imagesliders_image'.$i, DIR_FS_CATALOG_IMAGES.'imagesliders/'.$languages[$i]['directory'].'/', '644', $accepted_imagesliders_image_files_extensions, $accepted_imagesliders_image_files_mime_types)) {
			 $imagepfad = 'imagesliders/'.$languages[$i]['directory'].'/'.$image->filename;
          } else {
		  	 if ($_POST['imagesliders_image_delete'. $i] == false) {
			 	$imagepfad = xtc_get_imageslider_image($imagesliders_id, $languages[$i]['id']);
			 } 
		  }
		  if ($imagesliders_image_exist == 'no' && $image->filename == '') {
			 $messageStack->add(xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']).ERROR_IMAGESLIDER_IMAGE_REQUIRED, 'error');
          	 $imageslider_error = true; 
		  }
		  if ($imageslider_error != true) {
			  $imagesliders_url_array = $_POST['imagesliders_url'];
			  $imagesliders_url_target_array = $_POST['imagesliders_url_target'];
			  $imagesliders_url_typ_array = $_POST['imagesliders_url_typ'];			
			  $imagesliders_title_array = $_POST['imagesliders_title'];
			  $imagesliders_description_array = $_POST['imagesliders_description'];
			  $language_id = $languages[$i]['id'];
			  $lang_data_array = array('imagesliders_url' => xtc_db_prepare_input($imagesliders_url_array[$language_id]),
									   'imagesliders_url_target' => xtc_db_prepare_input($imagesliders_url_target_array[$language_id]),
									   'imagesliders_url_typ' => xtc_db_prepare_input($imagesliders_url_typ_array[$language_id]),
									   'imagesliders_image' => $imagepfad,
									   'imagesliders_title' => xtc_db_prepare_input($imagesliders_title_array[$language_id]),
									   'imagesliders_description' => xtc_db_prepare_input($imagesliders_description_array[$language_id]));
		
			  if ($_GET['action'] == 'insert') {
				$insert_lang_data = array('imagesliders_id' => $imagesliders_id,
										 'languages_id' => $language_id);
				$lang_data_array = xtc_array_merge($lang_data_array, $insert_lang_data);
				xtc_db_perform(TABLE_MITS_IMAGESLIDER_INFO, $lang_data_array);
			  } elseif ($_GET['action'] == 'save') {
				xtc_db_perform(TABLE_MITS_IMAGESLIDER_INFO, $lang_data_array, 'update', "imagesliders_id = '" . xtc_db_input($imagesliders_id) . "' and languages_id = '" . $language_id . "'");
			  }	
		  }
      }	  
      //xtc_redirect(xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $imagesliders_id));
      break;

    case 'deleteconfirm':
      $imagesliders_id = xtc_db_prepare_input($_GET['iID']);
      if ($_POST['delete_image'] == 'on') {        
		  $languages = xtc_get_languages();
		  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
		     $image_location = DIR_FS_CATALOG_IMAGES.xtc_get_imageslider_image($imagesliders_id, $languages[$i]['id']);
			 if (file_exists($image_location)) @unlink($image_location);
		  }
      }
      xtc_db_query("DELETE FROM " . TABLE_MITS_IMAGESLIDER . " WHERE imagesliders_id = '" . xtc_db_input($imagesliders_id) . "'");
      xtc_db_query("DELETE FROM " . TABLE_MITS_IMAGESLIDER_INFO . " WHERE imagesliders_id = '" . xtc_db_input($imagesliders_id) . "'");
      xtc_redirect(xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page']));
      break;
	  
	case 'setflag':
	  $imagesliders_id = xtc_db_prepare_input((int)$_GET['iID']);
	  $imagesliders_status = xtc_db_prepare_input((int)$_GET['flag']);
	  xtc_db_query("UPDATE " . TABLE_MITS_IMAGESLIDER . " SET status = ".xtc_db_input($imagesliders_status)." WHERE imagesliders_id = '" . xtc_db_input($imagesliders_id) . "'");
	  break;
  }
  require_once (DIR_WS_INCLUDES.'head.php');
?>
<script type="text/javascript" src="includes/general.js"></script>
<style type="text/css">
.table{width: 100%; border: 1px solid #a3a3a3; margin-bottom:20px; background: #f3f3f3; padding:2px;}
.heading{font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; padding:2px; }
.last_row{background-color: #ffdead;}
textarea#comments{width:99%;}
td.col-left{font-weight:bold;width:20%;}
</style>
<?php
if (USE_WYSIWYG == 'true') {
	$query = xtc_db_query("SELECT code FROM ".TABLE_LANGUAGES." WHERE languages_id='".(int)$_SESSION['languages_id']."'");
	$data = xtc_db_fetch_array($query);
	// generate editor 
	echo PHP_EOL . (!function_exists('editorJSLink') ? '<script type="text/javascript" src="includes/modules/fckeditor/fckeditor.js"></script>' : '') . PHP_EOL;
	if ($_GET['action'] == 'edit' || $_GET['action'] == 'new') {
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
      echo xtc_wysiwyg('imagesliders_description', $data['code'], $languages[$i]['id']);
	  }
	}
}
?>
</head>
<body>
<!-- header //-->
<?php require_once(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
  <table class="tableBody">
  <tr>
  	  <?php //left_navigation
      if (USE_ADMIN_TOP_MENU == 'false') {
        echo '<td class="columnLeft2">'.PHP_EOL;
        echo '<!-- left_navigation //-->'.PHP_EOL;       
        require_once(DIR_WS_INCLUDES . 'column_left.php');
        echo '<!-- left_navigation eof //-->'.PHP_EOL; 
        echo '</td>'.PHP_EOL;      
      }
      ?>    
<!-- body_text //-->
    <td class="boxCenter" width="100%" valign="top">
		<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png'); ?></div>
        <div class="pageHeading"><?php echo HEADING_TITLE_IMAGESLIDERS; ?></div>       
        <div class="main pdg2 flt-l"><?php echo HEADING_SUBTITLE_IMAGESLIDERS; ?></div>  
      	<table class="tableCenter">
         	<tr>
<?php  
  if (($action != 'new') && ($action != 'edit')) {
?>   
				<td valign="top">
                 <table border="0" width="100%" cellspacing="0" cellpadding="2">		 
                   <tr class="dataTableHeadingRow">
                    <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_IMAGESLIDERS; ?></td>
                    <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_SLIDERGROUP; ?></td>
                    <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_SORTING; ?></td>
                    <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                    <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
                  </tr>
<?php  
  }
  $imagesliders_query_raw = "SELECT * FROM " . TABLE_MITS_IMAGESLIDER . " ORDER BY imagesliders_group, sorting";
  $imagesliders_split = new splitPageResults($_GET['page'], $page_max_display_results, $imagesliders_query_raw, $imagesliders_query_numrows);
  $imagesliders_query = xtc_db_query($imagesliders_query_raw);
  while ($imagesliders = xtc_db_fetch_array($imagesliders_query)) {
    if (((!$_GET['iID']) || (@$_GET['iID'] == $imagesliders['imagesliders_id'])) && (!$iInfo) && (substr($_GET['action'], 0, 3) != 'new')) {
      	$iInfo = new objectInfo($imagesliders);
	  	$iInfo->imagesliders_image = xtc_get_imageslider_image($iInfo->imagesliders_id, $language_id);
    }
    if (($action != 'new') && ($action != 'edit')) {
		if ( (is_object($iInfo)) && ($imagesliders['imagesliders_id'] == $iInfo->imagesliders_id) ) {
			echo '              <tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'hand\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $imagesliders['imagesliders_id'] . '&action=edit') . '\'">' . "\n";
		} else {
			echo '              <tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'hand\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $imagesliders['imagesliders_id']) . '\'">' . "\n";
		}
?>
                    <td class="dataTableContent" align="left"><?php echo $imagesliders['imagesliders_name']; ?></td>
                    <td class="dataTableContent" align="center"><?php echo strtoupper($imagesliders['imagesliders_group']); ?></td>
                    <td class="dataTableContent" align="center"><?php echo $imagesliders['sorting']; ?></td>
                    <td class="dataTableContent" align="center">
    <?php
                if ($imagesliders['status'] == '0') {
                     echo xtc_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'action=setflag&flag=1&iID=' . $imagesliders['imagesliders_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10) . '</a>';
                } else {
                     echo '<a href="' . xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'action=setflag&flag=0&iID=' . $imagesliders['imagesliders_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '</a>&nbsp;&nbsp;' . xtc_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
                }
?>
                    </td>
                    <td class="dataTableContent" align="right"><?php if ( (is_object($iInfo)) && ($imagesliders['imagesliders_id'] == $iInfo->imagesliders_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif'); } else { echo '<a href="' . xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $imagesliders['imagesliders_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
                  </tr>
<?php
    }
  }
if (($action != 'new') && ($action != 'edit')) {
?>
              <tr>
                <td colspan="5">
                    <div class="smallText pdg2 flt-l"><?php echo $imagesliders_split->display_count($imagesliders_query_numrows, $page_max_display_results, (int)$_GET['page'], TEXT_DISPLAY_NUMBER_OF_IMAGESLIDERS); ?></div>
                    <div class="smallText pdg2 flt-r"><?php echo $imagesliders_split->display_links($imagesliders_query_numrows, $page_max_display_results, MAX_DISPLAY_PAGE_LINKS, (int)$_GET['page']); ?></div>
                    <?php echo draw_input_per_page($PHP_SELF,$cfg_max_display_results_key,$page_max_display_results); ?>  
                    <div class="smallText pdg2 flt-r"><?php echo xtc_button_link(BUTTON_INSERT, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . (int)$_GET['page'] . '&action=new')); ?></div>              
                </td>
              </tr>              
            </table>
         </td>
<?php 
}
  $slidergroups_array = array(
	array('id' => 'mits_imageslider', 'text' => 'MITS_IMAGESLIDER'),
  );              

  $slidergroups_query = xtc_db_query("SELECT DISTINCT imagesliders_group FROM " . TABLE_MITS_IMAGESLIDER . " WHERE imagesliders_group != 'mits_imageslider' ORDER BY imagesliders_group");
  while ($slidergroups = xtc_db_fetch_array($slidergroups_query)) {
	$slidergroups_array[] = array('id' => $slidergroups['imagesliders_group'], 'text' => strtoupper($slidergroups['imagesliders_group']));
  }
  $heading = array();
  $contents = array();
  switch ($action) {
    case 'new':
      $heading[]  = array('text' => '<b>' . TEXT_HEADING_NEW_IMAGESLIDER . '</b>');

      $contents   = array('form' => xtc_draw_form('imagesliders', FILENAME_MITS_IMAGESLIDER, 'action=insert', 'post', 'enctype="multipart/form-data"'));
      $contents[] = array('text' => ''.TEXT_NEW_INTRO.'');
      $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig col-left" valign="top">' . TEXT_IMAGESLIDERS_NAME . '</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_input_field('imagesliders_name', '', 'style="width:380px;"').'</td><td class="dataTableConfig col-right"></td></tr>');
      $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top">' . TABLE_HEADING_SORTING . ':</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_input_field('imagesliders_sorting', '', 'style="width:380px;"').'</td><td class="dataTableConfig col-right"></td></tr>');
	  $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top">' . TABLE_HEADING_STATUS . ':</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_selection_field('imagesliders_status', 'radio', '0').MITS_ACTIVE.'&nbsp;&nbsp;&nbsp;'.xtc_draw_selection_field('imagesliders_status', 'radio', '1').MITS_NOTACTIVE.'</td><td class="dataTableConfig col-right"></td></tr>');
	  $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top" rowspan="2">'. TEXT_IMAGESLIDERS_NEW_GROUP.'</td><td class="dataTableConfig col-middle" valign="top">'.xtc_draw_pull_down_menu('imagesliders_group', $slidergroups_array).'</td><td class="dataTableConfig col-right" rowspan="2">'.TEXT_IMAGESLIDERS_NEW_GROUP_NOTE.'</td></tr><tr><td class="dataTableConfig col-middle" valign="top">'. xtc_draw_input_field('new_imagesliders_group','','style="width:380px;"').'</td></tr></table>');

      $languages = xtc_get_languages();
	  
	  $imageslider_image_string = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
	    $imageslider_image_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td class="dataTableConfig">' . xtc_draw_file_field('imagesliders_image'.$i) . xtc_draw_hidden_field('imagesliders_image_exist', 'no') . '</td></tr></table>';
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_IMAGE . '</td></tr></table>' . $imageslider_image_string);
      
	  $imageslider_url_string = '';
	  $url_target_array   = array ();
	  $url_target_array[] = array ('id' => '0', 'text' => NONE_TARGET); 
	  $url_target_array[] = array ('id' => '1', 'text' => TARGET_BLANK); 
	  $url_target_array[] = array ('id' => '2', 'text' => TARGET_TOP); 
	  $url_target_array[] = array ('id' => '3', 'text' => TARGET_SELF); 
	  $url_target_array[] = array ('id' => '4', 'text' => TARGET_PARENT);
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $imageslider_url_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td class="dataTableConfig">' . TEXT_TYP . '<br />'. 
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '0').TYP_EXTERN.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '1').TYP_INTERN.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '2').TYP_PRODUCT.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '3').TYP_CATEGORIE.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '4').TYP_CONTENT.'<br /><br />'.
									TEXT_URL . xtc_draw_input_field('imagesliders_url[' . $languages[$i]['id'] . ']', '', 'style="width:50%;"') . '&nbsp;' . TEXT_TARGET . '&nbsp;' . xtc_draw_pull_down_menu('imagesliders_url_target[' . $languages[$i]['id'] . ']', $url_target_array) . '<br /><br /></td></tr></table>';
	  }      
      $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_URL .'</td></tr></table>' . $imageslider_url_string);
			
	  $imageslider_title_string = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $imageslider_title_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td>' . xtc_draw_input_field('imagesliders_title[' . $languages[$i]['id'] . ']', '', 'style="width:99%;"').'</td></tr></table>';
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="30%" valign="top">' . TEXT_IMAGESLIDERS_TITLE .'</td></tr></table>' .  $imageslider_title_string);

      $imageslider_description_string = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
	     $imageslider_description_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">'. xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td>' . xtc_draw_textarea_field('imagesliders_description[' . $languages[$i]['id'] . ']', 'soft', '100', '25', ((isset($imagesliders['imagesliders_description'])) ? stripslashes($imagesliders['imagesliders_description']) : ''), 'style="width:99%"'). '</td></tr></table>'; 
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_DESCRIPTION .'</td></tr></table>' .  $imageslider_description_string);
      
	  $contents[] = array('align' => 'right', 'text' => '<br />' . xtc_button(BUTTON_SAVE) . '&nbsp;' . xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $_GET['iID'])));
      break;

    case 'edit':
      $heading[]  = array('text' => '<b>' . TEXT_HEADING_EDIT_IMAGESLIDER . '</b>');

      $contents   = array('form' => xtc_draw_form('imagesliders', FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id . '&action=save', 'post', 'enctype="multipart/form-data"'));
      $contents[] = array('text' => TEXT_EDIT_INTRO);
      $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig col-left" valign="top">' . TEXT_IMAGESLIDERS_NAME . '</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_input_field('imagesliders_name', $iInfo->imagesliders_name, ' style="width:380px;"').'</td><td class="dataTableConfig col-right"></td></tr>');
      $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top">' . TABLE_HEADING_SORTING . ':</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_input_field('imagesliders_sorting', $iInfo->sorting, ' style="width:380px;"').'</td><td class="dataTableConfig col-right"></td></tr>');
	  $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top">' . TABLE_HEADING_STATUS . ':</td><td class="dataTableConfig col-middle" valign="top">' . xtc_draw_selection_field('imagesliders_status', 'radio', '0',$iInfo->status==0 ? true : false).MITS_ACTIVE.'&nbsp;&nbsp;&nbsp;'.xtc_draw_selection_field('imagesliders_status', 'radio', '1',$iInfo->status==1 ? true : false).MITS_NOTACTIVE.'</td><td class="dataTableConfig col-right"></td></tr>');
	  $contents[] = array('text' => '<tr><td class="dataTableConfig col-left" valign="top" rowspan="2">'. TEXT_IMAGESLIDERS_NEW_GROUP.'</td><td class="dataTableConfig col-middle" valign="top">'.xtc_draw_pull_down_menu('imagesliders_group', $slidergroups_array, $iInfo->imagesliders_group).'</td><td class="dataTableConfig col-right" rowspan="2">'.TEXT_IMAGESLIDERS_NEW_GROUP_NOTE.'</td></tr><tr><td class="dataTableConfig col-middle" valign="top">'. xtc_draw_input_field('new_imagesliders_group', '', 'style="width:380px;"').'</td></tr></table>');

	  $languages = xtc_get_languages();
      
      $imageslider_image_string = '';
	  $image = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
	    $imageslider_image_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td class="dataTableConfig">' . xtc_draw_file_field('imagesliders_image'.$i) . '<br /><br />'.  xtc_info_image(xtc_get_imageslider_image($iInfo->imagesliders_id, $languages[$i]['id']), $iInfo->imagesliders_name,'','','style="max-width:100%;height:auto;"') . '<br />' . xtc_draw_selection_field('imagesliders_image_delete'. $i, 'checkbox', 'imagesliders_image'. $i) .' '. TEXT_HEADING_DELETE_IMAGESLIDER .'</td></tr></table>';
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_IMAGE . '</td></tr></table>' . $imageslider_image_string . xtc_draw_hidden_field('imagesliders_image_exist', 'yes'));
	
	  $imageslider_url_string = '';
	  $url_target_array   = array ();
	  $url_target_array[] = array ('id' => '0', 'text' => NONE_TARGET); 
	  $url_target_array[] = array ('id' => '1', 'text' => TARGET_BLANK); 
	  $url_target_array[] = array ('id' => '2', 'text' => TARGET_TOP); 
	  $url_target_array[] = array ('id' => '3', 'text' => TARGET_SELF); 
	  $url_target_array[] = array ('id' => '4', 'text' => TARGET_PARENT);
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $imageslider_url_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td class="dataTableConfig">' . TEXT_TYP . '<br />'. 
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '0',xtc_get_imageslider_url_typ($iInfo->imagesliders_id, $languages[$i]['id'])==0 ? true : false).TYP_EXTERN.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '1',xtc_get_imageslider_url_typ($iInfo->imagesliders_id, $languages[$i]['id'])==1 ? true : false).TYP_INTERN.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '2',xtc_get_imageslider_url_typ($iInfo->imagesliders_id, $languages[$i]['id'])==2 ? true : false).TYP_PRODUCT.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '3',xtc_get_imageslider_url_typ($iInfo->imagesliders_id, $languages[$i]['id'])==3 ? true : false).TYP_CATEGORIE.'<br />'.
									xtc_draw_selection_field('imagesliders_url_typ[' . $languages[$i]['id'] . ']', 'radio', '4',xtc_get_imageslider_url_typ($iInfo->imagesliders_id, $languages[$i]['id'])==4 ? true : false).TYP_CONTENT.'<br /><br />'.
									TEXT_URL . xtc_draw_input_field('imagesliders_url[' . $languages[$i]['id'] . ']', xtc_get_imageslider_url($iInfo->imagesliders_id, $languages[$i]['id']), 'style="width:50%;"') . '&nbsp;' . TEXT_TARGET . '&nbsp;' . xtc_draw_pull_down_menu('imagesliders_url_target[' . $languages[$i]['id'] . ']', $url_target_array, xtc_get_imageslider_url_target($iInfo->imagesliders_id, $languages[$i]['id'])) . '<br /><br /></td></tr></table>';
	  }      
      $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_URL .'</td></tr></table>' . $imageslider_url_string);
	
	  $imageslider_title_string = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $imageslider_title_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td>' . xtc_draw_input_field('imagesliders_title[' . $languages[$i]['id'] . ']', xtc_get_imageslider_title($iInfo->imagesliders_id, $languages[$i]['id']), 'style="width:99%;"').'</td></tr></table>';
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_TITLE .'</td></tr></table>' . $imageslider_title_string);

	  $imageslider_description_string = '';
	  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $imageslider_description_string .= '<table width="100%"><tr><td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td>' . xtc_draw_textarea_field('imagesliders_description['.$languages[$i]['id'].']','soft','70','25',(($imagesliders_description[$languages[$i]['id']]) ? stripslashes($imagesliders_description[$languages[$i]['id']]) : xtc_get_imageslider_description($iInfo->imagesliders_id, $languages[$i]['id'])), 'style="width:99%;"').'</td></tr></table>'; 
	  }
	  $contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_DESCRIPTION .'</td></tr></table>' . $imageslider_description_string);
			
      $contents[] = array('align' => 'right', 'text' => '<br />' . xtc_button(BUTTON_SAVE) . '&nbsp;' . xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id)));
      break;

    case 'delete':
      $heading[]  = array('text' => '<b>' . TEXT_HEADING_DELETE_IMAGESLIDER . '</b>');
      $contents   = array('form' => xtc_draw_form('imagesliders', FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO);
      $contents[] = array('text' => '<br /><b>' . $iInfo->imagesliders_name . '</b>');
      $contents[] = array('text' => '<br />' . xtc_draw_checkbox_field('delete_image', '', true) . ' ' . TEXT_DELETE_IMAGE);
	  $contents[] = array('align' => 'left', 'text' => '<br />' . xtc_button(BUTTON_DELETE) . '&nbsp;' . xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id)));
      break;

    default:
      if (is_object($iInfo)) {
        $heading[]  = array('text' => '<b>' . $iInfo->imagesliders_name . '</b>');
        $languages = xtc_get_languages();      
        $imageslider_image_string = '';
	    $image = '';
	  	for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
	    	$imageslider_image_string .= '<td class="dataTableConfig" width="1%" valign="top">' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/admin/images/' . $languages[$i]['image'], $languages[$i]['name']) . '</td><td class="dataTableConfig">'.xtc_info_image(xtc_get_imageslider_image($iInfo->imagesliders_id, $languages[$i]['id']), $iInfo->imagesliders_name,'','','style="max-width:100%;height:auto;max-height:200px;"').'</td>';
	  	}
		$contents[] = array('text' => '<table width="100%"><tr><td class="dataTableConfig" width="100%" valign="top">' . TEXT_IMAGESLIDERS_IMAGE . '</td></tr></table><table width="100%"><tr>' . $imageslider_image_string.'</tr></table>');
	    $contents[] = array('align' => 'left', 'text' => xtc_button_link(BUTTON_EDIT, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id . '&action=edit')) . '&nbsp;' . xtc_button_link(BUTTON_DELETE, xtc_href_link(FILENAME_MITS_IMAGESLIDER, 'page=' . $_GET['page'] . '&iID=' . $iInfo->imagesliders_id . '&action=delete')));
        $contents[] = array('text' => '<br />' . TEXT_DATE_ADDED . ' ' . xtc_date_short($iInfo->date_added));
        if (xtc_not_null($iInfo->last_modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . ' ' . xtc_date_short($iInfo->last_modified));
        $contents[] = array('text' => '<br />' . xtc_get_imageslider_image($iInfo->imagesliders_id, $languages[$i]['id']));
      }
      break;
  }

  if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {	
      echo '           </tr><tr><td valign="top">' . "\n";
      $box = new box;
      echo $box->infoBox($heading, $contents);
      echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require_once(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require_once(DIR_WS_INCLUDES . 'application_bottom.php'); ?>