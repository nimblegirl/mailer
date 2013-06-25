<form class="hero-unit" id='register' action='app/controller/reg.php' method='post'  accept-charset='UTF-8'>
	<fieldset >
		<legend>Subscribition</legend>
		<p class="label label-important"><?if (isset($_SESSION['error'])){ echo $_SESSION['error'];}?></p>
		<label for='name' >Your Full Name: </label>
		<input type='text' name='name' id='name' maxlength="50" value="<?if (isset($_SESSION['data']['name'])){echo $_SESSION['data']['name'];}?>"/><br/>
		<label for='email' >Email Address:</label>
		<input type='text' name='email' id='email' maxlength="50" value="<?if (isset($_SESSION['data']['email'])){echo $_SESSION['data']['email'];}?>"/><br/>
		<input class="btn btn-success" type='submit' name='submit' value='Subscribe!' />
	</fieldset>
</form>  			