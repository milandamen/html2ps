<?php
// $Header: /cvsroot/html2ps/css.text-indent.inc.php,v 1.13 2006/11/11 13:43:52 Konstantin Exp $

require_once(HTML2PS_DIR.'value.text-indent.class.php');

class CSSTextIndent extends CSSPropertyHandler {
  function __construct() {
    parent::__construct(true, true);
  }

  function default_value() { 
    return new TextIndentValuePDF(array(0,false)); 
  }

  function parse($value) {
    if ($value === 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    if (is_percentage($value)) { 
      return new TextIndentValuePDF(array((int)$value, true));
    } else {
      return new TextIndentValuePDF(array($value, false));
    };
  }

  function get_property_code() {
    return CSS_TEXT_INDENT;
  }

  function get_property_name() {
    return 'text-indent';
  }
}

CSS::register_css_property(new CSSTextIndent());

?>
