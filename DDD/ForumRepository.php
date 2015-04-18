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

    private $threads;

    private $conn;

    public function __construct(){
        $dbWrapper = new DbWrapper();
        $this->conn = $dbWrapper->getConnection();
    }

    public function getAll(){

        for($i=0;$i<=5;$i++) {
            $thread = new ForumThread($i, 'Name' . $i, 'A' . $i, date('Y-m-d H:i:s'));
            $this->threads[] = $thread;
        }

        return $this->threads;
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