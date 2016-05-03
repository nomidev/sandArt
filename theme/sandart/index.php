<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

	<div class="section_left">
		<h2><img src="<?php echo G5_THEME_IMG_URL; ?>/main_title.png" alt="KAS 한국샌드아트협회"></h2>
		<p>한국샌드아트협회는 회원 상호간의 정보 교류와 창조적 작품 활동을 통해 개인의 자실 향상과 더불어 다양한 문화 활동을 조장하기 위하여 설립되었습니다.<br>
		본회는 질 높고 체계적인 교육 컨텐츠를 개발하고 행정기관에 등록된 자격증을 발행하여 샌드아트 전문가 양성을 위해 노력하고 있습니다.
		국내 뿐 아니라 해외 아티스트들과의 활발한 교류로 다양한 정보를 활용하여 새로운 컨텐츠 개발에 정진하고자 합니다.</p>
	</div>
	<div class="section_right">
		
		<?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/basic', "notice", 5, 25);
        ?>
		<div class="ceri_info">
			<h3>자격증안내</h3>
			<p>한국샌드아트협회에서 인증하는 샌드아트 지도사 자격증을 통해 각 분야에 공연, 체험교육 강사로써 다양한 활동을 할 수 있는 자격을 부여합니다.</p>
			<a href="<?php echo G5_BBS_URL ?>/content.php?co_id=certification" title="자격증안내" class="btn">자세히보기</a>
		</div>
		<div class="date_info">
			<h3>시험일정 안내</h3>
			<table summary="시험, 검정료, 접수기간, 시험일정, 합격자 발표">
				<caption>시험일점 테이블</caption>
				<tbody>
					<tr>
						<th scope="row">시험</th>
						<td>제 3차 샌드아트 3급 지도사 자격증</td>
					</tr>
					<tr>
						<th scope="row">검정료</th>
						<td>99,000원</td>
					</tr>
					<tr>
						<th scope="row">접수기간</th>
						<td>2016.05.23 ~ 2016.05.23</td>
					</tr>
					<tr>
						<th scope="row">시험일정</th>
						<td>2016.06.04 / 2016.06.11</td>
					</tr>
					<tr>
						<th scope="row">합격자발표</th>
						<td>2016.06.20</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="cust_info">
			<h3>문의사항</h3>
			<p class="num">02-472-5780</p>
			<p>평일: AM 10:00 ~ PM 6:00</p>
			<p>토요일: AM 10:00 ~ PM 3:00</p>
			<p>(공휴일, 일요일 휴무)</p>
		</div>
	</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>