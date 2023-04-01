<?php require_once dirname(__FILE__) .'/../config.php';?>

<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>

<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">
		<fieldset>
			<label for="ix">Kwota kredytu: </label>
			<input id="id_x" type="text" placeholder="kwot kredytu" name="kw" value="<?php out($kw); ?>"/><br />
			<label for="id_z">Procent: </label>
			<input id="id_z" type="text" placeholder="oprocentowanie" name="pr" value="<?php out($pr); ?>"/><br />
			<label for="id_y">Lata: </label>
			<input id="id_y" type="text" placeholder="lata kredytu" name="lt" value="<?php out($lt); ?>"/><br />
			<input type="submit" class="pure-button" value="Oblicz" />
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php
//wyświeltenie listy informacji, jeśli istnieją
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($wynik)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($wynik); ?>
	</p>
<?php } ?>

</div>
</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bot.php';
?>