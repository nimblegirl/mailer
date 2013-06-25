<?//php
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbname = "tm";

	if (!mysql_connect($server, $user, $password)){
		exit("Error while connecting to db! (".mysql_error().")");
	}

	mysql_select_db($dbname);
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("set character_set_client='utf8'");
	mysql_query("set character_set_results='utf8'");
	mysql_query("set collation_connection='utf8_general_ci'");
?>