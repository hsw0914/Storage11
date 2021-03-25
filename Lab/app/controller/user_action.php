<?php
	
	switch(METHOD){
		
		//회원가입
		case 'join':
			$db = new db;
			$flag = true;
			foreach($_POST as $key => $result){
				if(empty($result)){
					$flag = false;
				}
			}
			if($flag){
				$check1 = $db->query('SELECT * FROM `user` WHERE `id`=?', array($_POST['id']))->fetch();
				$check_empty = $db->query('INSERT INTO `user` (`id`,`pw`,`name`,`lv`) VALUES (?,?,?,?)',array($_POST['id'], sha1($_POST['pw']), '관리자' , '1'));
				access(false, '회원가입에 성공하셨습니다.', '/');
			}else{
				access(false, '입력란에 빈칸이 있습니다.', false);
			}
		break;
		
		//로그인
		case 'login':
			$db = new db;
			$list = $db->query('SELECT * FROM `user` WHERE `id`=? AND `pw`=?', array($_POST['id'], sha1($_POST['pw'])))->fetch();
			if(is_array($list)){
				$_SESSION['lv'] = $list['lv'];
				$_SESSION['name'] = $list['name'];
                access(false, '로그인에 성공하셨습니다', '/');

			}else{
				access(false, '아이디 또는 비밀번호를 잘못입력하였습니다.', '/admin');
			}
		break;
		
		//회원정보수정
		case 'change':
			$db = new db;
			$flag = true;
			foreach($_POST as $key => $result){
				if(empty($result)){
					$flag = false;
				}
			}
			if($flag){
				$chan = $db->query('UPDATE `user` SET `name`=?, `pw`=?, `tel`=?, `mail`=? WHERE `idx`=?', array($_POST['name'], sha1($_POST['pw']), $_POST['tel'], $_POST['mail'], PARAM));
				access(false, '회원정보 수정에 성공 하셨습니다.', '/');
			}else{
				access(false, '입력란에 빈칸이 있습니다.', false);
			}
		break;
		
		//로그아웃
		case 'logout':
			session_destroy();
            access(false, '로그아웃에 성공하였습니다', '/');
		break;
		
	}
	
?>