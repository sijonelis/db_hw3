<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:07 PM
 */

class ForumRepository {

    private $threads;

    private $conn;

    public function __construct($servername, $username, $password, $dbname){
        $conn = new mysqli($servername, $username, $password, $dbname);
    }

    public function getAll(){

        for($i=0;$i<=5;$i++) {
            $thread = new ForumThread($i, 'Name' . $i, 'A' . $i, date('Y-m-d H:i:s'));
            $this->threads[] = $thread;
        }

        return $this->threads;
    }
}