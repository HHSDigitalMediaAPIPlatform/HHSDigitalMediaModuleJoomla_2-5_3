<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');

class JFormFieldContentSyndPreview extends JFormFieldHidden 
{

  protected $type = 'ContentSyndPreview';

  public function getInput() {
    $input = '<div id="'.$this->id.'_div"></div>';
    $input = $input . ' ' . parent::getInput();
    return $input;
  }
}
?>
