<?php

$data = [
    ["id" => 1, "name" => "thé"],
    ["id" => 2, "name" => "t-shirt"]
];

header('Content-Type: application/json');
echo json_encode($data);
