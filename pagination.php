<?
require_once('app/controller/path.php');
class Pagination{
	var $adress;
	var $pagesCount;
	var $currentPage;

	function __construct($count, $pageSize, $adress){
		$this->pagesCount = 0;
		if ($count % $pageSize == 0){
			$this->pagesCount = $count / $pageSize;
		}else{
			$this->pagesCount = $count / $pageSize +1;
		}
		$this->adress = $adress;
	}	

	function setCurrent($pageId){
		$this->currentPage = $pageId;
	}

	function render(){
		$path = $this->adress;
		$PathMaker = new Path();
		if ($this->pagesCount < 2){
			return "";
		}
		$paging = '<div class="pagination">';
  		$paging .= '<ul>';
  		if ($this->pagesCount > 7){
  			$btnCount = 3;
  			$start = $this->currentPage - $btnCount;
  			$end = $this->currentPage + $btnCount;
  			if ($start < 1) { $start = 1;}
  			if ($end > $this->pagesCount){ $end = $this->pagesCount;}
  			if ($start >= $btnCount){
  				$paging .= $this->addPage($path, 1, "First");
  			}
  			for ($i=$start; $i <= $end; $i++) { 
				$paging.= $this->addPage($path, $i, $i);	
			}
  			if ($end <=  $this->pagesCount - $btnCount+1){
  				$paging .= $this->addPage($path, $this->pagesCount, "Last");
  			}			
  			
  		}else{
			for ($i=1; $i <= $this->pagesCount; $i++) { 
				$paging.= $this->addPage($path, $i, $i);	
			}
		}
		$paging .= "</ul></div>";

		return $paging;
	}

	function addPage($path, $i, $name){
		$PathMaker = new Path();
		$page = "<li";
		if($i == $this->currentPage){
			$page .= " class='active'";
		}
		$page .= ">";	
		$path = $PathMaker->replaceVar($path, 'p', $i, true);	  		
		$page .= "<a href='{$path}'>{$name}</a>";
		$page .= "</li>";
		return $page;
	}
}

?>