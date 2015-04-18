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

    public function getCommentsByThreadId($threadId){
        $query = "SELECT * FROM post WHERE post_thread_id =" . $threadId . ";";
        $result  = mysql_query($query);
        $arrayKeys = ['id', 'author', 'date', 'comment'];
        $posts = null;
        while ($row = mysql_fetch_array($result)) {
            $post = [$row['post_id'], $row['post_author'], $row['post_date'],
                $row['post_comment']];
            $posts[] = array_combine($arrayKeys, array_values($post));
        }
        return $posts;
    }
}