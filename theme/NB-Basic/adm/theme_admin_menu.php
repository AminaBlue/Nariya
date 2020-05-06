<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// Setup Modal
include_once (NA_PATH.'/theme/setup.php');

?>
<style>
#theme-controller { 
	position:fixed; 
	left: -206px; 
	top: 0px; 
	width: 205px; 
	z-index: 3333; 
	box-shadow: 3px 3px 6px rgba(0,0,0,0.08);
}
#theme-controller .controller-icon { 
	width: 40px; 
	top:20px; 
	right:-40px; 
	position: absolute; 
}
</style>

<aside id="theme-controller" class="bg-white d-none d-lg-block f-small">
	<div class="controller-icon">
		<div class="btn-group-vertical">
			<a href="javascript:;" class="btn btn-primary btn-block rounded-0 theme-setup" title="테마설정">
				<i class="fa fa-desktop"></i>
			</a>
			<a href="javascript:;" class="btn btn-secondary btn-block widget-setup rounded-0" title="위젯설정">
				<i class="fa fa-cube"></i>
			</a>
			<?php if(!$is_index) { // 인덱스가 아닌 경우 ?>
				<a href="<?php echo NA_THEME_ADMIN_URL ?>/page_setup.php?pid=<?php echo urlencode($pset['pid']) ?>" class="btn btn-danger btn-block rounded-0 btn-setup" title="페이지설정">
					<i class="fa fa-sticky-note-o"></i>
				</a>
			<?php } ?>
		</div>	
	</div>
	<ul class="list-group">
		<li class="list-group-item bg-primary text-white border-left-0 border-top-0 rounded-0">
			<b>테마 설정 메뉴</b>
		</li>
		<li class="list-group-item">
			<a href="<?php echo NA_THEME_ADMIN_URL;?>/site_setup.php">
				사이트 설정
			</a>
		</li>
		<li class="list-group-item border-left-0">
			<a href="<?php echo NA_THEME_ADMIN_URL;?>/menu_form.php?mode=bbs">
				메뉴 설정
			</a>
		</li>
		<li class="list-group-item bg-light border-left-0 rounded-0">
			<a data-toggle="collapse" href="#guestPage" role="button" aria-expanded="false" aria-controls="guestPage">
				<b>비회원 페이지 설정</b>
			</a>
		</li>
	</ul>
	<ul id="guestPage" class="list-group collapse" style="margin-top:-1px;">
		<?php
			$parr = array();
			$parr[] = array('login.php', '로그인');
			$parr[] = array('register.php', '회원약관');
			$parr[] = array('register_form.php', '회원가입');
			$parr[] = array('register_result.php', '회원가입완료');
			$parr[] = array('register_email.php', '인증메일변경');
			$parr[] = array('member_confirm.php', '회원비번확인');
			$parr[] = array('password.php', '비밀번호입력');

			for($i=0; $i < count($parr); $i++) {
		?>
		<li class="list-group-item border-left-0 rounded-0">
			<a href="<?php echo NA_THEME_ADMIN_URL;?>/page_<?php echo $parr[$i][0] ?>">
				<?php echo $parr[$i][1] ?> 페이지
			</a>
		</li>
		<?php } ?>
	</ul>
</aside>

<script>
$(document).ready(function() {
	$(".theme-setup").click(function(){
		var controller = $("#theme-controller");
		if (controller.css("left") === "-206px") {
			controller.animate({
				left: "0px"
			}); 
		} else {
			controller.animate({
				left: "-206px"
			});
		}
	});
});
</script>