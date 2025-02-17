<?php
// $Header: /cvsroot/html2ps/css.visibility.inc.php,v 1.6 2007/04/07 11:16:34 Konstantin Exp $

define('VISIBILITY_VISIBLE',0);
define('VISIBILITY_HIDDEN',1);
define('VISIBILITY_COLLAPSE',2); // TODO: currently treated is hidden

class CSSVisibility extends CSSPropertyStringSet {
  function __construct() {
    parent::__construct(false,
                                false,
                                array('inherit'  => CSS_PROPERTY_INHERIT,
                                      'visible'  => VISIBILITY_VISIBLE,
                                      'hidden'   => VISIBILITY_HIDDEN,
                                      'collapse' => VISIBILITY_COLLAPSE)); 
  }

  function default_value() { 
    return VISIBILITY_VISIBLE; 
  }

  function get_property_code() {
    return CSS_VISIBILITY;
  }

  function get_property_name() {
    return 'visibility';
  }
}

CSS::register_css_property(new CSSVisibility);

?>