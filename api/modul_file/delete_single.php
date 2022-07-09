<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    http_response_code(405);
    $response = [
        "error" => true,
        "message" => "'GET' method not allowed"
    ];
    goto output;
}

if (!validate_input()) {
    http_response_code(400);
    $response = [
        "error" => true,
        "message" => "Input tidak valid"
    ];
    goto output;
}

$id = $_POST["id"];
require_once "../../model/ModulFile.php";
$modul_file = new ModulFile();

//cek file id exist
try {
    $row = $modul_file->readSingleFile($id);
    if (!$row) {
        http_response_code(404);
        $response = [
            "error" => true,
            "message" => "File ID tidak tersedia"
        ];
        goto output;
    }
} catch (PDOException $e) {
    http_response_code(500);
    $response = [
        "error" => true,
        "message" => "Gagal validasi file id"
    ];
    goto output;
}

// hapus row
try {
    $delete_id = $modul_file->deleteFileData($id);
} catch (PDOException $e) {
    http_response_code(500);
    $response = [
        "error" => true,
        "message" => "Gagal menghapus data file"
    ];
    goto output;
}

if ($delete_id) {
    $response = [
        "error" => false,
        "message" => "Berhasil hapus data file",
        "deletedId" => $delete_id
    ];
} else {
    http_response_code(500);
    $response = [
        "error" => true,
        "message" => "Gagal hapus data file"
    ];
}

output: {
    echo json_encode($response);
}

function validate_input()
{
    return isset($_POST["id"]) && is_numeric($_POST["id"]);
}
