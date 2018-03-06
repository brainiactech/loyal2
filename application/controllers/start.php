<?php 
class Start extends CI_Controller {
	var $base;
	var $css;

	function _construct()
	{
		parent::_construct();
		$this->base = $this->config('base_url');
		$this->css = $this->config('css');
	}

/*function Start()
	{
		
		$this->base = $this->config('base_url');
		$this->css = $this->config('css');
	}
	**/

	function index (){

		$data['mytitle']	=  "A websie monitoring tool";
		$data['mytext']		= "THis website helps you keep track of the other websites you control.";
		$this->load->view('basic_view', $data);
	}

	function hello ($name)
	{
		$data['css'] = $this->css;
		$data['base'] = $this->base;
		$data['mytitle'] = '<h1>Welcome to this site</h1>';
		$data['mytext'] = "<p class='test'>Hello $name, Welcome to my new site and we are getting dynamic!</p>";
		$data['myrobots'] = '<meta name="robots" content="noindex,nofollow">';
		$data['mywebtitle'] = 'Web monitoring tool';
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		 // $data['header'] = $this->load-view('header_view', '', TRUE);
		$this->load->view('testview', $data);
	}
}

?>

