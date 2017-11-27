<?php
require 'controller.php';
$params = $_POST;
switch ($params['action']){
    case 'edit':
        $data = $dm->edit($params['id']);
        $msg = '<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action. </div>';
        $output = array('status' => 'ok', 'message' => $msg);
        echo json_encode($output);
        die;
        break;
}
