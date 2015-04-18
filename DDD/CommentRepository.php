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

    public function saveComment($comment){

        $query = "INSERT INTO post(post_author, post_comment, post_date, post_thread_id) VALUES ('". $comment->getAuthor()
            . "', '". $comment->getComment(). "', NOW(), " . $comment->getThreadId() . ");";
        $result  = mysql_query($query);
        echo $query;
        if($result == 1) echo "<br/> Comment created successfully";

    }
}