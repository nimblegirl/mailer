<?
	require_once('/app/controller/connection.php');
	require_once('/app/model/news.php');
	$news = new News();
	$news->get();
?>
<form method="POST" action="app/controller/news.php">
	<input input="input" type="text" name="title" placeholder="Title" value="<?echo $news->title;?>"/>
	<textarea placeholder="Write something here" name="text" rows="10" style="width:90%;"><?echo $news->text;?></textarea>
	<p><input class="btn btn-success" name="submit" type="submit" value="Save"/></p>	
</form>