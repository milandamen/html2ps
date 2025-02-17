<?php
// $Header: /cvsroot/html2ps/css.text-decoration.inc.php,v 1.10 2006/09/07 18:38:14 Konstantin Exp $

/**
 * TODO: correct inheritance
 *
 * This property describes decorations that are added to the text of
 * an element using the element's color. When specified on an inline
 * element, it affects all the  boxes generated by that element; for
 * all  other  elements,  the   decorations  are  propagated  to  an
 * anonymous inline  box that wraps all the  in-flow inline children
 * of the element, and to any block-level in-flow descendants. It is
 * not,  however,  further  propagated  to floating  and  absolutely
 * positioned descendants, nor to the contents of 'inline-table' and
 * 'inline-block' descendants.
 */

class CSSTextDecoration extends CSSPropertyHandler {
  function __construct() {
    parent::__construct(true, true);
  }

  function default_value() { 
    return array("U"=>false, 
                 "O"=>false, 
                 "T"=>false);
  }

  function parse($value) {
    if ($value === 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    $parsed = $this->default_value();
    if (strstr($value,"overline")     !== false) { $parsed['O'] = true; };
    if (strstr($value,"underline")    !== false) { $parsed['U'] = true; };
    if (strstr($value,"line-through") !== false) { $parsed['T'] = true; };
    return $parsed;
  }

  function get_property_code() {
    return CSS_TEXT_DECORATION;
  }

  function get_property_name() {
    return 'text-decoration';
  }
}

CSS::register_css_property(new CSSTextDecoration);

?>
