<?php
require 'controller.php';
$params = $_POST;
switch ($params['action']){
    case 'search-by-id':
        $data = $dm->search_by_id($params['code']);
        echo json_encode($data);
        die;
        break;
    case 'add':
        $msg = $dm->add();
        $output = array('status' => 'ok', 'message' => $msg);
        echo json_encode($output);
        die;
        break;
    case 'edit':
        $msg = $dm->edit();
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



