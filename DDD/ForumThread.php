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
    private $name;
    private $postDate;
    private $title;

    public function __construct($id, $name, $postDate, $title)
    {
        $this->id = $id;
        $this->name = $name;
        $this->postDate = $postDate;
        $this->title = $title;
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