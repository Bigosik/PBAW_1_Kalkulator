<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<style>
	body
	{
		font-family: "Verdana";
	}
	td
	{
			vertical-align: top;
	}
</style>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	Podaj liczbę, jakiej przybliżenie chcesz obliczyć:
	<table>
		<tr>
			<td></td><td STYLE="border-bottom: 2px solid black">
				<input type="text" STYLE="width: 10px" name="exp_num" value="<?php if (isset($exp_num)) print($exp_num); ?>">
			</td>
		</tr>
		<tr>
			<td rowspan="2"><FONT SIZE="20">
				<input type="text" STYLE="width: 90px; font-size: 60px; vertical-align: middle" name="value" value="<?php if (isset($value)) print($value); ?>">
			</td><td>
				<input type="text" STYLE="width: 10px" name="exp_den" value="<?php if (isset($exp_den)) print($exp_den); ?>">
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
	<input type="submit" value="Oblicz" />
</form>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>
