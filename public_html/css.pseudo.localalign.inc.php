<?php
// $Header: /cvsroot/html2ps/css.pseudo.localalign.inc.php,v 1.4 2006/09/07 18:38:14 Konstantin Exp $

define('LA_LEFT',0);
define('LA_CENTER',1);
define('LA_RIGHT',2);

class CSSLocalAlign extends CSSPropertyHandler {
  function __construct() { parent::__construct(false, false); }

  function default_value() { return LA_LEFT; }

  function parse($value) { return $value; }

  function get_property_code() {
    return CSS_HTML2PS_LOCALALIGN;
  }

  function get_property_name() {
    return '-html2ps-localalign';
  }
}

CSS::register_css_property(new CSSLocalAlign);

?>