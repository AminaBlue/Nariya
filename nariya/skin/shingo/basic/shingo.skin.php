<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$shingo_skin_url.'/style.css">', 0);

// 스킨 설정값
$wset = na_skin_config('shingo');

$color = (isset($wset['color']) && $wset['color']) ? $wset['color'] : 'primary';

// 목록헤드
if(isset($wset['head_skin']) && $wset['head_skin']) {
	add_stylesheet('<link rel="stylesheet" href="'.NA_URL.'/skin/head/'.$wset['head_skin'].'.css">', 0);
	$head_class = 'list-head';
} else {
	$head_class = (isset($wset['head_color']) && $wset['head_color']) ? 'border-'.$wset['head_color'] : 'border-primary';
}

?>

<!-- 신고 목록 시작 { -->
<form class="form" role="form" name="fshingolist" method="post" action="#" onsubmit="return fshingo_submit(this);">
<input type="hidden" name="sw"       value="move">
<input type="hidden" name="page"     value="<?php echo $page; ?>">
<input type="hidden" name="pressed"  value="">

	<!-- 페이지 정보 및 버튼 시작 { -->
	<div id="new_btn_top" class="clearfix f-small">
		<?php if($is_admin || IS_DEMO) { ?>
			<div class="pull-right">
				<?php if($is_admin) { ?>
					<button type="submit" onclick="document.pressed=this.value" value="선택삭제" title="선택삭제" class="btn_b01 btn pull-right">
						<i class="fa fa-trash-o" aria-hidden="true"></i>				
						<span class="sound_only">선택삭제</span>
					</button>
				<?php } ?>
				<?php if(is_file($shingo_skin_path.'/setup.skin.php')) { ?>
					<a href="<?php echo na_setup_href('shingo') ?>" title="스킨설정" class="btn_b01 btn btn-setup pull-right">
						<i class="fa fa-cogs" aria-hidden="true"></i></a>
						<span class="sound_only">스킨설정</span>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
		<div id="shingo_list_total" class="pull-left">
			전체 <b><?php echo number_format($total_count) ?></b>건 / <?php echo $page ?>페이지
		</div>
	</div>
	<!-- } 페이지 정보 및 버튼 끝 -->

	<!-- 신고 목록 시작 { -->
	<div id="shingo_list">
		<div class="div-head <?php echo $head_class ?>">
			<span class="icon">구분</span>
			<?php if($is_admin) { ?>
				<span class="icon">처리</span>
			<?php } ?>
			<span class="subj">제목</span>
			<span class="name hidden-xs">작성자</span>
			<span class="date hidden-xs">접수일</span>
			<?php if ($is_admin) { ?>
			<span class="chk">
				<label for="all_chk" class="sound_only">목록 전체 선택</label>
				<input type="checkbox" id="all_chk">
			</span>
			<?php } ?>
		</div>
		<ul>
		<?php
			for ($i=0; $i<count($list); $i++) {
				$num = $total_count - ($page - 1) * $config['cf_page_rows'] - $i;

				if (strstr($list[$i]['wr_option'], 'secret')) {
					$wr_icon = '<span class="na-icon na-secret"></span>';
				} else if ((strtotime($list[$i]['wr_datetime']) + 86400) >= G5_SERVER_TIME) {
					$wr_icon = '<span class="na-icon na-new"></span>';
				} else {
					$wr_icon = '';
				}
			?>
			<li class="tr">
				<div class="td icon">
					<a href="<?php echo $list[$i]['href']; ?>" class="bg-light">
						<?php if($list[$i]['comment']) { ?>
							<i class="fa fa-commenting" aria-hidden="true"></i>
							<span class="sound_only">댓글</span>
						<?php } else { ?>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							<span class="sound_only">게시물</span>
						<?php } ?>
					</a>
				</div>
				<?php if ($is_admin) { ?>
					<div class="td icon">
						<?php 
							switch($list[$i]['flag']) {
								case '1'	: $flag = '신고'; $fcolor = 'danger'; break;
								case '-1'	: $flag = '해제'; $fcolor = 'white'; break;
								default		: $flag = '접수'; $fcolor = 'primary'; break;
							}
						?>
						<button type="button" onclick="<?php echo $list[$i]['onclick'] ?>" class="btn btn-<?php echo $fcolor ?> btn-xs">
							<span class="f-small"><?php echo $flag ?></span>
						</button>
					</div>
				<?php } ?>
				<div class="td subj">
					<div class="tr">
						<div class="td td-subj">
							<?php 
							// 신고인
							if ($is_admin && $list[$i]['mb_ids']) { 
								$mb_ids = '';
								$arr = explode(",", $list[$i]['mb_ids']);
								$arr_cnt = count($arr);
								for($z=0; $z < $arr_cnt; $z++) {
									if($z > 0) $mb_ids .= ', ';
									$mb_ids .= '<a onclick="win_profile(this.href); return false;" href="'.G5_BBS_URL.'/profile.php?mb_id='.urlencode($arr[$i]).'">'.$arr[$i].'</a>'.PHP_EOL;
								}
							?>
								<span class="cate f-small">
									신고인 : <?php echo $mb_ids ?>
								</span>
							<?php } ?>
							<a href="<?php echo $list[$i]['href'] ?>" class="ellipsis">
								<?php echo $wr_icon ?>
								<?php echo na_get_text($list[$i]['wr_subject']) ?>
							</a>
						</div>
						<div class="td td-item name f-small">
							<?php echo na_name_photo($list[$i]['mb_id'], $list[$i]['name']) ?>
						</div>
						<div class="td td-item date f-small">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
							<?php echo na_date($list[$i]['regdate'], 'orangered', 'H:i', 'm.d', 'm.d') ?>
						</div>
					</div>
				</div>
				<?php if ($is_admin) { ?>
					<div class="td chk">
						<label for="chk_bn_id_<?php echo $i ?>" class="sound_only"><?php echo $num ?>번</label>
						<input type="checkbox" name="chk_bn_id[]" value="<?php echo $i ?>" id="chk_bn_id_<?php echo $i ?>">
						<input type="hidden" name="bo_table[<?php echo $i ?>]" value="<?php echo $list[$i]['bo_table'] ?>">
						<input type="hidden" name="wr_id[<?php echo $i ?>]" value="<?php echo $list[$i]['wr_id'] ?>">
					</div>
				<?php } ?>
			</li>
		<?php }  ?>
		<?php if ($i == 0) { ?>
			<li class="none">
				게시물이 없습니다.
			</li>
		<?php } ?>
		</ul>
	</div>
	<!-- } 신고 목록 끝 -->
</form>

<!-- 신고 페이지네이션 시작 { -->
<div id="shingo_page" class="clearfix na-page text-center pg-<?php echo $color ?>">
	<ul class="pagination en">
		<?php echo na_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "?page="); ?>
	</ul>
</div>
<!-- } 신고 페이지네이션 끝 -->

<div class="h20"></div>

<?php if ($is_admin) { ?>
	<script>
	$(function(){
		$('#all_chk').click(function(){
			$('[name="chk_bn_id[]"]').attr('checked', this.checked);
		});
	});

	function fshingo_submit(f) {

		f.pressed.value = document.pressed;

		var cnt = 0;
		for (var i=0; i<f.length; i++) {
			if (f.elements[i].name == "chk_bn_id[]" && f.elements[i].checked)
				cnt++;
		}

		if (!cnt) {
			alert(document.pressed+"할 게시물을 하나 이상 선택하세요.");
			return false;
		}

		if (!confirm("선택한 게시물을 정말 "+document.pressed+" 하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다")) {
			return false;
		}

		f.action = "./shingo_delete.php";

		return true;
	}
	</script>
<?php } ?>
