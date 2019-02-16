<?php
namespace core\lib;
/**
 * 模型类
 */
class model extends \PDO {

    //数据库连接
    public function __construct()
    {
        $dataConfig = config::getAll('data');
        try{
            parent::__construct($dataConfig['DSN'], $dataConfig['USERNAME'], $dataConfig['PASSWD']);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}