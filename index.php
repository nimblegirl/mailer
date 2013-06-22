<?
	session_start();
	require_once('/app/model/subscriber.php');
	$view = '';
	if (isset($_GET['show'])) {
		$view = 'app/show/'.$_GET['show'].'.php';
		if (!file_exists($view)){
			$view = 'app/show/news.php';
			$_GET['show'] = 'news';	
		}
	}else{
		$view = 'app/show/news.php';
		$_GET['show'] = 'news';
	}
?>
<html>
<head>
    <title>Membership</title>
    <meta charset='utf-8'>
    <script type="text/javascript" src="js/highlight/shCore.js"></script>
    <script type="text/javascript" src="js/highlight/shBrushJScript.js"></script>
    <script type="text/javascript" src="js/highlight/shBrushPHP.js"></script>
    <link href="css/readable.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/highlight/shCore.css" rel="stylesheet" media="screen">
    <link href="css/highlight/shCoreFadeToGrey.css" rel="stylesheet" media="screen">
    <link href="css/highlight/shThemeFadeToGrey.css" rel="stylesheet" media="screen">

    <script type="text/javascript">
     SyntaxHighlighter.all()
	</script>
</head>
<body>
	<div class="container">
		<div class="page-header">
 			<h1 align="center" class="colour">News Sending Service<small></small></h1>
		</div>
		<div class="row">
			<div class="span3">
				<div class="sidebar-nav well">
		            <ul class="nav nav-list">
		              <li class="nav-header">Navigate</li>
		              <li <? if(isset($_GET['show']) && $_GET['show']=='view'){echo'class="active"';}?>><a href="index.php?show=view">Subscribers</a></li>
		              <li <? if(isset($_GET['show']) && $_GET['show']=='news'){echo'class="active"';}?>><a href="index.php?show=news">News</a></li>
		              <li <? if(isset($_GET['show']) && $_GET['show']=='input'){echo'class="active"';}?>><a href="index.php?show=input">Add subscriber</a></li>
		              <li <? if(isset($_GET['show']) && $_GET['show']=='api'){echo'class="active"';}?>><a href="index.php?show=api">Look at API</a></li>
		            </ul>
		  		</div>	
			</div>				
			<div class="span8 well">
				<?
					include($view);
				?>
			</div>
		</div>
	</div>
</body>
</html>
<?
	session_destroy();
?>