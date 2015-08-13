<?php

if ( ! defined ('__APP__') ) {
    define('__APP__', __DIR__ . '/..');
}

if ( ! function_exists('get_launch_mode') ) {
    function get_launch_mode() {
        if ( isset($_SERVER['REMOTE_ADDR'])) return 'web';
        return 'cmd';
    }
}

return array(
    'default' => __APP__ . "/storage/logs/" . get_launch_mode() . "-" . date('Y-m-d') . ".log"
);

