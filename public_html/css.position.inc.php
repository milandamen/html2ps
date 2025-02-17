<?php
// $Header: /cvsroot/html2ps/css.position.inc.php,v 1.12 2006/09/07 18:38:14 Konstantin Exp $

define('POSITION_STATIC',0);
define('POSITION_RELATIVE',1);
define('POSITION_ABSOLUTE',2);
define('POSITION_FIXED',3);

// CSS 3

define('POSITION_FOOTNOTE',4);

class CSSPosition extends CSSPropertyStringSet {
  function __construct() {
    parent::__construct(false,
                                false,
                                array('inherit'  => CSS_PROPERTY_INHERIT,
                                      'absolute' => POSITION_ABSOLUTE,
                                      'relative' => POSITION_RELATIVE,
                                      'fixed'    => POSITION_FIXED,
                                      'static'   => POSITION_STATIC,
                                      'footnote' => POSITION_FOOTNOTE)); 
  }

  function default_value() { 
    return POSITION_STATIC; 
  }

  function get_property_code() {
    return CSS_POSITION;
  }

  function get_property_name() {
    return 'position';
  }
}

CSS::register_css_property(new CSSPosition);

?>