<?php

function safe_exec($cmd, &$output) {
  exec($cmd, $output, $result);

  if ($result) {
    $message = "";

    if (count($output) > 0) {
      $message .= "Error executing '{$cmd}'<br/>\n";
      log_error("Error executing '{$cmd}'.");
      $message .= "Command produced the following output:<br/>\n";
      log_error("Command produced the following output:");

      foreach ($output as $line) {
        $message .= "{$line}<br/>\n";
        log_error($line);
      };
    } else {
      $_cmd = $cmd;
      include(HTML2PS_DIR.'templates/error_exec.tpl');
      log_error("Error executing '{$cmd}'. Command produced no output.");
      die("HTML2PS Error");
    };
    die($message);
  };
}

class OutputFilterPS2PDF extends OutputFilter {
  var $pdf_version;

  function content_type() {
    return ContentType::pdf();
  }

  function _mk_cmd($filename) {
    return GS_PATH." -dNOPAUSE -dBATCH -dEmbedAllFonts=true -dCompatibilityLevel=".$this->pdf_version." -sDEVICE=pdfwrite -sOutputFile=".$filename.".pdf ".$filename;
  }

  function __construct($pdf_version) {
    $this->pdf_version = $pdf_version;
  }

  function process($tmp_filename) {
    $pdf_file = $tmp_filename.'.pdf';
    safe_exec($this->_mk_cmd($tmp_filename), $output);
    unlink($tmp_filename);
    return $pdf_file;
  }
}
?>