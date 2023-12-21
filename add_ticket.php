<?php

require_once __DIR__ . '/private/db_gestion/DB.php';

$data = json_decode(file_get_contents('php://input'));
if(isset($data->quantity) && isset($data->price) && isset($data->userID)){
    echo DB::getInstance()->addTicketToAccount((int)$data->quantity, (float)$data->price, $data->userID);
}
