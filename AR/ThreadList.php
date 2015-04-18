<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:40 PM
 */
namespace DB_ND3\AR;

include_once ('ForumThread.php');

use Iterator;

class ThreadList implements Iterator {

    private $threads;

    private $currentElement;

    public function __construct(){
        $this->currentElement = 0;
    }

    public function loadAll(){
//        $ft = new ForumThread();
        $this->threads = ForumThread::loadAll();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->threads[$this->currentElement];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->currentElement++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        if($this->threads == null)
            return false;
        else
        return array_key_exists($this->currentElement, $this->threads);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}