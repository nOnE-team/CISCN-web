<?php
error_reporting(0);
highlight_file(__FILE__);
	if($_SERVER['REMOTE_ADDR'] === '127.0.0.1'){
		$content = file_get_contents('php://filter/read=convert.base64-encode/resource=file:///var/www/html/excel.php');
		file_get_contents('http://'.$_GET['ip'].'/?'.$content);
	}
	else{
		die('only for localhost');
	}
?>
