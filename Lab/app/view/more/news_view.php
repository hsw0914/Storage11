</div>
<?php
    $db = new db;
    $board = $db->query('SELECT * FROM `news_community` WHERE (`idx`=?) ', array(PARAM))->fetch();
?>
<div class="sub_con">
    <div class="sub_title_wrap">
    </div>
    <div class="sub_content_wrap">
        <form action="/action/community/news_write" method="post">
            <div class="board board_border">
                <div class="board_title">
                    <h3><?php echo $board['title'] ?></h3>
                </div>
                <div class="board_info">
                    <p>글쓴이 : 관리자</p>
                    <p>작성일자 : <?php echo $board['date'] ?></p>
                </div>
                <div class="board_content">
                    <?php $imgs = explode(',', $board['img']); ?>

                    <?php foreach($imgs as $img): ?>
                        <img src="/static/img/uploaded/<?php echo $img; ?>" alt="No images found." class="upload_img"onerror="this.style.display='none'">
                    <?php endforeach; ?>
                    <p><?php echo $board['con'] ?></p>
                    <div class="board_creat_btn">
                        <a href="/view/more/news/0" class="board_submit">목록</a>
                        <?php if ($_SESSION['lv'] == 1){ ?>
                            <a href="/view/more/news_edit/<?php echo $board['idx']?>" class="board_submit">수정</a>
                            <a href="/action/community/news_delete/<?php echo $board['idx'] ?>" class="board_submit">삭제</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>