<?//php
	define("STATUS_OK", 1);
	define("STATUS_EMAIL_ERROR", 0);
	define("STATUS_EMAIL_EXIST", -1);
	define("STATUS_UNKNOW", -2);
	require_once('connection.php');
	require_once('../model/subscriber.php');
	
	session_start();

	$name = mysql_escape_string(trim($_POST['name']));
	$email = mysql_escape_string(trim($_POST['email']));

	$user = new Subscriber($name, $email);

	$result = $user->save();
	switch($result){
		case STATUS_OK:
			$_SESSION['data'] = $_POST; //send session with name and email
			header("Location: /tm/index.php?show=success");
		break;
		case STATUS_EMAIL_ERROR:
			$_SESSION['error'] = "I don't belive that '{$email}' is your real email! Liar!";
			$_SESSION['data'] = $_POST;
			header("Location: /tm/index.php?show=input");		
		break;
		case STATUS_EMAIL_EXIST:
			$_SESSION['error'] = "Subscriber with your email is already subscribed!";
			$_SESSION['data'] = $_POST;
			header("Location: /tm/index.php?show=input");
		break;
		case STATUS_UNKNOW:
			$_SESSION['error'] = "Not able to subscribe you now. Please try again later!";
			$_SESSION['data'] = $_POST;
			header("Location: /tm/index.php?show=input");
		break;
	}
?>