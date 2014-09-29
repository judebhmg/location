<?php 
class Admin extends Application
{
	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		$usuario = Session::read('LOGIN');
		$mppUser = new MapperUsuarios();

		if(!$this->ChecarPermisao($usuario, "A"))
		{
			Session::delete("LOGIN");
			header( "Location: " . HTML_HOST );
			die();
		}

		if(!$this->CheckLogado())
			header( "Location: " . HTML_HOST );

		$this->smarty->assign('userHeader', $mppUser->getDados());
	}

	public function editarUsuario()
	{
		$mppUsuarios = new MapperUsuarios();
		if($_POST && isset($_POST))
		{
			$usuario = $_POST['usuario'];
			$nome    = $_POST['nome'];
			$email   = $_POST['email'];
			$limite   = $_POST['limite'];
			$ativo   = $_POST['ativo'];
			$tipo   = $_POST['tipo'];
			$error   = NULL;
			$sucesso = NULL;

			if( $tipo == "A" ) $error .= "Você não pode editar uma conta para ADMIN <br>";
		    if( empty($usuario) ) $error .= "Usuário em branco <br>";
			if( empty($nome) ) $error .= "Nome em branco <br>";

			if(!empty($_POST['senha']) && !empty($_POST['resenha']))
			{
				$senha = $_POST['senha'];
				$resenha = $_POST['resenha'];

				if($senha == $resenha)
				{
					if($mppUsuarios->alterarSenha($senha, $usuario))
						$sucesso = "Senha alterada com sucesso!<br>";

					Log::write("Editar-usuario.log", "Admin", "Usuario alterou a senha da conta: {$usuario}");
				}
				else
					$error .= "Senhas não conferem.";

			}

			if($error == NULL)
			{
				$Usuarios          = new Usuarios;
				$Usuarios->nome    = $nome;
				$Usuarios->email   = $email;
				$Usuarios->usuario = $usuario;
				$Usuarios->limite  = $limite;
				$Usuarios->ativo   = $ativo;
				$Usuarios->tipo    = $tipo;

				if( $mppUsuarios->update(1, $Usuarios) )
				{
					$this->smarty->assign( "Cadastrado", $sucesso."Usuário editado com sucesso");
					Log::write("Editar-usuario.log", "Admin", "Usuario editou a conta: {$usuario}");
				}
			}
			$this->smarty->assign( "Error", $error);
		}
		$this->smarty->assign( "Usuario", $mppUsuarios->select($_GET['usuario']));
		$this->smarty->display( "admin/editar-usuario.tpl" );
	}

	public function deletarUsuario() {
		$MapperUsuarios = new MapperUsuarios();
		if($MapperUsuarios->delete($_GET['usuario']))
		{
			Log::write("Deletar-usuario.log", "Admin", "Usuario deletou: {$_GET['usuario']}");
			Message::display('Deletado com sucesso!', '?controller=admin&action=usuarios');
		}
	}

	public function deletarEmpresa() {
		$MapperEmpresas = new MapperEmpresas();
		if($MapperEmpresas->delete($_GET['cnpj']))
		{
			Log::write("Deletar-empresa.log", "Admin", "Usuario deletou: {$_GET['cnpj']}");
			Message::display('Deletado com sucesso!', '?controller=admin&action=empresas');
		}
	}

	public function verConsultas()
	{
		$mppFaturas = new MapperFaturas();
		$id         = (int)$_GET['id'];
		$this->smarty->assign( "Consultas", $mppFaturas->fetchConsultas($id));
		$this->smarty->display( "admin/ver-consultas.tpl" );
	}

	public function gerarfaturas() {
		$mppFaturas = new MapperFaturas();
		$error      = NULL;

		if(isset($_POST) && $_POST)
		{
			$inicio = date('Y-m-d', strtotime(str_replace("/", "-", $_POST['inicio'])));
			$final  = date('Y-m-d 23:59', strtotime(str_replace("/", "-", $_POST['final'])));

			if($mppFaturas->CheckFaturas($final))
			{
				$mppFaturas->gerarFatura($inicio, $final);
				$this->smarty->assign( "Cadastrado", "success");
				Log::write("Fatura.log", "Admin", "Usuario gerou uma fatura");
			}
			else
				 $error = "Existe um conflito de datas, por favor, verifique e repita o processo. <br>";
		}
		$this->smarty->assign( "Error", $error);
		$this->smarty->display( "admin/gerar-faturas.tpl" );
	}

	public function faturaStatus() {
		$s          = (int)$_GET['s'];
		$id         = (int)$_GET['id'];
		$mppFaturas = new MapperFaturas();

		if($s == 0)
			if($mppFaturas->fecharFatura($id))
				Message::display('Fechado com sucesso!', '?controller=admin&action=faturas');

		if($s == 1)
			if($mppFaturas->deletarFatura($id))
				Message::display('Deletado com sucesso!', '?controller=admin&action=faturas');

	}

	public function faturas() {
		$mppFaturas = new MapperFaturas();
		$Faturas = $mppFaturas->fetchAll('A');
		$FaturasF = $mppFaturas->fetchAll('F');

		if(isset($_POST) && $_POST)
		{
			$inicio  = $_POST['inicio'];
			$final   = $_POST['final'];
			$empresa = $_POST['empresa'];
			$order   = isset($_POST['order']) ? $_POST['order'] : 2;
			
			$Faturas = $mppFaturas->find($inicio, $final, $empresa, $order, 'A');
			$FaturasF = $mppFaturas->find($inicio, $final, $empresa, $order, 'F');

		}

		$this->smarty->assign( "Faturas", $Faturas);
		$this->smarty->assign( "FaturasF", $FaturasF);
		$this->smarty->display( "admin/faturas.tpl" );
	}
	
	public function cadusuarios()
	{
		$Empresas = new MapperEmpresas();
		$all_empresas = $Empresas->fetchAll();

		if(isset($_POST) && $_POST)
		{
			$usuario = $_POST['usuario'];
			$senha   = $_POST['senha'];
			$nome    = $_POST['nome'];
			$email   = $_POST['email'];
			$empresa = $_POST['empresa'];
			$limite  = $_POST['limite'];
			$tipo    = $_POST['tipo'];
			$error   = NULL;

			if( empty($usuario) ) $error = "Usuário em branco <br>";
			if( empty($senha) ) $error = "Senha em branco <br>";
			if( empty($nome) ) $error = "Nome em branco <br>";
			if( $tipo == "" ) $error = "Selecione um tipo <br>";

			if($error == NULL)
			{
				switch ($_POST['tipo']) {
					case 0:
						$tipo = 'U';
						break;
					case 1:
						$tipo = 'S';
						break;
					case 2:
						$tipo = 'G';
						break;
				}
				$Usuarios = new Usuarios;
				$Usuarios->usuario = $_POST['usuario'];
				$Usuarios->senha   = $_POST['senha'];
				$Usuarios->email   = $_POST['email'];
				$Usuarios->nome    = $_POST['nome'];
				$Usuarios->empresa = $_POST['empresa'];
				$Usuarios->limite  = $_POST['limite'];
				$Usuarios->tipo    = $tipo;


				$MapperUsuarios = new MapperUsuarios();
				if( $MapperUsuarios->save($Usuarios) )
				{
					$this->smarty->assign( "Cadastrado", "success");
					Log::write("Cadastro-usuario.log", "Admin", "Usuario cadastrou: {$usuario}");
				}
			}
			$this->smarty->assign( "Error", $error);
		}
		$this->smarty->assign( "Empresas", $all_empresas);
		$this->smarty->display( "admin/cadusuarios.tpl" );
	}

	public function usuarios()
	{
		$MapperUsuarios = new MapperUsuarios();
		if(isset($_POST) && $_POST)
		{
			$where = (int)$_POST['where'];
			$param = $_POST['param'];
			switch($where)
			{
				case 0:
					$wh = "WHERE lu.email = ?";
				break;
				case 1:
					$wh = "WHERE lu.nome = ?";
				break;
				case 2:
					$wh = "WHERE lu.usuario = ?";
				break;
				case 3:
					$wh = "WHERE lu.empresa = ?";
				break;
			}
			$usuarios = $MapperUsuarios->find($wh, $param);
		}
		else 
			$usuarios = $MapperUsuarios->fetchAll();

		$this->smarty->assign( "Usuario", $usuarios);
		$this->smarty->display( "admin/usuarios.tpl" );
	}

	public function cadempresa()
	{
		if(isset($_POST) && $_POST)
		{
			$cnpj           = Util::unmask($_POST['cnpj']);
			$endereco       = $_POST['endereco'];
			$complemento    = $_POST['complemento'];
			$numero         = $_POST['numero'];
			$bairro         = $_POST['bairro'];
			$cidade         = $_POST['cidade'];
			$estado         = $_POST['estado'];
			$cep            = Util::unmask($_POST['cep']);
			$razao          = $_POST['razao'];
			$telefone       = Util::unmask($_POST['telefone']);
			$email          = $_POST['email'];
			$responsavel    = $_POST['responsavel'];
			$preco_consulta = $_POST['preco_consulta'];
			$error 			= NULL;

			if( empty($cnpj) ) $error = "CNPJ em branco <br>";
			if( empty($endereco) ) $error .= "Endereco em branco <br>";
			if( empty($numero) ) $error .= "Numero em branco <br>";
			if( empty($bairro) ) $error .= "Bairro em branco <br>";
			if( empty($cidade) ) $error .= "Cidade em branco <br>";
			if( empty($estado) ) $error .= "Estado em branco <br>";
			if( empty($cep) ) $error .= "CEP em branco <br>";
			if( empty($razao) ) $error .= "Razão em branco <br>";
			if( empty($telefone) ) $error .= "Telefone em branco <br>";
			if( empty($email) ) $error .= "Email em branco <br>";
			if( empty($responsavel) ) $error .= "Responsável em branco <br>";
			if( strlen($cnpj) < 14 ) $error .= "CNPJ inválido <br>";
			if( strlen($telefone) < 10 ) $error .= "Telefone inválido <br>";
			if( strlen($cep) < 8 ) $error .= "CEP inválido <br>";

			if($error == NULL)
			{
				$Empresas = new Empresas;
				$Empresas->cnpj           = $cnpj;
				$Empresas->endereco       = $endereco;
				$Empresas->numero         = $numero;
				$Empresas->bairro         = $bairro;
				$Empresas->cidade         = $cidade;
				$Empresas->estado         = $estado;
				$Empresas->cep            = $cep;
				$Empresas->razao          = $razao;
				$Empresas->telefone       = $telefone;
				$Empresas->email          = $email;
				$Empresas->responsavel    = $responsavel;
				$Empresas->preco_consulta = $preco_consulta;
				$Empresas->complemento    = $complemento;

				$MapperEmpresas = new MapperEmpresas();
				if( $MapperEmpresas->save($Empresas) )
				{
					$this->smarty->assign( "Cadastrado", "success");
					Log::write("Cadastro-empresa.log", "Admin", "Usuario cadastrou: {$razao}/{$cnpj}");
				}
			}

			$this->smarty->assign( "Error", $error);

		}
		$this->smarty->display( "admin/cadempresa.tpl" );
	}

	public function index()
	{
		$this->smarty->display( "admin/index.tpl" );
	}

	public function empresas()
	{
		$MapperEmpresas = new MapperEmpresas();

		if(isset($_POST) && $_POST)
		{
			$where = (int)$_POST['where'];
			$param = $_POST['param'];
			switch($where)
			{
				case 0: 
					$wh = "WHERE cnpj = ?";
				break;
				case 1: 
					$wh = "WHERE razao = ?";
				break;
				case 2: 
					$wh = "WHERE telefone = ?";
				break;
			}
			if(substr_count($param, "/") > 0 || substr_count($param, "-") > 0 || substr_count($param, ".") > 0 || substr_count($param, "(") > 0 )
				$param = Util::unmask($param);
				
			$this->smarty->assign( "Empresa", $MapperEmpresas->find($wh, $param));
		}
		else
			$this->smarty->assign( "Empresa", $MapperEmpresas->fetchAll() );
			

		$this->smarty->display( "admin/empresas.tpl" );
	}
	
}