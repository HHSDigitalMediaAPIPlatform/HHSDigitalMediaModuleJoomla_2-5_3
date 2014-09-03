<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

class modContentSyndHelper
{
  /**
   * Retrieves the hello message
   *
   * @param array $params An object containing the module parameters
   * @access public
   */    
  public static function getEmbedCode($params, $id) {
    // $params->get('preview');
    $embed_code = 'function mediaCallback_'.$id.'(response) {';
    $embed_code .= 'if (response && response.results) {';
    $embed_code .= 'jQuery(\'#'.$id.'\').html(response.results.content);';
    if ($params->get('cdccs_hidetitle') == true) {
      $embed_code .= 'jQuery("span[id=\'cdc_title_' . $params->get('cdccs_titleval') . '\']").hide();';
    }
    if ($params->get('cdccs_hidedescription') == true) {
      $embed_code .= 'jQuery("p[id=\'cdc_description_' . $params->get('cdccs_titleval') . '\']").hide();';
    }
    $embed_code .= '}';
    $embed_code .= '}';
    $embed_code .= 'jQuery(document).ready(function() {';
    $embed_code .= 'jQuery.ajaxSetup({cache:false});';
    $embed_code .= 'jQuery.ajax({';
    $embed_code .= 'url: "'.$params->get('cdccs_preview', '').'",';
    $embed_code .= 'dataType: "jsonp",';
    $embed_code .= 'success: mediaCallback_'.$id.',';
    $embed_code .= 'error: function(xhr, ajaxOptions, thrownError) {}';
    $embed_code .= '});';
    $embed_code .= '});';
    return $embed_code;
  }

  public static function getEmptyDiv($params, $id) {
    $embed_div = '<div id="';
    $embed_div .= $id;
    $embed_div .= '"></div>';
    return $embed_div;
  }

  public static function needsJQuery() {
    $jversion = new JVersion();
    if (preg_match("#^3#", $jversion->getShortVersion())) {
      return False;
    }
    else {
      return True;
    }
  }
  /* public static function needsJQuery() { */
  /*     return False; */
  /* } */
}
?>
