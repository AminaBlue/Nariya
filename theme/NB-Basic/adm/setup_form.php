<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.NA_URL.'/css/modal.css">', 0);

// 저장버튼
$btn_submit = '<p class="btn-submit"><button type="submit" class="btn btn-block btn-lg btn-primary en">Save</button></p>';

// 체크박스 아이디
$idn = 1;

// 모달 내 모달 체크
$is_modalw = ($mode == 'page') ? 1 : '';

// 저장폴더 권한 체크
@include_once(NA_PATH.'/theme/save.inc.php');

// input의 name - co:공통, pc:PC용, mo:모바일용
// pc와 mo는 같은 배열키를 가져야 하고, co와는 같으면 안됨(같을 경우 덮어씀)

?>

<style>
#fsetup .btn-submit {
	max-width:200px;
	margin:15px auto 30px;
}
#fsetup ol {
	padding-left:20px;
	margin-bottom:0;
}
</style>

<ul class="list-group f-de">

	<?php if($mode == 'site') { //사이트 설정용 ?>
	<li class="list-group-item pt-0 border-top-0<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">필독사항</label>
			<div class="col-sm-10">
				<p class="form-control-plaintext f-de">
					<a data-toggle="collapse" href="#pre_work" aria-expanded="false" aria-controls="pre_work">
						<i class="fa fa-caret-right" aria-hidden="true"></i>
						테마/스킨 등 설정방법 안내
					</a>
				</p>
				<div class="collapse" id="pre_work">
					<div class="table-responsive">
						<table class="table table-bordered mb-0">
						<tbody>
						<tr class="bg-light">
						<th class="text-center nw-c1">구분</th>
						<th class="text-center">작업 내용</th>
						</tr>
						<tr>
						<td class="text-center">
							스킨 변경
						</td>
						<td>
							<ol>
								<li>각 스킨은 PC 스킨(1:1문의, 내용관리 제외)만 설정해 주면 됩니다.</li>
								<li>환경설정 > 기본환경설정에서 최근 게시물, 검색, 접속자, FAQ, 회원스킨을 <b>NB-Basic</b>으로 변경해 주세요.</li>
								<li>게시판 관리 > 게시판 관리에서 각 게시판 스킨을 <b>NB-Basic</b>으로 변경해 주세요.</li>
								<li>게시판 관리 > 내용 관리에서 각 문서의 PC/모바일 스킨을 <b>NB-Basic</b>으로 변경해 주세요.</li>
								<li>게시판 관리 > 1:1 문의 설정에서 PC/모바일 스킨을 <b>NB-Basic</b>으로 변경해 주세요.</li>
							</ol>
						</td>
						</tr>
						<tr>
						<td class="text-center">
							내용 관리
						</td>
						<td>
							<ol>
								<li>등록 또는 신규 생성한 내용 관리의 PC/모바일 스킨을 <b>NB-Basic</b>으로 적용해 주세요.</li>
								<li>게시판 관리 > 내용 관리에서 다음 문서의 아이디(co_id)로 신규 등록해 주세요.
									<div class="table-responsive mt-2 mb-2">
										<table class="table table-bordered mb-0" style="min-width:200px !important;">
										<tbody>
										<tr class="bg-light">
										<th class="text-center nw-c1">아이디</th>
										<th class="text-center w-25">페이지명</th>
										<th class="text-center">비고</th>
										</tr>
										<tr>
										<td class="text-center">company</td>
										<td class="text-center">사이트 소개</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										<tr>
										<td class="text-center">provision</td>
										<td class="text-center">이용약관</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										<tr>
										<td class="text-center">privacy</td>
										<td class="text-center">개인정보처리방침</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										<tr>
										<td class="text-center">noemail</td>
										<td class="text-center">이메일 무단수집거부</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										<tr>
										<td class="text-center">disclaimer</td>
										<td class="text-center text-nowrap">책임의 한계와 법적책임</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										<tr>
										<td class="text-center">guide</td>
										<td class="text-center">이용안내</td>
										<td class="text-muted">&nbsp;</td>
										</tr>
										</tbody>
										</table>
									</div>
								</li>
								<li>내용 관리 아이디(co_id)와 테마 내 /page 폴더의 php 파일명이 같으면 테마 내 /page 폴더의 php 파일이 출력됩니다.</li>
							</ol>
						</td>
						</tr>
						<tr>
						<td class="text-center">
							그룹 메인
						</td>
						<td>
							<ol>
								<li>기본은 테마 내 group.php 파일이 출력됩니다.</li>
								<li>그룹 아이디(gr_id)와 테마 내 /group 폴더의 php 파일명이 같으면 테마 내 /group 폴더의 php 파일이 출력됩니다.</li>
							</ol>
						</td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</li>
	<?php } //사이트 설정용 ?>

	<?php if($mode == 'page') { //페이지 설정용 ?>
	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">주의사항</label>
			<div class="col-sm-10">
				<p class="form-control-plaintext f-de">
					<i class="fa fa-caret-right" aria-hidden="true"></i>
					<strong>기본 설정과 다른 것만 설정해 주세요.</strong> 같은데 또 설정하면 기본 설정 변경시 페이지 설정도 다 변경해야 합니다.
				</p>
			</div>
		</div>
	</li>
	<?php } ?>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">SEO 설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center">설정</th>
					</tr>
					<?php if($mode == 'page') { // 페이지 설정용 ?>
						<tr>
						<td class="text-center">
							설명글
						</td>
						<td>
							<textarea name="co[seo_desc]" rows="3" class="form-control" placeholder="한글 기준 160자 이내 등록"><?php echo $pc['seo_desc'] ?></textarea>		
						</td>
						</tr>
						<tr>
						<td class="text-center">
							키워드
						</td>
						<td>
							<textarea name="co[seo_keys]" rows="3" class="form-control" placeholder="콤마(,)로 키워드 구분"><?php echo $pc['seo_keys'] ?></textarea>		
							<p class="form-control-plaintext f-de text-muted pb-0 mb-0">
								미 설정시 내용에서 3글자 이상인 한글로 최대 20개까지 키워드 자동생성
							</p>
						</td>
						<tr>
						<td class="text-center">
							이미지
						</td>						
						<td>
							<div class="input-group">
								<input type="text" id="seo-img" class="form-control" name="co[seo_img]" value="<?php echo $pc['seo_img'] ?>" placeholder="http://...">
								<div class="input-group-append">
									<a href="<?php echo na_theme_href('image', 'seo', 'seo-img') ?>" class="btn btn-primary btn-setup">
										<i class="fa fa-search"></i>
									</a>
								</div>
							</div>
							<p class="form-control-plaintext f-de text-muted pb-0 mb-0">
								글내용 또는 페이지에 이미지가 있으면 자동 생성
							</p>
						</td>
						</tr>
					<?php } else { ?>
						<tr>
						<td class="text-center">
							SEO 사용
						</td>
						<td>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="co[seo]" value="1"<?php echo get_checked('1', $pc['seo'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"><span>게시판, 페이지별 자동 SEO 사용</span></label>
							</div>
						</td>
						</tr>
						<tr>
						<td class="text-center">
							설명글
						</td>
						<td>
							<textarea name="co[site_desc]" rows="3" class="form-control" placeholder="한글 기준 160자 이내 등록"><?php echo $pc['site_desc'] ?></textarea>		
						</td>
						</tr>
						<tr>
						<td class="text-center">
							키워드
						</td>
						<td>
							<textarea name="co[site_keys]" rows="3" class="form-control" placeholder="콤마(,)로 키워드 구분"><?php echo $pc['site_keys'] ?></textarea>		
							<p class="form-control-plaintext f-de text-muted pb-0 mb-0">
								미 설정시 내용에서 3글자 이상인 한글로 최대 20개까지 키워드 자동생성
							</p>
						</td>
						<tr>
						<td class="text-center">
							이미지
						</td>						
						<td>
							<div class="input-group">
								<input type="text" id="seo-img" class="form-control" name="co[site_img]" value="<?php echo $pc['site_img'] ?>" placeholder="http://...">
								<div class="input-group-append">
									<a href="<?php echo na_theme_href('image', 'seo', 'seo-img') ?>" class="btn btn-primary btn-setup">
										<i class="fa fa-search"></i>
									</a>
								</div>
							</div>
							<p class="form-control-plaintext f-de text-muted pb-0 mb-0">
								글내용 또는 페이지에 이미지가 있으면 자동 생성
							</p>
						</td>
						</tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<p class="form-text f-de text-muted mb-0 pb-0">
					SEO 출력 항목 수정 : /nariya/theme/seo.php 파일
				</p>
			</div>
		</div>
	</li>

	<?php if($mode == 'page') { //페이지 설정용 
			// 아이콘 선택기
			na_script('iconpicker');
	?>
	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">타이틀 설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center">설정</th>
					</tr>
					<tr>
					<td class="text-center">
						타이틀 이름
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<button id="page_icon" class="btn btn-secondary" data-placement="bottom" data-icon="<?php echo $pc['page_icon'] ?>" role="iconpicker" name="co[page_icon]"></button>
							</div>
							<input type="text" name="co[page_title]" value="<?php echo $pc['page_title'] ?>" class="form-control">
						</div>
						<script>
						$('#page_icon').iconpicker();
						</script>
					</td>
					</tr>
					<tr>
					<td class="text-center">
						타이틀 설명
					</td>
					<td>
						<input type="text" name="co[page_desc]" value="<?php echo $pc['page_desc'] ?>" class="form-control">
					</td>
					</tr>
					</tbody>
					</table>
				</div>
				<p class="form-text f-de text-muted mb-0">
					타이틀 스킨에서 사용되며, 출력하지 않을 경우 아래 타이틀 스킨을 none 으로 설정해 주세요.
				</p>
			</div>
		</div>
	</li>
	<?php } ?>

	<?php if($mode == 'site') { //사이트 설정용 ?>
	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">로고 설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center">설정</th>
					</tr>
					<tr>
					<td class="text-center">
						이미지 로고
					</td>
					<td class="text-center">
						<div class="input-group">
							<input type="text" id="theme-logo-img" class="form-control" name="co[logo_img]" value="<?php echo $pc['logo_img'] ?>" placeholder="http://...">
							<div class="input-group-append">
								<a href="<?php echo na_theme_href('image', 'logo', 'theme-logo-img') ?>" class="btn btn-primary btn-setup">
									<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</td>
					</tr>
					<tr>
					<td class="text-center">
						텍스트 로고
					</td>
					<td>
						<textarea name="co[logo_text]" rows="3" class="form-control" placeholder="text..."><?php echo $pc['logo_text'] ?></textarea>		
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">캐시 설정</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">설정</th>
					<th class="text-center">비고</th>
					</tr>
					<tr>
					<td class="text-center">
						통계 캐시
					</td>
					<td class="text-center">
						<div class="input-group">
							<input type="text" class="form-control" name="co[stats]" value="<?php echo $pc['stats'] ?>" placeholder="0">
							<div class="input-group-append">
								<span class="input-group-text">분</span>
							</div>
						</div>
					</td>
					<td class="text-muted">
						미 설정시 방문자 통계만 출력되며, 검색 가능한 게시판에 대해서만 체크함
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">인덱스 설정</label>
			<div class="col-sm-10">

				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">PC 설정</th>
					<th class="text-center nw-c2">모바일 설정</th>
					<th class="text-center">비고</th>
					</tr>

					<tr>
					<td class="text-center">
						인덱스 파일
					</td>
					<td>
						<select name="pc[index]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_file_list(G5_THEME_PATH.'/index', 'php');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc['index'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="mo[index]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php for ($i=0; $i<count($skins); $i++) { // $skins PC랑 같은 배열임 ?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo['index'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td class="text-muted">
						/index 폴더 내 php 파일
					</td>
					</tr>

					</tbody>
					</table>
				</div>				

			</div>
		</div>
	</li>

	<?php } ?>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">페이지 설정</label>
			<div class="col-sm-10">

				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">PC 설정</th>
					<th class="text-center nw-c2">모바일 설정</th>
					<th class="text-center">비고</th>
					</tr>

					<tr>
					<td class="text-center">
						타이틀 스킨
					</td>
					<td>
						<select name="pc[title]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_dir_list(G5_THEME_PATH.'/layout/title');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc['title'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="mo[title]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php for ($i=0; $i<count($skins); $i++) { // $skins PC랑 같은 배열임 ?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo['title'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td class="text-muted">
						/layout/title 폴더
					</td>
					</tr>

					<tr>
					<td class="text-center">
						칼럼(다단)
					</td>
					<td>
						<select name="pc[page]" class="custom-select">
							<option value="">선택해 주세요.</option>
							<option value="9"<?php echo get_selected('9', $pc['page']) ?>>2단 - 기본 사이드</option>
							<option value="8"<?php echo get_selected('8', $pc['page']) ?>>2단 - 중간 사이드</option>
							<option value="7"<?php echo get_selected('7', $pc['page']) ?>>2단 - 대형 사이드</option>
							<option value="12"<?php echo get_selected('12', $pc['page']) ?>>1단 - 박스형</option>
							<option value="13"<?php echo get_selected('13', $pc['page']) ?>>1단 - 와이드</option>
						</select>
					</td>
					<td>
						<select name="mo[page]" class="custom-select">
							<option value="">선택해 주세요.</option>
							<option value="9"<?php echo get_selected('9', $mo['page']) ?>>2단 - 기본 사이드</option>
							<option value="8"<?php echo get_selected('8', $mo['page']) ?>>2단 - 중간 사이드</option>
							<option value="7"<?php echo get_selected('7', $mo['page']) ?>>2단 - 대형 사이드</option>
							<option value="12"<?php echo get_selected('12', $mo['page']) ?>>1단 - 박스형</option>
							<option value="13"<?php echo get_selected('13', $mo['page']) ?>>1단 - 와이드</option>
						</select>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>

					<tr>
					<td class="text-center">
						사이드 영역
					</td>
					<td>
						<select name="pc[page_side]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_dir_list(G5_THEME_PATH.'/layout/side');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc['page_side'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="mo[page_side]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php for ($i=0; $i<count($skins); $i++) { // $skins PC랑 같은 배열임 ?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo['page_side'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td class="text-muted">
						/layout/side 폴더
					</td>
					</tr>

					<tr>
					<td class="text-center">
						좌측 사이드
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="pc[left_side]" value="1"<?php echo get_checked('1', $pc['left_side'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="pc[left_side]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $pc['left_side']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $pc['left_side']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="mo[left_side]" value="1"<?php echo get_checked('1', $mo['left_side'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="mo[left_side]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $mo['left_side']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $mo['left_side']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>

					</tbody>
					</table>
				</div>				
				<p class="form-text f-de text-muted mb-0 pb-0">
					인덱스(메인)에 사이드 영역 적용 여부는 인덱스 파일 구조에 따라 달라집니다.
				</p>

			</div>
		</div>
	</li>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">레이아웃 설정</label>
			<div class="col-sm-10">

				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">PC 설정</th>
					<th class="text-center nw-c2">모바일 설정</th>
					<th class="text-center">비고</th>
					</tr>
					<?php if($mode == 'page') { //페이지 설정용 ?>
					<tr>
					<td class="text-center">
						헤드/테일 숨김
					</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="pc[page_sub]" value="1"<?php echo get_checked('1', $pc['page_sub'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="mo[page_sub]" value="1"<?php echo get_checked('1', $mo['page_sub'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						사이트의 헤드와 테일을 출력하지 않음
					</td>
					</tr>
					<?php } ?>
					<tr>
					<td class="text-center">
						폰트셋
					</td>
					<td>
						<select name="pc[font]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_file_list(G5_THEME_PATH.'/css/font', 'css');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc['font'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="mo[font]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_file_list(G5_THEME_PATH.'/css/font/mobile', 'css');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo['font'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td class="text-muted">
						테마 내 /css/font 폴더 내 CSS 파일
					</td>
					</tr>

					<tr>
					<td class="text-center">
						컬러셋
					</td>
					<td>
						<select name="pc[color]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php 
							unset($skins);
							$skins = na_file_list(G5_THEME_PATH.'/css/color', 'css');
							for ($i=0; $i<count($skins); $i++) { 
							?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc['color'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select name="mo[color]" class="custom-select">
							<option value="">선택해 주세요</option>
							<?php for ($i=0; $i<count($skins); $i++) { // $skins PC랑 같은 배열임 ?>
								<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo['color'], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
							<?php } ?>
						</select>
					</td>
					<td class="text-muted">
						테마 내 /css/color 폴더 내 CSS 파일
					</td>
					</tr>

					<tr>
					<td class="text-center">
						사이즈
					</td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control" name="pc[size]" value="<?php echo $pc['size'] ?>" placeholder="1100">
							<div class="input-group-append">
								<span class="input-group-text">px</span>
							</div>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control" name="mo[size]" value="<?php echo $mo['size'] ?>" placeholder="1200">
							<div class="input-group-append">
								<span class="input-group-text">px</span>
							</div>
						</div>
					</td>
					<td class="text-muted">
						사이트 최대 너비
					</td>
					</tr>

					<tr>
					<td class="text-center">
						박스형
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="pc[style]" value="1"<?php echo get_checked('1', $pc['style'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="pc[style]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $pc['style']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $pc['style']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="mo[style]" value="1"<?php echo get_checked('1', $mo['style'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="mo[style]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $mo['style']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $mo['style']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-muted">
						입력폼, 버튼 등 스타일
					</td>
					</tr>
					
					<tr>
					<td class="text-center">
						비반응형
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="pc[no_res]" value="1"<?php echo get_checked('1', $pc['no_res'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="pc[no_res]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $pc['no_res']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $pc['no_res']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="mo[no_res]" value="1" disabled class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						모바일은 반응형 고정
					</td>
					</tr>

					<tr>
					<td class="text-center">
						메뉴고정
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="pc[sticky]" value="1"<?php echo get_checked('1', $pc['sticky'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="pc[sticky]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $pc['sticky']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $pc['sticky']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="mo[sticky]" value="1"<?php echo get_checked('1', $mo['sticky'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="mo[sticky]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $mo['sticky']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $mo['sticky']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-muted">
						페이지 상단에 메뉴고정
					</td>
					</tr>

					<tr>
					<td class="text-center">
						위젯 라인
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="pc[line]" value="1"<?php echo get_checked('1', $pc['line'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="pc[line]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $pc['line']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $pc['line']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if($mode == 'site') { //사이트 설정용 ?>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="mo[line]" value="1"<?php echo get_checked('1', $mo['line'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
								<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
							</div>
						<?php } else { ?>
							<select name="mo[line]" class="custom-select">
								<option value="">선택해 주세요.</option>
								<option value="0"<?php echo get_selected('0', $mo['line']) ?>>사용안함</option>
								<option value="1"<?php echo get_selected('1', $mo['line']) ?>>사용함</option>
							</select>
						<?php } ?>
					</td>
					<td class="text-muted">
						리스트형 위젯에서 게시물간 구분선 출력
					</td>
					</tr>

					</tbody>
					</table>
				</div>				
			</div>
		</div>
	</li>

	<li class="list-group-item<?php echo $px_css ?>">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">컨텐츠 설정</label>
			<div class="col-sm-10">

				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">PC 설정</th>
					<th class="text-center nw-c2">모바일 설정</th>
					<th class="text-center">비고</th>
					</tr>

					<?php
					// 컨텐츠는 한 번에 처리...ㅠㅠ
					$area = array('top', 'lnb', 'header', 'menu', 'wing', 'footer', 'sidebar');
					$area_txt = array('상단 배너', '상단 네비', 'PC 헤더', '모바일 헤더, PC 메뉴', '좌우 배너', '하단 네비', '모바일 메뉴');
					for($z=0;$z<count($area);$z++) {
						$n = $area[$z];
					?>
						<tr>
						<td class="text-center">
							<?php echo strtoupper($n) ?>
						</td>
						<td>
							<select name="pc[<?php echo $n ?>]" class="custom-select">
								<option value="">선택해 주세요</option>
								<?php 
								unset($skins);
								$skins = na_dir_list(G5_THEME_PATH.'/layout/'.$n);
								for ($i=0; $i<count($skins); $i++) { 
								?>
									<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($pc[$n], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
								<?php } ?>
							</select>
						</td>
						<td>
							<select name="mo[<?php echo $n ?>]" class="custom-select">
								<option value="">선택해 주세요</option>
								<?php for ($i=0; $i<count($skins); $i++) { // $skins PC랑 같은 배열임 ?>
									<option value="<?php echo $skins[$i] ?>"<?php echo get_selected($mo[$n], $skins[$i]) ?>><?php echo $skins[$i] ?></option>
								<?php } ?>
							</select>
						</td>
						<td class="text-muted">
							<?php echo $area_txt[$z] ?> : /layout/<?php echo $n ?> 폴더
						</td>
						</tr>
					<?php } ?>

					</tbody>
					</table>
				</div>				

			</div>
		</div>
	</li>

</ul>

<?php echo $btn_submit ?>
