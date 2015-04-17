<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:20 PM
 */

use DbWrapper;
class CommentRepository {

    private $threads;

    private $conn;

    public function __construct(){
        $conn = new mysqli();
    }

    public function saveComment(){

       //rasome i db
    }
}