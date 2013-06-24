<?
require_once('connection.php');
require_once('../model/subscriber.php');
require_once('../model/news.php');

$controller = new Controller($_GET);

class Controller{
	function __construct($get){
		$func = 'getNews';
		if (isset($get['f'])){
			if (in_array($get['f'], Api::$apis)){
				$func = $get['f'];	
			}
		}

		$api = new Api();
		header('content-type: application/json;charset=utf-8');	
		echo $api->$func();
	}
}

class Api{
	//Api's avaliable functions
	public static $apis = array('getNews', 'getSubscribers'); 
	
	//Get assoc array
	//Return pretty ajax with UTF-8 chars and well formed html tags
	private function toAjax($array){
		$json = json_encode($array);
		$json_text = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 
							function($matches) {
								return mb_convert_encoding(pack('H*', $matches[1]), 'UTF-8', 'UTF-16');
							},
							$json);
		$json_text =  str_replace("\\r\\n", "", $json_text);	
		$json_text = str_replace('\\"', '"', $json_text);
		$json_text = str_replace('\/', '/', $json_text);
		return $json_text;
	}

	//Returns pretty ajax with News;
	function getNews(){
		$news = new News();
		$news->get();
		$array = $news->toApi();
		$ajax = $this->toAjax($array);
		return $ajax;
	}

	//Returns pretty ajax with Subscribers
	function getSubscribers(){
		$subscribers = new Subscriber();
		$users = $subscribers->getAll();
		$array = array();
		foreach ($users as $user) {
			$array[] = $user->toApi();
		}

		$ajax = $this->toAjax($array);
		return $ajax;
	}
}

?>