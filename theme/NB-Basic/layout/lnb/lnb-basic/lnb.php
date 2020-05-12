<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$nt_lnb_url.'/lnb.css">', 0);
add_javascript('<script src="'.$nt_lnb_url.'/lnb.js"></script>', 0);

$tweek = array("일", "월", "화", "수", "목", "금", "토");
?>

<aside id="nt_lnb" class="d-none d-md-block f-de font-weight-normal">
	<h3 class="sr-only">상단 네비</h3>
	<div class="nt-container clearfix pt-3 px-3 px-sm-4 px-xl-0">
		<!-- LNB Left -->
		<ul class="float-left">
			<li><a href="javascript:;" id="favorite">즐겨찾기</a></li>
			<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
			<li><a><?php echo date('m월 d일');?>(<?php echo $tweek[date("w")];?>)</a></li>
		</ul>
		<!-- LNB Right -->
		<ul class="float-right">
		<?php if($is_member) { // 로그인 상태 ?>
			<li class="dropdown">
				<a href="javascript:;" class="dropdown-toggle" id="mymenu_lnb" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
					마이메뉴
				</a>
				<div class="dropdown-menu bg-light f-de" aria-labelledby="mymenu_lnb" style="width:240px;">
					<div class="clearfix px-3">
						<div class="d-flex align-items-center my-1">
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
			</li>
			<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
				<li>
					<a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">
						관리자
					</a>
				</li>
			<?php } ?>
			<?php if(IS_NA_NOTI && isset($member['as_noti']) && $member['as_noti']) { // 알림 ?>
				<li><a href="<?php echo G5_BBS_URL ?>/noti.php">
					알림 <b class="orangered"><?php echo number_format($member['as_noti']) ?></b>
					</a>
				</li>
			<?php } ?>
			<?php if($member['mb_memo_cnt']) { // 쪽지 ?>
				<li><a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="win_memo">
					쪽지 <b class="orangered"><?php echo number_format($member['mb_memo_cnt']) ?></b>
					</a>
				</li>
			<?php } ?>
		<?php } else { // 로그아웃 상태 ?>
			<li><a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode ?>">로그인</a></li>
			<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
			<li><a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="win_password_lost">정보찾기</a></li>
		<?php } ?>
			<li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
			<li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
			<?php if(IS_NA_BBS) { // 게시판 플러그인 ?>
				<li><a href="<?php echo G5_BBS_URL ?>/shingo.php">신고</a></li>
			<?php } ?>
			<li>
			<?php if($stats['now_total']) { ?>
				<a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <?php echo number_format($stats['now_total']) ?><?php echo ($stats['now_mb']) ? ' (<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?></a>
			<?php } else { ?>
				<a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자</a>
			<?php } ?>
			</li>
		<?php if($is_member) { ?>
			<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
		<?php } ?>
		</ul>
	</div>
</aside>
