<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 상단고정 문제로 모바일헤드도 메뉴에 포함시킴...ㅠㅠ
add_stylesheet('<link rel="stylesheet" href="'.$nt_menu_url.'/menu.css">', 0);

// 2차 서브메뉴 너비 : 메뉴나눔에서 사용
$is_sub_w = 170;

// 전체메뉴 줄나눔
$is_col_all = 6;

?>
<style>
#nt_menu .me-sw { 
	width:<?php echo $is_sub_w ?>px; 
}
</style>
<div id="nt_menu_wrap">

	<!-- Mobile Header -->
	<header id="header_mo" class="d-block d-md-none">
		<div class="bg-primary px-3 px-sm-4">
			<h3 class="clearfix text-center f-mo font-weight-bold en">
				<a href="javascript:;" onclick="sidebar_open('sidebar-menu');" class="float-left">
					<i class="fa fa-bars text-white" aria-hidden="true"></i>
					<span class="sr-only">메뉴</span>
				</a>
				<a data-toggle="collapse" href="#search_mo" aria-expanded="false" aria-controls="search_mo" class="float-right">
					<i class="fa fa-search text-white" aria-hidden="true"></i>
					<span class="sr-only">검색</span>
				</a>
				<!-- Mobile Logo -->
				<a href="<?php echo NT_HOME_URL ?>" class="text-white">
					<?php echo $tset['logo_text'] ?>
				</a>
			</h3>
		</div>

		<!-- Mobile Search -->
		<div id="search_mo" class="collapse">
			<div class="mb-0 p-3 px-sm-4 d-block d-lg-none bg-light border-bottom">
				<form name="mosearch" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return tsearch_submit(this);" class="mb-0">
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
					<div class="input-group">
						<input id="mo_top_search" type="text" name="stx" class="form-control" value="<?php echo $stx ?>" placeholder="검색어">
						<span class="input-group-append">
							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</header>

	<nav id="nt_menu" class="bg-primary d-none d-md-block font-weight-normal">
		<h3 class="sr-only">메인 메뉴</h3>
		<div class="nt-container">
			<div class="d-flex">
				<div class="flex-grow-1 order-2 me-list">
					<ul class="row m-0 me-ul nav-slide">
					<?php for ($i=0; $i < $menu_cnt; $i++) { 
						$me = $menu[$i]; 
					?>
						<li class="col p-0 me-li<?php echo ($me['on']) ? ' on' : ''; ?>">
							<a class="me-a f-md en" href="<?php echo $me['href'];?>" target="<?php echo $me['target'];?>">
								<i class="fa <?php echo $me['icon'] ?>" aria-hidden="true"></i>
								<?php echo $me['text'];?>
							</a>
							<?php if(isset($me['s'])) { //Is Sub Menu ?>
								<div class="sub-slide sub-1div">
									<ul class="sub-1dul">
									<?php for($j=0; $j < count($me['s']); $j++) { 
											$me1 = $me['s'][$j]; 
									?>
										<?php if($me1['line']) { //구분라인 ?>
											<li class="sub-1line"><a class="me-sh sub-1da"><?php echo $me1['line'];?></a></li>
										<?php } ?>

										<li class="sub-1dli<?php echo ($me1['on']) ? ' on' : ''; ?>">
											<a href="<?php echo $me1['href'];?>" class="me-sh sub-1da<?php echo (isset($me1['s'])) ? ' sub-icon' : '';?>" target="<?php echo $me1['target'];?>">
												<i class="fa <?php echo $me1['icon'] ?> fa-fw" aria-hidden="true"></i>
												<?php echo $me1['text'];?>
											</a>
											<?php if(isset($me1['s'])) { // Is Sub Menu ?>
												<div class="sub-slide sub-2div">
													<ul class="sub-2dul me-sw pull-left">					
													<?php 
														$me_sw2 = 0; //나눔 체크
														for($k=0; $k < count($me1['s']); $k++) { 
															$me2 = $me1['s'][$k];
													?>
														<?php if($me2['sp']) { //나눔 ?>
															</ul>
															<ul class="sub-2dul me-sw pull-left">
														<?php $me_sw2++; } // 나눔 카운트 ?>

														<?php if($me2['line']) { //구분라인 ?>
															<li class="sub-2line"><a class="me-sh sub-2da"><?php echo $me2['line'];?></a></li>
														<?php } ?>

														<li class="sub-2dli<?php echo ($me2['on']) ? ' on' : ''; ?>">
															<a href="<?php echo $me2['href'] ?>" class="me-sh sub-2da" target="<?php echo $me2['target'] ?>">
																<i class="fa <?php echo $me2['icon'] ?> fa-fw" aria-hidden="true"></i>
																<?php echo $me2['text'];?>
															</a>
														</li>
													<?php } ?>
													</ul>
													<?php $me_sw2 = ($me_sw2) ? ($is_sub_w * ($me_sw2 + 1)) : 0; //서브메뉴 너비 ?>
													<div class="clearfix"<?php echo ($me_sw2) ? ' style="width:'.$me_sw2.'px;"' : '';?>></div>
												</div>
											<?php } ?>
										</li>
									<?php } //for ?>
									</ul>
								</div>
							<?php } ?>
						</li>
					<?php } //for ?>
					<?php if(!$menu_cnt) { ?>
						<li class="flex-grow-1 order-2 me-li">
							<a class="me-a f-md" href="javascript:;">테마설정 > 메뉴설정에서 메뉴를 등록해 주세요.</a>
						</li>
					<?php } ?>
					</ul>							
				</div>
				<div class="me-icon order-1 me-li<?php echo ($is_index) ? ' on' : ' on'; ?>">
					<a href="javascript:;" data-toggle="collapse" data-target="#menu_all" class="me-a f-md" title="전체메뉴">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>
				<div class="me-icon order-3 me-li">
					<a href="javascript:;" onclick="sidebar_open('sidebar-menu'); return false;" class="me-a f-md" title="마이메뉴">
						<i class="fa fa-toggle-on" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</nav>

	<!-- 전체 메뉴 -->
	<nav id="nt_menu_all" class="d-none d-md-block f-de font-weight-normal bg-white">
		<h3 class="sr-only">전체 메뉴</h3>
		<div id="menu_all" class="collapse">
			<div class="nt-container pt-4 px-3 px-sm-4 px-xl-0">
				<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
				<?php 
					$az = 0;
					for ($i=0; $i < $menu_cnt; $i++) {

						$me = $menu[$i]; 

						// 줄나눔
						if($az && $az%$is_col_all == 0) {
							echo '</tr><tr>'.PHP_EOL;
						}
				?>
					<div class="col">
						<a class="d-block py-2 text-center border-bottom border-primary<?php echo ($me['on']) ? ' text-primary' : '';?>" href="<?php echo $me['href'];?>" target="<?php echo $me['target'];?>">
							<h5>
								<i class="fa <?php echo $me['icon'] ?>" aria-hidden="true"></i>
								<strong><?php echo $me['text'];?></strong>
							</h5>
						</a>
						<?php if(isset($me['s'])) { //Is Sub Menu ?>
							<ul class="p-3">
							<?php for($j=0; $j < count($me['s']); $j++) { 
									$me1 = $me['s'][$j]; 
							?>

								<?php if($me1['line']) { //구분라인 ?>
									<li class="sub-line text-black-50 pb-1 pt-2"><?php echo $me1['line'];?></li>
								<?php } ?>

								<li class="pb-1 sub-li">
									<a href="<?php echo $me1['href'];?>" class="sub-a<?php echo ($me1['on']) ? ' on text-primary' : '';?>" target="<?php echo $me1['target'];?>">
										<i class="fa <?php echo $me1['icon'] ?> fa-fw" aria-hidden="true"></i>
										<?php echo $me1['text'];?>
									</a>
								</li>
							<?php } //for ?>
							</ul>
						<?php } ?>
					</div>
				<?php $az++; } //for ?>
				</div>

				<div class="text-center">
					<a href="javascript:;" class="btn border-0" data-toggle="collapse" data-target="#menu_all" title="닫기">
						<i class="fa fa-chevron-up fa-lg text-primary" aria-hidden="true"></i>
						<span class="sr-only">전체메뉴 닫기</span>	
					</a>
				</div>
			</div>
		</div>
	</nav><!-- #nt_menu_all -->
</div><!-- #nt_menu_wrap -->

<script>
$(document).ready(function() {
	// 메뉴
	$('#nt_menu .nav-slide').nariya_menu();
});
</script>
<?php if($tset['sticky']) { ?>
<script>
// 메뉴 상단 고정
function sticky_menu (e) {

	e.preventDefault();

	var scroll_n = window.scrollY || document.documentElement.scrollTop;
	var sticky_h = $("#nt_sticky").height();
	var menu_h = $("#nt_menu_wrap").height();

	if (scroll_n > (sticky_h - menu_h)) {
		$("#nt_menu_wrap").addClass("me-sticky");
		$("#nt_sticky").css('height', sticky_h + 'px');
	} else {
		$("#nt_sticky").css('height', 'auto');
		$("#nt_menu_wrap").removeClass("me-sticky");
	}
}
$(window).on('load', function () {
	$(window).scroll(sticky_menu);
	$(window).resize(sticky_menu);
});
</script>
<?php } ?>