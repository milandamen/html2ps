<?php
// $Header: /cvsroot/html2ps/css.border.top.width.inc.php,v 1.2 2007/02/04 17:08:18 Konstantin Exp $

class CSSBorderTopWidth extends CSSSubProperty {
  function __construct(&$owner) {
    parent::__construct($owner);
  }

  function set_value(&$owner_value, &$value) {
    if ($value != CSS_PROPERTY_INHERIT) {
      $owner_value->top->width = $value->copy();
    } else {
      $owner_value->top->width = $value;
    };
  }

  function get_value(&$owner_value) {
    return $owner_value->top->width;
  }

  function get_property_code() {
    return CSS_BORDER_TOP_WIDTH;
  }

  function get_property_name() {
    return 'border-top-width';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }

    $width_handler = CSS::get_handler(CSS_BORDER_WIDTH);
    $width = $width_handler->parse_value($value);
    return $width;
  }
}

?>