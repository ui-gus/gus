<?php

/**
 * @package GusPackage
 * subpackage Home
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Home extends Controller {
	var $pdata; //page data

	function Home()
	{
		parent::Controller();	
		$this->load->model('Page');
		//set page content
		$this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index()
	{
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('home',$this->pdata);
	}

	function test() {
		//really not much to test here that shouldn't already be tested in the page
		$this->load->library('unit_test');
		echo $this->unit->run(true,0 < substr_count($this->Page->css,
						'templates/template.css.php" type="text/css" rel="stylesheet" />'),
				'css.1 - Check that CSS is loading correctly');

	}
}	
