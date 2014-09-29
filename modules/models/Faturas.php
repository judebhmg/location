<?php
class Faturas
{
	private $id;
	private $periodo_inicial;
	private $periodo_final;
	private $valor_total;
	private $status;
	private $empresa;
	private $razao;

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
            throw new Exception('Invalid guestbook property: ' .  $method);
        }
        return $this->$method();
    }
    
    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of periodo_inicial.
     *
     * @return mixed
     */
    public function getPeriodo_inicial()
    {
        return $this->periodo_inicial;
    }

    /**
     * Sets the value of periodo_inicial.
     *
     * @param mixed $periodo_inicial the periodo_inicial
     *
     * @return self
     */
    public function setPeriodo_inicial($periodo_inicial)
    {
        $this->periodo_inicial = $periodo_inicial;

        return $this;
    }

    /**
     * Gets the value of periodo_final.
     *
     * @return mixed
     */
    public function getPeriodo_final()
    {
        return $this->periodo_final;
    }

    /**
     * Sets the value of periodo_final.
     *
     * @param mixed $periodo_final the periodo_final
     *
     * @return self
     */
    public function setPeriodo_final($periodo_final)
    {
        $this->periodo_final = $periodo_final;

        return $this;
    }

    /**
     * Gets the value of valor_total.
     *
     * @return mixed
     */
    public function getValor_total()
    {
        return $this->valor_total;
    }

    /**
     * Sets the value of valor_total.
     *
     * @param mixed $valor_total the valor_total
     *
     * @return self
     */
    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Gets the value of razao.
     *
     * @return mixed
     */
    public function getRazao()
    {
        return $this->razao;
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
}