<?//php
	require_once("path.php");
	$nameSearch = htmlspecialchars($_GET['name']);
	$emailSearch = htmlspecialchars($_GET['email']);
	$path = $_GET['path'];
	$pathMaker = new Path();
	$path = $pathMaker->replaceVar($path, 'name', $nameSearch, true);
	$path = $pathMaker->replaceVar($path, 'email', $emailSearch, true); 
	$path = $pathMaker->replaceVar($path, 'path'); 
	$path = $pathMaker->replaceVar($path, 'p'); 
	header("Location: {$path}");
?>