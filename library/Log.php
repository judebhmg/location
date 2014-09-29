<?php
class Log
{
	static function write($file, $painel, $mensagem)
	{
		$usuario = Session::read('LOGIN');
		$data = date("d/m/Y H:i");
		$msg_log = "=====================================================================\nPainel: {$painel}\nUsuário:{$usuario}\nData:{$data}\n---------------------------------------------------------------------\n\n{$mensagem}\n=====================================================================\n\n";
		$fp = fopen(MODULES_PATH . "logs" . DS . $file, "a");
		fwrite($fp, $msg_log);
		fclose($fp);
	}
}