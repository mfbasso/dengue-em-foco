<?php
	mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('projetodef') or die(mysql_error());
	$sql = "CALL registrarFoco('Bauru', 'SP', 'Rua Major Prado, 111, Centro', 'Caso', @idL, @idA, @result)";
	$query = mysql_query($sql) or die (mysql_error());
	$sql = "SELECT @idL AS idL, @idA AS idA, @result AS result";
	$query = mysql_query($sql) or die (mysql_error());
	$result = mysql_fetch_assoc($query) or die(mysql_error());
	echo "hello world - home! {$result['idL']} + {$result['idA']} + {$result['result']}";
?>
