<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/17/2015
 * Time: 11:46 AM
 */
namespace DB_ND3\AR;

use DB_ND3\RandomGenerator;

include('ForumThread.php');
include_once('../RandomGenerator.php');

$rand = new RandomGenerator();

$thread = new ForumThread();
$thread->setAuthor('Author: ' . $rand->generateRandomString());
$thread->setTitle('Title: ' . $rand->generateRandomString(5) . ' ' . $rand->generateRandomString());
$thread->setPostDate(date('Y-m-d H:i:s'));
$thread->save();
