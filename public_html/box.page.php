<?php

class BoxPage extends GenericContainerBox {
  function BoxPageMargin() {
    parent::__construct();
  }

  static function create(&$pipeline, $rules) {
    $box = new BoxPage();

    $state = $pipeline->get_current_css_state();
    $state->pushDefaultState();
    $rules->apply($state);
    $box->readCSS($state);
    $state->popState();

    return $box;
  }

  function get_bottom_background() { 
    return $this->get_bottom_margin(); 
  }

  function get_left_background()   { 
    return $this->get_left_margin();   
  }

  function get_right_background()  { 
    return $this->get_right_margin();  
  }

  function get_top_background()    { 
    return $this->get_top_margin();    
  }

  function reflowByMedia(&$media) {
    $this->put_left(mm2pt($media->margins['left']));
    $this->put_top(mm2pt($media->height() - $media->margins['top']));
    $this->put_width(mm2pt($media->real_width()));
    $this->put_height(mm2pt($media->real_height()));
  }

  function show(&$driver) {    
    $this->offset(0, $driver->offset);
    parent::show($driver);
  }
}

?>