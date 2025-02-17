<?php
// $Header: /cvsroot/html2ps/css.left.inc.php,v 1.9 2006/11/11 13:43:52 Konstantin Exp $

require_once(HTML2PS_DIR.'value.left.php');

class CSSLeft extends CSSPropertyHandler {
  function __construct() {
    parent::__construct(false, false);
    $this->_autoValue = ValueLeft::fromString('auto');
  }

  function _getAutoValue() {
    return $this->_autoValue->copy();
  }

  function default_value_m() {
    return $this->_getAutoValue();
  }

  function parse($value) { 
    return ValueLeft::fromString($value);
  }

  function get_property_code() {
    return CSS_LEFT;
  }

  function get_property_name() {
    return 'left';
  }
}

CSS::register_css_property(new CSSLeft);

?>