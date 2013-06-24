<?
//table settings in tm db
class News{
	var $title;
	var $text;

	function __construct($title = '', $text=''){
		$this->title = $title;
		$this->text = $text;
	}	

	function save(){
		$query = "UPDATE `settings` SET `title`='{$this->title}', `text`='{$this->text}' WHERE `id`=1";
		$resCode = mysql_query($query); // if success  -> $resCode = 1;
		if ($resCode != 1) {
			$resCode = -1;
		}
		return $resCode;
	}
	function get(){
		$query = "SELECT * FROM `settings` LIMIT 1";
		$result = mysql_fetch_assoc(mysql_query($query));
		$this->title =$result['title'];
		$this->text = $result['text'];
	}

	function toApi(){
		return array("title" => $this->title, "text" => $this->text);
	}
}
?>
