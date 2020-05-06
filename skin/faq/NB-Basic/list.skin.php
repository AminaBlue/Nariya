<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$faq_skin_url.'/style.css">', 0);

// 스킨 설정값
$wset = na_skin_config('faq');

$head_color = ($wset['head_color']) ? $wset['head_color'] : 'primary';

?>

<!-- FAQ 시작 { -->
<?php
if ($himg_src)
    echo '<div id="faq_himg" class="faq_img"><img src="'.$himg_src.'" alt=""></div>';

// 상단 HTML
echo '<div id="faq_hhtml">'.conv_content($fm['fm_head_html'], 1).'</div>';
?>

<!-- FAQ 검색 시작 { -->
<div id="faq_search" class="collapse<?php echo ($wset['search_open'] || $stx) ? ' show' : ' '; ?>">
	<div class="alert bg-light border p-2 p-sm-3 mb-3">
		<form name="faq_search_form" method="get" class="m-auto col-w400">
			<input type="hidden" name="fm_id" value="<?php echo $fm_id;?>">
			<div class="form mb-0">
				<div class="input-group">
					<label for="stx" class="sr-only">검색어</label>
					<input type="text" name="stx" value="<?php echo $stx; ?>" id="faq_stx" class="form-control" placeholder="검색어를 입력해 주세요.">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary" title="검색하기">
							<i class="fa fa-search" aria-hidden="true"></i>
							<span class="sr-only">검색하기</span>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- } FAQ 검색 끝 -->

<!-- FAQ 분류 시작 { -->
<nav id="faq_cate" class="na-cate-sly mb-2">
	<h3 class="sr-only">자주하시는질문 분류 목록</h3>
	<div class="d-flex">
		<div id="faq_cate_list" class="flex-grow-1">
			<ul id="faq_cate_ul">
			<?php
				//분류 정리
				na_script('sly');
				$cn = $ca_select = 0;
				foreach($faq_master_list as $v){
					$ca_active = $ca_msg = '';
					if($v['fm_id'] == $fm_id){ // 현재 선택된 분류라면
						$ca_active = ' class="active"';
						$ca_msg = '<span class="sr-only">현재 분류</span>';
						$ca_select = $cn; // 현재 위치 표시
					}
			?>
				<li<?php echo $ca_active ?>>
					<a class="py-2 px-3" href="<?php echo $category_href;?>?fm_id=<?php echo $v['fm_id'];?>">
						<?php echo $ca_msg.$v['fm_subject'];?>
					</a>
				</li>
			<?php $cn++; } ?>
			</ul>				
		</div>
		<div>
			<a href="javascript:;" class="ca-btn ca-prev py-2 px-3">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
				<span class="sr-only">이전 분류</span>
			</a>
		</div>
		<div>
			<a href="javascript:;" class="ca-btn ca-next py-2 px-3">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
				<span class="sr-only">다음 분류</span>
			</a>				
		</div>
	</div>
	<hr/>
</nav>
<!-- } FAQ 분류 끝 -->

<!-- 페이지 정보 및 버튼 시작 { -->
<div id="faq_btn_top" class="f-small mb-2 clearfix">
	<ul class="btn_bo_user float-right">
		<?php if($admin_href || IS_DEMO) { ?>
			<?php if($admin_href) { ?>
				<li>
					<a href="<?php echo $admin_href ?>" title="FAQ 수정" class="btn_admin btn" role="button">
						<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
						<span class="sr-only">FAQ 수정</span>
					</a>
				</li>
			<?php } ?>
			<?php if(is_file($faq_skin_path.'/setup.skin.php')) { ?>
				<li>
					<a href="<?php echo na_setup_href('faq') ?>" title="스킨설정" class="btn_b01 btn btn-setup">
						<i class="fa fa-cogs" aria-hidden="true"></i>
						<span class="sr-only">스킨설정</span>
					</a>
				</li>
			<?php } ?>
		<?php } ?>
		<li>
			<button type="button" class="btn_b01 btn" title="FAQ 검색" data-toggle="collapse" data-target="#faq_search" aria-expanded="false" aria-controls="faq_search">
				<i class="fa fa-search" aria-hidden="true"></i>
				<span class="sr-only">FAQ 검색</span>
			</button>
		</li>
	</ul>
	<div id="bo_list_total" class="float-left mt-1">
		전체 <b><?php echo number_format($total_count) ?></b>건 / <?php echo $page ?>페이지
	</div>
</div>
<!-- } 페이지 정보 및 버튼 끝 -->

<div id="faq_wrap" class="faq_<?php echo $fm_id; ?> border-<?php echo $head_color ?> mb-3">
    <?php // FAQ 내용
    if( count($faq_list) ){
    ?>
    <section id="faq_con">
        <h2 class="sr-only"><?php echo $g5['title']; ?> 목록</h2>
        <ul>
            <?php
			$i=0;
            foreach($faq_list as $key=>$v){
                if(empty($v))
                    continue;
            ?>
            <li class="border-bottom">
                <div class="d-flex faq-toggle cursor">
					<div class="p-2">
						<i class="fa fa-question-circle fa-lg" aria-hidden="true"></i>
					</div>
					<div class="flex-grow-1 py-2">
	                	<?php echo conv_content($v['fa_subject'], 1); ?>
					</div>
					<div class="p-2">
						<i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
                </div>
                <div class="collapse w-100">
					<div class="border-top p-2 p-sm-3 bg-light">
	                    <?php echo conv_content($v['fa_content'], 1); ?>
					</div>
                </div>
            </li>
            <?php
            $i++; }
            ?>
        </ul>
    </section>
    <?php

    } else {
        if($stx){
            echo '<div class="no-data border-bottom">검색된 게시물이 없습니다.</div>';
        } else {
            echo '<div class="no-data border-bottom">등록된 FAQ가 없습니다.';
            if($is_admin)
                echo '<p class="mt-2"><a href="'.G5_ADMIN_URL.'/faqmasterlist.php">FAQ를 새로 등록하시려면 FAQ관리</a> 메뉴를 이용하십시오.</p>';
            echo '</div>';
        }
    }
    ?>
</div>

<?php if($total_count) { ?>
	<div id="faq_page">
		<ul class="pagination justify-content-center en mb-4">
			<?php echo na_paging($page_rows, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>
		</ul>
	</div>
<?php }?>

<?php 
	 // 하단 HTML
	echo '<div id="faq_thtml" class="faq-html">'.$faq_tail_html.'</div>';

	if ($timg_src) 
		echo '<div id="faq_timg" class="faq-img"><img src="'.$timg_src.'" alt=""></div>';

?>

<script>
// Sly Resize
var na_cate_sly = function() {

	var cate_ul = $('#faq_cate_ul');
	var cate_list = $('#faq_cate_list');
	var cate_ul_w = cate_ul.width();
	var cate_list_w = cate_list.width();

	cate_ul.css('width', 'auto').css('min-width', (cate_ul_w + 1)+ 'px');

	if(cate_ul_w >= cate_list_w) {
		$('.ca-btn').addClass('d-inline-block');
	} else {
		$('.ca-btn').removeClass('d-inline-block');
	}

	cate_list.sly('reload');
}

$(document).ready(function() {
	$('#faq_cate_list').sly({
		horizontal: 1,
		itemNav: 'basic', //basic
		smart: 1,
		mouseDragging: 1,
		touchDragging: 1,
		releaseSwing: 1,
		startAt: <?php echo $ca_select ?>,
		speed: 300,
		dragHandle: 1,
		dynamicHandle: 1,
		prevPage: '.ca-prev',
		nextPage: '.ca-next'
	});

	na_cate_sly();

	$(window).resize(function(e) {
		na_cate_sly();
	});

	$(document).on('click', '#faq_wrap .faq-toggle', function () {
		var $toggle = $(this).parent().children('.collapse');
		var $css = $toggle.css("display");

		if($css == 'none') {
			$(this).addClass('text-primary');
		} else {
			$(this).removeClass('text-primary');
		}

		$toggle.toggle(200);
	});
});
</script>
