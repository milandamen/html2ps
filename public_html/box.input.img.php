<?php

class ButtonBrokenImageBox extends BrokenImgBox {
  var $_field_name;
  var $_field_value;
  var $_action_url;

  function __construct($width, $height, $alt, $field, $value, $action_url) {
    parent::__construct($width, $height, $alt);

    $this->_field_name  = $field;
    $this->_field_value = $value;
    $this->set_action_url($action_url);
  }

  function readCSS(&$state) {
    parent::readCSS($state);

    $this->_readCSS($state,
                    array(CSS_HTML2PS_FORM_ACTION));
  }

  function set_action_url($action_url) {
    $this->_action_url = $action_url;
  }

  function show(&$driver) {
    $status = parent::show($driver);

    global $g_config;
    if ($g_config['renderforms']) {
      $driver->field_pushbuttonimage($this->get_left_padding(), 
                                     $this->get_top_padding(),
                                     $this->get_width()  + $this->get_padding_left() + $this->get_padding_right(),
                                     $this->get_height() + $this->get_padding_top()  + $this->get_padding_bottom(),
                                     $this->_field_name,
                                     $this->_field_value,
                                     $this->_action_url);
    };

    return $status;
  }
}

class ButtonImageBox extends ImgBox {
  var $_field_name;
  var $_field_value;
  var $_action_url;

  function __construct($img, $field, $value, $action_url) {
    parent::__construct($img);

    $this->_field_name  = $field;
    $this->_field_value = $value;
    $this->set_action_url($action_url);
  }

  function readCSS(&$state) {
    parent::readCSS($state);

    $this->_readCSS($state,
                    array(CSS_HTML2PS_FORM_ACTION));
  }

  function set_action_url($action_url) {
    $this->_action_url = $action_url;
  }

  function show(&$driver) {
    $status = parent::show($driver);

    global $g_config;
    if ($g_config['renderforms']) {
      $driver->field_pushbuttonimage($this->get_left_padding(), 
                                     $this->get_top_padding(),
                                     $this->get_width()  + $this->get_padding_left() + $this->get_padding_right(),
                                     $this->get_height() + $this->get_padding_top()  + $this->get_padding_bottom(),
                                     $this->_field_name,
                                     $this->_field_value,
                                     $this->_action_url);
    };

    return $status;
  }

  static function create(&$root, &$pipeline) {
    $name  = $root->get_attribute('name');
    $value = $root->get_attribute('value');

    $url_autofix = new AutofixUrl();
    $src = $url_autofix->apply(trim($root->get_attribute("src")));

    $src_img = ImageFactory::get($pipeline->guess_url($src), $pipeline);
    if (is_null($src_img)) {
      log_error(sprintf("Cannot open image at '%s'", $src));

      if ($root->has_attribute('width')) {
        $width = px2pt($root->get_attribute('width'));
      } else {
        $width = px2pt(BROKEN_IMAGE_DEFAULT_SIZE_PX);
      };

      if ($root->has_attribute('height')) {
        $height = px2pt($root->get_attribute('height'));
      } else {
        $height = px2pt(BROKEN_IMAGE_DEFAULT_SIZE_PX);
      };

      $alt = $root->get_attribute('alt');
      
      $css_state = $pipeline->get_current_css_state();
      $box = new ButtonBrokenImagebox($width, $height, $alt, $name, $value,
                                       $css_state->get_property(CSS_HTML2PS_FORM_ACTION));
      $box->readCSS($css_state);
      return $box;
    };

    $css_state = $pipeline->get_current_css_state();
    $box = new ButtonImageBox($src_img, $name, $value,
                               $css_state->get_property(CSS_HTML2PS_FORM_ACTION));
    $box->readCSS($css_state);
    $box->_setupSize();
    
    return $box;
  }    
}

?>