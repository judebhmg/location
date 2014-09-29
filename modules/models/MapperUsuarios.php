<?php
class MapperUsuarios extends Application
{

	public function atvUsuario($usuario, $cnpj, $ativo)
	{
		$sql = "UPDATE location_usuarios SET ativo=? WHERE usuario=? AND empresa=? AND tipo<>'A'";
        $stmt = sqlsrv_query( $this->db, $sql, array(&$ativo, &$usuario, &$cnpj));

        if( $stmt === false )
            return false;
        return true;
	}



	public function getDados() {
		$user = Session::read('LOGIN');
		$sql = "SELECT lu.email,
						lu.nome,
						lc.razao
							FROM location_usuarios as lu JOIN location_clientes as lc ON lu.empresa = lc.cnpj WHERE lu.usuario=?";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array(&$user)))
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);
        
        return sqlsrv_fetch_object($stmt);
	}

	public function delete($usuario)
	{
		$sql = "DELETE FROM location_usuarios WHERE usuario=?";
        $stmt = sqlsrv_query( $this->db, $sql, array(&$usuario));

        if( $stmt === false )
            return false;
        return true;
	}

	public function alterarSenha($senha, $usuario, $cnpj = NULL)
	{
		if($cnpj != NULL)
		{
			$sql = "UPDATE location_usuarios SET senha=? WHERE usuario=? AND empresa=?";
			$params  = array(&$senha, &$usuario, &$cnpj);
		}
		else
		{
			$sql = "UPDATE location_usuarios SET senha=? WHERE usuario=?";
			$params  = array(&$senha, &$usuario);
		}
		
		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params))
            return false;

        if ( !$query = sqlsrv_execute( $stmt ) )
            return false;

        return true;
	}

	public function update($option, Usuarios $Us, $cnpj = NULL)
	{
		switch($option) {
			case 0:
				$sql     = "UPDATE location_usuarios SET nome=?, email=?, limite=? WHERE usuario=? AND empresa=?";
				$nome    = $Us->nome;
				$email   = $Us->email;
				$usuario = $Us->usuario;
				$limite  = $Us->limite;
				$params  = array(&$nome, &$email, &$limite,  &$usuario, &$cnpj);
			break;
			case 1:
				$sql     = "UPDATE location_usuarios SET nome=?, email=?, limite=?, tipo=?, ativo=? WHERE usuario=?";
				$nome    = $Us->nome;
				$email   = $Us->email;
				$usuario = $Us->usuario;
				$limite  = $Us->limite;
				$tipo    = $Us->tipo;
				$ativo   = $Us->ativo;
				$params  = array(&$nome, &$email, &$limite, &$tipo, &$ativo,  &$usuario);
			break;
		}

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params))
            return false;

        if ( !$query = sqlsrv_execute( $stmt ) )
            return false;

        return true;
	}

	public function permissao($usuario, $cnpj) {
		$Permissao = $this->select($usuario, $cnpj);
		return $Permissao->tipo;
	}

	public function select($usuario, $cnpj = NULL)
	{
		if($cnpj == NULL)
		{
			$sql    = "SELECT usuario, nome, email, limite, tipo, ativo FROM location_usuarios WHERE  usuario=?";
			$params = array(&$usuario);
		}
		else
		{
			$sql    = "SELECT usuario, nome, email, limite, tipo, ativo FROM location_usuarios WHERE  usuario=? AND empresa=?";
			$params = array(&$usuario, &$cnpj);
		}
		
		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params))
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        return sqlsrv_fetch_object($stmt);
	}

	public function getCNPJ($usuario)
	{
		$sql = "SELECT empresa FROM location_usuarios WHERE usuario=? AND (tipo='S' OR  tipo='G')";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array(&$usuario)) )
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        $row = sqlsrv_fetch_object($stmt);


        return $row->empresa;
	}
	public function save(Usuarios $users, $usuario = NULL) 
	{
		if($usuario == NULL)
		{
			$usuario = $users->usuario;
			$senha   = $users->senha;
			$email   = $users->email;
			$nome    = $users->nome;
			$empresa = $users->empresa;
			$limite  = (int)$users->limite;
			$tipo    = $users->tipo;

			$params = array(
							&$usuario,
							&$senha,
							&$email,
							&$nome,
							&$empresa,
							&$limite,
							&$tipo
						);

			$sql = "INSERT INTO location_usuarios VALUES (?, ?, ?, ?, ?, ?, ?, 0, 0)";
		}

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        return true;

	}

	public function find($where, &$param)
    {
		$sql = "SELECT lu.*, lc.razao as razao FROM location_usuarios as lu JOIN location_clientes as lc ON lu.empresa = lc.cnpj {$where} ORDER BY nome ASC";
		
		if (!$stmt = sqlsrv_prepare($this->db, $sql, array($param)) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

        $entries   = array();
        while ( $row = sqlsrv_fetch_object($stmt) ) {
            $entry = new Usuarios();
			$entry->setUsuario($row->usuario)
				  ->setSenha($row->senha)
				  ->setEmail($row->email)
				  ->setNome($row->nome)
				  ->setEmpresa($row->empresa)
				  ->setRazao($row->razao)
				  ->setLimite($row->limite)
				  ->setTipo($row->tipo);
            $entries[] = $entry;
        }
        return $entries;
    }

	public function fetchAll()
    {
		$sql = "SELECT lu.*, lc.razao as razao FROM location_usuarios as lu JOIN location_clientes as lc ON lu.empresa = lc.cnpj ORDER BY nome ASC";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array()) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

        $entries   = array();
        while ( $row = sqlsrv_fetch_object($stmt) ) {
            $entry = new Usuarios();
			$entry->setUsuario($row->usuario)
				  ->setSenha($row->senha)
				  ->setEmail($row->email)
				  ->setNome($row->nome)
				  ->setEmpresa($row->empresa)
				  ->setRazao($row->razao)
				  ->setLimite($row->limite)
				  ->setTipo($row->tipo);
            $entries[] = $entry;
        }
        return $entries;
    }
}