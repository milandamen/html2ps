<?php

class CSSPseudoLinkTarget extends CSSPropertyHandler {
  function __construct() { parent::__construct(true, true); }

  function default_value() { return ""; }

  static function is_external_link($value) {
    return (strlen($value) > 0 && $value[0] != "#");
  }

  static function is_local_link($value) {
    return (strlen($value) > 0 && $value[0] == "#");
  }

  function parse($value, &$pipeline) { 
    // Keep local links (starting with sharp sign) as-is
    if (CSSPseudoLinkTarget::is_local_link($value)) { return $value; }

    $data = @parse_url($value);
    if (!isset($data['scheme']) || $data['scheme'] == "" || $data['scheme'] == "http") {
      return $pipeline->guess_url($value);
    } else {
      return $value;
    };
  }

  function get_property_code() {
    return CSS_HTML2PS_LINK_TARGET;
  }

  function get_property_name() {
    return '-html2ps-link-target';
  }
}

CSS::register_css_property(new CSSPseudoLinkTarget);

?>