<?php
class Pesquisa extends Application
{
	public $cpf = NULL;
	public $retorno = array();
	public $tipo = array(
						0 => "Pessoal",
						1 => "Casa",
						2 => "Vizinho",
						3 => "Empresa",
						4 => "Colega"
					);
	public $dados = array(
						0 => "Nome",
						6 => "Cpf",
						1 => "End",
						2 => "Fixo",
						3 => "Cel",
						4 => "Email",
						5 => "Mae",
						);
	
	public function init()
	{

	}

	public function atualizaNome($cpf, $nome)
	{
		$sql = "UPDATE location_log SET nome_pesquisado=? WHERE cpf_pesquisado=?";	
		$params = array(&$nome, &$cpf);
	
		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )		
			return false;
			
		if ( !$query = sqlsrv_execute( $stmt ) )			
			return false;

		return true;
	}

	public function getCpf($token)
	{
		$sql = "SELECT cpf_pesquisado as cpf FROM location_log WHERE token=?";
		$params = array(&$token);

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

		return $row['cpf'];
	}

	public function ultimasPesquisas($user)
	{
		$sql    = "SELECT TOP 3 nome_pesquisado as nome, cpf_pesquisado as cpf, sessao, token FROM location_log WHERE usuario=? ORDER BY id DESC";
		$params = array(&$user);
		$return = array();

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

		while($row = sqlsrv_fetch_object($stmt))
			$return[] = $row;

		return $return;
	}
	public function tokenCheck($token)
	{
		$sql = "SELECT usuario,data,sessao FROM location_log WHERE token=?";
		$params = array(&$token);

		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared.", 1);

		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be prepared", 1);

		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

		$dataAtual = new DateTime('NOW');
		$intervalo = $row["data"]->diff($dataAtual)->format('%d');

		if($intervalo > 0 ||
		 	$row['usuario'] != Session::read('LOGIN') ||
		 	$row['sessao'] != session_id()
		 )
			return false;

		return true;
	}

	public function insertLog($cpf)
	{
		$usuario = Session::read("LOGIN");
		$id      = session_id();
		$token   = md5(time()."$#$==)".$cpf."|".rand(999,9999));
		$nome 	 = NULL;

		if($usuario != null && !empty($id) && $cpf != NULL)
		{
			$sql = "INSERT INTO location_log VALUES (?, GETDATE(), ?, ?, ?, ?, 1)";
			$params = array(&$usuario, &$id, &$cpf, &$nome, &$token);

			if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
				return false;
			if ( !$query = sqlsrv_execute( $stmt ) )
				return false;

			return $token;
		}

		return false;
	}

	public function setObjectReturn()
	{
		$return = array();

		if(count($this->retorno) > 0)
		{
			foreach($this->retorno as $obj => $value)
			{
				foreach($value as $row)
				{
					$obj = new $obj;
					foreach($row as $name => $values)
					{
						if($name == "End")
						{
							$values = $this->formatEnd($values);
						}
						$set = "set".$name;
						$obj->$set($values);
					}
					$return[] = $obj;
				}
			}
		}
		return $return;
	}

	public function formatEnd($array)
	{
		if(is_array($array))
		{
			$x=0;
			foreach($array as $arr)
			{
				$arr = ucwords(strtolower(convertem(str_replace("-", " - ", $arr), 0 )));
				list(
						$ret[$x]['rua'],
						$ret[$x]['numero'],
						$ret[$x]['complemento'],
						$ret[$x]['bairro'],
						$ret[$x]['cidade'],
						$ret[$x]['estado'],
						$ret[$x]['cep']
					) = explode("-", $arr);
				$x++;
			}
			return $ret;
		}
	}

	public function getInfoByTipo($cpf)
	{

		$sql = "EXEC sp_consulta ?";
		$params = array(&$cpf);
	
		if (!$stmt = sqlsrv_prepare($this->db, $sql, $params) )
			throw new Exception("Statement could not be prepared", 1);	
		if ( !$query = sqlsrv_execute( $stmt ) )
			throw new Exception("Statement could not be executed", 1);


		$this->retorno = NULL;
		$inc = array(
					0 => -1,
					1 => -1,
					2 => -1,
					3 => -1,
					4 => -1
						);
		$count = array(
					0 => 0,
					1 => 0,
					2 => 0,
					3 => 0,
					4 => 0,
					5 => 0
						);

		while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
		{
			if(!isset($row['tp']) && !isset($row['ordem']) || (int)$row['tp'] != 0)
				break;

			$ordem = (int)$row['ordem'];
			$tp    = (int)$row['tp'];
			$sub   = 0;
			$cpf   = false;
			
			if (in_array($ordem, array(0, 10, 20, 30, 40)))
			{
				$inc[$tp]++;
				$aux   = $count;
				$cpf = true;
			}
					
			$sub = 0;
			if($ordem >= 10)
				$sub = 10;
			if($ordem >= 20)
				$sub += 10;
			if($ordem >= 30)
				$sub += 10;
			if($ordem >= 40)
				$sub += 10;

			$dado = $ordem - $sub;
			$t = $inc[$tp];

			if(in_array($dado, array(1,2,3,4)))
			{
				$i = $aux[$dado];
				$this->retorno[$this->tipo[$tp]][$t][$this->dados[$dado]][$i] = utf8_encode(trim($row['info']));
				$aux[$dado]++;
			}
			else
				$this->retorno[$this->tipo[$tp]][$t][$this->dados[$dado]] = utf8_encode(trim($row['info']));

			if($cpf)
				$this->retorno[$this->tipo[$tp]][$t][$this->dados[6]] = trim($row['cpf']);
		}
		return $this;
	}
}