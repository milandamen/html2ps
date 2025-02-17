<?php

require_once(HTML2PS_DIR.'value.generic.php');

class PaddingSideValue {
  var $value;
  var $auto;
  var $percentage;
  var $_units;

  function calcPercentage($base) {
    if (is_null($this->percentage)) { 
      return; 
    };

    $this->value = $base * $this->percentage / 100;
  }

  function &copy() {
    $value = new PaddingSideValue;
    $value->value      = $this->value;
    $value->auto       = $this->auto;
    $value->percentage = $this->percentage;
    $value->_units     = $this->_units;
    return $value;
  }

  function get_value() {
    return $this->value;
  }

  function is_default() {
    return 
      $this->value == 0 &&
      !$this->auto &&
      !$this->percentage;
  }

  static function init($data) {
    $len = strlen($data);
    $is_percentage = false;
    if ($len > 0) {
      $is_percentage = ($data[$len-1] === '%');
    };

    $value = new PaddingSideValue;
    $value->_units     = Value::fromString($data);
    $value->value      = $data;
    $value->percentage = $is_percentage ? (int)($data) : null;
    $value->auto       = $data === 'auto';
    return $value;
  }

  function units2pt($base) {
    if (is_null($this->percentage)) {
      $this->value = $this->_units->toPt($base);
    };
  }
}

class PaddingValue extends CSSValue {
  var $top;
  var $bottom;
  var $left;
  var $right;

  function doInherit(&$state) {
    if ($this->top === CSS_PROPERTY_INHERIT) {
      $value = $state->getInheritedProperty(CSS_PADDING_TOP);
      $this->top = $value->copy();
    };

    if ($this->bottom === CSS_PROPERTY_INHERIT) {
      $value = $state->getInheritedProperty(CSS_PADDING_BOTTOM);
      $this->bottom = $value->copy();
    };

    if ($this->right === CSS_PROPERTY_INHERIT) {
      $value = $state->getInheritedProperty(CSS_PADDING_RIGHT);
      $this->right = $value->copy();
    };

    if ($this->left === CSS_PROPERTY_INHERIT) {
      $value = $state->getInheritedProperty(CSS_PADDING_LEFT);
      $this->left = $value->copy();
    };
  }

  function &copy() {
    $value = new PaddingValue;
    $value->top    = ($this->top    === CSS_PROPERTY_INHERIT) ? CSS_PROPERTY_INHERIT : $this->top->copy();
    $value->bottom = ($this->bottom === CSS_PROPERTY_INHERIT) ? CSS_PROPERTY_INHERIT : $this->bottom->copy();
    $value->left   = ($this->left   === CSS_PROPERTY_INHERIT) ? CSS_PROPERTY_INHERIT : $this->left->copy();
    $value->right  = ($this->right  === CSS_PROPERTY_INHERIT) ? CSS_PROPERTY_INHERIT : $this->right->copy();
    return $value;
  }

  function is_default() {
    return 
      $this->left->is_default() &&
      $this->right->is_default() &&
      $this->top->is_default() &&
      $this->bottom->is_default();
  }

  static function init($data) {
    $value = new PaddingValue;
    $value->top    = PaddingSideValue::init($data[0]);
    $value->right  = PaddingSideValue::init($data[1]);
    $value->bottom = PaddingSideValue::init($data[2]);
    $value->left   = PaddingSideValue::init($data[3]);
    return $value;
  }

  function units2pt($base) {
    $this->top->units2pt($base);
    $this->bottom->units2pt($base);
    $this->left->units2pt($base);
    $this->right->units2pt($base);
  }

  function calcPercentages($base) {
    $this->top->calcPercentage($base);
    $this->bottom->calcPercentage($base);
    $this->left->calcPercentage($base);
    $this->right->calcPercentage($base);
  }
}

?>