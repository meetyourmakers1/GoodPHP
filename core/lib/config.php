<?php
namespace core\lib;
/**
 * 配置
 */
class config{

    public static $config = array();

    //配置文件中某一项配置
    public static function get($name,$file){
        if(isset(self::$config[$file])){
            return self::$config[$file][$name];
        }else{
            $configFile = GOODPHP.'/core/config/'.$file.'.php';
            if(is_file($configFile)){
                $config = include $configFile;
                if(isset($config[$name])){
                    self::$config[$file] = $config;
                    return $config[$name];
                }else{
                    throw new \Exception('找不到'.$name.'配置项');
                }
            }else{
                throw new \Exception('找不到'.$file.'配置文件');
            }
        }
    }

    //配置文件中所有的配置
    public static function getAll($file){
        if(isset(self::$config[$file])){
            return self::$config[$file];
        }else{
            $configFile = GOODPHP.'/core/config/'.$file.'.php';
            if(is_file($configFile)){
                $config = include $configFile;
                self::$config[$file] = $config;
                return $config;
            }else{
                throw new \Exception('找不到'.$file.'配置文件');
            }
        }
    }
}