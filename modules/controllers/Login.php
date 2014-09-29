<?php
class Login extends Application {
	public function __construct() {
		parent::__construct();
	}

	public function init()
	{
		$this->smarty->display('login/login.tpl');
		if($_POST) $this->postLogin();
	}

	public function index() {}

	public function postLogin()
	{
		if(empty($_POST['login']) || empty($_POST['senha']))
		{
			Message::display('Login e/ou senha inválidos', HTML_HOST);
		}
		else
		{
			$sql    = "SELECT usuario, tipo FROM [dbo].[location_usuarios] WHERE usuario=? AND senha=? AND ativo=0";
			$params = array($_POST['login'], $_POST['senha']);
			$stmt   = sqlsrv_query($this->db, $sql, $params, array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
			$count  = sqlsrv_num_rows($stmt);
			$row    = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

			if($count <= 0)
			{
				Message::display('Login e/ou senha inválidos', HTML_HOST);
			}
			else
			{
				session_regenerate_id();
				Session::write('LOGIN', $_POST['login']);

				switch($row['tipo']) {
					case 'A':
						header("Location: " . HTML_HOST . "?controller=admin");
					break;
					case 'S':
						header("Location: " . HTML_HOST . "?controller=cliente");
					break;
					case 'G':
						header("Location: " . HTML_HOST . "?controller=cliente");
					break;
					default:
						header("Location: " . HTML_HOST);
					break;
				}
			}
		}
	}
}