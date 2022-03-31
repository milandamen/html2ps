<?php

class CSSWidows extends CSSPropertyHandler {
  function __construct() {
    parent::__construct(true, false);
  }

  static function default_value() { return 2; }

  function parse($value) {
    return (int)$value;
  }

  function get_property_code() {
    return CSS_WIDOWS;
  }

  function get_property_name() {
    return 'widows';
  }
}

CSS::register_css_property(new CSSWidows);

?>