<?php
require_once 'db.class.php';
require_once 'Paginator.php';
global $db;

$db = new DbMysql();

$credentials = array(
    'hostname' => 'localhost',
    'database' => 'chicago',
    'username' => 'root',
    'password' =>  ''
);
$db->connect($credentials);

