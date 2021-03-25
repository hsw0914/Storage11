<?php


	switch(METHOD){
		
		case 'news_write':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
			$db = new db;
			$flag = true;
			foreach($_POST as $key => $val){
				if(empty($val)){
					$flag = false;
				}
			}

            $img = $_FILES['img'];
            $cnt = count($img['name']);
            $imgs = [];

            for($i = 0; $i < $cnt; $i++) {
                $name = $img['name'][$i];
                $tmp = $img['tmp_name'][$i];
                $size = $img['size'][$i];
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $fname = pathinfo($name, PATHINFO_FILENAME);
                $apply = ['jpg', 'png', 'jpeg', 'bmp'];
                $dir = $_SERVER['DOCUMENT_ROOT'] . '/static/img/uploaded/';
                $savedName =  "_" . date('Ymdhis') . "_" . $i . '.' . $extension;
                $imgs[] = $savedName;
                if (in_array($extension, $apply) || $name == null) {
                    move_uploaded_file($tmp, $dir . $savedName);
                } else {
                    echo '<script>alert("파일은 이미지만 업로드 가능합니다."); history.back();</script>';
                    return;
                }
            }


            if($flag){
                $pdo = $db->query('INSERT INTO `news_community`(`title`, `con`, `img`, `date`)VALUES (?,?,?,?)', array( $title, $content, implode($imgs, ","),date('Y-m-d')));
                access(false,'글을 성공적으로 작성하였습니다.','/');
            }else  {
                access(false,'글을 정확히 작성해 주세요',false);
            }
            break;

        case 'pe_write':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $flag = true;
            foreach($_POST as $key => $val){
                if(empty($val)){
                    $flag = false;
                }
            }
            if($flag){
                $pdo = $db->query('INSERT INTO `pe_community`(`title`, `con`, `date`)VALUES (?,?,?)', array( $title, $content,date('Y-m-d')));
                access(false,'글을 성공적으로 작성하였습니다.','/');
            }else{
                access(false,'글을 정확히 작성해 주세요',false);
            }
            break;

        case 'notice_write':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $flag = true;
            foreach($_POST as $key => $val){
                if(empty($val)){
                    $flag = false;
                }
            }
            if($flag){
                $pdo = $db->query('INSERT INTO `notice_community`(`title`, `con`, `date`)VALUES (?,?,?)', array( $title, $content,date('Y-m-d')));
                access(false,'글을 성공적으로 작성하였습니다.','/');
            }else{
                access(false,'글을 정확히 작성해 주세요',false);
            }
            break;

        case 'file_write':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $flag = true;
            foreach($_POST as $key => $val){
                if(empty($val)){
                    $flag = false;
                }
            }

            $file = $_FILES['file'];
            $cnt = count($file['name']);
            $files = [];

            for($i = 0; $i < $cnt; $i++) {
                $name = $file['name'][$i];
                $tmp = $file['tmp_name'][$i];
                $size = $file['size'][$i];
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $fname = pathinfo($name, PATHINFO_FILENAME);
                $dir = $_SERVER['DOCUMENT_ROOT'] . '/static/file/';
                $files[] = $name;
                if ($name == null) {
                    echo '<script>alert("파일을 반드시 업로드 해야합니다."); history.back();</script>';
                    return;
                } else {
                    move_uploaded_file($tmp, $dir . $name);
                }
            }


            if($flag){
                $pdo = $db->query('INSERT INTO `file_community`(`title`, `con`, `file`, `date`)VALUES (?,?,?,?)', array( $title, $content , implode($files, ","),date('Y-m-d')));
                access(false,'글을 성공적으로 작성하였습니다.','/');
            }else  {
                access(false,'글을 정확히 작성해 주세요',false);
            }
            break;

        case 'news_edit':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $flag = true;
            foreach($_POST as $key => $val){
                if(empty($val)){
                    $flag = false;
                }
            }

            $img = $_FILES['img'];
            $cnt = count($img['name']);

            $imgs = [];

            for($i = 0; $i < $cnt; $i++) {
                $name = $img['name'][$i];
                $tmp = $img['tmp_name'][$i];
                $size = $img['size'][$i];
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $fname = pathinfo($name, PATHINFO_FILENAME);
                $apply = ['jpg', 'png', 'jpeg', 'bmp'];
                $dir = $_SERVER['DOCUMENT_ROOT'] . '/static/img/uploaded/';
                $savedName =  "_" . date('Ymdhis') . "_" . $i . '.' . $extension;
                $upfile = "";
                $imgs[] = $savedName;
                if (in_array($extension, $apply) ||  $name == null) {
                    if ( move_uploaded_file($tmp, $dir . $savedName) ) {
                        $upfile = $savedName;
                    }
                }
                else {
                    echo '<script>alert("파일은 이미지만 업로드 가능합니다."); history.back();</script>';
                    return;
                }
            }

            if ( $upfile ) {
                $get = $db->query('UPDATE `news_community` SET `title`=?, `con`=?, `img`=? WHERE `idx`=?',array( $title, $content ,implode($imgs, ","),PARAM));
            }else {
                $get = $db->query('UPDATE `news_community` SET `title`=?, `con`=?  WHERE `idx`=?',array($title, $content ,PARAM));
            }
            access(false,'글을 성공적으로 수정하였습니다.','/');

		break;

        case 'pe_edit':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $get = $db->query('UPDATE `pe_community` SET `title`=?, `con`=? WHERE `idx`=?',array($title, $content ,PARAM));
            access(false,'글을 성공적으로 수정하였습니다.','/');

            break;

        case 'notice_edit' :

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $get = $db->query('UPDATE `notice_community` SET `title`=?, `con`=? WHERE `idx`=?',array($title, $content ,PARAM));
            access(false,'글을 성공적으로 수정하였습니다.','/');

            break;

        case 'file_edit':

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['con']);
            $db = new db;
            $flag = true;
            foreach($_POST as $key => $val){
                if(empty($val)){
                    $flag = false;
                }
            }

            $file = $_FILES['file'];
            $cnt = count($file['name']);
            $files = [];

            for($i = 0; $i < $cnt; $i++) {
                $name = $file['name'][$i];
                $tmp = $file['tmp_name'][$i];
                $size = $file['size'][$i];
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $fname = pathinfo($name, PATHINFO_FILENAME);
                $dir = $_SERVER['DOCUMENT_ROOT'] . '/static/file/';
                $upfile = "";
                $files[] = $name;
                move_uploaded_file($tmp, $dir . $name);
            }
            if ( $upfile ) {
                $get = $db->query('UPDATE `file_community` SET `title`=?, `con`=?, `file`=? WHERE `idx`=?',array($title, $content, implode($files, ","),PARAM));
            }else {
                $get = $db->query('UPDATE `file_community` SET `title`=?, `con`=?  WHERE `idx`=?',array($title, $content ,PARAM));
            }
            access(false,'글을 성공적으로 수정하였습니다.','/');
            break;

        case 'news_delete';
            $db = new db;
            $delet = $db->query('DELETE FROM `news_community` WHERE `idx`=?', array(PARAM));
            access(false,'글을 성공적으로 삭제하였습니다.','/');
            break;

		case 'pe_delete';
			$db = new db;
			$delet = $db->query('DELETE FROM `pe_community` WHERE `idx`=?', array(PARAM));
			access(false,'글을 성공적으로 삭제하였습니다.','/');
		break;

        case 'notice_delete';
            $db = new db;
            $delet = $db->query('DELETE FROM `notice_community` WHERE `idx`=?', array(PARAM));
            access(false,'글을 성공적으로 삭제하였습니다.','/');
        break;

        case 'file_delete';
            $db = new db;
            $delet = $db->query('DELETE FROM `file_community` WHERE `idx`=?', array(PARAM));
            access(false,'글을 성공적으로 삭제하였습니다.','/');
            break;
	}
	
?>