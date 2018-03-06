<?php

class Menu {

	function show_menu(){
		$obj =& get_instance ();
		$obj->load->helper('url');
		$menu = anchor ("start/hello/fred", "Say Hello to fred |");
		$menu .= anchor("start/hello/bert", "Say Hello to fred |");
		$menu .= anchor("start/another_function", "Do something else |");
		return $menu;
	}
}

?>