<?php
function_exists("date_default_timezone_set")?date_default_timezone_set("Asia/Shanghai"):"";
header("Content-Type: text/html; charset=utf-8");//文件本身编码也需要是utf-8

ini_set("display_errors","On");//调试
error_reporting(E_ALL);



$api_config_dir = dirname(__FILE__);

//$test = require_once($api_config_dir . '/../config/app.php');
$test = require_once($api_config_dir . '/test_data.php');
echoDebug($test);












function echoDebug($data, $exit = 0){	
	echo '<pre>======<br/>';	
	print_r($data);
	echo '<br/>======</pre>';
	if($exit == 1){
		exit;
	}		
}