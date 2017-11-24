<?php
require_once 'lib/init.php';
require_once 'lib/dm.class.php';

$dm = new Dm($db);
$action = $_REQUEST['action'];
$code = (int)$_REQUEST['id'];
