<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class ListOfPostalCodeType
 * @package App\Type
 */
class ListOfPostalCodeType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'List Of Postal Code',
            'fields' => function() {
                return [
                    'address' => [
                        'type' => Types::string(),
                        'description' => 'Address'
                    ],
                    'city' => [
                        'type' => Types::string(),
                        'description' => 'City'
                    ],
                    'province' => [
                        'type' => Types::string(),
                        'description' => 'Province'
                    ],
                    'postalcode' => [
                        'type' => Types::string(),
                        'description' => 'Postal Code'
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}