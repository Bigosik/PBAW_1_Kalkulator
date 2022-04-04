<?php
require_once dirname(__FILE__).'/../config.php';
$logged = true;
include _ROOT_PATH.'/app/templates/top.php'; ?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<style>
	body
	{
		color: #ffffff;
	}
	td
	{
			vertical-align: top;
	}
</style>
</head>
<body>

<section id="home" data-stellar-background-ratio="0.5">
		 <div class="overlay"></div>
		 <div class="container">
					<div class="row" style="position: relative">
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<center><font size="5.5">Wpisz w dużym oknie podstawę liczby, a w małe okienka licznik oraz mianownik wykładnika.<br>
		Następnie naciśnij przycisk "Oblicz". <br><br><font size="4">
	<table>
		<tr>
			<td></td><td STYLE="border-bottom: 2px solid black">
				<input type="text" STYLE="color: #151515; width: 40px; font-weight: bold" name="exp_num" value="<?php if (isset($exp_num)) print($exp_num); ?>">
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				<input type="text" STYLE="color: #151515; width: 150px; font-size: 70px; vertical-align: middle"" name="value" value="<?php if (isset($value)) print($value); ?>">
			</td><td>
				<input type="text" STYLE="color: #151515; width: 40px; font-weight: bold" name="exp_den" value="<?php if (isset($exp_den)) print($exp_den); ?>">
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
	<br><input type="submit" class="section-btn" data-target="#modal-form"; value="Oblicz"/>
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
<center><div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #00F260; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div></center>
<?php } ?>

</div>
</div>
</div>
</section>

<?php include _ROOT_PATH.'/app/templates/bottom.php'; ?>
