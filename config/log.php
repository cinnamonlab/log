<?php

if ( ! defined ('__APP__') ) {
    define('__APP__', __DIR__ . '/..');
}

return array(
    'default' => __APP__ . "/app-" . date('Y-m-d') . ".log"
);