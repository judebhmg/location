<?php
/*

*/
date_default_timezone_set('America/Sao_Paulo'); 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);
define('CONFIG_PATH', ROOT . "configs" . DS);
define('TEMP_PATH', ROOT . "tmp" . DS);
define('LIBRARY_PATH', ROOT . 'library' . DS);
define('MODULES_PATH', ROOT . 'modules' . DS);
define('TEMPLATE_PATH', MODULES_PATH . "views" . DS);

function mktLoadClass($class)
{
    $search_in =  array(
    					LIBRARY_PATH . "Smarty" . DS,
    					MODULES_PATH . "application" . DS,
                        MODULES_PATH . "models" . DS,
                        MODULES_PATH . "controllers" . DS,
                        LIBRARY_PATH);
    foreach ($search_in as $path) {

    	$file = $path . $class . ".php";

    	if(file_exists($file))
    	{
    		require $file;
    	}
    	
    }
}
spl_autoload_register("mktLoadClass");

