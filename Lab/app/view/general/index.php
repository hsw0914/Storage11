<?php
    $db = new db;
    $pe_data = $db->query('SELECT * FROM `pe_community` ORDER BY `idx` DESC LIMIT 6');
    $news_data = $db->query('SELECT * FROM `news_community` ORDER BY `idx` DESC LIMIT 4');
    $notice_data = $db->query('SELECT * FROM `notice_community` ORDER BY `idx` DESC LIMIT 6');
?>
<div class="main_con_wrap">
    <div class="ani">
        <ul class="ani-ul">
            <li class="ani-li"><img src="/static/img/slide/slide1.png" alt="slide"></li>
            <li class="ani-li"><img src="/static/img/slide/slide2.png" alt="slide"></li>
            <li class="ani-li"><img src="/static/img/slide/slide3.png" alt="slide"></li>
            <li class="ani-li"><img src="/static/img/slide/slide4.png" alt="slide"></li>
<!--            <li class="ani-li"><img src="/static/img/slide/slide3.png" alt="slide"></li>-->
<!--            <li class="ani-li"><img src="/static/img/slide/slide2.png" alt="slide"></li>-->
        </ul>
        <div class="ani-ab">
            <div class="ani-index">
                <a href="#" title="0" class="ani-button-1 ani-indexbutton 0"></a>
                <a href="#" title="1" class="ani-button-2 ani-indexbutton 1"></a>
                <a href="#" title="2" class="ani-button-3 ani-indexbutton 2"></a>
                <a href="#" title="3" class="ani-button-2 ani-indexbutton 3"></a>
                <a href="#" title="5" class="ani-a1213"></a>
            </div>
        </div>
    </div>
    <nav class="nav">
        <ul>
            <li>
                <a href="view/unconsulting/main">
                    <figure>
                        <img src="/static/img/nav/university.jpg" alt="university_img">
                        <figcaption>
                            <h2 class="university">대학컨설팅</h2>
                            <p>미래융합연구원만의 NCS 기반</p>
                            <p>대학교육과정 개발에 대한 노하우와</p>
                            <p>전문인력이 대학의 경쟁력을</p>
                            <p>높여드립니다.</p>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="view/coconsulting/main">
                    <figure>
                        <img src="/static/img/nav/enterprise.jpg" alt="university_img">
                        <figcaption>
                            <h2 class="enterprise">기업컨설팅</h2>
                            <p>NCS 기반의 직무분석을 통한 인사관리 체계 구축,</p>
                            <p>NCS 기반 블라인드 채용 컨설팅 및 채용대행,</p>
                            <p>직업능력개발훈련과정, 통합심사 컨설팅, NCS 기반</p>
                            <p>민간자격 개발 대행, 직업능력개발훈련과정 등</p>
                            <p>기업컨설팅을 지원합니다.</p>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="view/qudesign/main">
                    <figure>
                        <img src="/static/img/nav/qualification.jpg" alt="university_img">
                        <figcaption>
                            <h2 class="qualification">블라인드채용 대행</h2>
                            <p>자체 개발한 온라인 입사지원시스템, 자동</p>
                            <p>평가툴을 제공하여 공정하고 투명한 채용</p>
                            <p>프로세스가 이루어지도록 지원합니다.</p>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="view/edu/main">
                    <figure>
                        <img src="/static/img/nav/education.jpg" alt="university_img">
                        <figcaption>
                            <h2 class="education">4차 산업혁명 교육훈련</h2>
                            <p>드론, 코딩수학, 3D프린팅, 사물인터넷(IOT),</p>
                            <p>빅데이터 등의 교육을 통해 인재를 양성합니다.</p>
                        </figcaption>
                    </figure>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main_img">
        <div class="main_wrap">
            <h3>4차 산업혁명이란</h3>
            <hr>
            <p>정보통신기술의 융합으로 이루어낸 혁명 시대를 말한다.</p>
            <p>이 혁명의 핵심은 인공지능, 로봇공학, 사물 인터넷, 무인 운송수단</p>
            <p>3차원 인쇄, 나노 기술과 같은 6대 분야에서 새로운 기술 혁신이다.</p>
        </div>
    </div>
    <div class="main_con_wrap">
        <div class="main_con main_con_news">
            <h2>뉴스</h2>
            <ul>
                <?php foreach ($news_data as $list) { ?>
                    <li>
                        <a href="/view/more/news_view/<?=$list['idx']?>" class="menu_first_a">
                            <figure>
                                <?php $str = strtok($list['img'], ",");?>
                                <img src="/static/img/uploaded/<?php echo $str ?>" alt="No images found." onerror="this.src='/static/img/menu/not_img.png'">
                                <figcaption>
                                    <a href="/view/more/news_view/<?=$list['idx']?>" class="news_title"><?php echo $list['title']?></a>                                    <span><?=$list['date']?></span>
                                    <a href="/view/more/news_view/<?=$list['idx']?>" class="news_con"><?php echo $list['con']; ?></a>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <a href="/view/more/news/0">더보기</a>
        </div>
        <div class="main_con_border">
            <div class="main_con">
                <h2>공지사항</h2>
                <ul>
                    <?php foreach ($notice_data as $list) { ?>
                        <li>
                            <a href="/view/more/notice_view/<?=$list['idx']?>"><?php echo $list['title'] ?></a>
                            <a><?=$list['date']?></a>
                        </li>
                    <?php } ?>
                </ul>
                <a href="/view/more/notice/0">더보기</a>
            </div>
            <div class="main_con">
                <h2>실적</h2>
                <ul>
                    <?php foreach ($pe_data as $list) { ?>
                        <li>
                            <a href="/view/more/pe_view/<?=$list['idx']?>"><?php echo $list['title'] ?></a>
                            <a><?=$list['date']?></a>
                        </li>
                    <?php } ?>
                </ul>
                <a href="/view/more/performance/0">더보기</a>
            </div>
        </div>
    </div>
</div>
