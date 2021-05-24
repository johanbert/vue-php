<?php
include_once 'crud_class.php';
$_POST = json_decode(file_get_contents("php://input"), true);

if ( isset($_POST) && isset($_POST['request_type']) ){

    if ( $_POST['request_type'] == 'getUser' ){
        $user = new User($_POST);
        $user->readUser();
    }
    if ( $_POST['request_type'] == 'updateUser' ){
        $user = new User($_POST);
        $user->updateUser();
    }
    
}
?>