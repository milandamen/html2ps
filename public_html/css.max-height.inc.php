<?php
// $Header: /cvsroot/html2ps/css.max-height.inc.php,v 1.3 2006/11/11 13:43:52 Konstantin Exp $

require_once(HTML2PS_DIR.'value.max-height.php');

class CSSMaxHeight extends CSSPropertyHandler {
  var $_defaultValue;

  function __construct() {
    parent::__construct(true, false);
    $this->_defaultValue = ValueMaxHeight::fromString("auto");
  }

  /**
   * 'height' CSS property should be inherited by table cells from table rows
   * (as, obviously, )
   */
  function inherit($old_state, &$new_state) { 
    $parent_display = $old_state[CSS_DISPLAY];
    if ($parent_display === "table-row") {
      $new_state[CSS_MAX_HEIGHT] = $old_state[CSS_MAX_HEIGHT];
      return;
    }

    $new_state[CSS_MAX_HEIGHT] = 
      is_inline_element($parent_display) ? 
      $this->get($old_state) : 
      $this->default_value_m();
  }

  function _getAutoValue() {
    return $this->default_value_m();
  }

  function default_value_m() {
    return $this->_defaultValue->copy();
  }

  function parse($value) { 
    if ($value == 'none') { 
      return ValueMaxHeight::fromString('auto');
    };
    return ValueMaxHeight::fromString($value);
  }

  function get_property_code() {
    return CSS_MAX_HEIGHT;
  }

  function get_property_name() {
    return 'max-height';
  }
}
 
CSS::register_css_property(new CSSMaxHeight);

?>