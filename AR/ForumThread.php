<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:27 PM
 */
namespace DB_ND3\AR;
use DB_ND3\DbWrapper;

include_once('../DbWrapper.php');

class ForumThread
{
    private $id;
    private $author;
    private $postDate;
    private $title;
    private $comments;
    private $conn;

    public function __construct($id = null, $name = null, $postDate = null, $title = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->postDate = $postDate;
        $this->title = $title;
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
    }


    public function loadAll(){

    }

    public function save(){
        $query = "INSERT INTO thread(thread_title, thread_created_by, thread_comment_count, thread_date) VALUES ('". $this->getTitle()
            . "', '". $this->getAuthor(). "',0, NOW());";
        $result  = mysql_query($query);
        echo $query;
        if($result == 1) echo "<br/> Thread created successfully";
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }

    public function getPostDate()
    {
        return $this->postDate;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getComments(){
        $query = "SELECT * FROM post WHERE post_thread_id = " . $this->getId() . ";";
        $this->comments  = mysql_query($query);
        return $this->comments;
    }
}