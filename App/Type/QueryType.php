<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'list' => [
                        'type' => Types::listOf(Types::listOfPostalCode()),
                        'description' => 'Select Postal Codes',
                        'args' => [
                            'code' => Types::string()							
                        ],
                        'resolve' => function ($root, $args) {
                            return DB::selectPostalCodes($args['code']);
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}