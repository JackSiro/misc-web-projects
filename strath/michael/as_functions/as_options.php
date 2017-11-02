<?php
/*
	File: as_functions/as_users.php
	Description: declaration of general variables and requests functions

*/

	function as_menu_handler($url) {
		return as_siteUrl.$url.as_urlExt;
	}
	
	function as_user_sex($val){
		switch ( $val ) {
			case 1:
				return 'M';
				break;
			case 2:
				return 'F';
				break;
			default:
				return 'O';
		}
	}
	
	function as_user_sexfull($val){
		switch ( $val ) {
			case 1:
				return 'Male';
				break;
			case 2:
				return 'Female';
				break;
			default:
				return 'Other';
		}
	}
	
	function as_is_homepage($val){
		switch ( $val ) {
			case 1:
				return true;
				break;
			default:
				return false;
		}
	}
	
	function as_user_lvl($lev) {
		switch ( $lev ) {
			case 5:
				return 'Super-Admin';
				break;
			case 4:
				return 'Admin';
				break;
			case 3:
				return 'Manager';
				break;
			case 2:
				return 'Expert';
				break;
			case 1:
				return 'Editor';
				break;
			default:
				return 'User';
		}
	}
	
	function as_show_error($content){
		$as_errmsg_arr[] = $content;
		$as_errflag = true;
		$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
	}
	
	function as_show_success($content){
		$as_succmsg_arr[] = $content;
		$as_succflag = true;
		$_SESSION['AS_SUCCMSG_ARR'] = $as_succmsg_arr;
	}
	
	function as_setLink($pagelink)
	{
		return as_siteUrl.$pagelink.as_urlExt;
	}
	
	function as_radio_items($itemid, $itemvl) {
		if ($itemid ==  $itemvl) return 'value="'.$itemid.'" checked'; 
		else return 'value="'.$itemid.'"'; 
	}
	
	function as_select_items($itemid, $itemvl) {
		if ($itemid ==  $itemvl) return 'value="'.$itemid.'" selected'; 
		else return 'value="'.$itemid.'"'; 
	}
	
	function as_pagination($page, $count, $max, $url){
		$html = "";
		if ($count/$max > 1) {
			$html .= '<div class="pagination">Page: ';
			if ($page > 1) $html .= '<span class="disabled">prev</span>';
	
			for ($i=0 ; $i<($count/$max) ; $i++) {
				if ($page-1 == $i) $html .= '<span class="current">'.($i+1).'</span>';
				else $html .= '<a href="'.as_menu_handler($url).'?as_page='.($i+1).'">'.($i+1).'</a>';
			}
			if ($page < $count/$max) $html .= '<a href="'.as_menu_handler($url).'?as_page='.($page+1).'">next</a></div>';
			else $html .= '</div>';
		}
		return $html;
	}
?>