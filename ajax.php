<?php
require 'controller.php';
$params = $_POST;
switch ($params['action']){
    case 'search-by-id':
        $data = $dm->edit($params['code']);
        echo json_encode($data);
        die;
        break;
    case 'edit':
        $data = $dm->edit($params['id']);
        $msg = '<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action. </div>';
        $output = array('status' => 'ok', 'message' => $msg);
        echo json_encode($output);
        die;
        break;
    case 'delete':
        $data = $dm->delete($params['code']);
        $msg = '<div class="alert alert-danger"><strong>Danger!</strong> Property Delete. </div>';
         $output = array('status' => 'ok', 'message' => $msg);
        echo json_encode($output);
        die;
        break;
}



