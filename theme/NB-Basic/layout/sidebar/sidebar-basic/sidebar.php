<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$nt_sidebar_url.'/sidebar.css">', 0);
add_javascript('<script src="'.$nt_sidebar_url.'/sidebar.js"></script>', 0);

?>

<aside id="nt_sidebar" class="h-100 bg-light font-weight-normal">

	<!-- Top Head -->
	<div class="sidebar-head na-shadow bg-primary px-3 mb-0">
		<h3 class="clearfix text-center f-mo font-weight-bold en">
			<a href="<?php echo NT_HOME_URL ?>" class="float-right d-block d-md-none">
				<i class="fa fa-home text-white" aria-hidden="true"></i>
				<span class="sr-only">홈으로</span>
			</a>
			<a href="javascript:;" class="float-left sidebar-close" title="닫기">
				<i class="fa fa-times-circle text-white" aria-hidden="true"></i>
				<span class="sr-only">닫기</span>
			</a>
			<a href="<?php echo NT_HOME_URL ?>" class="text-white">
				<?php echo get_text($tset['logo_text']) ?>
			</a>
		</h3>
	</div>

	<!-- sidebar-content : 스크롤바 생성을 위해서 -->
	<div class="sidebar-content">

		<!-- Icon -->
		<div class="px-3">
			<ul class="d-flex justify-content-between text-center f-de mt-3 mb-2">
				<li>
					<a href="<?php echo G5_BBS_URL;?>/new.php">
						<i class="fa fa-calendar-check-o circle light-circle normal" aria-hidden="true"></i>
						<span class="d-block mt-2">새글</span>
					</a>			
				</li>
				<li>
					<a href="<?php echo G5_BBS_URL;?>/current_connect.php">
						<i class="fa fa-users circle light-circle normal" aria-hidden="true"></i>
						<span class="d-block mt-2">접속자</span>
					</a>
				</li>
				<li>
					<a href="<?php echo G5_BBS_URL;?>/faq.php">
						<i class="fa fa-exclamation circle light-circle normal" aria-hidden="true"></i>
						<span class="d-block mt-2">FAQ</span>
					</a>
				</li>				
				<li>
					<a href="<?php echo G5_BBS_URL;?>/qalist.php">
						<i class="fa fa-comments-o circle light-circle normal" aria-hidden="true"></i>
						<span class="d-block mt-2">1:1 문의</span>
					</a>
				</li>
			</ul>
		</div>

		<!-- Login -->
		<?php if($is_member) { ?>
			<div class="d-md-none">
				<div class="btn-group w-100" role="group" aria-label="Member Menu">
					<a class="btn btn-primary text-white rounded-0" data-toggle="collapse" href="#mymenu_sidebar" role="button" aria-expanded="false" aria-controls="mymenu_sidebar">
						마이메뉴
					</a>
					<?php if(IS_NA_NOTI) { // 알림 ?>
						<a href="<?php echo G5_BBS_URL ?>/noti.php" class="btn btn-primary text-white" role="button">
							<i class="fa fa-bell" aria-hidden="true"></i>
							<?php if ($member['as_noti']) { ?><b><?php echo number_format($member['as_noti']) ?></b><?php } ?>
						</a>
					<?php } ?>
					<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="btn btn-primary text-white win_memo" role="button">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<?php if ($member['mb_memo_cnt']) { ?><b><?php echo number_format($member['mb_memo_cnt']);?></b><?php } ?>
					</a>
					<a href="<?php echo G5_BBS_URL ?>/logout.php" class="btn btn-primary text-white rounded-0" role="button">
						로그아웃
					</a>
				</div>

				<div class="collapse" id="mymenu_sidebar">
					<div class="clearfix f-de px-3 pt-3 mb-2">

						<div class="d-flex align-items-center mb-1">
							<div class="flex-grow-1">
								<?php echo str_replace('sv_member', 'sv_member font-weight-bold', $member['sideview']); ?>
							</div>
							<div class="pl-2">
								<?php echo ($member['mb_grade']) ? $member['mb_grade'] : $member['mb_level'].'등급'; ?>
							</div>
						</div>

						<?php 
						// 멤버쉽 플러그인	
						if(IS_NA_XP) { 
							$per = (int)(($member['as_exp'] / $member['as_max']) * 100);
						?>
							<div class="clearfix">
								<span class="float-left">레벨 <?php echo $member['as_level'] ?></span>
								<span class="float-right">
									<a href="<?php echo G5_BBS_URL ?>/exp.php" target="_blank" class="win_point">
										Exp <?php echo number_format($member['as_exp']) ?>(<?php echo $per ?>%)
									</a>
								</span>
							</div>
							<div class="progress mb-2" title="레벨업까지 <?php echo number_format($member['as_max'] - $member['as_exp']);?> 경험치 필요">
								<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per ?>%">
									<span class="sr-only"><?php echo $per ?>%</span>
								</div>
							</div>
						<?php } ?>

						<ul class="row mx-n1">
							<?php if($config['cf_use_point']) { ?>
								<li class="col-12 px-1">
									<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class="btn btn-block btn-basic win_point f-sm mb-2">
										포인트 <b class="orangered"><?php echo number_format($member['mb_point']);?></b>
									</a>
								</li>
							<?php } ?>
							<?php if(IS_NA_NOTI) { // 알림 ?>
								<li class="col-6 px-1">
									<a href="<?php echo G5_BBS_URL ?>/noti.php" class="btn btn-block btn-basic f-sm mb-2">
										알림<?php if ($member['as_noti']) { ?> <b class="orangered"><?php echo number_format($member['as_noti']) ?></b><?php } ?>
									</a>
								</li>
							<?php } ?>
							<li class="col-6 px-1">
								<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="btn btn-block btn-basic win_memo f-sm mb-2">
									쪽지<?php if ($member['mb_memo_cnt']) { ?> <span class="orangered"><?php echo number_format($member['mb_memo_cnt']);?></span><?php } ?>
								</a>
							</li>
							<li class="col-6 px-1">
								<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class="btn btn-block btn-basic win_scrap f-sm mb-2">
									스크랩
								</a>
							</li>
							<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
								<li class="col-6 px-1">
									<a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="btn btn-block btn-basic f-sm mb-2">
										관리자
									</a>
								</li>
							<?php } ?>
							<li class="col-6 px-1">
								<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" class="btn btn-block btn-basic f-sm mb-2">
									정보수정
								</a>
							</li>
							<li class="col-6 px-1">
								<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php" class="btn btn-block btn-basic f-sm mb-2">
									회원탈퇴
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="clearfix d-md-none px-3 py-2 f-de border-top">
				<div class="float-left">
					<a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode ?>">
						<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
						<b>로그인</b> 해주세요.
					</a>
				</div>
				<div class="float-right">
					<a href="<?php echo G5_BBS_URL ?>/register.php">
						회원가입
					</a>
					<span class="na-bar"></span>
					<a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="win_password_lost">
						정보찾기
					</a>
				</div>
			</div>
		<?php } ?>

		<?php if ($is_admin == 'super' || $member['is_auth'] || IS_DEMO) { ?>
			<div class="d-md-none border-top px-3 py-2">
				<div class="btn-group w-100">
					<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
						<a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="btn btn-basic btn-sm f-sm" role="button">
							관리자
						</a>
					<?php } ?>
					<?php if($is_admin == 'super' || IS_DEMO) { ?>
						<a href="javascript:;" class="btn btn-basic btn-sm f-sm" title="테마 설정" data-toggle="modal" data-target="#theme_menu" role="button">
							테마
						</a>
						<a href="javascript:;" class="btn btn-basic btn-sm f-sm widget-setup sidebar-close" title="위젯 설정" role="button">
							위젯
						</a>
						<?php if(!$is_index) { // 인덱스가 아닌 경우 ?>
							<a href="<?php echo NA_THEME_ADMIN_URL ?>/page_setup.php?pid=<?php echo urlencode($pset['pid']) ?>" class="btn btn-basic btn-sm btn-setup f-sm" title="페이지 설정" role="button">
								페이지
							</a>
						<?php } ?>
					<?php } ?>
				</div>	
			</div>
		<?php } ?>

		<div id="nt_sidebar_menu">
			<ul class="me-ul border-top">
			<?php for ($i=0; $i < $menu_cnt; $i++) { 
				$me = $menu[$i]; 
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

							<?php if(isset($me1['s'])) { //Is Sub Menu ?>
								<i class="fa fa-caret-right tree-toggle me-i1"></i>
							<?php } ?>

							<a class="me-a1" href="<?php echo $me1['href'];?>" target="<?php echo $me1['target'];?>">
								<i class="fa <?php echo $me1['icon'] ?> fa-fw" aria-hidden="true"></i>
								<?php echo $me1['text'];?>
							</a>
							<?php if(isset($me1['s'])) { // Is Sub Menu ?>
								<ul class="me-ul2 tree <?php echo ($me1['on']) ? 'on' : 'off'; ?>">
								<?php 
									for($k=0; $k < count($me1['s']); $k++) { 
										$me2 = $me1['s'][$k];
								?>
									<?php if($me2['line']) { //구분라인 ?>
										<li class="me-line2"><a class="me-a2"><?php echo $me2['line'];?></a></li>
									<?php } ?>
									<li class="me-li2<?php echo ($me2['on']) ? ' active' : ''; ?>">
										<a class="me-a2" href="<?php echo $me2['href'] ?>" target="<?php echo $me2['target'] ?>">
											<i class="fa <?php echo $me2['icon'] ?> fa-fw" aria-hidden="true"></i>
											<?php echo $me2['text'];?>
										</a>
									</li>
								<?php } //for ?>
								</ul>
							<?php } //is_sub ?>
						</li>
					<?php } //for ?>
					</ul>
				<?php } //is_sub ?>
			</li>
			<?php } //for ?>
			<?php if(!$menu_cnt) { ?>
				<li class="me-li">
					<a class="me-a" href="javascript:;">메뉴를 등록해 주세요.</a>
				</li>
			<?php } ?>
			</ul>
		</div>

		<div class="p-3 mb-5 border-top" style="margin-top:-1px">
			<ul class="f-de font-weight-normal">
				<?php if($stats['now_total']) { ?>
				<li class="clearfix">
					<a href="<?php echo G5_BBS_URL ?>/current_connect.php">
						<span class="float-left">현재 접속자</span>
						<span class="float-right"><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? '(<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?> 명</span>
					</a>
				</li>
				<?php } ?>
				<li class="clearfix">
					<span class="float-left">오늘 방문자</span>
					<span class="float-right"><?php echo number_format($stats['visit_today']) ?> 명</span>
				</li>
				<li class="clearfix">
					<span class="float-left">어제 방문자</span>
					<span class="float-right"><?php echo number_format($stats['visit_yesterday']) ?> 명</span>
				</li>
				<li class="clearfix">
					<span class="float-left">최대 방문자</span>	
					<span class="float-right"><?php echo number_format($stats['visit_max']) ?> 명</span>
				</li>
				<li class="clearfix">
					<span class="float-left">전체 방문자</span>	
					<span class="float-right"><?php echo number_format($stats['visit_total']) ?> 명</span>
				</li>
				<?php if($stats['join_total']) { ?>
				<li class="clearfix">
					<span class="float-left">전체 회원수</span>
					<span class="float-right"><?php echo number_format($stats['join_total']) ?> 명</span>
				</li>
				<li class="clearfix">
					<span class="float-left">전체 게시물</span>	
					<span class="float-right"><?php echo number_format($stats['total_write']) ?> 개</span>
				</li>
				<li class="clearfix">
					<span class="float-left">전체 댓글수</span>
					<span class="float-right"><?php echo number_format($stats['total_comment']) ?> 개</span>
				</li>
				<?php } ?>
			</ul>
		</div>	
	</div>
</aside>

<div id="nt_sidebar_mask" class="sidebar-close"></div>

<!-- 상단이동 버튼 -->
<div id="nt_bottom">
	<div id="nt_top" class="go-btn">
		<span class="go-top cursor"><i class="fa fa-chevron-up"></i></span>
		<span class="go-bottom cursor"><i class="fa fa-chevron-down"></i></span>
	</div>
</div>
