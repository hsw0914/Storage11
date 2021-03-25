 <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIC 미래융합연구원</title>
    <link rel="stylesheet" href="/static/js/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <link rel="stylesheet" href="/static/css/mobile_header.css">
    <link rel="stylesheet" href="/static/css/tablet_header.css">
    <link rel="stylesheet" href="/static/css/desktop_header.css">
    <link rel="stylesheet" href="/static/css/mobile.css">
    <link rel="stylesheet" href="/static/css/tablet.css">
    <link rel="stylesheet" href="/static/css/desktop.css">
    <link rel="stylesheet" href="/static/css/mobile_sub.css">
    <link rel="stylesheet" href="/static/css/tablet_sub.css">
    <link rel="stylesheet" href="/static/css/desktop_sub.css">
    <script src="/static/js/jquery-3.2.1.min.js"></script>
    <script src="/static/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="/static/js/app.js"></script>
</head>
<body>
<div class="login_wrap">
    <h3>로그인</h3>
    <span>* 서비스를 이용하시려면 아이디와 비밀번호를 입력하시기 바랍니다.</span>
    <form action="/action/user/login" method="post">
        <?php if ($_SESSION['lv'] == 0){ ?>
            <div class="login_all">
                <div class="login_wrap_all">
                    <div id="id"><span>아이디  </span><input type="text" name="id" placeholder="아이디"></div>
                    <div id="pw"><span>비밀번호 </span><input type="password" name="pw" placeholder="비밀번호"></div>
                </div>
                <input type="submit" value="로그인" class="login_btn">
            </div>
        <?php }if ($_SESSION['lv'] == 1){ ?>
            <p><b><?php echo $_SESSION['name']?></b>님 환영합니다</p>
            <a href="/action/user/logout" class="login_btn">로그아웃</a>
        <?php } ?>
        <a href="/" class="login_home">홈으로</a>
    </form>
</div>
</body>
</html>