<?php 

    header('Content-Type: application/json');

    $input = file_get_contents('php://input');
    $data = json_decode($input);

    $paginationType = $data->paginationType;

    echo json_encode($_SESSION['page']);
?>
