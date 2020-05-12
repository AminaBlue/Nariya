<?php
include_once('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
    alert('접근권한이 없습니다.');
}

$g5['title'] = '사이트 설정';
include_once('../head.sub.php');

// 페이지 설정
$tset['page_title'] = '<i class="fa fa-desktop"></i> 사이트 설정';
$tset['page_desc'] = '사이트 기본 레이아웃 및 스타일을 설정합니다.';
$tset['page'] = 12;

include_once('../head.php');

// PC 설정값
$pc = na_file_var_load(G5_THEME_PATH.'/storage/theme-bbs-pc.php');

// 모바일 설정값
$mo = na_file_var_load(G5_THEME_PATH.'/storage/theme-bbs-mo.php');

// 모드
$mode = 'site';

// 모달 내 모달 체크
$is_modal_win = false;

// 좌우 페딩값 설정
$px_css = ' px-3 px-sm-0';

$action_url = './site_update.php';
?>
<style>
	#fsetup .list-group-item {
		padding-left:0;
		padding-right:0;
	}
</style>
<form id="fsetup" name="fsetup" method="post" action="<?php echo $action_url ?>" class="f-de font-weight-normal">
<?php include_once(NA_THEME_ADMIN_PATH.'/setup_form.php'); ?>
</form>
<?php
include_once('../tail.php');
?>