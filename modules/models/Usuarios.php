<?php
class Usuarios
{
	private $usuario;
    private $senha;
    private $email;
    private $nome;
    private $empresa;
    private $limite;
    private $tipo;
    private $razao;
    private $consultas;
    private $ativo;

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property.' . $name);
        }
        return $this->$method();
    }

    /**
     * Gets the value of usuario.
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Sets the value of usuario.
     *
     * @param mixed $usuario the usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of empresa.
     *
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Sets the value of empresa.
     *
     * @param mixed $empresa the empresa
     *
     * @return self
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Gets the value of limite.
     *
     * @return mixed
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * Sets the value of limite.
     *
     * @param mixed $limite the limite
     *
     * @return self
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Sets the value of razao.
     *
     * @param mixed $razao the razao
     *
     * @return self
     */
    public function setRazao($razao)
    {
        $this->razao = $razao;

        return $this;
    }

    /**
     * Gets the value of razao.
     *
     * @return mixed
     */
    public function getRazao()
    {
        return $this->razao;
    }

    /**
     * Gets the value of consultas.
     *
     * @return mixed
     */
    public function getConsultas()
    {
        return $this->consultas;
    }

    /**
     * Sets the value of consultas.
     *
     * @param mixed $consultas the consultas
     *
     * @return self
     */
    public function setConsultas($consultas)
    {
        $this->consultas = $consultas;

        return $this;
    }

    /**
     * Gets the value of ativo.
     *
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Sets the value of ativo.
     *
     * @param mixed $ativo the ativo
     *
     * @return self
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }
}