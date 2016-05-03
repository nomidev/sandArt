<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

//비주얼이미지 클래스 설정
if ($co_id == "about" || $co_id == "membership" || $co_id == "location") {
	$visual = "about";
	$breadcrumbs = "&gt; 협회소개";
} else if ($co_id == "certification") {
	$visual = "certification";
} else if ($co_id == "social") {
	$visual = "social";
} else if ($bo_table == "notice" || $bo_table == "qna") {
	$visual = "community";
	$breadcrumbs = "&gt; 커뮤니티";
} else {
	$visual = "about";
}
?>

<div class="wrap">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    
    <!-- header -->
    <div class="header">
        <h1><a href="<?php echo G5_URL ?>"><?php echo $config['cf_title']; ?></a></h1>
        <ul class="gnb">
            <?php
            $sql = " select *
                        from {$g5['menu_table']}
                        where me_use = '1'
                          and length(me_code) = '2'
                        order by me_order, me_id ";
            $result = sql_query($sql, false);
            $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

            for ($i=0; $row=sql_fetch_array($result); $i++) {
            ?>
            <li>
                <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
                <?php
                $sql2 = " select *
                            from {$g5['menu_table']}
                            where me_use = '1'
                              and length(me_code) = '4'
                              and substring(me_code, 1, 2) = '{$row['me_code']}'
                            order by me_order, me_id ";
                $result2 = sql_query($sql2);

                for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                    if($k == 0)
                        echo '<ul>'.PHP_EOL;
                ?>
                    <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                <?php
                }

                if($k > 0)
                    echo '</ul>'.PHP_EOL;
                ?>
            </li>
            <?php
            }

            if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
            <?php } ?>
        </ul>
        <div class="footer">
            <address>서울 강동구 풍성로 92, 2층<br>Tel. 02-472-5780<br>Fax. 02-470-5789</address>
            <p class="copy">Copyright &copy; 2016<br>Korea <a href="<?php echo G5_ADMIN_URL; ?>">Sandart</a> Association<br>All rights reserved.</p>
        </div>
    </div>
    <div class="lnb_bg"></div>
    <!-- container -->
    <?php if (!defined("_INDEX_")) { ?>
    <div class="container" #container>
        <div class="sub_top <?php echo $visual ?>">
			<h2><?php echo ($bo_table == "notice" || $bo_table == "qna") ? $board['bo_subject'] : $g5['title'] ?></h2>			
            <div class="breadcrumbs">Home <?php echo $breadcrumbs ?> &gt; <b><?php echo ($bo_table == "notice" || $bo_table == "qna") ? $board['bo_subject'] : $g5['title'] ?></b></div>
            <p class="blind">예술의 대중화에 앞장서는 한국샌드아트협회</p>
        </div>
		<div class="cnt_wrap">
    <?php } else { ?>
	<div class="container main" #container>
    <?php } ?>

    