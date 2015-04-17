<?php
namespace DB_ND3\AR;
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:36 PM
 */

for($i=0;$i<=5;$i++) {
    $thread = new ForumThread($i, 'Name' . $i, 'A' . $i, date('Y-m-d H:i:s'));
//    $thread->name = $i;
//    for($i=0;$i<=5;$i++){
//    $thread->title = 'A';
//    $thread->postDate = date('Y-m-d H:i:s');
    $threads[] = $thread;
}

foreach ($threads as $thread)
{
    echo($thread->getId() . ' ' . $thread->getName(). ' ' . $thread->getTitle() . ' ' .  $thread->getPostDate() . "\n");
}

