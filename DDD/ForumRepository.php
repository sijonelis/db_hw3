<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 6:07 PM
 */

use DB_ND3\DbWrapper;

include_once('../DbWrapper.php');

class ForumRepository {
    private $conn;

    public function __construct(){
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
    }

    public function getAll(){

        $query = "SELECT * FROM thread;";
        $result  = mysql_query($query);
        $arrayKeys = ['id', 'author', 'date', 'title', 'commentCount'];
        while ($row = mysql_fetch_array($result)) {
            $thread = [$row['thread_id'], $row['thread_created_by'], $row['thread_date'],
                $row['thread_title'], $row['thread_comment_count']];
            $threads[] = array_combine($arrayKeys, array_values($thread));
        }
        return $threads;
    }

    public function saveThread($thread){

        $query = "INSERT INTO thread(thread_title, thread_created_by, thread_comment_count, thread_date) VALUES ('". $thread->getTitle()
            . "', '". $thread->getAuthor(). "',0, NOW());";
        $result  = mysql_query($query);
        echo $query;
        if($result) echo "<br/> Thread created successfully";
    }

    public function getRandomThreadId(){
        $query = "SELECT thread_id FROM thread;";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $pool[] = $row['thread_id'];
        }
        return $pool[array_rand($pool, 1)];
    }

    public function updateCommentCount($threadId){
        $query = "UPDATE thread SET thread_comment_count = thread_comment_count + 1 where thread_id =" . $threadId . ";";
        $result  = mysql_query($query);
        echo "<br/>" . $query;
        if($result) echo "<br/> Thread comment count updated successfully";
    }
}