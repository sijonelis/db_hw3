<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:36 PM
 */


$repository = new ForumRepository("localhost", "root", "", "akademija_nd3");

$threads = $repository->getAll();

foreach ($threads as $thread)
{
    echo($thread->getId() . ' ' . $thread->getName(). ' ' . $thread->getTitle() . ' ' .  $thread->getPostDate());
    echo "<br/>";
}
