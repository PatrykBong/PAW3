<?php
require_once dirname(__FILE__).'/../config.php';

$kw = $_REQUEST ['kwota'];
$pr = $_REQUEST ['procent'];
$lt = $_REQUEST ['lata'];

if ( ! (isset($kw) && isset($pr) && isset($lt))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $kw == "") {
	$messages [] = 'Nie podano kwoty pożycznki';
}
if ( $pr == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $lt == "") {
	$messages [] = 'Nie podano okresu pozyczki';
}

if (empty( $messages )) {
	if (! is_numeric( $kw )) {
		$messages [] = 'Kwota pożyczki nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $pr )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lt )) {
		$messages [] = 'Ilość lat nie jest liczbą całkowitą';
	}
}

if (empty ( $messages )) {
	
	$kw = intval($kw);
	$pr = intval($pr)/100;
	$lt = intval($lt);
	for($i=0;$i<$lt;$i++){
		$kw=$kw*(1+$pr);
	}
	$wynik = $kw/(12*$lt);
}

include 'calc_view.php';
