<?php
/**
 * 入口文件
 * 1.定义系统常量
 * 2.加载函数库
 * 3.启动框架
 */
define('GOODPHP',realpath('./')); //框架根目录
define('CORE',GOODPHP.'/core'); //框架核心文件目录
define('APP',GOODPHP.'/app'); //项目文件目录
define('MODULE','app'); //项目模块

define('DEBUG',true); //是否开启调试模式

include 'vendor/autoload.php';

if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include CORE.'/common/function.php'; //加载函数库
include CORE.'/goodphp.php'; //加载核心文件

spl_autoload_register('\core\goodphp::load'); //自动加载

\core\goodphp::run(); //启动框架