<?php
require_once('common.php');

// echo print_r( $json, true );
// exit;

echo "\nbgm.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// BGM 리스트 (bgm.txt)
foreach($json->api_mst_bgm as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_name;
	echo "\n";
}

echo "\nconst.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 상수 리스트 (const.txt)
foreach($json->api_mst_const as $s => $v){
	echo $s . "\t" . $v->api_int_value . "\t" . $v->api_string_value;
	echo "\n";
}

echo "\nfurniture.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 가구 리스트 (furniture.txt)
foreach($json->api_mst_furniture as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_type . "\t" . $s->api_no . "\t" . $s->api_title;
	echo "\t" . $s->api_rarity . "\t" . $s->api_price;
	echo "\t" . $s->api_saleflg . "\t" . $s->api_season;
	echo "\n";
}

echo "\nfurniture-graphic.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 가구 그래픽 리스트 (furniture-graphic.txt)
foreach($json->api_mst_furnituregraph as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_type . "\t" . $s->api_no;
	echo "\t" . $json->api_mst_furniture[$id-1]->api_title;
	echo "\t" . $s->api_filename . "\t" . $s->api_version;
	echo "\n";
}

echo "\nmaparea.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 해역 리스트 (maparea.txt)
foreach($json->api_mst_maparea as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_name;
	echo "\t" . $s->api_type;
	echo "\n";
}

echo "\nmapbgm.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 해역 BGM 리스트 (mapbgm.txt)
foreach($json->api_mst_mapbgm as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_maparea_id . "\t" . $s->api_no;
	echo "\t" . join(",", $s->api_map_bgm);
	echo "\t" . join(",", $s->api_boss_bgm);
	echo "\n";
}

echo "\nmapcell.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 해역 노드 리스트 (mapcell.txt)
foreach($json->api_mst_mapcell as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id;
	echo "\t" . $s->api_maparea_id . "\t" . $s->api_mapinfo_no . "\t" . $s->api_no;
	echo "\t" . $s->api_color_no;
	echo "\n";
}

echo "\nmapinfo.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 해역 세부 리스트 (mapinfo.txt)
foreach($json->api_mst_mapinfo as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_maparea_id . "\t" . $s->api_no;
	echo "\t" . $s->api_name;
	echo "\t" . $s->api_level;
	echo "\t" . $s->api_opetext;
	echo "\t" . join(",", $s->api_item);
	echo "\t" . $s->api_max_maphp;
	echo "\t" . $s->api_required_defeat_count;
	echo "\t" . join(",", $s->api_sally_flag);
	echo "\n";
}

echo "\nmission.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 원정 리스트 (mission.txt)
foreach($json->api_mst_mission as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_maparea_id;
	echo "\t" . $s->api_name;
	echo "\t" . $s->api_time;
	echo "\t" . $s->api_difficulty;
	echo "\t" . $s->api_use_fuel;
	echo "\t" . $s->api_use_bull;
	echo "\t" . join(",", $s->api_win_item1);
	echo "\t" . join(",", $s->api_win_item2);
	echo "\t" . $s->api_return_flag;
	echo "\n";
}

echo "\npayitem.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 구매아이템 리스트 (payitem.txt)
foreach($json->api_mst_payitem as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_type;
	echo "\t" . $s->api_name;
	echo "\t" . join(",", $s->api_item);
	echo "\t" . $s->api_price;
	echo "\t" . $s->api_description;
	echo "\n";
}

echo "\nship.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";


// Raw 함선 리스트 (ship.txt)
foreach($json->api_mst_ship as $s){
	$id = $s->api_id;
	$id = intval($id);

	// if( 	$id>500 ) continue;

	echo $id . "\t" . $s->api_sortno;

	echo "\t" . $s->api_name;
	echo "\t" . $s->api_yomi;

	echo "\t" . $s->api_stype;
	echo "\t" . $s->api_afterlv;
	echo "\t" . $s->api_aftershipid;

	echo "\t" . join(",", $s->api_taik);
	echo "\t" . join(",", $s->api_souk);
	echo "\t" . join(",", $s->api_houg);
	echo "\t" . join(",", $s->api_raig);
	echo "\t" . join(",", $s->api_tyku);
	echo "\t" . join(",", $s->api_luck);
	echo "\t" . $s->api_soku;
	echo "\t" . $s->api_leng;

	echo "\t" . $s->api_slot_num;
	echo "\t" . join(",", $s->api_maxeq);
	echo "\t" . $s->api_buildtime;
	echo "\t" . join(",", $s->api_broken);
	echo "\t" . join(",", $s->api_powup);
	echo "\t" . $s->api_backs;
	echo "\t" . $s->api_afterfuel;
	echo "\t" . $s->api_afterbull;
	echo "\t" . $s->api_fuel_max;
	echo "\t" . $s->api_bull_max;
	echo "\t" . $s->api_voicef;
	echo "\n";
}

