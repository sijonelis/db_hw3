<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/16/2015
 * Time: 5:38 PM
 */
namespace DB_ND3\AR;

use DB_ND3\RandomGenerator;

include('Comment.php');
include_once('../RandomGenerator.php');

$rand = new RandomGenerator();

$comment = new Comment();

$comment->setAuthor('Author: '. $rand->generateRandomString(5));
$comment->setComment('Lorem ipsum blah blah blah blah' . $rand->generateRandomString(30));
$comment->setThreadId($comment->getRandomThreadId());

$comment->save();
