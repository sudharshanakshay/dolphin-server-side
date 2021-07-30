<?php

class DataBaseConf{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public function __construct(){
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'MYSQL_ROOT_PASSWORD'
        $this->databasename = 'dolphin'
    }
}

?>