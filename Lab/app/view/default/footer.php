        </main>
    </div>
    .<footer class="footer">
        <div class="footer_all_wrap layout">
            <div class="footer_menu">
                <a href="/view/file/file/0">자료실</a>
                <a href="/view/introduce/">NCS 취업서비스</a>
                <a href="/view/introduce/main">연구원 소개</a>
                <a href="/view/introduce/contactus">찾아오시는 길</a>
                <?php if ($_SESSION['lv'] == 0){ ?>
                    <a href="/admin">관리자 로그인</a>
                <?php }if ($_SESSION['lv'] == 1){ ?>
                    <a href="/action/user/logout" class="login_btn">로그아웃</a>
                <?php } ?>
            </div>
            <address>
                (우)04352  서울시 용산구 한강대로 84길 21-17(남영동 41-1) 뉴타임즈빌딩 3층 미래융합연구원<br/>
                문의 및 상담   02-872-3008<br/>
                COPYRIGHT ⓒ Advanced Institute of Convergence.<br/>
            </address>
        </div>
    </footer>
    </div>
</body>
</html>