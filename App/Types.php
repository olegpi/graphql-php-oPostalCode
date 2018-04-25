<?php

namespace App;

use App\Type\QueryType;
use App\Type\ListOfPostalCodeType;
use GraphQL\Type\Definition\Type;

/**
 * Class Types
 * @package App
 */
class Types
{
    /**
     * @var QueryType
     */
    private static $query;

    /**
     * @var listOfPostalCode
     */
    private static $listOfPostalCode;

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    /**
     * @return ListOfPostalCodeType
     */
    public static function listOfPostalCode()
    {
        return self::$listOfPostalCode ?: (self::$listOfPostalCode = new ListOfPostalCodeType());
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param \GraphQL\Type\Definition\Type $type
     * @return \GraphQL\Type\Definition\ListOfType
     */
    public static function listOf($type)
    {
        return Type::listOf($type);
    }
}