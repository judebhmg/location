<?php
class Pages extends Application
{
	protected $controller;
	protected $action;

	public function build()
	{
		$action     = $this->getAction();
		$controller = $this->getController();

		$controller = new $controller();
        $controller->init();
        
        if(method_exists( $controller , $action ))
    		$controller->$action();    
	}

    public function View()
    {
        $this->smarty->display( "painel/" . Pages::getAction() . ".tpl" );
    }

    /**
     * Gets the value of controller.
     *
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Sets the value of controller.
     *
     * @param mixed $controller the controller
     *
     * @return self
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Gets the value of action.
     *
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets the value of action.
     *
     * @param mixed $action the action
     *
     * @return self
     */
    public function setAction($action)
    {
    	if($action == NULL)
    		$this->action = "index";
    	else
    		$this->action = $action;

        return $this;
    }
}