<?php
class MapperFaturas extends Application
{

	// SELECT SUM(lc.preco_consulta) as total, lc.razao, lc.cnpj FROM location_clientes as lc JOIN location_usuarios as lu ON lc.cnpj = lu.empresa JOIN location_log as ll ON lu.usuario = ll.usuario WHERE ll.data BETWEEN '2014-09-01' AND '2014-09-02 23:59' GROUP BY lc.razao, lc.razao, lc.cnpj
	
	public function ultimasConsultas($cnpj, $args = NULL)
	{
		$Whare = " WHERE lc.cnpj=?";
		$params[] = $cnpj;
		if(count($args) > 0)
		{
			$Whare  .= " AND ll.data BETWEEN ? AND ?";
			$params[] = $args[0];
			$params[] = $args[1];
		}
		$sql    = "SELECT top 20 ll.id, ll.usuario, ll.data, ll.cpf_pesquisado, ll.retorno FROM [location_log] as ll JOIN  location_usuarios as lu ON ll.usuario = lu.usuario JOIN location_clientes AS lc ON lu.empresa = lc.cnpj {$Whare} ORDER BY ll.id DESC";

		$stmt = sqlsrv_query( $this->db, $sql, $params);

		if( $stmt === false )
			die( print_r( sqlsrv_errors(), true));

		while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
			$return[] = $row;

		return $return;

	}

	public function delete($id)
	{
		$sql = "DELETE FROM location_faturas WHERE id=?";
		$stmt = sqlsrv_query( $this->db, $sql, array(&$id));

		if( $stmt === false )
			return false;
		return true;
	}

	public function fetchConsultas($id)
	{
		$sql = "SELECT periodo_inicial as inicial, periodo_final as final, empresa FROM location_faturas WHERE id=?";

		$stmt = sqlsrv_query( $this->db, $sql, array($id));

		if( $stmt === false )
			die( print_r( sqlsrv_errors(), true));
		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

		$sql = "SELECT ll.*, lc.preco_consulta FROM [location_log] as ll JOIN location_usuarios as lu ON ll.usuario = lu.usuario JOIN location_clientes as lc ON lu.empresa = lc.cnpj WHERE lc.cnpj=? AND ll.data BETWEEN ? AND ?";

		$stmt = sqlsrv_query( $this->db, $sql, array($row['empresa'], $row['inicial']->format('Y-m-d'), $row['final']->format('Y-m-d')));

		if( $stmt === false )
			die( print_r( sqlsrv_errors(), true));

		while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
			$return[] = $row;

		return $return;

	}
	public function find($inicio, $final, $empresa, $order, $status, $cnpj = NULL) {
		$sql     = "SELECT lf.*, lc.razao FROM location_faturas as lf JOIN location_clientes as lc ON lf.empresa = lc.cnpj";
		$sql     .= " WHERE status=? ";

		$dump[] = $inicio;
		$dump[] = $final;
		$dump[] = $empresa;

		$params[] = &$status;
		if(!empty($empresa))
		{
			$params[] = &$empresa;
			$sql .= "AND lc.razao = ?";
		}
			
		if($inicio != "" && $final != "")
			$sql .= " AND ";

		if($inicio != "" && $final != "")
		{
			$inicio = date('Y-m-d', strtotime(str_replace("/", "-", $inicio)));
			$final = date('Y-m-d 23:59:59', strtotime(str_replace("/", "-", $final)));
			$params[] = &$inicio;
			$params[] = &$final; 
			$sql .= "periodo_inicial >= ? AND periodo_final <= ?";
		}
		if($cnpj != NULL)
		{
			$sql .= " AND lc.cnpj = ? ";
			$params[] = &$cnpj;
		}

		switch($order) {
			case 0:
				$sql .= " ORDER BY valor_total ASC";
			break;
			case 1:
				$sql .= " ORDER BY valor_total DESC";
			break;
			default: break;
		}

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
		throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 2);

	       $entries   = array();
	       while ( $row = sqlsrv_fetch_object($stmt) ) {
	           $entry = new Faturas();
			$entry->setId($row->id);
			$entry->setPeriodo_inicial($row->periodo_inicial);
			$entry->setPeriodo_final($row->periodo_final);
			$entry->setValor_total($row->valor_total);
			$entry->setStatus($row->status);
			$entry->setEmpresa($row->empresa);
			$entry->setRazao($row->razao);
	           $entries[] = $entry;
	       }
	       return $entries;
	}
	public function CheckFaturas($final)
	{
		$sql = "SELECT * FROM location_faturas WHERE location_faturas.periodo_final >= ?";

		$params = array(&$final);
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$stmt = sqlsrv_query( $this->db, $sql , $params, $options );

		$row_count = sqlsrv_num_rows( $stmt );

		if($row_count > 0)
			return false;
		
		return true;
	}

	public function deletarFatura($id)
	{
		$sql = "DELETE FROM location_faturas WHERE id=?";
		$stmt = sqlsrv_query( $this->db, $sql, array($id));

		if( $stmt === false )
			return false;
		return true;
	}

	public function fecharFatura($id)
	{
		$sql = "UPDATE location_faturas SET status='F' WHERE id=?";
		$stmt = sqlsrv_query( $this->db, $sql, array($id));

		if( $stmt === false )
			return false;
		return true;
	}

	public function gerarFatura($inicio, $final)
	{
		$sql= "SELECT SUM(lc.preco_consulta) as total, lc.razao, lc.cnpj FROM location_clientes as lc JOIN location_usuarios as lu ON lc.cnpj = lu.empresa JOIN location_log as ll ON lu.usuario = ll.usuario WHERE retorno=1 AND ll.data BETWEEN ? AND ? GROUP BY lc.razao, lc.razao, lc.cnpj";
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

		$stmt = sqlsrv_query( $this->db, $sql, array($inicio, $final), $options);

		if( $stmt === false )
			die( print_r( sqlsrv_errors(), true));

		while ( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) )
			$return[] = $row;

		unset($row);
		foreach($return as $row)
		{
			$sql = "INSERT INTO location_faturas VALUES (?, ?, ?, ?, ?)";
			$params = array($inicio, $final, $row['total'], 'A', $row['cnpj']);
			$stmt = sqlsrv_query( $this->db, $sql, $params);
		}
	}

	public function fetchAll($status, $cnpj = NULL)
    {
    	if($cnpj == NULL)
    	{
    		$sql = "SELECT lf.*, lc.razao FROM location_faturas as lf JOIN location_clientes as lc ON lf.empresa = lc.cnpj WHERE status = ? ORDER BY periodo_final DESC";
    		$params = array(&$status);
    	}
		else
		{
			$sql = "SELECT lf.*, lc.razao FROM location_faturas as lf JOIN location_clientes as lc ON lf.empresa = lc.cnpj WHERE status = ? AND lc.cnpj=? ORDER BY periodo_final DESC";
    		$params = array(&$status, &$cnpj);
		}

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 2);

        $entries   = array();
        while ( $row = sqlsrv_fetch_object($stmt) ) {
            $entry = new Faturas();
			$entry->setId($row->id);
			$entry->setPeriodo_inicial($row->periodo_inicial);
			$entry->setPeriodo_final($row->periodo_final);
			$entry->setValor_total($row->valor_total);
			$entry->setStatus($row->status);
			$entry->setEmpresa($row->empresa);
			$entry->setRazao($row->razao);
            $entries[] = $entry;
        }
        return $entries;
    }
}