<?php
class MapperEmpresas extends Application
{
	protected $_dbTable;

	public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function delete($cnpj)
    {
        $sql = "DELETE FROM location_usuarios WHERE empresa=?;
                DELETE FROM location_faturas WHERE empresa=?;
                DELETE FROM location_clientes WHERE cnpj=?;
                ";
        $stmt = sqlsrv_query( $this->db, $sql, array(&$cnpj, &$cnpj, &$cnpj));

        if( $stmt === false )
            return false;
        return true;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Empresas');
        }
        return $this->_dbTable;
    }

    public function update($Emp, $cnpj, $usuario)
    {
        $sql = "UPDATE location_clientes SET 
                    razao = ?,
                    endereco = ?,
                    numero = ?,
                    bairro = ?,
                    cidade = ?,
                    estado = ?,
                    cep = ?,
                    telefone = ?,
                    email = ?,
                    responsavel = ?,
                    complemento = ?
                    FROM 
                    location_clientes as lc
                    JOIN location_usuarios as lu 
                    ON lc.cnpj = lu.empresa
                    WHERE lc.cnpj=? AND lu.usuario=?";

        $razao = $Emp->razao;
        $endereco = $Emp->endereco;
        $complemento = $Emp->complemento;
        $numero = $Emp->numero;
        $bairro = $Emp->bairro;
        $cidade = $Emp->cidade;
        $estado = $Emp->estado;
        $cep = $Emp->cep;
        $telefone = $Emp->telefone;
        $email = $Emp->email;
        $responsavel = $Emp->responsavel;

        $params = array(
                        &$razao,
                        &$endereco,
                        &$numero,
                        &$bairro,
                        &$cidade,
                        &$estado,
                        &$cep,
                        &$telefone,
                        &$email,
                        &$responsavel,
                        &$complemento,
                        &$cnpj,
                        &$usuario
                    );
        
        if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
            return false;

        if ( !$query = sqlsrv_execute( $stmt ) )
            return false;

        return true;
    }


    public function select($usuario)
    {
        $sql = "SELECT lc.* FROM location_clientes as lc JOIN [location_usuarios] as lu ON lc.cnpj = lu.empresa WHERE lu.usuario=? AND tipo='G' OR  tipo='S'";

        if (!$stmt = sqlsrv_prepare($this->db, $sql, array(&$usuario)) )
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        $row = sqlsrv_fetch_object($stmt);

        if($row != NULL)
        {
            $Empresa = new Empresas();
            $Empresa->setCnpj($row->cnpj)
                  ->setEndereco($row->endereco)
                  ->setNumero($row->numero)
                  ->setBairro($row->bairro)
                  ->setCidade($row->cidade)
                  ->setEstado($row->estado)
                  ->setCep($row->cep)
                  ->setRazao($row->razao)
                  ->setTelefone($row->telefone)
                  ->setEmail($row->email)
                  ->setResponsavel($row->responsavel)
                  ->setPreco_consulta($row->preco_consulta)
                  ->setComplemento($row->complemento);


            return $Empresa;
        }
        else
            return array();
    }

    public function find($where, &$param)
    {
		$sql = "SELECT * FROM location_clientes {$where} ORDER BY razao ASC";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array($param)) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

        $entries   = array();
        while ( $row = sqlsrv_fetch_object($stmt) ) {
            $entry = new Empresas();

            	$entry->setCnpj($row->cnpj)
				      ->setEndereco($row->endereco)
				      ->setNumero($row->numero)
				      ->setBairro($row->bairro)
				      ->setCidade($row->cidade)
				      ->setEstado($row->estado)
				      ->setCep($row->cep)
				      ->setRazao($row->razao)
				      ->setTelefone($row->telefone)
				      ->setEmail($row->email)
				      ->setResponsavel($row->responsavel)
				      ->setPreco_consulta($row->preco_consulta)
                      ->setComplemento($row->complemento);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function save(Empresas $Emp, $cnpj = null)
    {
 
        if (null == $cnpj) {
            $sql = "INSERT INTO location_clientes VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        } else {
           // $this->getDbTable()->update($data, array('id = ?' => $id));
        }
        $cnpj           = $Emp->cnpj;
        $endereco       = $Emp->endereco;
        $numero         = $Emp->numero;
        $bairro         = $Emp->bairro;
        $cidade         = $Emp->cidade;
        $estado         = $Emp->estado;
        $cep            = $Emp->cep;
        $razao          = $Emp->razao;
        $telefone       = $Emp->telefone;
        $email          = $Emp->email;
        $responsavel    = $Emp->responsavel;
        $preco_consulta = $Emp->preco_consulta;
        $complemento    = $Emp->complemento;

        $params = array(
                        &$cnpj,
                        &$endereco,
                        &$numero,
                        &$bairro,
                        &$cidade,
                        &$estado,
                        &$cep,
                        &$razao,
                        &$telefone,
                        &$email,
                        &$responsavel,
                        &$preco_consulta,
                        &$complemento
                        );

        if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
            throw new Exception("Statement could not be prepared.", 1);

        if ( !$query = sqlsrv_execute( $stmt ) )
            throw new Exception("Statement could not be prepared", 1);

        return true;

    }

    public function fetchAll()
    {
		$sql = "SELECT * FROM location_clientes ORDER BY razao ASC";

		if (!$stmt = sqlsrv_prepare($this->db, $sql, array()) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

        $entries   = array();
        while ( $row = sqlsrv_fetch_object($stmt) ) {
            $entry = new Empresas();

            	$entry->setCnpj($row->cnpj)
				      ->setEndereco($row->endereco)
				      ->setNumero($row->numero)
				      ->setBairro($row->bairro)
				      ->setCidade($row->cidade)
				      ->setEstado($row->estado)
				      ->setCep($row->cep)
				      ->setRazao($row->razao)
				      ->setTelefone($row->telefone)
				      ->setEmail($row->email)
				      ->setResponsavel($row->responsavel)
				      ->setPreco_consulta($row->preco_consulta)
                      ->setComplemento($row->complemento);

            $entries[] = $entry;
        }
        return $entries;
    }

}