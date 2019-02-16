<?php
namespace core\lib;
/**
 * 日志类
 */
class log{

    public static $driverClass;

    //初始化日志存储驱动
    public static function init(){
        $driver = config::get('DRIVER','log'); //日志存储驱动配置
        $driverClass = '\core\lib\drivers\log\\'.$driver; //日志存储驱动类
        self::$driverClass = new $driverClass;
    }

    //启动日志存储驱动
    public static function log($logMessage,$logFileName = 'log'){
        self::$driverClass->log($logMessage,$logFileName);
    }
}