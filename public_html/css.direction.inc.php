<?php
// $Header: /cvsroot/html2ps/css.direction.inc.php,v 1.7 2006/07/09 09:07:44 Konstantin Exp $

define('DIRECTION_LTR', 1);
define('DIRECTION_RTF', 1);

class CSSDirection extends CSSPropertyStringSet {
  function __construct() {
    parent::__construct(true,
                                true,
                                array('lrt' => DIRECTION_LTR,
                                      'rtl' => DIRECTION_RTF)); 
  }

  function default_value() { 
    return DIRECTION_LTR; 
  }

  function get_property_code() {
    return CSS_DIRECTION;
  }

  function get_property_name() {
    return 'direction';
  }
}

CSS::register_css_property(new CSSDirection);

?>