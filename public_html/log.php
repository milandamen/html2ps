<?php

// Global reference to a function.
global $log_error_callback;
$log_error_callback = 'log_error_default';
global $log_warning_callback;
$log_warning_callback = 'log_error_default';
global $log_info_callback;
$log_info_callback = 'log_error_default';

function log_error($message) {
    global $log_error_callback;
    $log_error_callback($message);
}

function log_warning($message) {
    global $log_warning_callback;
    $log_warning_callback($message);
}

function log_info($message) {
    global $log_info_callback;
    $log_info_callback($message);
}

function log_error_default($message) {
    error_log($message);
}