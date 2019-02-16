<?php
namespace core\lib;
/**
 * 路由类
 */
class route{

    public $controller;
    public $function;

    //url路由解析
    public function __construct(){
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){ // 路由: /index/index
            $uri = $_SERVER['REQUEST_URI'];
            $uriArray = explode('/',trim($uri,'/'));
            if(isset($uriArray[0])){ //路由解析为控制器
                $this->controller = $uriArray[0];
                unset($uriArray[0]);
            }
            if(isset($uriArray[1])){ //路由解析为操作方法
                $this->function = $uriArray[1];
                unset($uriArray[1]);
            }else{
                $this->function = config::get('function','route');
            }
            $count = count($uriArray)+2; //路由: /index/index/id/1
            $i = 2;
            while($i < $count){
                if(isset($uriArray[$i+1])){
                    $_GET[$uriArray[$i]] = $uriArray[$i+1]; //路由解析为get参数 $_GET['id'] = 1
                }
                $i = $i + 2;
            }
        }else{ // 路由: /
            $this->controller = config::get('controller','route');
            $this->function = config::get('function','route');
        }
    }
}