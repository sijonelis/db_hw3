<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:20 PM
 */


use DB_ND3\DbWrapper;

include_once('../DbWrapper.php');

class CommentRepository {

    private $threads;

    private $conn;

    public function __construct(){
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
    }

    public function saveComment(){

       //rasome i db
    }
}