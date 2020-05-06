<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$connect_skin_url.'/style.css">', 0);

// 스킨 설정값
$wset = na_skin_config('connect');

// 목록헤드
if($boset['head_skin']) {
	add_stylesheet('<link rel="stylesheet" href="'.NA_URL.'/skin/head/'.$boset['head_skin'].'.css">', 0);
	$head_class = 'list-head';
} else {
	$head_class = ($wset['head_color']) ? 'border-'.$color : 'border-primary';
}

?>

<section id="connect_list" class="mb-4">

	<h2 class="sr-only">현재 접속자 목록</h2>

	<div class="div-head <?php echo $head_class ?>">
		<span class="col-w70 px-2">번호</span>
		<span class="px-2 text-left text-sm-center">
			<?php if($is_admin == 'super' || IS_DEMO) { ?>
				<?php if(is_file($connect_skin_path.'/setup.skin.php')) { ?>
					<div class="float-right">
						<a class="btn_b01 btn-setup" href="<?php echo na_setup_href('connect') ?>" title="스킨설정">
							<i class="fa fa-cogs" aria-hidden="true"></i>
							<span class="sound_only">스킨설정</span>
						</a>
					</div>
				<?php } ?>
			<?php } ?>
			접속자 위치
		</span>
	</div>
	<ul class="w-100">
    <?php
    for ($i=0; $i < count($list); $i++) {
        //$location = conv_content($list[$i]['lo_location'], 0);
        $location = $list[$i]['lo_location'];
        // 최고관리자에게만 허용
        // 이 조건문은 가능한 변경하지 마십시오.
        if ($list[$i]['lo_url'] && $is_admin == 'super') $display_location = "<a href=\"".$list[$i]['lo_url']."\">".$location."</a>";
        else $display_location = $location;
    ?>
		<li class="border-bottom">
			<div class="d-table">
				<div class="d-table-row">
					<div class="d-table-cell align-middle text-center col-w70 p-2">
						<span class="sr-only">번호</span>
						<?php echo $list[$i]['num'] ?>
					</div>
					<div class="d-table-cell p-2">
						<div class="d-sm-flex">
							<div class="col-w120 pb-1 pb-sm-0">
								<span class="sr-only">접속자</span>
								<?php echo na_name_photo($list[$i]['mb_id'], $list[$i]['name']) ?>
							</div>
							<div class="flex-grow-1">
								<div class="ellipsis">
									<span class="sr-only">위치</span>
									<?php echo $display_location ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </li>
    <?php } ?>
    </ul>
</section>
