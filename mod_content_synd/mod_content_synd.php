<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if (!defined("DS")) {
  define("DS", DIRECTORY_SEPARATOR);
}

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$uniqueid = uniqid('mod_content_synd_'.$module->id, false);
$embed_code = modContentSyndHelper::getEmbedCode($params, $uniqueid);
$empty_div = modContentSyndHelper::getEmptyDiv($params, $uniqueid);
$needsJQuery = modContentSyndHelper::needsJQuery();
$doc = JFactory::getDocument();
if ($needsJQuery) {
  $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery-1.9.1.js');
  $doc->addScriptDeclaration('jQuery.noConflict();');
}
$doc->addScriptDeclaration($embed_code);
require( JModuleHelper::getLayoutPath( 'mod_content_synd' ) );
?>
