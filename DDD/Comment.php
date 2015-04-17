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

    public function __construct($id = null, $date = null, $comment = null, $author = null){
        $this->id = $id;
        $this->date = $date;
        $this->postDate = $comment;
        $this->title = $author;
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

}