<?php

/**
 * @package GusPackage
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 * @copyright University of Idaho 2011
 */

/**
 * @package GusPackage
 * @subpackage controllers
 * @author Colby Blair <cblair@vandals.uidaho.edu>
 */
class Home extends Controller {
	/**
	 * @uses junkdrawer passes controller data to views.
	 * @var array
	*/
	var $pdata;
	/**
	 * @uses testing set to true to disable views from rendering
	 * @var bool
	*/
	var $testmode;

	/**
	 * @return void
	*/
	function Home()
	{
		parent::Controller();	
		$this->load->model('Page');
		//set page content
		$this->testmode = false;
		$this->pdata['footer'] = $this->Page->get_footer();
	}

	/**
	 * @return bool
	*/
	function index()
	{
		//set page name
		$page_name = "home";
		if(func_num_args() > 0) {$page_name = func_get_arg(0);}
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name);
		//footer already set
		$this->load->view('home',$this->pdata,$this->testmode);
		return(true);
	}

	/**
	 * @return void
	*/
	function test() {
		//really not much to test here that shouldn't already be tested in the page
		$this->load->library('unit_test');
		$this->testmode = true;
		echo $this->unit->run(true,0 < substr_count($this->Page->css,
						'templates/template.css.php" type="text/css" rel="stylesheet" />'),
				'css.1 - Check that CSS is loading correctly');

		//index
		echo $this->unit->run(true,$this->index(), "index test");
	}
}	
