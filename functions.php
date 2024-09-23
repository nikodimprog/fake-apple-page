<?php
	

	function genRandString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	function getLanguage() {
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	    if ( file_exists("languages/{$lang}.php") ) {
	    	return $lang;
	    } else {
	    	return "en";
	    }
	}

	function getIp() {
	    foreach (array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_X_CLUSTER_CLIENT_IP','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR') as $key)
	   	{
	       if (array_key_exists($key, $_SERVER) === true)
	       {
	            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
	                $IPaddress = trim($IPaddress);
	                if (filter_var($IPaddress,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)!== false) 
	                {
	                   return $IPaddress;
	                }
	            }
	        }
	    }
	}

	function clientData($ss) {
	   	$json = @file_get_contents("http://ip-api.com/json/".getIp());
	    if ($json == false) {
	        return "127.0.0.1";
	    }
	   	$code = json_decode($json);
	    switch ($ss) {
	        case "code":
	            $str = $code->countryCode;
	            break;
	        case "country":
	            $str = $code->country;
	            break;
	        case "city":
	            $str = $code->city;
	            break;
	        case "state":
	            $str = $code->regionName;
	            break;
	        case "zip":
	            $str = $code->zip;
	            break;
	        case "timezone":
	            $str = $code->timezone;
	            break;
	        default:
	            $str = $code->query;
	    }
	   	return $str;
	}

	function getOs() {
	    $os_platform = "Unknown OS";
	    $all       =   array(
	                            '/windows nt 10/i'     =>  'Windows 10',
	                            '/windows nt 6.3/i'     =>  'Windows 8.1',
	                            '/windows nt 6.2/i'     =>  'Windows 8',
	                            '/windows nt 6.1/i'     =>  'Windows 7',
	                            '/windows nt 6.0/i'     =>  'Windows Vista',
	                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                            '/windows nt 5.1/i'     =>  'Windows XP',
	                            '/windows xp/i'         =>  'Windows XP',
	                            '/windows nt 5.0/i'     =>  'Windows 2000',
	                            '/windows me/i'         =>  'Windows ME',
	                            '/win98/i'              =>  'Windows 98',
	                            '/win95/i'              =>  'Windows 95',
	                            '/win16/i'              =>  'Windows 3.11',
	                            '/macintosh|mac os x/i' =>  'Mac OS X',
	                            '/mac_powerpc/i'        =>  'Mac OS 9',
	                            '/linux/i'              =>  'Linux',
	                            '/ubuntu/i'             =>  'Ubuntu',
	                            '/iphone/i'             =>  'iPhone',
	                            '/ipod/i'               =>  'iPod',
	                            '/ipad/i'               =>  'iPad',
	                            '/android/i'            =>  'Android',
	                            '/blackberry/i'         =>  'BlackBerry',
	                            '/webos/i'              =>  'Mobile');
	    foreach ($all as $regex => $value) { 
	        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
	            $os_platform = $value;
	        }
	    }   
	    return $os_platform;
	}

	function getBrowser() {
	    $browser = "Unknown Browser";
	    $all  =   array(
	                            '/msie/i'       =>  'Internet Explorer',
	                            '/firefox/i'    =>  'Firefox',
	                            '/safari/i'     =>  'Safari',
	                            '/chrome/i'     =>  'Chrome',
	                            '/edge/i'       =>  'Edge',
	                            '/opera/i'      =>  'Opera',
	                            '/netscape/i'   =>  'Netscape',
	                            '/maxthon/i'    =>  'Maxthon',
	                            '/konqueror/i'  =>  'Konqueror',
	                            '/mobile/i'     =>  'Handheld Browser');
	    foreach ($all as $regex => $value) { 
	        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
	            $browser = $value;
	        }
	    }
	    return $browser;
	}

	function getDateNow() {
		date_default_timezone_set('GMT');
		return date("d/m/Y h:i:sa");
	}

?>