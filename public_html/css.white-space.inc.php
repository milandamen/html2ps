<?php
// $Header: /cvsroot/html2ps/css.white-space.inc.php,v 1.9 2007/01/24 18:55:52 Konstantin Exp $

define('WHITESPACE_NORMAL',   0);
define('WHITESPACE_PRE',      1);
define('WHITESPACE_NOWRAP',   2);
define('WHITESPACE_PRE_WRAP', 3);
define('WHITESPACE_PRE_LINE', 4);

class CSSWhiteSpace extends CSSPropertyStringSet {
  function __construct() {
    parent::__construct(true,
                                true,
                                array('normal'   => WHITESPACE_NORMAL,
                                      'pre'      => WHITESPACE_PRE,
                                      'pre-wrap' => WHITESPACE_PRE_WRAP,
                                      'nowrap'   => WHITESPACE_NOWRAP,
                                      'pre-line' => WHITESPACE_PRE_LINE)); 
  }

  function default_value() { 
    return WHITESPACE_NORMAL; 
  }

  function get_property_code() {
    return CSS_WHITE_SPACE;
  }

  function get_property_name() {
    return 'white-space';
  }
}

CSS::register_css_property(new CSSWhiteSpace);
  
?>