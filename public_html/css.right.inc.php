<?php
// $Header: /cvsroot/html2ps/css.right.inc.php,v 1.6 2006/11/11 13:43:52 Konstantin Exp $

require_once(HTML2PS_DIR.'value.right.php');

class CSSRight extends CSSPropertyHandler {
  function __construct() {
    parent::__construct(false, false);
    $this->_autoValue = ValueRight::fromString('auto');
  }

  function _getAutoValue() {
    return $this->_autoValue->copy();
  }

  function default_value_m() {
    return $this->_getAutoValue();
  }

  function parse($value) { 
    return ValueRight::fromString($value);
  }

  function get_property_code() {
    return CSS_RIGHT;
  }

  function get_property_name() {
    return 'right';
  }
}

CSS::register_css_property(new CSSRight);

?>