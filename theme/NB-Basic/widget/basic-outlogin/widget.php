<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

/* 로그인 위젯 */

//필요한 전역변수 선언
global $config, $member, $is_member, $urlencode, $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$widget_url.'/widget.css">', 0);

?>

<div class="f-sm font-weight-normal">

	<?php if($is_member) { //Login ?>

		<div class="d-flex align-items-center mb-3">
			<div class="pr-3">
				<img src="<?php echo na_member_photo($member['mb_id']) ?>" class="rounded-circle">
			</div>
			<div class="flex-grow-1 pt-2">
				<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php" class="float-right leave-me" title="회원탈퇴">
					<span class="text-muted"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></span>
				</a>

				<h5 class="hide-photo mb-2 en">
					<b style="letter-spacing:-1px;"><?php echo str_replace('sv_member', 'sv_member en', $member['sideview']); ?></b>
				</h5>

				<?php if(IS_NA_NOTI) { // 알림 ?>
					<a href="<?php echo G5_BBS_URL ?>/noti.php" class="bar-right">
						알림<?php if ($member['as_noti']) { ?> <b class="orangered"><?php echo number_format($member['as_noti']) ?></b><?php } ?>
					</a>
				<?php } ?>
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="bar-right win_memo">
					쪽지<?php if ($member['mb_memo_cnt']) { ?> <span class="orangered"><?php echo number_format($member['mb_memo_cnt']);?></span><?php } ?>
				</a>
				<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class="win_scrap">
					스크랩
				</a>
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
			<div class="progress mb-3" title="레벨업까지 <?php echo number_format($member['as_max'] - $member['as_exp']);?> 경험치 필요">
				<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $per ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per ?>%">
					<span class="sr-only"><?php echo $per ?>%</span>
				</div>
			</div>
		<?php } ?>

		<div class="clearfix mb-2">
			<?php if($config['cf_use_point']) { ?>
				<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class="win_point float-left">
					포인트 <b class="orangered"><?php echo number_format($member['mb_point']);?></b>
				</a>
			<?php } ?>
			<div class="float-right">
				<?php if ($member['mb_grade']) { ?>
					<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
						<a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="bar-right">
							<?php echo $member['mb_grade'] ?>
						</a>
					<?php } else { ?>
						<span class="bar-right">
							<?php echo $member['mb_grade'] ?>
						</span>
					<?php } ?>
				<?php } else if ($is_admin == 'super' || $member['is_auth']) { ?>
					<a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="bar-right">
						관리자
					</a>
				<?php } ?>
				<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
					정보수정
				</a>
			</div>
		</div>

		<a href="<?php echo G5_BBS_URL ?>/logout.php" class="btn btn-primary btn-block p-3 en">
			<h5>로그아웃</h5>
		</a>

	<?php } else { //Logout ?>

		<form id="basic_outlogin" name="basic_outlogin" method="post" action="<?php echo G5_HTTPS_BBS_URL ?>/login_check.php" autocomplete="off">
		<input type="hidden" name="url" value="<?php echo $urlencode; ?>">
			<div class="form-group">	
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user text-muted"></i></span>
					</div>
					<input type="text" name="mb_id" id="outlogin_mb_id" class="form-control required" placeholder="아이디">
				</div>
			</div>
			<div class="form-group">	
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock text-muted"></i></span>
					</div>
					<input type="password" name="mb_password" id="outlogin_mb_password" class="form-control required" placeholder="비밀번호">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block p-3 en">
					<h5>로그인</h5>
				</button>    
			</div>	

			<div class="clearfix">
				<div class="float-left">
					<div class="form-group mb-0">
						<div class="custom-control custom-switch">
						  <input type="checkbox" name="auto_login" class="custom-control-input remember-me" id="outlogin_remember_me">
						  <label class="custom-control-label float-left" for="outlogin_remember_me">자동로그인</label>
						</div>
					</div>
				</div>
				<div class="float-right">
					<a href="<?php echo G5_BBS_URL ?>/register.php" class="bar-right">
						회원가입
					</a>
					<a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="win_password_lost">
						정보찾기
					</a>
				</div>
			</div>
		</form>

        <?php
        // 소셜로그인 사용시 소셜로그인 버튼
        @include(get_social_skin_path().'/social_outlogin.skin.1.php');
        ?>

	<?php } //End ?>
</div>