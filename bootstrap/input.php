<html>
<body>

name <?php echo $_GET["fname"]; ?><br>
email <?php echo $_GET["email"]; ?>

<form id='register' action='register.php' method='post'
    accept-charset='UTF-8'>
<fieldset >
	<legend>Register</legend>
		<input type='hidden' name='submitted' id='submitted' value='1'/>
		<label for='name' >Your Full Name*: </label>
		<input type='text' name='name' id='name' maxlength="50" />
		<label for='email' >Email Address*:</label>
		<input type='text' name='email' id='email' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
 
</fieldset>

</form>
</body>
</html>