<?php 
	define("STATUS_OK", 1);
	define("STATUS_WRONG", -1);

	require_once('connection.php');
	require_once('news.php');

	session_start();

	$title = mysql_escape_string(trim($_POST['title']));
	$text = mysql_escape_string(trim($_POST['text']));

	$news = new News($title, $text);
	$result = $news->save();
	switch ($result) {
		case STATUS_OK:
			$_SESION['data'] = $_POST;
			header("Location: /tm/add.php");			
			break;
		case STATUS_WRONG:
			$_SESION['error'] = "Wrong data. Try again"
			$_SESION['data'] = $_POST;
			header("Location: /tm/print.php");
			break;
	}
?>