<?php

// mendapatakan usia dari input berupada date seperti 11/13/1995
function get_age($input){
	$from = new DateTime($input);
	$to = new DateTime('today');
	return $from->diff($to)->y;
}

// membuat konversi date ke mysql tipe DATETIME
function make_sql_date_time($input)
{
	$date = new DateTime($input);
	return $date->format('Y-m-d H:i:s');
}

// membuat konversi date sql ke date biasa
function sql_to_date($input)
{
	$date = new DateTime($input);
	return $date->format('d-m-Y');	
}

// from Ghanshyam Katriya(anshkatriya@gmail) in http://php.net/manual/en/function.array-unique.php
function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

// making dir with permission
function makeDir($path, $permission)
{
	if (!is_dir($path)) {
		mkdir($path, $permission, TRUE);	
	}else{
		echo "directory exist!";
	}
}

function limitWords($string, $limit, $href)
{
	$stringFilter = strip_tags($string);
	$stringOrig = $string;
	
	
	if (strlen($stringFilter) > $limit) {
    	$stringCut = substr($stringFilter, 0, $limit);
    	$doc = new DOMDocument();
    	$doc->loadHTML($stringCut);
    	$stringOrig = $doc->saveHTML();
	}

	if (count($stringOrig) < $limit){
		return $stringOrig;
	}

	return $stringOrig."... <a href=". $href . "> Read More</a>";
}

function getTimeAgoStyle($timestamp){

		$about = 'about ';
		$just = 'just now';
		$sec = ' seconds ago';
		$a_min = 'a minute ago';
		$mins = ' minutes ago';
		$a_hour = 'an hour ago';
		$hours = ' hours ago';
		$a_day = 'a day ago';
		$days = ' days ago';
		$a_week = 'a week ago';
		$weeks = ' weeks ago';
		$a_month = 'a month ago';
		$months = ' months ago';
		$a_year = 'a year';
		$years = ' years ago';

		$_minute = 60; // 60 = 1 minute
		$_hour = 3600; // 3600 = 1 hours
		$_day = 86400; // 86400 = 3600 (1 hours) * 24 = 24 hours
		$_week = 604800; // 604800 = 86400 (24 hours or a day) * 7 = a week
		$_month = 2592000; // 2592000 = 3600 * 24 * 30 = a month
		$_year = 31104000; // 31104000 = 2592000 (a month) * 12 = a year
		$_3years = 93312000; // 3 years
		
		$time = time() - $timestamp; // mendapatkan selisih waktu

		/*
		jika variabel $time lebih kecil dari $_minute
		maka akan dihitung sebagai satuan sekon
		*/

		if ($time < $_minute){

			return ($time > 1) ?  $about . $time . $sec : $just;

		} 

		/*
		jika variabel $time lebih kecil dari $_hour
		maka akan dihitung sebagai satuan menit
		*/

		elseif ($time < $_hour){

			$t_time = round($time/60);
			return ($t_time > 1) ? $about . $t_time . $mins : $a_min;
			
		} 

		/*
		jika variabel $time lebih kecil dari $_day
		maka akan dihitung sebagai satuan jam
		*/

		elseif ($time < $_day) {
			
			$t_time = round($time/3600);
			return ($t_time > 1) ? $about . $t_time . $hours : $a_hour;

		}

		/*
		jika variabel $time lebih kecil dari $_week
		maka akan dihitung sebagai satuan hari
		*/

		elseif ($time > $_day) {

			return date("j M Y h:i A", $timestamp);

		}

	}

// inspired from https://gist.github.com/faisalman/845309
function setRupiahFormat($raw)
{
	return "Rp. " . strrev(implode('.',str_split(strrev(strval($raw)),3)));
}

function debug($value='')
{
	var_dump($value);
}

function removeWhiteSpace($string)
{
	return preg_replace('/\s+/','', $string);
}

?>