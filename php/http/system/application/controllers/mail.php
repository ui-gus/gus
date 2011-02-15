<?php

class Template extends Controller {

	function Template(){
		parent::Controller();
	}
	
	function index() {
	
	}
  function test()
  {
      $page_name = 'mail';
      $this->load->library('unit_test');
      $this->testmode = true;

      //index
      echo $this->unit->run(true,$this->index(), 'mail index');
      echo $this->unit->run($this->pdata['content'],
                        $this->Page->get_content($page_name),
                        'mail index 2');

      echo $this->unit->run(true,$this->Page->authed(), 'mail auth');

      echo $this->unit->run(true,$this->inbox(), 'mail inbox');

      echo $this->unit->run(true,$this->outbox(), 'mail outbox');

      echo $this->unit->run(true,$this->save(), 'mail save');

}
