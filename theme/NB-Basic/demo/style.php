<?php
include_once('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
    alert('접근권한이 없습니다.');
}

// 데모설정
$dset['index'] = 'basic';
$dset['page'] = 13;
$dset['title'] = 'none';

switch($demo) {
	case '10' : 
		$dset['style'] = 1;
		break;

	case '11' : 
		$dset['style'] = '';
		break;

	case '12' : 
		$dset['sticky'] = 1;
		break;

	case '13' : 
		$dset['no_res'] = 1;
		break;
}

$g5['title'] = '스타일 데모';

// Page Loader 때문에 먼저 실행함
include_once(G5_THEME_PATH.'/head.sub.php');

$is_wing = false;

include_once(G5_THEME_PATH.'/_loader.php');
include_once('../head.php');

// 파일경로 체크
$is_index = true;
$nt_index_path = G5_THEME_PATH.'/index'; 
$nt_index_url = G5_THEME_URL.'/index';

include_once($nt_index_path.'/'.$tset['index'].'.php');
include_once('../tail.php');
?>