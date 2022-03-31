<?php

require_once(HTML2PS_DIR.'value.generic.percentage.php');

class ValueHeight extends CSSValuePercentage {
  static function fromString($value) {
    $valueHeight = new ValueHeight();
    return CSSValuePercentage::_fromString($value, $valueHeight);
  }

  function &copy() {
    $valueHeight = new ValueHeight();
    $value = parent::_copy($valueHeight);
    return $value;
  }
}

?>