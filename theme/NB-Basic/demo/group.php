<?php
include_once('./_common.php');

if ($is_admin == 'super' || IS_DEMO) {
	;
} else {
    alert('접근권한이 없습니다.');
}

// 데모설정
$dset['page'] = 9;
$dset['title'] = 'none';

$g5['title'] = '그룹메인';
include_once(G5_THEME_PATH.'/head.sub.php');

include_once(G5_THEME_PATH.'/_loader.php');

include_once(G5_THEME_PATH.'/head.php');

//layout 내 경로지정
$group_skin_path = G5_THEME_PATH.'/group';
$group_skin_url = G5_THEME_URL.'/group';

?>

<div class="mb-4 px-3 px-sm-0">
	<?php echo na_widget('basic-title', 'demo-grt', 'xl=27%', 'auto=0'); //타이틀 ?>
</div>

<div class="row na-row">
<?php 
for ($i=0; $i < 12; $i++) { ?>
	<?php if($i > 0 && $i%3 == 0) { ?>
			</div>
		<div class="row na-row">
	<?php } ?>
	<div class="col-md-4 na-col">
		<!-- 위젯 시작 { -->
		<h3 class="h3 f-lg en">
			<a href="<?php echo get_pretty_url('video'); ?>">
				<span class="pull-right more-plus"></span>
				게시판
			</a>
		</h3>
		<hr class="hr"/>
		<div class="mt-3 mb-4">
			<?php echo na_widget('basic-wr-list', 'demo-grl', 'bo_list=video ca_list=게임'); ?>
		</div>
	</div>
<?php } ?>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
