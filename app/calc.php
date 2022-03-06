<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
require_once dirname(__FILE__).'/function.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$value = $_REQUEST ['value'];
$exp_num = $_REQUEST ['exp_num'];
$exp_den = $_REQUEST ['exp_den'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($value) && isset($exp_den) && isset($exp_num))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $value == "") {
	$messages [] = 'Nie podano podstawy';
}
if ( $exp_num == "") {
	$messages [] = 'Nie podano licznika liczby wykładniczej';
}
if ( $exp_den == "") {
	$messages [] = 'Nie podano mianownika liczby wykładniczej';
}
//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {

	// sprawdzenie, czy wartości są liczbami całkowitymi
	if (! is_numeric( $value )) {
		$messages [] = 'Wprowadzona podstawa liczby nie jest liczbą całkowitą';
	}

	if (! is_numeric( $exp_num )) {
		$messages [] = 'Licznik wykładnika nie jest liczbą całkowitą';
	}

	if (! is_numeric( $exp_den )) {
		$messages [] = 'Mianownik wykładnika nie jest liczbą całkowitą';
	}
}

if ($exp_den == 0)
{
	$messages [] = 'Mianownik nie może być 0!';
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów

	//konwersja parametrów na int
	$value = intval($value);
	$exp_num = intval($exp_num);
	$exp_den = intval($exp_den);

	$result = root(power(invert($value, $exp_num, $exp_den), $exp_num), $exp_den);

	//trzeba podpiąć funkcje
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
