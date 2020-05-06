<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$nt_title_url.'/title.css">', 0);

?>

<!-- Page Title -->
<div id="nt_title" class="font-weight-normal">
	<div class="nt-container px-3 px-sm-4 px-xl-0">
		<div class="d-flex pb-1">
			<div class="align-self-end page-title en text-nowrap">
				<?php if($tset['page_icon']) { ?>
					<i class="fa <?php echo $tset['page_icon'] ?>" aria-hidden="true"></i>
				<?php } ?>
				<strong><?php echo $page_title;?></strong>
			</div>
			<div class="align-self-end ml-auto d-none d-sm-block">
				<nav aria-label="breadcrumb" class="f-sm">
					<ol class="breadcrumb bg-transparent p-0 m-0">
						<?php
							// 페이지 설명글 없으면 현재 위치 출력
							$tnav_cnt = 0;
							$tnav_txt = $tset['page_desc'];
							if(!$tnav_txt) {
								$tnav_cnt = count($tnav);
								if(!$tnav_cnt) {
									$tnav_txt = $page_title;
								}
							}
						?>
						<?php if($tnav_txt) { ?>
							<li class="breadcrumb-item active mb-0" aria-current="page">
								<a href="#"><?php echo $tnav_txt ?></a>
							</li>
						<?php } ?>
						<?php if($tnav_cnt) { ?>
							<li class="breadcrumb-item mb-0">
								<a href="<?php echo NT_HOME_URL ?>"><i class="fa fa-home"></i></a>
							</li>
							<?php for($i=0; $i < $tnav_cnt; $i++) { ?>
								<li class="breadcrumb-item mb-0<?php echo (($i + 1) == $tnav_cnt) ? ' active" aria-current="page' : ''; ?>">
									<a href="<?php echo $tnav[$i]['href'] ?>" target="<?php echo $tnav[$i]['target'] ?>"><?php echo $tnav[$i]['text'] ?></a>
								</li>
							<?php } ?>
						<?php } ?>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
