<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:17 PM
 */

class Comment {

    private $id;
    private $date;
    private $comment;
    private $author;
    private $threadId;

    public function __construct($id = null, $date = null, $comment = null, $author = null, $threadId = null){
        $this->id = $id;
        $this->date = $date;
        $this->comment = $comment;
        $this->author = $author;
        $this->threadId = $threadId;
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

}