<?php

require_once(HTML2PS_DIR.'value.generic.percentage.php');

class ValueLeft extends CSSValuePercentage {
  static function fromString($value) {
    $valueLeft = new ValueLeft();
    return CSSValuePercentage::_fromString($value, $valueLeft);
  }

  function &copy() {
    $valueLeft = new ValueLeft();
    $value = parent::_copy($valueLeft);
    return $value;
  }
}

?>