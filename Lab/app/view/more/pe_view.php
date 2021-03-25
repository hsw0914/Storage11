</div>
<?php
$db = new db;
$board = $db->query('SELECT * FROM `pe_community` WHERE (`idx`=?) ', array(PARAM))->fetch();
?>
<div class="sub_con">
    <div class="sub_title_wrap">
    </div>
    <div class="sub_content_wrap">
        <form action="/action/community/pe_write" method="post">
            <div class="board board_border">
                <div class="board_title">
                    <h3><?php echo $board['title'] ?></h3>
                </div>
                <div class="board_info">
                    <p>글쓴이 : 관리자</p>
                    <p>작성일자 : <?php echo $board['date'] ?></p>
                </div>
                <div class="board_content">
                    <span><?php echo $board['con'] ?></span>
                    <div class="board_creat_btn">
                        <a href="/view/more/performance/0" class="board_submit">목록</a>
                        <?php if ($_SESSION['lv'] == 1){ ?>
                            <a href="/view/more/pe_edit/<?php echo $board['idx']?>" class="board_submit">수정</a>
                            <a href="/action/community/pe_delete/<?php echo $board['idx'] ?>" class="board_submit">삭제</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>