<?php
/**
 * 函数库
 */
//打印函数
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }else if (is_null($var)){
        var_dump(NULL);
    }else{
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;border:1px solid #aaa;background:#F5F5F5;font-size:14px;line-height:20px;opacity:0.7;'>".
                print_r($var,true).
             "</pre>";
    }
}

