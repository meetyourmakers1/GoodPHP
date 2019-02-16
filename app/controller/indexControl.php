<?php
namespace app\controller;
use core\goodphp;
use core\lib\model;

class indexControl extends goodphp{

    public function index(){

        p('index function');

        $model = new model();
        $sql = 'select * from test';
        $result = $model->query($sql);
        p($result->fetchAll());

        \core\lib\log::log('logMessage');
    }


}
