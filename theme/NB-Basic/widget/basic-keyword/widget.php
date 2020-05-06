<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

/* 슬라이드 키워드 위젯 - Owl Carousel */

// Owl Carousel
na_script('owl');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$widget_url.'/widget.css">', 0);

// 너비
$width = (int)$width;
$width = ($width > 0) ? $width : 448;

$list = array();

$n = 0;
if(isset($wset['d']['pp_word']) && is_array($wset['d']['pp_word'])) {
	$data_cnt = count($wset['d']['pp_word']);
	for($i=0; $i < $data_cnt; $i++) {
		if($wset['d']['pp_word'][$i]) {
			$list[$n]['pp_word'] = $wset['d']['pp_word'][$i];
			$list[$n]['pp_link'] = $wset['d']['pp_link'][$i];
			$n++;
		}
	}
} else {
	if($wset['q']) {
		$tmp = explode(",", $wset['q']);
		for($i=0; $i < count($tmp); $i++) {
			if($tmp[$i]) {
				$list[$n]['pp_word'] = $tmp[$i];
				$list[$n]['pp_link'] = '';
				$n++;
			}
		}
	}
}

$list_cnt = $n;

if($list_cnt && $wset['rand']) 
	shuffle($list);

$id = 'popular_'.na_rid();
?>
<style>
#<?php echo $id ?> .popular_inner {
	width:<?php echo $width ?>px; 
}
</style>
<!-- 인기검색어 시작 { -->
<section id="<?php echo $id ?>" class="basic-keyword">
    <h3 class="sound_only">인기검색어</h3>
    <div class="popular_inner f-sm font-weight-normal">
	    <ul>
		<?php for ($i=0; $i < $list_cnt; $i++) { ?>
			<li class="item">
				<?php if($list[$i]['pp_link']) { ?>
					<a href="<?php echo $list[$i]['pp_link'] ?>">
				<?php } else { ?>
					<a href="<?php echo G5_BBS_URL ?>/search.php?stx=<?php echo urlencode($list[$i]['pp_word']) ?>">
				<?php } ?>
				<?php echo get_text($list[$i]['pp_word']); ?>
				</a>
			</li>
		<?php } ?>

		<?php if(!$list_cnt) { ?>
			<li class="item"><a>위젯설정에서 검색어를 설정해 주세요.</a></li>
		<?php } ?>
	    </ul>
        <span class="popular_btns">
            <a href="#" class="pp-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="pp-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </span>
    </div>
</section>
<script>
$(function(){

	var popular_el = "#<?php echo $id ?> .popular_inner ul",
        p_width = $(popular_el).width(),
        c_width = 0;

    $(popular_el).children().each(function() {
        c_width += $(this).outerWidth( true );
    });

    if( c_width > p_width ){
        var $popular_btns = $("#<?php echo $id ?> .popular_inner .popular_btns");
        $popular_btns.show();

		$("#<?php echo $id ?>").addClass('popular_btn_show');

        var p_carousel = $(popular_el).addClass("owl-carousel").owlCarousel({
            items:1,
            loop:true,
            nav:false,
            dots:false,
            autoWidth:true,
            mouseDrag:false,
			autoplay:<?php echo ($wset['auto']) ? 'true' : 'false'; ?>
        });

        $popular_btns.on("click", ".pp-next", function(e) {
            e.preventDefault();
            p_carousel.trigger('next.owl.carousel');
        })
        .on("click", ".pp-prev", function(e) {
            e.preventDefault();
            p_carousel.trigger('prev.owl.carousel');
        });
    } else {
		$("#<?php echo $id ?>").removeClass('popular_btn_show');
	}

});
</script>

<?php if($setup_href) { ?>
	<div class="btn-wset">
		<a href="<?php echo $setup_href;?>" class="btn-setup">
			<span class="f-sm text-muted"><i class="fa fa-cog"></i> 위젯설정</span>
		</a>
	</div>
<?php } ?>
