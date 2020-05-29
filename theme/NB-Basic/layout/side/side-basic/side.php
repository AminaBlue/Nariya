<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<?php if($is_index) { // 인덱스에서만 출력 ?>
	<!-- 로그인 시작 -->
	<div class="d-none d-md-block mb-4">
		<?php echo na_widget('basic-outlogin'); // 외부로그인 위젯 ?>
	</div>
	<!-- 로그인 끝 -->
<?php } else { // 페이지에서는 메뉴 출력 ?>

	<?php 
	$mes = array();
	for ($i=0; $i < $menu_cnt; $i++) { 
		// 주메뉴 이하 사이트이고 서브메뉴가 있으면...
		if($menu[$i]['on']) {
			$mes = $menu[$i];
			break;
		}
	}

	// 선택메뉴가 있다면...
	if(!empty($mes)) {
		add_stylesheet('<link rel="stylesheet" href="'.$nt_side_url.'/side.css">', 0);
	?>
		<div id="nt_side_menu" class="font-weight-normal mb-4">
			<div class="bg-primary text-white text-center p-4 py-sm-5 en">
				<h4>
					<i class="fa <?php echo $mes['icon'] ?>" aria-hidden="true"></i>
					<?php echo $mes['text'];?>
				</h4>
			</div>
			<?php if(isset($mes['s'])) { ?>
				<ul class="me-ul border border-top-0">
				<?php for ($i=0; $i < count($mes['s']); $i++) { 
					$me = $mes['s'][$i]; 
				?>
				<li class="me-li<?php echo ($me['on']) ? ' active' : ''; ?>">
					<?php if(isset($me['s'])) { //Is Sub Menu ?>
						<i class="fa fa-caret-down tree-toggle me-i"></i>
					<?php } ?>
					<a class="me-a" href="<?php echo $me['href'];?>" target="<?php echo $me['target'];?>">
						<i class="fa <?php echo $me['icon'] ?> fa-fw" aria-hidden="true"></i>
						<?php echo $me['text'];?>
					</a>

					<?php if(isset($me['s'])) { //Is Sub Menu ?>
						<ul class="me-ul1 tree <?php echo ($me['on']) ? 'on' : 'off'; ?>">
						<?php for($j=0; $j < count($me['s']); $j++) { 
								$me1 = $me['s'][$j]; 
						?>
							<?php if($me1['line']) { //구분라인 ?>
								<li class="me-line1"><a class="me-a1"><?php echo $me1['line'];?></a></li>
							<?php } ?>

							<li class="me-li1<?php echo ($me1['on']) ? ' active' : ''; ?>">
								<a class="me-a1" href="<?php echo $me1['href'];?>" target="<?php echo $me1['target'];?>">
									<i class="fa <?php echo $me1['icon'] ?> fa-fw" aria-hidden="true"></i>
									<?php echo $me1['text'];?>
								</a>
							</li>
						<?php } //for ?>
						</ul>
					<?php } //is_sub ?>
				</li>
				<?php } //for ?>
				</ul>
			<?php } //is_sub ?>
		</div>
		<script>
		$(document).ready(function () {
			$(document).on('click', '#nt_side_menu .tree-toggle', function () {
				$(this).parent().children('ul.tree').toggle(200);
			});
		});
		</script>
	<?php } ?>
<?php } ?>

<!-- 위젯 시작 -->
<h3 class="h3 f-lg en">
	<a href="<?php echo get_pretty_url('video'); ?>">
		<span class="float-right more-plus"></span>
		공지글
	</a>
</h3>
<hr class="hr"/>
<div class="mt-3 mb-4">
	<?php echo na_widget('basic-wr-list', 'notice', 'bo_list=video ca_list=게임'); ?>
</div>
<!-- 위젯 끝-->

<!-- 위젯 시작 -->
<h3 class="h3 f-lg en">
	동영상
</h3>
<hr class="hr"/>
<div class="px-3 px-sm-0 mt-3 mb-4">
	<?php echo na_widget('basic-youtube', 'youtube-1'); ?>
</div>

<!-- 위젯 끝-->

<!-- 위젯 시작 -->
<h3 class="h3 f-lg en mb-1">
	<a href="<?php echo G5_BBS_URL ?>/new.php?view=w">
		<span class="float-right more-plus"></span>
		최근글
	</a>
</h3>
<hr class="hr"/>
<div class="mt-3 mb-4">
	<?php echo na_widget('basic-wr-list', 'new-wr', 'bo_list=video ca_list=게임'); ?>
</div>
<!-- 위젯 끝-->

<!-- 위젯 시작 -->
<h3 class="h3 f-lg en mb-1">
	<a href="<?php echo G5_BBS_URL ?>/new.php?view=c">
		<span class="float-right more-plus"></span>
		새댓글
	</a>
</h3>
<hr class="hr"/>
<div class="mt-3 mb-4">
	<?php echo na_widget('basic-wr-comment-list', 'new-co', 'bo_list=video ca_list=게임'); ?>
</div>
<!-- 위젯 끝-->
