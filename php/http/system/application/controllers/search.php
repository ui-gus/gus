<?php
/**
 * @package GusPackage
 * subpackage Search
 * @author Scott Beddal <flast@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Search extends Controller {
	var $pdata;
	var $testmode;

	function Search(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('form');
		$this->pdata['footer'] = $this->Page->get_footer();		
		$this->testmode = false;
	}
	
	function index() {
		$page_name = 'search';
		$this->pdata['header'] = $this->Page->get_header($page_name);
		$this->pdata['content'] = $this->Page->get_content($page_name); 
		
		if(!empty($_POST)){	
			$this->pdata['results'] = $this->getResults($_POST['un']);
			$this->load->view('search_result',$this->pdata,$this->testmode);
			return(true);
		}
		else {
			$this->load->view('search',$this->pdata,$this->testmode);
			return(true);
		}
	}

	function getResults($data){
		/* $query = $this->db->get_where('user', array('un'=>$data)); 
		if($query->nu_rows() > 0);
		return $query->results(); 
		*/
		$result = $this->db->query("SELECT * FROM user WHERE un='$data'")->result_array(); //slightly changed from colby's format
		if(empty($result)) return "No Users Found";
		else{
		  return $result;
		  //Modified this section to allow multiple user search + 
		  //link to their user page. - Brett
		}
	}
	
	
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
}
