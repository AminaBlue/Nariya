<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// 추출하기
$list = na_board_rows($wset);
$list_cnt = count($list);

// 랭킹
$rank = na_rank_start($wset['rows'], $wset['page']);

// 아이콘
$icon = ($wset['icon']) ? '<i class="fa '.$wset['icon'].'" aria-hidden="true"></i>' : '';

// 글 이동
$is_link = false;
switch($wset['target']) {
	case '1' : $target = ' target="_blank"'; break;
	case '2' : $is_link = true; break;
	case '3' : $target = ' target="_blank"'; $is_link = true; break;
	default	 : $target = ''; break; 
}

// 리스트
for ($i=0; $i < $list_cnt; $i++) { 

	// 아이콘 체크
	if ($list[$i]['icon_secret']) {
		$is_lock = true;
		$wr_icon = '<span class="na-icon na-secret"></span>';
	} else if ($wset['rank']) {
		$wr_icon = '<span class="rank-icon en bg-'.$wset['rank'].'">'.$rank.'</span>';	
		$rank++;
	} else if($list[$i]['icon_new']) {
		$wr_icon = '<span class="na-icon na-new"></span>';
	} else {
		$wr_icon = $icon;
	}

	// 링크 이동
	if($is_link && $list[$i]['wr_link1']) {
		$list[$i]['href'] = $list[$i]['link_href'][1];
	}

?>
	<li class="px-3 px-sm-0">
		<div class="na-title">
			<div class="float-right text-muted f-sm font-weight-normal ml-2">
				<span class="sr-only">등록일</span>
				<?php echo na_date($list[$i]['wr_datetime'], 'orangered', 'H:i', 'm.d', 'm.d') ?>
			</div>
			<div class="na-item">
				<a href="<?php echo $list[$i]['href'] ?>" class="na-subject"<?php echo $target ?>>
					<?php echo $wr_icon ?>
					<?php echo $list[$i]['subject'] ?>
				</a>
				<?php if($list[$i]['wr_comment']) { ?>
					<div class="na-info">
						<span class="count-plus orangered">
							<span class="sr-only">댓글</span>
							<?php echo $list[$i]['wr_comment']; ?>
						</span>
					</div>
				<?php } ?>
			</div>
		</div>
	</li>
<?php } ?>

<?php if(!$list_cnt) { ?>
	<li class="f-sm text-muted text-center px-4 py-5">
		글이 없습니다.
	</li>
<?php } ?>