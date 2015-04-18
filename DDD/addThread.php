<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/17/2015
 * Time: 11:46 AM
 */
namespace DB_ND3\DDD;

use DB_ND3\RandomGenerator;
use ForumRepository;
use DDD\ForumThread;

include_once ('ForumThread.php');
include_once('../RandomGenerator.php');
include_once('ForumRepository.php');

$rand = new RandomGenerator();
$forRep = new ForumRepository("localhost", "root", "", "akademija_nd3");

$thread = new ForumThread();
$thread->setAuthor('Author: ' . $rand->generateRandomString());
$thread->setTitle('Title: ' . $rand->generateRandomString(5) . ' ' . $rand->generateRandomString());
$thread->setPostDate(date('Y-m-d H:i:s'));
$forRep->saveThread($thread);
