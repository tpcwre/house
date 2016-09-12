<?php
	date_default_timezone_get('PRC');
	define('APP_NAME','House');			//-- 定义应用文件夹名
//	define('APP_PATH','./House/');			//-- 定义应用路径
//	define('BIND_MODULE','Admin');
	define('APP_DEBUG',true);			//-- 开启调试模式

	function vardump($arr){
		echo '<pre>';
			var_dump($arr);
		echo '</pre>';

	}

	require "../ThinkPHP/ThinkPHP.php";
