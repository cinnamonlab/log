<?php

namespace Framework\Log;

use Framework\Config;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private $logger;
    function __construct( $app = 'default' ) {
        $this->logger = new Logger( $app );
        $logging_path = Config::get('log.' . $app);

        if ( Config::get('app.debug', false) == true ) $mode = Logger::DEBUG;
        else $mode = Logger::ERROR;
        $this->logger->pushHandler(new StreamHandler($logging_path, $mode));
    }

    function error($message) {
        if ( isset($this) ) return $this->logger->error($message);
        return self::getInstance()->logger->error($message);
    }
    function info($message) {
        if ( isset($this) ) return $this->logger->info($message);
        return self::getInstance()->logger->info($message);
    }
    function warning($message) {
        if ( isset($this) ) return $this->logger->warning($message);
        return self::getInstance()->logger->warning($message);
    }
    function notice($message) {
        if ( isset($this) ) return $this->logger->notice($message);
        return self::getInstance()->logger->notice($message);
    }

    function critical($message) {
        if ( isset($this) ) return $this->logger->critical($message);
        return self::getInstance()->logger->critical($message);
    }
    function alert($message) {
        if ( isset($this) ) return $this->logger->alert($message);
        return self::getInstance()->logger->alert($message);
    }
    function emerg($message) {
        if ( isset($this) ) return $this->logger->emerg($message);
        return self::getInstance()->logger->emerg($message);
    }
    function debug($message) {
        if ( isset($this) ) return $this->logger->debug($message);
        return self::getInstance()->logger->debug($message);
    }

    private static $me;
    static function getInstance() {
        if ( self::$me == null ) self::$me = new Log();
        return self::$me;
    }
}