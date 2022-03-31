<?php
class ContentType {
  var $default_extension;
  var $mime_type;

  function __construct($extension, $mime) {
    $this->default_extension = $extension;
    $this->mime_type = $mime;
  }

  static function png() {
    return new ContentType('png', 'image/png');
  }

  static function gz() {
    return new ContentType('gz', 'application/gzip');
  }

  static function pdf() {
    return new ContentType('pdf', 'application/pdf');
  }

  static function ps() {
    return new ContentType('ps', 'application/postscript');
  }
}
?>