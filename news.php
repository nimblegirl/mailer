<?
	require_once('/app/controller/connection.php');
	require_once('/app/model/news.php');
	$news = new News();
	$news->get();
?>
<a class='btn btn-info btn-small' href='index.php?show=news_edit'><i class="icon-pencil icon-white"></i> Edit</a>
<h3><? echo $news->title;?></h3>
<p><? echo $news->text;?></p>
<div class="news_bottom">
	<a class='btn btn-small btn-success pull-right' href='index.php?show=input'>Subscribe me!</a>
</div>