<?php
// $Header: /cvsroot/html2ps/css.min-width.inc.php,v 1.1 2006/09/07 18:38:14 Konstantin Exp $

class CSSMinWidth extends CSSSubFieldProperty {
  function __construct(&$owner, $field) {
    parent::__construct($owner, $field);
  }

  function get_property_code() {
    return CSS_MIN_WIDTH;
  }

  function get_property_name() {
    return 'min-width';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }
    
    return Value::fromString($value);
  }
}

?>