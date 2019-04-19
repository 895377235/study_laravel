<?php
function_exists("date_default_timezone_set")?date_default_timezone_set("Asia/Shanghai"):"";
header("Content-Type: text/html; charset=utf-8");//文件本身编码也需要是utf-8

ini_set("display_errors","On");//调试
error_reporting(E_ALL);


function echoDebug($data, $exit = 0){	
	echo '<pre>======<br/>';	
	print_r($data);
	echo '<br/>======</pre>';
	if($exit == 1){
		exit;
	}		
}


define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application.  We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. 
|
*/

require __DIR__.'/../vendor/autoload.php';

//echoDebug(__DIR__); //等价于dirname(__FILE__) 无后面斜杠



/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';



/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$api_config_dir = dirname(__FILE__);

//$test = require_once($api_config_dir . '/../config/view.php');
//echoDebug($test);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);


