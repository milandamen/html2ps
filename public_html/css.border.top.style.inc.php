<?php
// $Header: /cvsroot/html2ps/css.border.top.style.inc.php,v 1.1 2006/09/07 18:38:13 Konstantin Exp $

class CSSBorderTopStyle extends CSSSubProperty {
  function __construct(&$owner) {
    parent::__construct($owner);
  }

  function set_value(&$owner_value, &$value) {
    $owner_value->top->style = $value;
  }

  function get_value(&$owner_value) {
    return $owner_value->top->style;
  }

  function get_property_code() {
    return CSS_BORDER_TOP_STYLE;
  }

  function get_property_name() {
    return 'border-top-style';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }

    return CSSBorderStyle::parse_style($value);
  }
}

?>