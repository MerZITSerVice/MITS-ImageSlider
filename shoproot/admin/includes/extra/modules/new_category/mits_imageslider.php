<?php
/**
 * --------------------------------------------------------------
 * File: mits_imageslider.php
 * Date: 16.07.2020
 * Time: 17:06
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_IMAGESLIDER_STATUS') && MODULE_MITS_IMAGESLIDER_STATUS == 'true') {
  $slidergroups_array = array(
    array('id' => '', 'text' => '---'),
  );

  $slidergroups_query = xtc_db_query("SELECT DISTINCT imagesliders_group FROM " . TABLE_MITS_IMAGESLIDER . " ORDER BY imagesliders_group");
  while ($slidergroups = xtc_db_fetch_array($slidergroups_query)) {
    $slidergroups_array[] = array('id' => $slidergroups['imagesliders_group'], 'text' => strtoupper($slidergroups['imagesliders_group']));
  }
?>
<table class="tableInput border0">
  <tr>
    <td valign="top" style="width:260px;"><span class="main"><?php echo TEXT_IMAGESLIDERS_GROUP; ?></span></td>
    <td valign="top"><span class="main"><?php echo xtc_draw_pull_down_menu('imagesliders_group', $slidergroups_array, ((isset($cInfo->imagesliders_group)) ? $cInfo->imagesliders_group : '')); ?></span></td>
  </tr>
</table>
<?php
}