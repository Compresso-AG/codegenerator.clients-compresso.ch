<?php
ini_set('max_execution_time', 0);
if(@isset($_POST['start'])):
	require 'functions.php';
	$myfile = fopen("dload/codes.txt", "w") or die("Unable to open txt file!");
	$csvfile = fopen('dload/codes.csv', 'a') or die("Unable to open csv file!");
	if(file_exists('./oldcodes.txt')) {
		$keys = file('./oldcodes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	} else {
		$keys = array();
	}
	for($i=0; $i < $_POST['forcodes']; $i++){
		$randomstring = generateRandomString($_POST['anzzeichen'],$_POST['zeichen']);
		if(!in_array($randomstring, $keys)){
			array_push($keys, $randomstring);
			fwrite($myfile, $randomstring."\n");
			fputcsv($csvfile, array($randomstring));
		}else{
			$i--;
		}
	}
	fclose($myfile);
	fclose($csvfile);
	echo '<h1>Uff.. tatsächlich geschafft ;-)</h1>';
	echo '<p><a href="/dload/codes.txt">Textdatei herunterladen</a></p>';
	echo '<p><a href="/dload/codes.csv">CSV-Datei herunterladen</a></p>';
	echo '<p><a href="/index.php">Codegenerator neustarten</a></p>';
else:
	if(file_exists('dload/codex.txt')){
		unlink('dload/codes.txt');
	}
	if(file_exists('dload/codes.csv')){
		unlink('dload/codes.csv');
	}
	?>
	<h1>Super Mega cooler Codegenerator!!</h1>
	<h2>oder so...</h2>
	<hr>
	<form name="codedetails" method="post" action="/index.php">
		<p>Anzahl Zeichen:</p>
		<p><input type="number" name="anzzeichen" required="required" placeholder="Anzahl zeichen"></p>
		<p>Zeichen auswählen:</p>
		<p>
			<select name="zeichen">
				<option value="ABCDEFGHIJKLMNOPQRSTUVWXYZ">A-Z</option>
				<option value="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ">A-Z 0-9</option>
				<option value="0123456789">0-9</option>
				<option value="abcdefghijklmnopqrstuvwxyz">a-z</option>
				<option value="0123456789abcdefghijklmnopqrstuvwxyz">a-z 0-9</option>
				<option value="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ">A-Z a-z 0-9</option>
				<option value="23456789CFHJKLNPRTVX">Grossbuchstaben und Zahlen (ohne Verwechslungsgefahr)</option>
			</select>
		</p>
		<p>Anzahl Codes:</p>
		<p><input type="number" min="1" required="required" placeholder="Anzahl Codes" name="forcodes"></p>
		<p><input type="submit" name="start" value="Code generieren"></p>
	</form>
	<?php
endif;
?>