<?php
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: * ");

// session_start();

// validasi input

// var_dump($_POST);
// die;

$response = array(
    'status' => 200,
    'message' => 'diterima',
    'data' => $_POST["token"]
);

header('Content-Type: application/json');
echo json_encode($response);
