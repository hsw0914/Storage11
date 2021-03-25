<div class="hide_sub_nav_wrap"></div>
<div class="sub_nav_wrap">
<?php
    switch (CONTROLLER){
        case 'unconsulting':
?>
    <div class="lib_title">
        <div class="sub_menu">
            <h3><a href="/view/unconsulting/main">대학 컨설팅</a></h3>
        </div>
    </div>
    <ul class="sub_nav">
        <li><a href="/view/unconsulting/development" data-name="development">대학 중장기 종합발전계획</a></li>
        <li><a href="/view/unconsulting/measures" data-name="measures">대학 직무분석 및 변화관리 방안</a></li>
        <li><a href="/view/unconsulting/support" data-name="support">대학 평가관련 컨설팅 – 기본역량진단 지원</a></li>
        <li><a href="/view/unconsulting/ebusiness" data-name="ebusiness">각종 대학관련 교육사업계획 지원</a></li>
        <li><a href="/view/unconsulting/ncsOperation"data-name="ncsOperation">NCS 기반 교육과정 개발 및 운영체계 구축</a></li>
        <li><a href="/view/unconsulting/curriculum"data-name="curriculum">NCS 기반 직무능력성취도 평가체계 구축</a></li>
        <li><a href="/view/unconsulting/management"data-name="management">NCS 기반 대학교육품질관리(CQI) 체제 구축</a></li>
        <li><a href="/view/unconsulting/founded"data-name="founded">NCS 기반 취·창업 교육</a></li>
        <li><a href="/view/unconsulting/hire"data-name="hire">NCS 기반 블라인드 채용 교육</a></li>
        <li><a href="/view/unconsulting/college"data-name="college">NCS 기반 교육과정 운영시스템 개발</a></li>
        <li><a href="/view/unconsulting/business"data-name="business">특성화사업 관리/운영시스템 개발</a></li>
        <li><a href="/view/unconsulting/teaching"data-name="teaching">티칭/러닝 포트폴리오 제작</a></li>
        <li><a href="/view/unconsulting/softwater"  data-name="softwater">해외 연수·취업</a></li>
        <li><a href="/view/unconsulting/education"  data-name="education">교육 리서치</a></li>
        <li><a href="/view/unconsulting/evaluation"  data-name="evaluation">기초학습능력 진단평가</a></li>
        <li><a href="/view/unconsulting/jobevaluation"  data-name="jobevaluation">직업학습능력 진단평가</a></li>
        <li><a href="/view/unconsulting/aptitude"  data-name="aptitude">인적성 검사</a></li>
        <li><a href="/view/unconsulting/course" data-name="course">진로적성검사</a></li>
        <li><a href="/view/unconsulting/imitation" data-name="imitation">모의 입사지원시스템 재능기부</a></li>
<?php
        break;
    case 'coconsulting':
?>
    <div class="lib_title">
        <div class="sub_menu">
            <h3><a href="/view/coconsulting/main">기업 컨설팅</a></h3>
        </div>
    </div>
    <ul class="sub_nav">
        <li><a href="/view/coconsulting/analysis" data-name="analysis">NCS 기반 직무분석/인사관리</a></li>
        <li><a href="/view/coconsulting/consulting" data-name="consulting">NCS 기반 블라인드채용컨설팅</a></li>
        <li><a href="/view/coconsulting/question" data-name="question">NCS 기반 문항개발 대행</a></li>
        <li><a href="/view/coconsulting/integrated" data-name="integrated">직업능력개발 훈련과정 통합심사 컨설팅</a></li>
        <li><a href="/view/coconsulting/agencies" data-name="agencies">NCS 기반 민간자격 개발 대행</a></li>
<?php
        break;
    case 'qudesign':
?>
    <div class="lib_title">
        <div class="sub_menu">
            <h3><a href="/view/qudesign/main">블라인드채용 대행</a></h3>
        </div>
    </div>
    <ul class="sub_nav">
        <li class="sub_nav_fll"><a href="/view/qudesign/blind" data-name="blind">NCS 기반 블라인드채용 대행서비스</a></li>
<?php
        break;
    case 'edu':
?>

        <div class="lib_title">
            <div class="sub_menu">
                <h3><a href="/view/edu/main">4차 산업혁명 교육ㆍ훈련분야</a></h3>
            </div>
        </div>
        <ul class="sub_nav">
            <li><a href="/view/edu/drone" data-name="drone">드론</a></li>
            <li><a href="/view/edu/math" data-name="math">코딩 수학</a></li>
            <li><a href="/view/edu/printing" data-name="printing">3D 프린팅</a></li>
            <li><a href="/view/edu/Internet" data-name="Internet">사물인터넷(IOT)</a></li>
            <li><a href="/view/edu/data" data-name="data">빅데이터</a></li>

<?php
        break;
    case 'introduce':
?>
            <div class="lib_title">
                <a href="/view/introduce/main">
                    <h3>연구원 소개</h3>
                </a>
            </div>
            <ul class="sub_nav">
                <li class="sub_nav_fll"><a href="/view/introduce/ceomessage" data-name="ceomessage">CEO Message</a></li>
                <li class="sub_nav_fll"><a href="/view/introduce/history" data-name="history">History</a></li>
                <li class="sub_nav_fll"><a href="/view/introduce/parter" data-name="parter">Parter</a></li>
                <li class="sub_nav_fll"><a href="/view/introduce/contactus" data-name="contactus">Contact Us</a></li>

<?php
        break;
    case 'more':
?>

<?php
        break;
    case 'admin';
?>

<?php
        break;
    case 'file':
?>
<?php
        break;
    default:
        echo '잘못된 접근입니다.';
}

?>
    </ul>
</div>
<div class="sub_wrapper">
