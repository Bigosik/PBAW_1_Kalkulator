<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
require_once dirname(__FILE__).'/function.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów
function getParams(&$value, &$exp_num, &$exp_den){
$value = isset($_REQUEST ['value']) ? $_REQUEST ['value'] : null;
$exp_num = isset($_REQUEST ['exp_num']) ? $_REQUEST ['exp_num'] : null;
$exp_den = isset($_REQUEST ['exp_den']) ? $_REQUEST ['exp_den'] : null;
}
// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
function validate(&$value, &$exp_num, &$exp_den, &$messages){

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

		return (empty( $messages )) ? true : false;

}

function result(&$value, &$exp_num, &$exp_den, &$result, &$role){
	global $role;
		$messages [] = 'Admins';
if($role == 'admin'){
	$result = root(power(invert($value, $exp_num, $exp_den), $exp_num), $exp_den);
} else {
	return $messages;
}
	}


$exp_den = null;
$exp_num = null;
$messages = array();
$value = null;
$result = false;

getParams($value, $exp_num, $exp_den);
if (validate($value, $exp_num, $exp_den, $messages)){
	result($value, $exp_num, $exp_den, $result, $messages);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
