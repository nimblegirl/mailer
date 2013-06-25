<?//php
define(STATUS_OK, 1);
define(STATUS_ERROR, -1);
require_once('../model/news.php');
require_once('connection.php');
session_start();	

$title = mysql_escape_string(trim($_POST['title']));
$text = mysql_escape_string(trim($_POST['text']));

$news = new News($title, $text);	

$result = $news->save();
switch ($result) {
	case STATUS_OK:
		header("Location: /tm/index.php?show=news");
		break;
	case STATUS_ERROR:
		$_SESSION['error'] = "News was not updated. Try again";
		$_SESSION['data'] = $_POST;
		header("Location: /tm/index.php?show=news_edit");
		break;
}
session_destroy();
?>