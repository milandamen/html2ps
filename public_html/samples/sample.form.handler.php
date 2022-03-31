<?php

ob_start();
var_dump($_POST);
log_error(ob_get_contents());
ob_end_clean();

?>