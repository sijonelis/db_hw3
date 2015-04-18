<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:27 PM
 */

namespace DDD;

class ForumThread
{
    private $id;
    private $author;
    private $postDate;
    private $title;
    private $postCount;

    public function __construct($id = null, $author = null, $postDate = null, $title = null, $postCount = 0)
    {
        $this->id = $id;
        $this->author = $author;
        $this->postDate = $postDate;
        $this->title = $title;
        $this->postCount = $postCount;
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
}