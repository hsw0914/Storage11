</div>
<?php
    $db = new db;
    $board = $db->query('SELECT * FROM `file_community` WHERE (`idx`=?) ', array(PARAM))->fetch();
?>
<div class="sub_con">
    <div class="sub_title_wrap">
    </div>
    <div class="sub_content_wrap">
        <form action="/action/community/file_write" method="post">
            <div class="board board_border">
                <div class="board_title">
                    <h3><?php echo $board['title'] ?></h3>
                </div>
                <div class="board_info">
                    <p>글쓴이 : 관리자</p>
                    <p>작성일자 : <?php echo $board['date'] ?></p>
                </div>
                <div class="board_content">
                    <?php $files = explode(',', $board['file'])?>

                    <?php foreach($files as $file): ?>
                        <a href="/static/file/<?php echo $file; ?>" alt="file" class="file_submit" download=""><span class="sub_color_td"><?php echo $board['file'] ?></span> 파일 다운로드</a></br></br>
                    <?php endforeach; ?>
                    <p><?php echo $board['con'] ?></p>
                    <div class="board_creat_btn">
                        <a href="/view/file/file/0" class="board_submit">목록</a>
                        <?php if ($_SESSION['lv'] == 1){ ?>
                            <a href="/view/file/file_edit/<?php echo $board['idx']?>" class="board_submit">수정</a>
                            <a href="/action/community/file_delete/<?php echo $board['idx'] ?>" class="board_submit">삭제</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>