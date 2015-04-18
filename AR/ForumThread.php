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
include_once('Comment.php');
include_once('PostList.php');
class ForumThread
{
    private $id;
    private $author;
    private $postDate;
    private $title;
    private $postCount;
    private $comments;
    private $conn;
    public function __construct($id = null, $author = null, $postDate = null, $title = null, $postCount = 0)
    {
        $this->id = $id;
        $this->author = $author;
        $this->postDate = $postDate;
        $this->title = $title;
        $this->postCount = $postCount;
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
    }
    public function loadAll(){
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
        $query = "SELECT * FROM thread;";
        $result  = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $thread = new ForumThread($row['thread_id'], $row['thread_created_by'], $row['thread_date'],
                $row['thread_title'], $row['thread_comment_count']);
            $thread->setComments();
            $threads[] = $thread;
        }
        return $threads;
    }
    public function save(){
        $query = "SELECT thread_id FROM thread where thread_id = " . $this->id . ";";
        $result  = mysql_query($query);
        if($result)
            $query = "UPDATE thread SET thread_comment_count = " . $this->postCount. " where thread_id =" . $this->id . ";";
        else
            $query = "INSERT INTO thread(thread_title, thread_created_by, thread_comment_count, thread_date) VALUES ('". $this->getTitle()
                . "', '". $this->getAuthor(). "',0, NOW());";
        $result  = mysql_query($query);
        echo $query;
        if($result) echo "<br/> Thread created/updated successfully";
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
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
    public function setPostCount($postCount){
        $this->postCount = $postCount;
    }
    public function getPostCount(){
        return $this->postCount;
    }
    public function setComments(){
        $query = "SELECT * FROM post WHERE post_thread_id = " . $this->id . ";";
        $result  = mysql_query($query);
        $this->comments = null;
        $comments = null;
        while ($row = mysql_fetch_array($result)) {
            $comment = new Comment($row['post_id'], $row['post_date'], $row['post_comment'], $row['post_author'],
                $row['post_thread_id']);
            $comments[] = $comment;
        }
        $pl = new PostList();
        $pl->setPosts($comments);
        $this->comments = $pl;
    }
    public function getComments(){
        return $this->comments;
    }
}
