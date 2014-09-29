<?php

class Application
{
	protected $smarty = NULL;
	protected $db     = NULL;
	protected $SQLite = NULL;

	public function __construct() {
		$this->smarty = Init::$smarty;
		$this->db     = PdoConexao::getInstance();
		$this->SQLite     = PdoConexao::getSQLite();	
	}

	public function CheckLogado()
	{
		if(Session::read('LOGIN') == null)
			return false;
		return true;
	}

	public function query($sql, $params)
	{
		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

		return $stmt;
	}

	public function ChecarPermisao($usuario, $tp) {
		$sql = "SELECT tipo FROM location_usuarios WHERE  usuario=?";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array(&$usuario)))
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        $row = sqlsrv_fetch_object($stmt);

        if($row->tipo == $tp)
        	return true;

        return false;
	}
}