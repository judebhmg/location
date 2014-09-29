<?php
class Cliente extends Application {

	private $Permissao;

	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		$usuario = Session::read('LOGIN');
		$mppUser = new MapperUsuarios();
		$cnpj        = $mppUser->getCNPJ('junior');

		$this->Permissao   = $mppUser->permissao($usuario, $cnpj);

		if(!$this->ChecarPermisao($usuario, "G") && !$this->ChecarPermisao($usuario, "S"))
		{
			Session::delete("LOGIN");
			header( "Location: " . HTML_HOST );
			die();
		}
		if(!$this->CheckLogado())
			header( "Location: " . HTML_HOST );
		$this->smarty->assign('userHeader', $mppUser->getDados());
		$this->smarty->assign('Permissao', $this->Permissao);
	}

	public function ativarUsuario()
	{
		$usuario = Session::read('LOGIN');
		$mppUser = new MapperUsuarios();
		$cnpj    = $mppUser->getCNPJ($usuario);

		if($mppUser->atvUsuario($_GET['usuario'], $cnpj, 0))
		{
			Message::display('Usuário ativado.', '?controller=cliente&action=atualizar-dados');
			Log::write("Ativar-usuario.log", "Cliente", "Usuario ativou o usuário: {$_GET['usuario']}");
		}
	}

	public function desativarUsuario()
	{
		$usuario = Session::read('LOGIN');
		$mppUser = new MapperUsuarios();
		$cnpj    = $mppUser->getCNPJ($usuario);
		$Check   = $mppUser->select($_GET['usuario'], $cnpj);

		if($Check->tipo == "G" or $Check->tipo == "A")
			Message::display('Você não pode desativar gestores ou administradores do sistema.', '?controller=cliente&action=atualizar-dados');
		else if($usuario == $_GET['usuario'])
			Message::display('Você não pode desativar sua propria conta.', '?controller=cliente&action=atualizar-dados');
		else if($mppUser->atvUsuario($_GET['usuario'], $cnpj, 1))
		{
			Message::display('Usuário desativado.', '?controller=cliente&action=atualizar-dados');
			Log::write("Desativar-usuario.log", "Cliente", "Usuario desativou o usuário: {$_GET['usuario']}");
		}
	}

	public function index() {
		$this->smarty->display( "cliente/index.tpl" );
	}

	public function verConsultas()
	{
		$mppFaturas = new MapperFaturas();
		$id         = (int)$_GET['id'];
		$this->smarty->assign( "Consultas", $mppFaturas->fetchConsultas($id));
		$this->smarty->display( "cliente/ver-consultas.tpl" );
	}

	public function editarUsuario() {
		$mppUsuarios = new MapperUsuarios();
		$usuario     = Session::read('LOGIN');
		$cnpj        = $mppUsuarios->getCNPJ($usuario);

		if($_POST && isset($_POST))
		{
			$usuario = $_POST['usuario'];
			$nome    = $_POST['nome'];
			$email   = $_POST['email'];
			$limite   = $_POST['limite'];
			$error   = NULL;
			$sucesso = NULL;

			if($this->Permissao != "G") $error .= "Sem permissão de edição<br>";
		    if( empty($usuario) ) $error .= "Usuário em branco <br>";
			if( empty($nome) ) $error .= "Nome em branco <br>";

			if(!empty($_POST['senha']) && !empty($_POST['resenha']))
			{
				$senha = $_POST['senha'];
				$resenha = $_POST['resenha'];

				if($senha == $resenha)
				{
					if($mppUsuarios->alterarSenha($senha, $usuario, $cnpj))
						$sucesso = "Senha alterada com sucesso!<br>";
					Log::write("Editar-usuario.log", "Cliente", "Usuario alterou a senha da conta: {$usuario}");
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

				if( $mppUsuarios->update(0, $Usuarios, $cnpj) )
				{
					$this->smarty->assign( "Cadastrado", $sucesso."Usuário editado com sucesso");
					Log::write("Editar-usuario.log", "Cliente", "Usuario editou a conta: {$usuario}");
				}
			}
			$this->smarty->assign( "Error", $error);
		}
		$this->smarty->assign( "Usuario", $mppUsuarios->select($_GET['usuario'], $cnpj));
		$this->smarty->display( "cliente/editar-usuario.tpl" );
	}

	public function atualizarDados() {

		$mppEmpresas = new MapperEmpresas();
		$mppUsuarios = new MapperUsuarios();
		$usuario     = Session::read('LOGIN');

		if($_POST && isset($_POST["prosseguir"]))
		{
			$usuarios = $_POST['iptUsuarios'];
			$acao     = $_POST['acao'] == 0 ? 0 : 1;
			
			$logado   = Session::read('LOGIN');
			$mppUser  = new MapperUsuarios();
			$cnpj     = $mppUser->getCNPJ($logado);
			$continue = true;
			$enviado  = false;

			if(count($usuarios) > 0)
			{
				foreach($usuarios as $usuario)
				{
					$Check   = $mppUser->select($usuario, $cnpj);
					if($Check->tipo == "G" or $Check->tipo == "A")
					{
						Message::display("Usuário: $usuario é gestor ou administrador do sistema.", '?controller=cliente&action=atualizar-dados');
						break;
					}
					else if($usuario == $logado)
					{
						Message::display('Você não pode desativar sua propria conta.', '?controller=cliente&action=atualizar-dados');
						break;
					}
					$mppUser->atvUsuario($usuario, $cnpj, $acao);
	
						
				}
			}

			Message::display('Operação realizada com sucesso!', '?controller=cliente&action=atualizar-dados');
			Log::write("Desativar-usuario.log", "Cliente", "Usuario desativou usuários em massa.");

		}

		if($_POST && isset($_POST["Atualizar"]))
		{
			$razao       = $_POST['razao'];
			$cnpj        = Util::unmask($_POST['cnpj']);
			$endereco    = $_POST['endereco'];
			$complemento = $_POST['complemento'];
			$numero      = $_POST['numero'];
			$bairro      = $_POST['bairro'];
			$cidade      = $_POST['cidade'];
			$estado      = $_POST['estado'];
			$cep         = Util::unmask($_POST['cep']);
			$telefone    = Util::unmask($_POST['telefone']);
			$email       = $_POST['email'];
			$responsavel = $_POST['responsavel'];
			$error       = NULL;

			if($this->Permissao != "G") $error .= "Sem permissão de edição<br>";
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
			if( strlen($telefone) < 10 ) $error .= "Telefone inválido <br>";
			if( strlen($cep) < 8 ) $error .= "CEP inválido <br>";

			if($error == NULL)
			{
				$Empresas              = new Empresas;
				$Empresas->endereco    = $endereco;
				$Empresas->numero      = $numero;
				$Empresas->bairro      = $bairro;
				$Empresas->cidade      = $cidade;
				$Empresas->estado      = $estado;
				$Empresas->cep         = $cep;
				$Empresas->razao       = $razao;
				$Empresas->telefone    = $telefone;
				$Empresas->email       = $email;
				$Empresas->responsavel = $responsavel;
				$Empresas->complemento = $complemento;

				$MapperEmpresas = new MapperEmpresas();
				if( $MapperEmpresas->update($Empresas, $cnpj, $usuario) )
				{
					$this->smarty->assign( "Cadastrado", "Empresa editada com sucesso!");
					Log::write("Editar-empresa.log", "Cliente", "Usuario editou a empresa: {$razao} / {$cnpj}");
				}
			}
			$this->smarty->assign( "Error", $error);
		}
		$Empresa  = $mppEmpresas->select( $usuario );
		$cnpj     = $mppUsuarios->getCNPJ($usuario);
		$usuariosAtivos = $mppUsuarios->find('where empresa = ? AND ativo=0', $cnpj);
		$usuariosInativos = $mppUsuarios->find('where empresa = ? AND ativo=1', $cnpj);

		$this->smarty->assign( "Empresa", $Empresa);
		$this->smarty->assign( "usuariosAtivos", $usuariosAtivos);
		$this->smarty->assign( "usuariosInativos", $usuariosInativos);
		$this->smarty->display( "cliente/atualizar-dados.tpl" );
	}

	public function relatorios()
	{
		$mppFaturas  = new MapperFaturas();
		$mppUsuarios = new MapperUsuarios();
		$usuario     = Session::read('LOGIN');
		$cnpj        = $mppUsuarios->getCNPJ($usuario);
		
		$Relatorios  = $mppFaturas->ultimasConsultas($cnpj);
		$h2_title    = "Últimas consultas";

		if($_POST && isset($_POST))
		{
			$Where   = array();
			$inicio  = date('Y-m-d', strtotime(str_replace("/", "-", $_POST['inicio'])));
			$final   = date('Y-m-d 23:59', strtotime(str_replace("/", "-", $_POST['final'])));
			$Where   = array($inicio, $final);

			$Relatorios = $mppFaturas->ultimasConsultas($cnpj, $Where);
		}

		$this->smarty->assign( "Relatorios", $Relatorios);
		$this->smarty->assign( "h2_title", $h2_title);

		$this->smarty->display( "cliente/relatorios.tpl" );
	}

	public function faturas() {

		$mppFaturas  = new MapperFaturas();
		$mppUsuarios = new MapperUsuarios();
		$usuario     = Session::read('LOGIN');
		$cnpj        = $mppUsuarios->getCNPJ($usuario);
		$Faturas     = $mppFaturas->fetchAll('A', $cnpj);
		$FaturasF    = $mppFaturas->fetchAll('F', $cnpj);
		$this->checkPermissao();

		if(isset($_POST) && $_POST)
		{
			$inicio  = $_POST['inicio'];
			$final   = $_POST['final'];
			$order   = isset($_POST['order']) ? $_POST['order'] : 2;
			
			$Faturas  = $mppFaturas->find($inicio, $final, "", $order, 'A', $cnpj);
			$FaturasF = $mppFaturas->find($inicio, $final, "", $order, 'F', $cnpj);

		}

		$this->smarty->assign( "Faturas", $Faturas);
		$this->smarty->assign( "FaturasF", $FaturasF);

		$this->smarty->display( "cliente/faturas.tpl" );
	}

	public function checkPermissao()
	{
		if($this->Permissao != "G")
		{
			header("Location: ?controller=cliente");
			die();
		}

	}

}
?>