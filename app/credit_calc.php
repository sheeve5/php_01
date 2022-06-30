<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów

// sprawdzenie, czy parametry zostały przekazane + pobranie parametrów
if (!isset($_REQUEST ['x'])) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak parametru 1.';
}
else{
	$kwota = $_REQUEST ['x'];
}

if (!isset($_REQUEST ['y'])) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak parametru 2.';
}
else{
	$lata = $_REQUEST ['y'];
}

if (!isset($_REQUEST ['z'])) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak parametru 3.';
}
else{
	$procent = $_REQUEST ['z'];
}


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

//tylko jesli wszystkie parametry istnieją
if(empty($messages)){

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano liczby 1';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano liczby 2';
	}
	if ( $procent == "") {
		$messages [] = 'Nie podano liczby 3';
	}

}


//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $kwota, $lata i $procent są liczbami
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $procent )) {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$lata = intval($lata);

	//konwersja parametru na float
	$procent = floatval($procent);
	
	//wykonanie operacji
	$result = ($kwota + $kwota*$procent) / ($lata*12);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($kwota,$lata,$procent,$messages,$result)
//   będą dostępne w dołączonym skrypcie
include 'credit_calc_view.php';