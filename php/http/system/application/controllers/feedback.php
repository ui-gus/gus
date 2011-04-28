<?php
/**
 * @package GusPackage
 * subpackage Search
 * @author Scott Beddal <flast@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Feedback extends Controller {
	var $pdata;
	var $testmode;

	function Feedback(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->model('tinyMCE');
		$this->load->helper('form');
		$this->pdata['tinyMCE'] = $this->tinyMCE->outputJScript(array("feedback"),2);
		$this->pdata['footer'] = $this->Page->get_footer();		
		$this->testmode = false;
	}
	
	function index() {
		$page_name = 'feedback';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		
		if(!empty($_POST)){	
			$this->getResults($_POST['feedback']);
			$this->load->view('feedback_result',$this->pdata,$this->testmode);
			return(true);
		}
		else {
			$this->load->view('feedback',$this->pdata,$this->testmode);
			return(true);
		}
	}

	function getResults($data){
		$date = new DateTime();
		
		$filelocation = "feedback/" . $date->getTimestamp() . ".txt";
		$fp = fopen ($filelocation, "w");
			
		$result = fwrite( $fp, $data);
		
		$result = fclose($fp);
		
		return true;
	}
	
	/*
	function test(){
		$this->load->library('unit_test');
		$this->testmode = true;

		$id = 1;
		$this->db->select('un')->from('user')->where('id',$id);
		$query = $this->db->get();
		echo $this->unit->run(false,'test' == $query->result(),'Expected Output = False');		
		//echo $this->unit->run('un',$query,	'Testing Database');
		 $this->db->select('name');
         $data = array();
         foreach($this->db->get('page')->result() as $key) {
            array_push($data,$key->name);
        }
		foreach($data as $key){
			echo $this->unit->run('search',$key != null, $key);
		}

		//index	
		//default view, no POST data
		unset($_POST);
		$this->unit->run(true,$this->index(),'index');		
		$_POST['un'] = "test";
		$this->unit->run(true,$this->index(),'index');		
		

		echo $this->unit->report();
	}	
	*/
}
