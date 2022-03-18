<?php

//Import classes
require_once('src/classes.inc.php');

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}

switch($action){
    default:
    break;

    case"post":
        //Receive posted data
        $json = file_get_contents('php://input');
        $post = (new Post())->post($json);
    break;
}
?>