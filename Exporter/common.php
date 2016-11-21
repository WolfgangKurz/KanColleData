<?php
require_once('linq.php');

$src = file_get_contents('api_start2');

$dec = '';
$x = '';
for($i=0; $i<strlen($src); $i++){
	if( ord($src[$i])==13 ){
		$len = hexdec($x);
		if($len==0) break;
		$x = '';
		$dec .= substr($src, $i+2, $len);
		$i += $len + 1 + 2;
		continue;
	}else if( ord($src[$i])==10 ){
		$len = hexdec($x);
		if($len==0) break;
		$x = '';
		$dec .= substr($src, $i + 1, $len);
		$i += $len + 1;
		continue;
	}
	$x .= $src[$i];
}
$src = gzdecode($dec);
$src = substr($src, 7);

header('Content-Type: text/plain; charset=UTF-8');

$json = json_decode($src);
$json = $json->api_data;
