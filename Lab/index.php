<?php

	header('Content-type:text/html; charset=utf-8');
	
	session_start();
	
	define('BASEPATH', __DIR__ . '/');
	define('APPPATH', BASEPATH . 'app/');
	define('VIEWPATH', APPPATH . 'view/');
	
	require APPPATH . 'lib/func.php';
	require APPPATH . 'lib/db.php';
	
	if(!isset($_SESSION['lv'])){
		$_SESSION['lv'] = 0;
	}
	
	if(!isset($_SESSION['check'])){
		$_SESSION['check'] = 0;
	}
	
	$param = array_filter( explode('/', get($_GET['url'])), function($var){
		return isset($var);
	} );
	
	define('MODE', array_shift($param) ?: 'view');
	define('CONTROLLER', array_shift($param) ?: 'general');
	define('METHOD', array_shift($param) ?: 'index');
	define('PARAM', array_shift($param) ?: 'list');
	define('IDX', array_shift($param));
	define('MAIN', CONTROLLER == 'general' && METHOD == 'index');
	
	if(MODE == 'action'){
		if(is_file($path = APPPATH . 'controller/' . CONTROLLER . '_' . MODE . '.php')) {
			require($path);
		}
	}
	
	if(MODE == 'view'){
		require VIEWPATH . 'default/header.php';
		if(!MAIN){require VIEWPATH . 'default/sub_start.php';}
		if(is_file ($path = VIEWPATH . CONTROLLER . '/' . METHOD . '.php')){
			require $path;
		}else{
			require VIEWPATH . 'default/error.php';
		}
		if(!MAIN){require VIEWPATH . 'default/sub_end.php';}
		require VIEWPATH . 'default/footer.php';
	}

    if(MODE == 'admin'){
        if(is_file($path = APPPATH . 'view/admin/login.php')) {
            require($path);
        }
    }
?>