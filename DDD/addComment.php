<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:38 PM
 */

    $comment = new Comment();
    $comment->setId(1);
    $comment->setAuthor('Author');
    $comment->setComment('Lorem ipsum blah blah blah');
    $comment->getDate(date('Y-m-d H:i:s'));

    $comRep = new CommentRepository("localhost", "root", "", "akademija_nd3");
    $comRep->saveComment($comment);
