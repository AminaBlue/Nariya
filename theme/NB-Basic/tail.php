<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 헤더,테일 사용안함
if($tset['page_sub']) {
	if ($is_admin == 'super' || IS_DEMO)
		include_once(NA_THEME_ADMIN_PATH.'/theme_admin_menu.php');

	include_once(G5_THEME_PATH.'/tail.sub.php');
	return;
}
?>
	<?php if($is_page_col) { ?>
		<?php if($is_page_col == "two") { ?>
				</div>
				<div class="col-md-<?php echo (12 - $is_content_col); ?><?php echo ($tset['left_side']) ? ' order-md-1' : '';?> na-col">
					<?php 
						if($nt_side_path)
							@include_once($nt_side_path.'/side.php'); // Side 
					?>
				</div>
			</div>
		<?php } ?>
		</div><!-- .nt-container -->
	<?php } ?>
	</div><!-- .nt-body -->

	<?php
	// FOOTER
	if($nt_footer_path)
		@include_once ($nt_footer_path.'/footer.php');
	?>
</div><!-- .wrapper -->
<?php
// SIDEBAR
if($nt_sidebar_path)
	@include_once ($nt_sidebar_path.'/sidebar.php');

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
<!-- } 하단 끝 -->
<?php if(!is_mobile()) { // PC에서만 실행 ?>
<script>
function nt_body_size() {
	var $nt_body = $(window).height() - $('#nt_header').height() - $('#nt_footer').height();
	$('#nt_body').css('min-height', $nt_body);
}
$(document).ready(function() {
	// 컨텐츠 영역 최소 높이
	nt_body_size();
	$(window).resize(function() {
		nt_body_size();
	});
});
</script>
<?php } ?>
<!-- Nariya <?php echo NA_VERSION ?> -->
<?php
if ($is_admin == 'super' || IS_DEMO)
	include_once(NA_THEME_ADMIN_PATH.'/theme_admin_menu.php');

include_once(G5_THEME_PATH.'/tail.sub.php');
?>