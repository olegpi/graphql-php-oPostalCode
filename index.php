<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\DB;
use App\Types;
use GraphQL\GraphQL;
use GraphQL\Schema;

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];

    $config = [
        'host' => '',
        'database' => '',
        'username' => '',
        'password' => ''
    ];

    DB::init($config);	

    $schema = new Schema([
        'query' => Types::query()
    ]);

    $result = GraphQL::execute($schema, $query);
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);
