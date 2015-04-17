<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:36 PM
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

/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:27 PM
 */

class ForumThread
{
    private $id;
    private $name;
    private $postDate;
    private $title;

    public function __construct(/*$id, $name, $postDate, $title*/)
    {
//        $this->id = $id;
//        $this->name = $name;
//        $this->postDate = $postDate;
//        $this->title = $title;
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


$repository = new ForumRepository("localhost", "root", "", "akademija_nd3");

$threads = $repository->getAll();

foreach ($threads as $thread)
{
    echo($thread->getId() . ' ' . $thread->getName(). ' ' . $thread->getTitle() . ' ' .  $thread->getPostDate());
    echo "<br/>";
}
