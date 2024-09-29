<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/User.php';

// instantiate DB and connect
$database = new Database();
$db = $database->connect();

// istantiate users post object
$user = new User($db);

//Get raw posted data\
$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;
$user->name = $data->name;
$user->email = $data->email;
$user->email_verified_at = $data->email_verified_at;
$user->password = $data->password;