<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kw,&$pr,&$lt){
	$kw = isset($_REQUEST['kw']) ? $_REQUEST['kw'] : null;
	$pr = isset($_REQUEST['pr']) ? $_REQUEST['pr'] : null;
	$lt = isset($_REQUEST['lt']) ? $_REQUEST['lt'] : null;	
}

function validate(&$kw,&$pr,&$lt,&$messages){
	if ( ! (isset($kw) && isset($pr) && isset($lt))) {
		return false;
	}

	if ( $kw == "") {
		$messages [] = 'Nie podano kwoty pożyczki';
	}
	if ( $pr == "") {
		$messages [] = 'Nie podano oprocentowania';
	}
	if ( $lt == "") {
		$messages [] = 'Nie podano okresu pożyczki';
	}

	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $kw )) {
		$messages [] = 'Kwota pożyczki nie jest liczbą całkowitą';
	}
	if (! is_numeric( $pr )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}
	if (! is_numeric( $lt )) {
		$messages [] = 'Okres pożyczki nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kw,&$pr,&$lt,&$messages,&$wynik){
	global $role;
	
	$kw = intval($kw);
	$pr = intval($pr)/100;
	$lt = intval($lt);
	for($i=0;$i<$lt;$i++){
		$kw=$kw*(1+$pr);
	}
	$wynik = $kw/(12*$lt);
}

$kw = null;
$pr = null;
$lt = null;
$wynik = null;
$messages = array();

getParams($kw,$pr,$lt);
if(validate($kw,$pr,$lt,$messages)){
	process($kw,$pr,$lt,$messages,$wynik);
}

include 'calc_view.php';