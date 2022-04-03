<?php
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/PBAW_1_Kalkulatorek');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));
define("_APPROX", 0.0000001);//wymagana dokładność pierwiastkowania

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}
?>