echo "\nship-graphic.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 함선 그래픽 리스트 (ship-graphic.txt)
foreach($json->api_mst_shipgraph as $y){
	$b = $y->api_filename;

	$name = '';
	$id = intval($y->api_id);

	if($id != 0) $name = $out->ships2[$id]['name'];

	$f1 = file_exists(dirname(__FILE__).'/kcv/ships/'.$b.'.swf');
	$f2 = file_exists(dirname(__FILE__).'/kcv/ships/'.$b.'/');


	// For name debug (all)
	if(true){
		// if( $id==0 ) continue;
		// echo $id . ':"' . $name . '",';
		// echo $y->api_id . ':"' . $b . '", - ' . $name;
		echo $y->api_id . "\t" . $name . "\t" . $b . "\t" . ($f1&&$f2 ? "" : "*404") . "\t";
		echo "\n";
	}

	// For name debug (not exists)
	if(false){
		echo $x . ':"' . $name . '",';
		echo $b;
		echo "\n";
	}

	if(false){
		if( !$f1 ) echo 'wget "http://203.104.209.102/kcs/resources/swf/ships/' . $b . '.swf" -O "' . dirname(__FILE__) . '/kcv/ships/' . $b . '.swf"' . "\n";
		if( !$f2 ) echo 'java -jar ../ffdec/ffdec.jar -format image:png -export image "' . dirname(__FILE__) . '/kcv/ships/' . $b . '" "' . dirname(__FILE__) . '/kcv/ships/' . $b . '.swf"' . "\n";
	}
}

echo "\nshiptype.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 함선 타입 리스트 (shiptype.txt)
foreach($json->api_mst_stype as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_name . "\t" . $s->api_scnt . "\t" . $s->api_kcnt;
	echo "\n";
}

echo "\nship-upgrade.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 함선 개장 리스트 (ship-upgrade.txt)
foreach($json->api_mst_shipupgrade as $s){
	$id = $s->api_id;
	$id = intval($id);
	$id2 = intval($s->api_current_ship_id);
	$id3 = intval($s->api_original_ship_id);

	$name = linq_where($json->api_mst_ship, function($x) use ($id) {
		return $x->api_id==$id;
	});
	$name1 = array_pop($name)->api_name;

	$name = linq_where($json->api_mst_ship, function($x) use ($id2) {
		return $x->api_id==$id2;
	});
	$name2 = array_pop($name)->api_name;

	$name = linq_where($json->api_mst_ship, function($x) use ($id3) {
		return $x->api_id==$id3;
	});
	$name3 = array_pop($name)->api_name;

	echo $id . "\t" . $s->api_current_ship_id . "\t" . $s->api_original_ship_id;
	echo "\t" . $name1 . "\t" . $name2 . "\t" . $name3;
	echo "\t". $s->api_upgrade_type;
	echo "\t". $s->api_upgrade_level;
	echo "\t". $s->api_drawing_count;
	echo "\t". $s->api_catapult_count;
	echo "\t". $s->api_sortno;
	echo "\n";
}

echo "\nslotitem.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// Raw 장비 리스트 (slotitem.txt)
foreach($json->api_mst_slotitem as $s){
	$id = $s->api_id;
	$id = intval($id);

	// if( 	$id>500 ) continue;

	echo $id . "\t" . $s->api_name;

	echo "\t" . $s->api_type[0] . "," . $s->api_type[1] . "," . $s->api_type[2] . "," . $s->api_type[3] . "," . $s->api_type[4];
	echo "\t" . $s->api_taik;
	echo "\t" . $s->api_souk;
	echo "\t" . $s->api_houg;
	echo "\t" . $s->api_raig;
	echo "\t" . $s->api_soku;
	echo "\t" . $s->api_baku;
	echo "\t" . $s->api_tyku;
	echo "\t" . $s->api_tais;
	echo "\t" . $s->api_atap;
	echo "\t" . $s->api_houm;
	echo "\t" . $s->api_raim;
	echo "\t" . $s->api_houk;
	echo "\t" . $s->api_raik;
	echo "\t" . $s->api_bakk;
	echo "\t" . $s->api_saku;
	echo "\t" . $s->api_sakb;
	echo "\t" . $s->api_luck;
	echo "\t" . $s->api_leng;
	echo "\t" . $s->api_rare;
	echo "\t" . $s->api_broken[0] . "," . $s->api_broken[1] . "," . $s->api_broken[2] . "," . $s->api_broken[3];
	echo "\t" . $s->api_usebull;
	echo "\t" . $s->api_cost;
	echo "\t" . $s->api_distance;
	echo "\n";
}

echo "\nslotitem-type.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 장비 타입 리스트 (slotitem-type.txt)
foreach($json->api_mst_slotitem_equiptype as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_name . "\t" . $s->api_show_flg;
	echo "\n";
}

echo "\nuseitem.txt -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";

// 사용아이템 리스트 (useitem.txt)
foreach($json->api_mst_useitem as $s){
	$id = $s->api_id;
	$id = intval($id);

	echo $id . "\t" . $s->api_usetype . "\t" . $s->api_category;
	echo "\t" . $s->api_name;
	echo "\t" . $s->api_price;
	echo "\n";
}
