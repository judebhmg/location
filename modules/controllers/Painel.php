<?php 
class Painel extends Application
{
	public $layout = "painel/home.tpl";
	public $Pesquisa = false;

	public function __construct() {
		parent::__construct();
	}

	public function init()
	{
		$Pesquisa = new Pesquisa();
		$ultimas  = array();
		$ultimas  = $Pesquisa->ultimasPesquisas(Session::read('LOGIN'));
		$mppUser  = new MapperUsuarios();
		$this->smarty->assign('ultimas', $ultimas);

		$this->smarty->assign('userHeader', $mppUser->getDados());


		if(!$this->CheckLogado())
			header( "Location: " . HTML_HOST );
	}

	public function pesquisar()
	{
		if(isset($_POST))
		{
			$cpf      = Util::unmask($_POST['cpf']);
			$Pesquisa = new Pesquisa();
			if(($Token = $Pesquisa->insertLog($cpf)) != FALSE)
				header("Location: ?action=pessoais&token=".$Token);
		}
	}

	public function index() {
		$this->smarty->display( "painel/index.tpl" );
	}

	public function pessoais() {
		if(isset($_GET['token']))
		{
			$Pesquisa = new Pesquisa();
			$token    = $_GET['token'];

			if($Pesquisa->tokenCheck($token))
			{
				$cpf = $Pesquisa->getCpf($token);
				$Row = $Pesquisa->getInfoByTipo($cpf, 0)
								->setObjectReturn();

				if(count($Row) <= 0)
				{
					Message::display('Usuário não foi encontrado em nosso banco de dados.', HTML_HOST);
				}
				else
				{
					if($Pesquisa->atualizaNome($cpf, ucwords(strtolower($Row[0]->nome))))
					{
						$this->smarty->assign('Pessoal', $Row);
						$this->smarty->display( "painel/pessoais.tpl" );
					}
				}
			}
		}
	}
	
	public function deslogar() {
		Session::delete("LOGIN");
		header( "Location: " . HTML_HOST );
	}
}