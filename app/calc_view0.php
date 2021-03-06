<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<style>
	body
	{
		font-family: "Verdana";
		background-color: #151515;
		color: #eeeeee;
		margin-top: 50px;
	}
	td
	{
			vertical-align: top;
	}
</style>
</head>
<body>

	<div	 style="width:90%; margin: 2em auto">
		<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
		<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
	</div>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<center><font size="5">Witam w kalkulatorze obliczającym przybliżoną wartość pierwiastna n-tego stopnia. <br><br>
	<font size="3">Wpisz w dużym oknie podstawę liczby, a w małe okienka licznik oraz mianownik wykładnika.<br>
		Następnie naciśnij przycisk "Oblicz". <br><br>
	<table>
		<tr>
			<td></td><td STYLE="border-bottom: 2px solid black">
				<input type="text" STYLE="color: #151515; width: 20px; font-weight: bold" name="exp_num" value="<?php if (isset($exp_num)) print($exp_num); ?>">
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				<input type="text" STYLE="color: #151515; width: 90px; font-size: 60px; vertical-align: middle"" name="value" value="<?php if (isset($value)) print($value); ?>">
			</td><td>
				<input type="text" STYLE="color: #151515; width: 20px; font-weight: bold" name="exp_den" value="<?php if (isset($exp_den)) print($exp_den); ?>">
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
	<input type="submit" style="font-weight: bold; color: #151515;"value="Oblicz" />
</center>
</form>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<center><ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #660011; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol></center>';
	}
}
?>

<?php if (isset($result)){ ?>
<center><div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #339933; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div></center>
<?php } ?>

</body>
</html>
