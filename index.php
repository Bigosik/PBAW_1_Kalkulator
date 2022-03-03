<?php
require_once dirname(__FILE__).'/config.php';	//require wykorzystuje się w szczególności do bibliotek; dirname(__FILE__) - zwraca ścieszkę na  dysku do folderu w którym się znajdujemy

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc_view.php");

//przekazanie żądania do następnego dokumentu ("forward")
include _ROOT_PATH.'/app/calc_view.php';	//używa się do widoku