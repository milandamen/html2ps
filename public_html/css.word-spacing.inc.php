<?php
// $Header: /cvsroot/html2ps/css.word-spacing.inc.php,v 1.2 2006/09/07 18:38:15 Konstantin Exp $

class CSSWordSpacing extends CSSPropertyHandler {
  var $_default_value;

  function __construct() {
    parent::__construct(false, true);

    $this->_default_value = Value::fromString("0");
  }

  function default_value_m() {
    return $this->_default_value;
  }

  function parse($value) {
    $value = trim($value);

    if ($value === 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    if ($value === 'normal') { 
      return $this->_default_value; 
    };

    return Value::fromString($value);
  }

  function get_property_code() {
    return CSS_WORD_SPACING;
  }

  function get_property_name() {
    return 'word-spacing';
  }
}

CSS::register_css_property(new CSSWordSpacing);

?>
