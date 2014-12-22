<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');
if (!defined("DS")) {
  define("DS", DIRECTORY_SEPARATOR);
}
require_once(JPATH_SITE . DS . 'modules' . DS . 'mod_content_synd' . DS . 'helper.php');

class JFormFieldJSTree extends JFormFieldHidden 
{

  protected $type = 'JSTree';

  public function getInput() {
    $needsJQuery = modContentSyndHelper::needsJQuery();
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(JURI::root() . 'modules/mod_content_synd/html/css/treestyle.css');
    $doc->addStyleSheet(JURI::root() . 'modules/mod_content_synd/html/css/mod_content_synd.css');
    $doc->addStyleSheet(JURI::root() . 'modules/mod_content_synd/html/css/jquery-ui.css');
    if ($needsJQuery) {
      $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery-1.9.1.js');
      $doc->addScriptDeclaration('jQuery.noConflict();');
    }
    $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jstree.js');
    $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery.maskedinput.js');
    $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/mod_content_synd.js');
    $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery-ui.js');

    $input = '<div id="'.$this->id.'_control"></div>';
    $input = $input . ' ' . parent::getInput();
    return $input;
  }
}
?>
