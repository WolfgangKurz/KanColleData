<?php
date_default_timezone_set('Asia/Tokyo');

function linq_where($array, $predicate){
	$output = array();
	foreach($array as $key=>$item){
		if( call_user_func($predicate, $item)!==false )
			$output[$key] = $item;
	}
	return $output;
}
function linq_kwhere($array, $predicate){
	$output = array();
	foreach($array as $key=>$item){
		if( call_user_func($predicate, $key, $item)!==false )
			$output[$key] = $item;
	}
	return $output;
}
function linq_select($array, $iterator){
	$output = array();
	foreach($array as $key=>$item){
		$output[$key] = call_user_func($iterator, $item);
	}
	return $output;
}
function linq_sum($array, $iterator=null){
	if( $iterator===null )
		$iterator = function($x){ return floatval($x); };

	$output = 0;
	foreach($array as $item)
		$output += call_user_func($iterator, $item);

	return $output;
}
function linq_foreach($array, $iterator){
	foreach($array as $item)
		call_user_func($iterator, $item);
}
function linq_sort($array, $iterator=null){
	$output = $array;

	if( $iterator===null ){
		asort($output);
	}else{
		uasort($output, function($a, $b) use ($iterator){
			return (call_user_func($iterator, $a) < call_user_func($iterator, $b)) ? -1 : 1;
		});
	}
	return $output;
}
function linq_sort2($array, $iterator=null){
	$output = $array;

	if( $iterator===null ){
		asort($output);
	}else{
		uasort($output, function($a, $b) use ($iterator){
			return call_user_func($iterator, $a, $b);
		});
	}
	return $output;
}
function linq_count($array, $iterator=null){
	if( $iterator===null ) return count($array);

	$cnt = 0;
	foreach($array as $x){
		if(call_user_func($iterator, $x)) $cnt ++;
	}
	return $cnt;
}
function linq_count2($array, $iterator=null){
	if( $iterator===null ) return count($array);

	$cnt = 0;
	foreach($array as $x=>$y){
		if(call_user_func($iterator, $x, $y)) $cnt ++;
	}
	return $cnt;
}
