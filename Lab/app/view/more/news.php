</div>
<?php
    $db = new db;

    $page = $url[3];
    $perPage = 30;
    $loadStart = $page * $perPage;

    $board = $db->query("SELECT * FROM `news_community` ORDER BY `idx` DESC LIMIT {$loadStart}, {$perPage}", array())->fetchAll();
    $boardLength = $db->query("SELECT * FROM `news_community`", array())->rowCount();
?>
<div class="sub_con">
    <div class="sub_content_wrap">
        <div class="sub_more sub_view">
            <div class="sub_title_wrap">
                <div class="sub_title">
                    <h3>뉴스 더보기</h3>
                    <ul>
                        <li><a href="/">메인 </a></li>
                        <li> > </li>
                        <li><a href="/view/more/news/0">뉴스더보기</a></li>
                    </ul>
                </div>
            </div>
            <table>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                </tr>
                <?php foreach ($board as $list) {?>
                <tr>
                    <td><?php echo $list['idx']?></td>
                    <td><a href="/view/more/news_view/<?php echo $list['idx']?>"><?php echo $list['title']?></a></td>
                    <td>관리자</td>
                    <td><?php echo $list['date']?></td>
                </tr>
                <?php } ?>
                <form action="/view/more/news_search/0" method="get">
                    <tr>
                        <td colspan="4" class="board_search">
                            <div class="search_wrap_off">
                                <input type="text" name="search" size="30">
                                <input type="submit" value="검색">
                            </div>
                            <div class="search_wrap_on">
                                <span>검색</span>
                            </div>
                            <?php if ($_SESSION['lv'] == 1){ ?>
                                <div class="board_creat_btn">
                                    <a href="/view/admin/news_board" class="board_submit">글쓰기</a>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                </form>
            </table>
            <div class="paging">
                <?php paging($boardLength, $perPage, $page, 5,'/view/more/news/&&'); ?>
            </div>
        </div>
    </div>
</div>