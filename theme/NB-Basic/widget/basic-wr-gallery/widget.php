<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

/* 게시물 추출 위젯 - 일반 갤러리형 */

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$widget_url.'/widget.css">', 0);

// 이미지 영역 및 썸네일 크기 설정
$wset['thumb_w'] = ($wset['thumb_w'] == "") ? 400 : (int)$wset['thumb_w'];
$wset['thumb_h'] = ($wset['thumb_h'] == "") ? 225 : (int)$wset['thumb_h'];

if($wset['thumb_w'] && $wset['thumb_h']) {
	$height = ($wset['thumb_h'] / $wset['thumb_w']) * 100;
} else {
	$height = ($wset['thumb_d']) ? $wset['thumb_d'] : '56.25';
}

// 랜덤아이디
$id = 'img_'.na_rid(); 

?>
<style>
	#<?php echo $id;?> li { <?php echo na_width($wset['xl'], 4) ?>}
	#<?php echo $id;?> .img-wrap { padding-bottom:<?php echo $height ?>%; }
	@media (min-width:1200px) { 
		#<?php echo $id;?> .img-wrap { max-width:<?php echo ($wset['thumb_w']) ? $wset['thumb_w'] : '400'; ?>px; }
	}
	<?php if(_RESPONSIVE_) { // 반응형일 때만 작동 ?>
	@media (max-width:1199px) { 
		.responsive #<?php echo $id;?> li {<?php echo na_width($wset['lg'], 4) ?>}
	}
	@media (max-width:991px) { 
		.responsive #<?php echo $id;?> li {<?php echo na_width($wset['md'], 4) ?>}
	}
	@media (max-width:767px) { 
		.responsive #<?php echo $id;?> li {<?php echo na_width($wset['sm'], 3) ?>}
	}
	@media (max-width:575px) { 
		.responsive #<?php echo $id;?> li {<?php echo na_width($wset['xs'], 2) ?>}
	}
	<?php } ?>
</style>

<ul id="<?php echo $id;?>" class="clearfix mr-n3 mb-n3">
<?php 
if($wset['cache']) {
	echo na_widget_cache($widget_path.'/widget.rows.php', $wset, $wcache);
} else {
	include($widget_path.'/widget.rows.php');
}
?>
</ul>

<?php if($setup_href) { ?>
	<div class="btn-wset pt-0">
		<a href="<?php echo $setup_href;?>" class="btn-setup">
			<span class="f-sm text-muted"><i class="fa fa-cog"></i> 위젯설정</span>
		</a>
	</div>
<?php } ?>