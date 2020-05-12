<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 헤더, 테일 사용설정
@include_once(G5_THEME_PATH.'/head.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

?>

<div id="mb_login" class="f-de py-5 m-auto" style="width:260px;">
	<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" autocomplete="off">
	<input type="hidden" name="url" value="<?php echo $login_url ?>">

		<h1 class="text-primary text-center text-uppercase mb-1">
			Login
		</h1>

		<div class="bg-primary" style="height:4px;"></div>

		<div class="form-group my-3">
			<div class="custom-control custom-switch">
			  <input type="checkbox" name="auto_login" class="custom-control-input remember-me" id="login_auto_login">
			  <label class="custom-control-label float-left" for="login_auto_login">자동로그인</label>
			</div>
		</div>

		<div class="form-group">
			<label for="login_id" class="sr-only">아이디<strong class="sr-only"> 필수</strong></label>			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-user text-muted"></i></span>
				</div>
				<input type="text" name="mb_id" id="login_id" class="form-control required" placeholder="아이디">
			</div>
		</div>
		<div class="form-group">	
			<div class="input-group">
				<label for="login_pw" class="sr-only">비밀번호<strong class="sr-only"> 필수</strong></label>
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-lock text-muted"></i></span>
				</div>
				<input type="password" name="mb_password" id="login_pw" class="form-control required" placeholder="비밀번호">
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block p-3 en">
				<h5>로그인</h5>
			</button>    
		</div>	

		<div class="clearfix">
			<a href="<?php echo G5_BBS_URL ?>/register.php" class="float-left">
				회원가입하기
			</a>
			<a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="win_password_lost float-right">
				회원정보찾기
			</a>
		</div>

	</form>

	<?php @include (get_social_skin_path().'/social_login.skin.php'); // 소셜로그인 사용시 소셜로그인 버튼 ?>

	<p class="text-center px-3 py-3 mt-3 border-top">
		<a href="<?php echo G5_URL ?>">홈으로 돌아가기</a>
	</p>
</div>

<script>
function flogin_submit(f) {

    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->

<?php
// 헤더, 테일 사용설정
if(!$tset['page_sub'])
	include_once(G5_THEME_PATH.'/tail.php');
?>