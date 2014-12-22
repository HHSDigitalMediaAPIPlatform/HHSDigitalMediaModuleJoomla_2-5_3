<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

class modContentSyndHelper
{
  /**
   * Builds the embed code for syndication
   *
   * @param array $params An object containing the module parameters
   * @access public
   */    
  public static function getEmbedCode($params, $id) {
    // $params->get('preview');
    $embed_code = 'function mediaCallback_'.$id.'(response) {';
    $embed_code .= 'if (response && response.results) {';
    $embed_code .= 'jQuery(\'#'.$id.'\').html(response.results.content);';
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
