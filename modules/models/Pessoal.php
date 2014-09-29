<?php
class Pessoal
{
    private $nome;
    private $cpf;
    private $end   = array();
    private $fixo  = array();
    private $cel   = array();
    private $email = array();
    private $mae;

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
            throw new Exception('Invalid guestbook property');
        }
        return $this->$method();
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
     * Gets the value of cpf.
     *
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Sets the value of cpf.
     *
     * @param mixed $cpf the cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Gets the value of end.
     *
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Sets the value of end.
     *
     * @param mixed $end the end
     *
     * @return self
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Gets the value of fixo.
     *
     * @return mixed
     */
    public function getFixo()
    {
        return $this->fixo;
    }

    /**
     * Sets the value of fixo.
     *
     * @param mixed $fixo the fixo
     *
     * @return self
     */
    public function setFixo($fixo)
    {
        $this->fixo = $fixo;

        return $this;
    }

    /**
     * Gets the value of cel.
     *
     * @return mixed
     */
    public function getCel()
    {
        return $this->cel;
    }

    /**
     * Sets the value of cel.
     *
     * @param mixed $cel the cel
     *
     * @return self
     */
    public function setCel($cel)
    {
        $this->cel = $cel;

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
     * Gets the value of mae.
     *
     * @return mixed
     */
    public function getMae()
    {
        return $this->mae;
    }

    /**
     * Sets the value of mae.
     *
     * @param mixed $mae the mae
     *
     * @return self
     */
    public function setMae($mae)
    {
        $this->mae = $mae;

        return $this;
    }
}