<?php
namespace core\lib\drivers\log;
use core\lib\config;
/**
 * log文件存储驱动
 */
class file{

    public $logSavePath;

    //初始化日志存储路径
    public function __construct(){
        $config = config::get('OPTIONS','log');
        $this->logSavePath = $config['LOGSAVEPATH'];
    }

    //创建日志存储目录,并写入日志信息
    public function log($logMessage,$logFileName = 'log'){
        if(!is_dir($this->logSavePath.date('YmdH'))){
            mkdir($this->logSavePath.date('YmdH'),'0777',true);
        }
        $logMessage = date('Y-m-d H:i:s').' : '.$logMessage;
        return file_put_contents($this->logSavePath.date('YmdH').'/'.$logFileName.'.php',json_encode($logMessage).PHP_EOL,FILE_APPEND);
    }
}