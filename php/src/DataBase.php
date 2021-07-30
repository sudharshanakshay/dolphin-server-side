<?php

require "databaseConf.php";

class DataBase{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public $conn;
    public $data;
    public $sql;

    public function __construct(){
        $this->conn=null;
        $this->data = null;
        $this->sql = null;

        $dbc = new DataBaseConf();
        $this->servername = $dbc->severname;
        $this->username = $dbc->usename;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;

    }

    function dbconnect(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->conn;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function signUp( $username, $email, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO user_profile(fullname, username, password, email) VALUES ('" . $fullname . "','" . $username . "','" . $password . "','" . $email . "')";
        if (mysqli_query($this->conn, $this->sql)) {
            return true;
        } else return false;
    }
?>