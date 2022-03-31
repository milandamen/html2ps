<?php

class CSSFontStyle extends CSSSubFieldProperty {
  static function default_value() {
    return FS_NORMAL;
  }

  static function parse($value) {
    $value = trim(strtolower($value));
    switch ($value) {
    case 'inherit':
      return CSS_PROPERTY_INHERIT;
    case 'normal':
      return FS_NORMAL;
    case 'italic':
      return FS_ITALIC;
    case 'oblique':
      return FS_OBLIQUE;
    };
  }

  function get_property_code() {
    return CSS_FONT_STYLE;
  }

  function get_property_name() {
    return 'font-style';
  }

}

?>