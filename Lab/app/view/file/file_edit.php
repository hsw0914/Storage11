</div>
<?php
$db = new db;
$data = $db->query('SELECT * FROM `file_community` WHERE (`idx`=?) ', array(PARAM))->fetch();
?>
<div class="sub_con">
    <div class="sub_content_wrap">
        <div class="sub_title_wrap">
            <div class="sub_title">
                <h3>글쓰기</h3>
            </div>
        </div>
        <form action="/action/community/file_edit/<?php echo $data['idx']?>" method="post" enctype="multipart/form-data">
            <table class="board">
                <tbody>
                <tr>
                    <td>제목</td>
                    <td><input type="text" name="title" value="<?php echo $data['title'] ?>" class="input_text"></td>
                </tr>
                <tr>
                    <td>이미지</td>
                    <td><input type="file" multiple name="file[]" class="img_input"></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <textarea name="con" cols="30" rows="10" class="input_text"><?php echo $data['con'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="board_submit">작성</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>