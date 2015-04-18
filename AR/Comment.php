<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:17 PM
 */
namespace DB_ND3\AR;

use DB_ND3\DbWrapper;

include_once('../DbWrapper.php');
include_once('ForumThread.php');

class Comment {

    private $id;
    private $date;
    private $comment;
    private $author;
    private $conn;
    private $threadId;
//    private $thread;

    public function __construct($id = null, $date = null, $comment = null, $author = null, $threadId = null){
        $this->id = $id;
        $this->date = $date;
        $this->comment = $comment;
        $this->author = $author;
        $this->threadId = $threadId;
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();

    }

    public function save(){

        $query = "INSERT INTO post(post_author, post_comment, post_date, post_thread_id) VALUES ('". $this->getAuthor()
            . "', '". $this->getComment(). "', NOW(), " . $this->getThreadId() . ");";
        $result  = mysql_query($query);
        echo $query;
        echo "<br/>";

        $thread = $this->getThread();
        $thread->setPostCount($thread->getPostCount()+1);
        $thread->save();
        if($result == 1) echo "<br/> Comment created successfully";
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setComment($comment){
        $this->comment = $comment;
    }

    public function getComment(){
        return $this->comment;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setThreadId($threadID){
        $this->threadId = $threadID;
    }

    public function getThreadId(){
        return $this->threadId;
    }

    public function getThread(){
        $query = "SELECT * FROM thread WHERE thread_id = " . $this->threadId . ";";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        return new ForumThread($row['thread_id'], $row['thread_created_by'], $row['thread_date'],
                $row['thread_title'], $row['thread_comment_count']);
    }


    public function getRandomThreadId(){
        $query = "SELECT thread_id FROM thread;";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $pool[] = $row['thread_id'];
        }
        if(!isset($pool)){
            echo 'Norint paskelbti pranešimą reikia sukurit bent 1 giją';
            exit;
        }
        return $pool[array_rand($pool, 1)];
    }



}