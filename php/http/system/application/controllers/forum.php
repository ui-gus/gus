<?php

class Forum extends Controller {
	var $pdata;

	function Forum(){
		parent::Controller();
 		$this->load->model('Page');
                //set page content
                $this->pdata['footer'] = $this->Page->get_footer();		
	}
	
	function index() {
                $this->pdata['header'] = $this->Page->get_header('forum');	
                $this->pdata['content'] = $this->Page->get_content('forum');		
		$this->load->view('forum', $this->pdata);
	}

}
