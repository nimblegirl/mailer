<?
//table subscribers
class Subscriber{
	//varchar 40
	var $name; 
	//varchar 50
	var $email;
	//int pk
	var $id;

	function __construct($name = '', $email='', $id = 0){
		$this->name = $name;
		$this->email = $email;
		$this->id = $id;	
	}	

	function validate(){
		//$name is not empty and email is valid email value;
		return (trim($this->name) != "") && 
			   (filter_var($this->email, FILTER_VALIDATE_EMAIL));
	}

	function save(){
		$resCode = 0;						// $resCode = 0 as not validate
		if ($this->validate()){
			$query = "INSERT INTO `subscribers`(`email`, `name`) VALUES ('{$this->email}', '{$this->name}')";
			$resCode = mysql_query($query); // if success  -> $resCode = 1;
			if ($resCode == 0) {
				if (mysql_errno() == 1062){
					$resCode = -1;			// -1 to Duplicate email
				}else{
					$resCode = -2;			// -2 to other errors
				}
			}
		}
		return $resCode;
	}

		function getByNameEmail($name ,$email, $offset = 0 , $limit = 0){
		$subscribers = array();
		$query = "SELECT * FROM `subscribers` WHERE email LIKE '%{$email}%' AND name LIKE '%{$name}%'";
		if ($limit != 0){
			$query = $query." LIMIT {$limit} OFFSET {$offset}"; 
		}	
		$result= mysql_query($query);
		if ($result != null){	
			while ($temp = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    		$subscribers[] = new Subscriber($temp['name'], $temp['email'], $temp['id']);
			}
		}

		return $subscribers;
	}

	function getByEmail($email, $offset = 0 , $limit = 0){
		$subscribers = array();
		$query = "SELECT * FROM `subscribers` WHERE email LIKE '%{$email}%'";
		if ($limit != 0){
			$query = $query." LIMIT {$limit} OFFSET {$offset}"; 
		}	
		$result= mysql_query($query);
		if ($result != null){	
			while ($temp = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    		$subscribers[] = new Subscriber($temp['name'], $temp['email'], $temp['id']);
			}
		}	

		return $subscribers;
	}

	function getByName($name, $offset = 0, $limit =0){
		$subscribers = array();
		$query = "SELECT * FROM `subscribers` WHERE name LIKE '%{$name}%'";	
		if ($limit != 0){
			$query = $query." LIMIT {$limit} OFFSET {$offset}"; 
		}
		$result= mysql_query($query);
		if ($result != null){		
			while ($temp = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    		$subscribers[] = new Subscriber($temp['name'], $temp['email'], $temp['id']);
			}
		}

		return $subscribers;
	}	

	function getCount(){
		$res = mysql_query("SELECT COUNT(*) from `subscribers`");
		if ($res == null) {return 0;}
		$row = mysql_fetch_array($res);
		return $row[0];
	}

	function getCountEmail($email){
		$res = mysql_query("SELECT COUNT(*) from `subscribers` WHERE `email` LIKE '%{$email}%'");
		if ($res == null) {return 0;}
		$row = mysql_fetch_array($res);
		return $row[0];
	}

	function getCountName($name){
		$res = mysql_query("SELECT COUNT(*) from `subscribers` WHERE `name` LIKE '%{$name}%'");
		if ($res == null) {return 0;}
		$row = mysql_fetch_array($res);
		return $row[0];
	}

	function getCountNameEmail($name, $email){
		$res = mysql_query("SELECT COUNT(*) from `subscribers` WHERE `name` LIKE '%{$name}%' AND `email` LIKE '%{$email}%'");
		if ($res == null) {return 0;}
		$row = mysql_fetch_array($res);
		return $row[0];
	}			

	function getAll($offset = 0, $limit = 0){
		$subscribers = array();
		$query = "SELECT * FROM `subscribers`";
		if ($limit != 0){
			$query = $query." LIMIT {$limit} OFFSET {$offset}"; 
		}	
		$result= mysql_query($query);
		while ($temp = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		$subscribers[] = new Subscriber($temp['name'], $temp['email'], $temp['id']);
		}

		return $subscribers;
	}

	function toApi(){
		return array("id" => $this->id, "name" => $this->name, "email" => $this->email);
	}

}
?>