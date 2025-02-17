<?php
// $Header: /cvsroot/html2ps/css.border.collapse.inc.php,v 1.7 2006/07/09 09:07:44 Konstantin Exp $

define('BORDER_COLLAPSE', 1);
define('BORDER_SEPARATE', 2);

class CSSBorderCollapse extends CSSPropertyStringSet {
  function __construct() {
    parent::__construct(true,
                                true,
                                array('inherit'  => CSS_PROPERTY_INHERIT,
                                      'collapse' => BORDER_COLLAPSE,
                                      'separate' => BORDER_SEPARATE)); 
  }

  function default_value() { 
    return BORDER_SEPARATE; 
  }

  function get_property_code() {
    return CSS_BORDER_COLLAPSE;
  }

  function get_property_name() {
    return 'border-collapse';
  }
}

CSS::register_css_property(new CSSBorderCollapse);

?>