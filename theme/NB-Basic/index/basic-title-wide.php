<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 좌측 사이드 사용
$is_left_side = false;
?>

<div class="mx-0 mx-sm-n4">
	<?php echo na_widget('basic-title', 'title-1', 'xl=27%', 'auto=0'); // 타이틀 위젯 ?>
</div>

<?php
// WING
if($nt_wing_path)
	@include_once ($nt_wing_path.'/wing.php');
?>

<div class="nt-container py-4">
	<div class="row na-row">
		<!-- 메인 영역 -->
		<div class="col-md-9<?php echo ($is_left_side) ? ' order-md-2' : '';?> na-col">

			<div class="row na-row">
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'tlist-1', 'bo_list=video ca_list=게임 rank=red'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'tlist-2', 'bo_list=video ca_list=게임 rank=green'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'tlist-3', 'bo_list=video ca_list=게임 rank=blue'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
			</div>

			<!-- 위젯 시작 { -->
			<h3 class="h3 f-lg en">
				<a href="<?php echo get_pretty_url('video'); ?>">
					<span class="float-right more-plus"></span>
					갤러리
				</a>
			</h3>
			<hr class="hr"/>
			<div class="px-3 px-sm-0 my-3">
				<?php echo na_widget('basic-wr-gallery', 'gallery-1', 'bo_list=video ca_list=게임 rows=8'); ?>
			</div>
			<!-- } 위젯 끝-->


			<div class="row na-row">
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'blist-1', 'bo_list=video ca_list=게임'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'blist-2', 'bo_list=video ca_list=게임'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
				<div class="col-md-4 na-col">

					<!-- 위젯 시작 { -->
					<h3 class="h3 f-lg en">
						<a href="<?php echo get_pretty_url('video'); ?>">
							<span class="float-right more-plus"></span>
							게시판
						</a>
					</h3>
					<hr class="hr"/>
					<div class="mt-3 mb-4">
						<?php echo na_widget('basic-wr-list', 'blist-3', 'bo_list=video ca_list=게임'); ?>
					</div>
					<!-- } 위젯 끝-->

				</div>
			</div>

			<!-- 위젯 시작 { -->
			<h3 class="h3 f-lg en">
				<a href="<?php echo get_pretty_url('video'); ?>">
					<span class="float-right more-plus"></span>
					배너
				</a>
			</h3>
			<hr class="hr"/>
			<div class="px-3 px-sm-0 mt-3 mb-4">
				<?php echo na_widget('basic-banner', 'banner-1'); ?>
			</div>
			<!-- } 위젯 끝-->

		</div>
		<!-- 사이드 영역 -->
		<div class="col-md-3<?php echo ($is_left_side) ? ' order-md-1' : '';?> na-col">
			<?php 
				// layout/side에서 가져옴
				list($nt_side_url, $nt_side_path) = na_layout_content('side', 'side-basic'); // side-basic 폴더
				@include_once($nt_side_path.'/side.php') 
			?>
		</div>
	</div>
</div>
