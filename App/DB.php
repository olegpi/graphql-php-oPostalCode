<?php

namespace App;

use PDO;

/**
 * Class Db
 *
 * @package App\Data
 */
class DB
{
    /**
     * @var PDO
     */
    private static $pdo;

    /**
     * @param array $config
     */
    public static function init($config)
    {
        self::$pdo = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config['username'], $config['password']);

        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    /**
     * @param  string  $query
     * @return mixed
     */
    public static function selectOne($query)
    {
        $records = self::select($query);
        return array_shift($records);
    }

    /**
     * @param  string  $query
     * @return array
     */
    public static function select($query)
    {
        $statement = self::$pdo->query($query);
        return $statement->fetchAll();
    }
	
    public static function selectPostalCodes($code)
    {
		if( strlen($code) >= 3 ){
			$tableName = strtolower( substr( $code, 0, 1 ) );
			$postalCode = strtoupper( $code );
			
			$query = "SELECT * from ca_postalcode_".$tableName." WHERE postalcode LIKE '".$postalCode."%'";

			$statement = self::$pdo->query($query);
			return $statement->fetchAll();
			
		}else{
			return json_decode(null, true);
		}
    }	

    /**
     * @param  string  $query
     * @return int
     */
    public static function affectingStatement($query)
    {
        $statement = self::$pdo->query($query);
        return $statement->rowCount();
    }
}