<?php
class General 
{
	protected $Logado = FALSE;

	public function __construct() {

		if(Session::read('LOGIN') != null)
			$this->Logado = true;

	}
	public function show()
	{
		global $Pages;


		
		$controller = "login";
		$action     = null;

		if($this->Logado)
			$controller = "painel";
		if(isset($_GET['controller']))
			$controller = $_GET['controller'];
		if(isset($_GET['action']))
			$action = $this->doAction($_GET['action']);

		$Pages->setController($controller)
			  ->setAction($action)
			  ->build();
	}

	public function doAction($action)
	{
		if(substr_count($action, "-"))
		{
			list($aux1, $aux2) = explode("-", $action);
			return $aux1.ucfirst($aux2);
		}
		return $action;
	}
}