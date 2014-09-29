<?php
/**
 *	Location - Sistema de localização
 *	Direitos reservados a MarketList
 *
 *
 * 	Desenvolvedor : José Lúcio (juniospok2@hotmail.com)
 *
 * 	Criado em: 23/07/2014
 * 	Última revisão: 24/07/2014
 *
 *
 */
list($usec, $sec) = explode(' ', microtime());
$script_start = (float) $sec + (float) $usec;

require "bootstrap.php";
require "helpers.php";

Init::start();

if(session_id() == "")
    session_start();


Config::load(array(
                'database'
            ), CONFIG_PATH);

$Pages   = new Pages;

$general = new general;
$general->show();
/*

list($usec, $sec) = explode(' ', microtime());
			$script_end = (float) $sec + (float) $usec;
			$elapsed_time = round($script_end - $script_start, 5);
			echo 'Elapsed time: ', $elapsed_time, ' secs. Memory usage: ', round(((memory_get_peak_usage(true) / 1024) / 1024), 2), 'Mb';*/