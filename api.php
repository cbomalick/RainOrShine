<?php

//Display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Import classes
require_once('src/classes.inc.php');

// Echo"<pre>";
// var_dump($json);
// Echo"</pre><br><br>";

$action = strtolower($_GET['action']);

switch($action){
    default:
    Echo"Default";
    break;

    //Send data to requester
    case"get":
        $data = array(
            'id' => '1234',
            'name' => 'John Smith'
        );

        Echo json_encode($data);
    break;

    //Receive data from requester
    case"post":
        //Receive posted data
        $json = file_get_contents('php://input');
        $post = (new Post())->post($json);
    break;
}
?>