<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 모바일 헤드는 메뉴에 들어가 있음. 상단고정문제 때문에...ㅠㅠ

add_stylesheet('<link rel="stylesheet" href="'.$nt_header_url.'/header.css">', 0);
?>

<!-- PC Header -->
<header id="header_pc" class="d-none d-md-block">
	<div class="nt-container py-4 px-3 px-sm-4 px-xl-0">
		<div class="d-flex">
			<div class="align-self-center pr-4">
				<!-- PC Logo -->
				<div class="header-logo">
					<a href="<?php echo NT_HOME_URL ?>">
						<img id="logo_img" src="<?php echo $tset['logo_img'] ?>" alt="<?php echo get_text($config['cf_title']) ?>">
					</a>
				</div>		  
			</div>
			<div class="align-self-center">
				<!-- PC Search -->
				<div class="header-search">
					<form name="tsearch" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return tsearch_submit(this);" class="border-primary">
						<input type="hidden" name="sfl" value="wr_subject||wr_content">
						<input type="hidden" name="sop" value="and">
						<div class="input-group input-group-lg">
							<input type="text" name="stx" class="form-control en" value="<?php echo $stx ?>">
							<div class="input-group-append">
								<button type="submit" class="btn"><i class="fa fa-search fa-lg text-primary"></i></button>
							</div>
						</div>
					</form>
					<div class="header-keyword mt-2">
						<?php echo na_widget('basic-keyword', 'popular', 'q=아미나,나리야,플러그인,그누보드5.4,부트스트랩4,테마,스킨,위젯,애드온'); ?>
					</div>
				</div>		  
			</div>
			<div class="ml-auto align-self-center">
				<!-- 배너 등 우측 영역 컨텐츠 -->
				&nbsp;
			</div>
		</div>
	</div>
</header>
