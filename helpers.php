<?php

function formartEnd($end)
{
	return ucwords(strtolower($end));
}

function convertem($term, $tp) {
    if ($tp == "1") $palavra = strtr(strtoupper($term),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    elseif ($tp == "0") $palavra = strtr(strtolower($term),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    return $palavra;
} 

function config($key, $default = null) {
    return Config::get($key, $default);
}

function mask($val, $mask)
{
	$maskared = '';
	$k = 0;
	for($i = 0; $i<=strlen($mask)-1; $i++)
 	{
 		if($mask[$i] == '#')
		{
			if(isset($val[$k]))
				$maskared .= $val[$k++];
		}
		else
		{
			if(isset($mask[$i]))
 				$maskared .= $mask[$i];
 		}
 	}
 	return $maskared;
}

$srv = $_SERVER['HTTP_HOST'];
$end = preg_replace('/index.php/', NULL, $_SERVER ['PHP_SELF']);

define("HTML_HOST", "http://" . $srv . $end);
define("HTML_PUBLIC", HTML_HOST . "public" . "/");

?>