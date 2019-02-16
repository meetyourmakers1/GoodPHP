<?php
namespace core;
use function GuzzleHttp\Promise\is_settled;
/**
 * 核心文件
 */
class goodphp{

    public $assign; //控制器渲染视图的变量

    //自动加载控制器方法
    public static function run(){
        \core\lib\log::init(); //日志存储驱动
        $route = new \core\lib\route();
        $controller = $route->controller;
        $function = $route->function;
        $controllerFile = MODULE.'/controller/'.$controller.'Control.php'; //控制器文件
        $controllClass = '\\'.MODULE.'\\controller\\'.$controller.'Control'; //控制器名
        if(is_file($controllerFile)){
            include $controllerFile;
            $control = new $controllClass; //实例化控制器
            $control->$function(); //调用控制器方法
        }else{
            throw new \Exception('找不到'.$controller.'控制器');
        }
    }

    //自动加载路由
    public static function load($class){ //$class = 'core\route';
        include GOODPHP.'/'.str_replace('\\','/',$class).'.php'; //引入路由类
    }

    //渲染页面
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    //显示视图
    public function display($viewsFile){
        $viewsFile = MODULE.'/views/'.$viewsFile;
        if(is_file($viewsFile)){
            extract($this->assign);
            include $viewsFile;
        }
    }
}