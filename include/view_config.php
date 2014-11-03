<?php
	$smarty->template_dir = "templates/default/";
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;

	function paging($_PAGING,$smarty){
		$_PAGING->set_link_padding(2);
		$smarty->assign("get_result_text",$_PAGING->get_result_text());
		$smarty->assign("get_prev_page_link",$_PAGING->get_prev_page_link());
		$smarty->assign("get_next_page_link",$_PAGING->get_next_page_link());
		$smarty->assign("get_page_links",$_PAGING->get_page_links());
	}
?>