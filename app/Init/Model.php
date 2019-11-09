<?php

namespace Quantox\Init;

use \PDO;
use \PDOException;

class Model {
    private $instance = NULL;
    protected $db_name = '';
    protected $connection;

    protected function __construct($db_name = DB_NAME)
    {
        $this->db = $db_name;
        $this->connection = $this->connect();
    }

    public function connect()
    {
        if (!$this->instance) {
            try{
                $this->instance = new PDO("mysql:host=".DB_HOST.";dbname=$this->db_name;charset=utf8",DB_USERNAME,DB_PASSWORD);
                //$res = $this->instance->prepare("INSERT INTO custom_cms.users (email, password) VALUES (:email, :password)");
                //$res->execute([':email'=>'deki', ':password'=>'123']);
                //die(var_dump($res));
            }catch (PDOException $e) {
                die('Connection faild... '.$e->getMessage());
            }
        }
        return $this->instance;
    }
}
