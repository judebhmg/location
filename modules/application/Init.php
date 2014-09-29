<?php

class Init 
{
	public static $smarty = NULL;
	public static $db     = NULL;
	public static $SQLite = NULL;

	public function start() {
		self::$smarty = new Smarty();
		self::$db     = new PdoConexao(config('conn'));
		

		self::ConfigSmarty();
	}
	public function ConfigSmarty()
	{
		self::$smarty->setTemplateDir(MODULES_PATH."views".DS);
		self::$smarty->setCompileDir(MODULES_PATH."views_c".DS);
		self::$smarty->setConfigDir(ROOT."configs".DS);
		self::$smarty->setCacheDir(MODULES_PATH."cache".DS);
	}
}