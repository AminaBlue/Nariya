<?php
include_once('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
    alert_close('접근권한이 없습니다.');
}

$mode = na_fid($mode);
$fid = na_fid($fid);

if(!$mode || !$fid)
    alert_close('값이 제대로 넘어오지 않았습니다.');

$g5['title'] = '이미지 관리';
include_once(G5_THEME_PATH.'/head.sub.php');

// 이미지 리스트 정리
$arr = array();
$list = array();

$arr = na_file_list(G5_THEME_PATH.'/storage/image');

$arr_cnt = count($arr);

$i=0;
for($j=0; $j < $arr_cnt; $j++) {

	$img = $arr[$j];

	if (!preg_match("/(\.(jpg|jpeg|gif|png))$/i", $img))
		continue;

	list($head) = explode('-', $img);

	if($head != $mode)
		continue;

	$list[$i] = $img;
	$i++;
}

$list_cnt = count($list);

if($list_cnt) {
	na_script('imagesloaded');
	na_script('masonry');
}

na_script('fileinput');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.NA_URL.'/css/modal.css">', 0);

// Loader
if(is_file(G5_THEME_PATH.'/_loader.php')) {
	include_once(G5_THEME_PATH.'/_loader.php');
} else {
	include_once(NA_PATH.'/theme/loader.php');
}
?>

<div id="topNav" class="p-0 f-de font-weight-normal">
	<form id="fsetup" name="fsetup" action="./image_update.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="mode" value="<?php echo $mode ?>">
		<input type="hidden" name="fid" value="<?php echo $fid ?>">
		<input type="hidden" name="win" value="<?php echo $win ?>">
		<ul class="list-group">
			<li class="list-group-item bg-primary text-white border-left-0 border-right-0">
				<button type="button" class="close close-setup" aria-label="Close">
					<span aria-hidden="true" class="text-white">&times;</span>
				</button>
				<i class="fa fa-bell"></i> 
				모드(mode)명이 자동으로 접두어로 등록됨
			</li>
			<li class="list-group-item border-left-0 border-right-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<label class="input-group-text" for="imgboxFile">이미지</label>
					</div>
					<div class="custom-file">
						<input type="file" name="img_file" class="custom-file-input" id="imgboxFile">
						<label class="custom-file-label" for="imgboxFile" data-browse="선택"></label>
					</div>
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-upload"></i> 등록하기
						</button>
					</div>
				</div>
			</li>
		</ul>
	</form>
</div>

<div id="topHeight"></div>

<div id="img_list" class="clearfix f-de mb-5 <?php echo (isset($win) && $win) ? 'img_list_win' : 'img_list'; ?>">
	<?php for($i=0; $i < count($list); $i++) { 
		$img_href = G5_THEME_URL."/storage/image/".$list[$i];
		$img_title = str_replace(G5_THEME_URL, "..", $img_href);
	?>
		<div class="item" id="<?php echo substr($list[$i], 0, strrpos($list[$i], '.')) ?>">
			<div class="card d-block mb-3 mr-3">
				<a href="./image_view.php?fn=<?php echo urlencode(G5_THEME_URL.'/storage/image/'.$list[$i]) ?>" class="win_point">
					<img src="<?php echo G5_THEME_URL ?>/storage/image/<?php echo $list[$i] ?>" alt="<?php echo $list[$i] ?>" title="<?php echo $list[$i] ?>" class="card-img-top">
				</a>
				<div class="card-body text-center">
					<a href="<?php echo $img_href ?>" class="btn btn-success sel-img" title="<?php echo $img_title ?>">
						<i class="fa fa-check fa-lg"></i>
						<span class="sr-only">선택</span>
					</a>
					<a href="./image_delete.php?mode=<?php echo urlencode($mode) ?>&amp;fid=<?php echo urlencode($fid);?>&amp;img=<?php echo urlencode($list[$i]) ?>" class="btn btn-danger img-del" title="삭제">
						<i class="fa fa-times fa-lg"></i>
						<span class="sr-only">삭제</span>
					</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<script>
$(window).on('load', function () {
	na_nav('topNav', 'topHeight', 'fixed-top');
});

$(document).ready(function() {
	<?php if($list_cnt) { ?>
	var $container = $('#img_list');

	$container.imagesLoaded(function(){
		$container.masonry({
			columnWidth : '.item',
			itemSelector : '.item',
			isAnimated: true
		});
	});
	<?php } ?>
	$('.img-del').click(function() {
		if(confirm("삭제하시겠습니까?")) {
			return true;
		}
		return false;
	});

	$('.sel-img').click(function() {
		$("#<?php echo $fid ?>", parent.document).val(this.title);
		window.parent.closeSetupModal();
		return false;
	});

	$('.close-setup').click(function() {
		window.parent.closeSetupModal();
	});
});
</script>
<?php 
include_once(G5_THEME_PATH.'/tail.sub.php');
?>