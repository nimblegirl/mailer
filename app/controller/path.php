<?//php
class Path{
	// $url - строка http://....php?params.. параметрами
	// $varname - переменная которую заменяем
 	// $value если NULL - убираем переменную совсем	
	// $clean превращать ли ?one=&two= 
	static function replaceVar($url,$varname,$value = NULL,$clean = TRUE)
   	{              // в ?one&two 
	    
	    // Версия функции "substitue get parameter" без регулярных выражений
	    
	    if (is_array($varname)) {
	        foreach ($varname as $i => $n) {
	            $v = (is_array($value))
	                 ? ( isset($value[$i]) ? $value[$i] : NULL ) 
	                 : $value;
	            $url = sgp($url, $n, $v, $clean);
	        }
	        return $url;
	    }
	    
	    $urlinfo = parse_url($url);
	    
	    $get = (isset($urlinfo['query']))
	           ? $urlinfo['query']
	           : '';
	    
	    parse_str($get, $vars);
	    
	    if (!is_null($value))        // одновременно переписываем переменную
	        $vars[$varname] = $value; // либо добавляем новую
	    else 
	        unset($vars[$varname]); // убираем переменную совсем
	        
	    $new_get = http_build_query($vars);
	    
	    if ($clean) 
	        $new_get = preg_replace( // str_replace() выигрывает 
	                '/=(?=&|\z)/',     // в данном случае
	                '',                // всего на 20%
	                $new_get
	            );
	    
	    $result_url =   (isset($urlinfo['scheme']) ? "$urlinfo[scheme]://" : '')
	                  . (isset($urlinfo['host']) ? "$urlinfo[host]" : '')
	                  . (isset($urlinfo['path']) ? "$urlinfo[path]" : '')
	                  . ( ($new_get) ? "?$new_get" : '')
	                  . (isset($urlinfo['fragment']) ? "#$urlinfo[fragment]" : '')
	                  ;
	    return $result_url;
	}

}
?>