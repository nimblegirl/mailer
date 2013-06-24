<?
	require_once('app/controller/connection.php');
	require_once('app/model/subscriber.php');
	require_once('app/controller/pagination.php');
	$nameSearch = '';
	$emailSearch = '';
	if (isset($_GET['name'])){
		$nameSearch = htmlspecialchars($_GET['name']);
	}
	if (isset($_GET['email'])){
		$emailSearch = htmlspecialchars($_GET['email']); 
	}
	// for pagination
	$page = (isset($_GET['p'])) ? $_GET['p'] :1;
	$pageSize = 5;
	$offset = ($page-1) * $pageSize; //if wrong -  we do not have data

	$subscribers = new Subscriber();
	//if searching with both params
	if ($nameSearch != '' && $emailSearch != ''){
		$count = $subscribers->getCountNameEmail($nameSearch, $emailSearch);
		$subscribers = $subscribers->getByNameEmail($nameSearch, $emailSearch, $offset, $pageSize);
	}
	//name only
	if ($nameSearch != '' && $emailSearch == ''){
		$count = $subscribers->getCountName($nameSearch);
		$subscribers = $subscribers->getByName($nameSearch, $offset, $pageSize);
	}
	//email only
	if ($emailSearch !='' && $nameSearch==''){
		$count = $subscribers->getCountEmail($emailSearch);
		$subscribers = $subscribers->getByEmail($emailSearch, $offset, $pageSize);
	}
	//empty search
	if ($nameSearch == '' && $emailSearch == ''){
		$count = $subscribers->getCount();
		$subscribers = $subscribers->getAll($offset, $pageSize);
	}

	$pagination = new Pagination($count, $pageSize, "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	if (($page < 1) || ($page > $pagination->pagesCount)){
		$page = 1;
	}	

	$pagination->setCurrent($page);
?>
<form class="form-search" method="get" action='app/controller/search.php'>
	<input class="search-query" type="text" name="name" placeholder="Name to search.."/>
	 OR 
	<input class="search-query" type="text" name="email" placeholder="Email to search.."/>
	<input type="hidden" name="path" value='<?echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>'/>
	<input type="submit" class="btn btn-small" value="Search"/>
</form>
<?  
	echo $pagination->render();
?>
<span class="label label-info">Subscribers: <?echo $count;?></span>
<? if (isset($_GET['name'])){
	echo "<span class='label label-warning'>with name: ";
	echo $nameSearch;
	echo "</span> ";
	}

if (isset($_GET['email'])){
	echo "<span class='label label-warning'>email: ";
	echo $emailSearch;
	echo "</span>";
	}
	?>	
<table class="table table-hover ">
	<thead>
		<tr>
			<th>
				#
			</th>
			<th>
				Name
			</th>
			<th>
				Email
			</th>												
		</tr>
	</thead>
	<tbody>
		<?
			foreach ($subscribers as $user) {
				echo "<tr>";
					echo "<td>";
					echo $user->id;
					echo "</td>";
					echo "<td>";
					echo $user->name;
					echo "</td>";
					echo "<td>";
					echo "<a href='mailto:{$user->email}'>{$user->email}</a>"; 
					echo "</td>";																
				echo "</tr>";
			}
		?>
	</tbody>
</table>
<?
	echo $pagination->render();
?>		
