<?php
require_once 'credentials.php';
require_once 'db.class.php';
require_once 'Paginator.php';
global $db;

$db = new DbMysql();
$db->connect($credentials);

