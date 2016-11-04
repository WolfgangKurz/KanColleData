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

$stype_preset = array(
	1 => '해방함',
	2 => '구축함',
	3 => '경순양함',
	4 => '중뇌장순양함',
	5 => '중순양함',
	6 => '항공순양함',
	7 => '경공모',
	8 => '전함',
	9 => '전함',
	10 => '항공전함',
	11 => '정규항모',
	12 => '초노급전함',
	13 => '잠수함',
	14 => '잠수모항',
	15 => '보급선',
	16 => '수상기모함',
	17 => '양륙함',
	18 => '장갑항모',
	19 => '공작함',
	20 => '잠수모함',
	21 => '연습순양함',
	22 => '보급선',
);
$stype_preset = array(
	1 => 'Escort Ship',
	2 => 'Destroyer',
	3 => 'Light Cruiser',
	4 => 'Torpedo Cruiser',
	5 => 'Heavy Cruiser',
	6 => 'Aircraft Cruiser',
	7 => 'Light Aircraft Carrier',
	8 => 'Battleship',
	9 => 'Battleship',
	10 => 'Aviation Battleship',
	11 => 'Aircraft Carrier',
	12 => 'Super Dreadnought',
	13 => 'Submarine',
	14 => 'Aircraft Carrier Submarine',
	15 => 'Fleet Oiler',
	16 => 'Seaplane Carrier',
	17 => 'Amphibious Assault Ship',
	18 => 'Armored Aircraft Carrier',
	19 => 'Repair Ship',
	20 => 'Submarine Tender',
	21 => 'Training Cruiser',
	22 => 'Fleet Oiler',
);

$json = json_decode($src);
$json = $json->api_data;

$out = new stdClass();
$out->ships = array();
$out->ships2 = array();
$out->stype = array();

$types = array();
foreach($json->api_mst_stype as $type){
	$types[ intval($type->api_id) ] = $stype_preset[ $type->api_id ];
}
$out->stype = $types;

foreach($json->api_mst_ship as $ship){
	if( strlen($ship->api_sortno)<=0 ) continue;

	$out->ships[ intval($ship->api_sortno) ] = array(
		'name'=>$ship->api_name,
		'yomi'=>$ship->api_yomi,
		'type'=>intval($ship->api_stype),
		'x'=>$ship
	);
}
foreach($json->api_mst_ship as $ship){
	$out->ships2[ intval($ship->api_id) ] = array(
		'name'=>$ship->api_name,
		'yomi'=>$ship->api_yomi,
		'type'=>intval($ship->api_stype),
		'x'=>$ship
	);
}
