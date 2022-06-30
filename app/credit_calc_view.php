<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/credit_calc.php" method="get">
	<label for="id_x">Kwota: </label>
	<input id="id_x" type="text" name="x" value="<?php if(isset($kwota))print($kwota); ?>" /><br />
	<label for="id_y">Lata: </label>
	<input id="id_y" type="text" name="y" value="<?php if(isset($lata))print($lata); ?>" /><br />
	<label for="id_z">Procent: </label>
	<input id="id_z" type="text" name="z" value="<?php if(isset($procent))print($procent); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)){
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
	foreach ( $messages	as $msg ) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>