<?php

class PdoConexao
{
	private static $db;
	private static $SQLite;

	public static function getInstance()
	{
        if (static::$db === null)
        {
            static::$db = self::connect(config('conn'));
        }
        return static::$db;
    }

    public static function getSQLite()
	{
        if (static::$SQLite === null)
        {
            static::$SQLite = self::openSQLite(config('SQLite'));
        }
        return static::$SQLite;
    }

    public function openSQLite($configs)
    {
    	if(empty($configs))
			throw new Exception('Invalid parameter for making connection');

    	$SQLite = new PDO('sqlite:'. $configs['db']);
    	if(!$SQLite)
			throw new Exception('Unable to open to the database');

		return $SQLite;
    }

	public function connect($configs)
	{
		if(empty($configs))
			throw new Exception('Invalid parameter for making connection');

		$conn = sqlsrv_connect(
								$configs['host'], 
								array(
							 		"Database" => $configs['dbname'],
							 		"UID" => $configs['username'],
							 		"PWD" => $configs['password']
						 		)
						 	);
		if(!$conn)
			throw new Exception('Unable to connect to the database');

		return $conn;
	}
}