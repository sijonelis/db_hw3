<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/17/2015
 * Time: 11:38 AM
 */
namespace DB_ND3;

class DbWrapper {
    private $conn;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "akademija_nd3"){
        $this->conn = mysql_connect($servername, $username, $password);
        $selected = mysql_select_db($dbname, $this->conn);
    }

    public function getConnection(){
        return $this->conn;
    }

}