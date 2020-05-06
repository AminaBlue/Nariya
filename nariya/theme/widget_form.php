<?php
include_once('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
    alert_close('접근권한이 없습니다.');
}

$wname = na_fid($wname);
$wid = na_fid($wid);

if(!$wname || !$wid)
    alert_close('값이 제대로 넘어오지 않았습니다.');

// 경로
$widget_path = G5_THEME_PATH.'/widget/'.$wname;

if(!file_exists($widget_path.'/widget.setup.php'))
    alert_close('위젯 설정을 할 수 없는 위젯입니다.');

include_once(NA_PATH.'/lib/option.lib.php');

$widget_url = G5_THEME_URL.'/widget/'.$wname;

// 설정값아이디
$id = $wname.'-'.$wid;

// 기본 설정값
$wset = na_file_var_load(G5_THEME_PATH.'/storage/widget/widget-'.$id.'-pc.php');

// 모바일 설정값
$mo = na_file_var_load(G5_THEME_PATH.'/storage/widget/widget-'.$id.'-mo.php');

$g5['title'] = '위젯 설정';
include_once(G5_THEME_PATH.'/head.sub.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.NA_URL.'/css/modal.css">', 0);

// 모달 내 모달
$is_modal_win = true;

// 아이디 넘버링용
$idn = 1;

// Loader
include_once(NA_PATH.'/theme/loader.php');
?>

<div id="topNav" class="bg-primary text-white">
	<div class="p-3">
		<button type="button" class="close close-setup" aria-label="Close">
			<span aria-hidden="true" class="text-white">&times;</span>
		</button>
		<h5>ID : <?php echo $id;?></h5>
	</div>
</div>

<div id="topHeight"></div>

<form id="fsetup" name="fsetup" action="./widget_update.php" method="post">
<input type="hidden" name="wname" value="<?php echo urlencode($wname) ?>">
<input type="hidden" name="wid" value="<?php echo urlencode($wid) ?>">
<input type="hidden" name="opt" value="<?php echo urlencode($opt) ?>">

<ul class="list-group f-sm font-weight-normal">
	<li class="list-group-item">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">위젯 경로</label>
			<div class="col-sm-10">
				<p class="form-control-plaintext">
					<?php echo str_replace(G5_PATH, "", $widget_path) ?> 
				</p>
			</div>
		</div>
	</li>
	<li class="list-group-item border-bottom-0">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">위젯 리셋</label>
			<div class="col-sm-10">
				<p class="form-control-plaintext pt-1 pb-0 float-left">
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" name="freset" value="1" class="custom-control-input" id="fresetCheck">
						<label class="custom-control-label" for="fresetCheck"><span>위젯 설정값을 초기화(삭제) 합니다.</span></label>
					</div>
				</p>
			</div>
		</div>
	</li>
</ul>

<div class="f-sm font-weight-normal">
	<?php @include_once($widget_path.'/widget.setup.php'); ?>
</div>

<div id="bottomHeight"></div>

<div id="bottomNav" class="p-0">
	<button type="submit" class="btn btn-primary btn-block btn-lg rounded-0 en">Save</button>
</div>

</form>
<script>
	$(document).ready(function() {

		var topHeight = $("#topNav").height();
		var bottomHeight = $("#bottomNav").height();

		$("#topHeight").height(topHeight);
		$("#bottomHeight").height(bottomHeight);

		$("#topNav").addClass('fixed-top');
		$("#bottomNav").addClass('fixed-bottom');

		$('.close-setup').click(function() {
			window.parent.closeSetupModal();
		});
	});
</script>
<?php 
include_once(NA_PATH.'/theme/setup.php');
include_once(G5_THEME_PATH.'/tail.sub.php');
?>