<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:38 PM
 */

namespace DB_ND3\DDD;

use DB_ND3\RandomGenerator;
use CommentRepository;
use ForumRepository;
use Comment;

include_once('Comment.php');
include_once('../RandomGenerator.php');
include_once('CommentRepository.php');
include_once('ForumRepository.php');

$rand = new RandomGenerator();
$comRep = new CommentRepository("localhost", "root", "", "akademija_nd3");
$forRep = new ForumRepository("localhost", "root", "", "akademija_nd3");

$comment = new Comment();

$comment->setAuthor('Author: '. $rand->generateRandomString(5));
$comment->setComment('Lorem ipsum blah blah blah blah' . $rand->generateRandomString(30));
$comment->setThreadId($forRep->getRandomThreadId());

$comRep->saveComment($comment);
$forRep->updateCommentCount($comment->getThreadId());
