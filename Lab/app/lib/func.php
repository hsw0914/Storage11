<?php
	function get(&$var, $val = ''){
		return isset($var) ? $var : $val ;
	}
	
	function script($var){
		return '<script>'.$var.'</script>';
	}
	
	function msg($msg){
		echo script( 'alert(\''.$msg.'\')' );
	}
	
	function move($url){
		$move = $url === false ? 'history.back()' : 'location.replace(\''.$url.'\')' ;
		echo script($move);
		exit();
	}
	
	function access($bool = false, $msg = '접근불가', $url = false){
		if(!$bool){
			msg($msg);
			move($url);
		}
	}


    $url = explode('/', $_SERVER['SCRIPT_NAME']);
    $filter = explode('/', $_SERVER['REQUEST_URI']);

    $url = array_filter($filter, function($data) use($url) {
        return !in_array($data, $url);
    });

    $url = array_values($url);

    function paging($len, $perPage = 10, $now = 0, $max = 5, $url = null) {
        $pagination = "";
        $start = $max * floor($now / $max);
        $pageCount = $len / $perPage;
        $prevGroup = $max * (floor($now / $max) - 1) + ($max - 1);
        $nextGroup = $max + ($max * ($start / $max));

        $url = explode('&&', $url);

        if($prevGroup >= 0)
            $pagination .= "<div><a href='".$url[0].$prevGroup.$url[1]."'>이전</a></div>";

        for($i = $start; $i < $nextGroup; $i++) {
            $highlight = "";

            if($now == $i)
                $highlight = "highlight";

            if($i < $pageCount) {
                $pagination .= "<div class='{$highlight}'>";
                $pagination .= "<a href='".$url[0].$i.$url[1]."'>".($i+1)."</a>";
                $pagination .= "</div>";
            }
        }

        if($nextGroup < $len / $perPage)
            $pagination .= "<div><a href='".$url[0].($nextGroup).$url[1]."'>다음</a></div>";

        echo $pagination;
    }
?>