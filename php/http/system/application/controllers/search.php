<?php

class Search extends Controller {
	var $pdata;

	function Search(){
		parent::Controller();
		$this->load->model('Find');
		$this->load->helper('form');
		$this->pdata['footer'] = $this->Find->get_footer();		
	}
	
	function index() {
		$page_name = 'search';
		$this->pdata['header'] = $this->Find->get_header($page_name);
		$this->pdata['content'] = $this->Find->get_content($page_name); 
		
		
		if(!empty($_POST)){	
			$this->pdata['results'] = $this->getResults($_POST['un']);
			$this->load->view('search_result',$this->pdata);
		}
		else {
			$this->load->view('search',$this->pdata);
		}
	}

	function getResults($data){
		/* $query = $this->db->get_where('user', array('un'=>$data)); 
		if($query->nu_rows() > 0);
		return $query->results(); 
		*/
		$result = $this->db->query("SELECT un FROM user WHERE un='$data'")->result(); //slightly changed from colby's format
		if(empty($result)) return "No Users Found";
		else{
			return $_POST['un'];
			//foreach($result as $key){
				//echo $key;
				//$this->pdata['content'] .= $key;
			//}
		}
	}
	
	
	function testDB(){
		$this->load->library('unit_test');
		$id = 1;
		$this->db->select('un')->from('user')->where('id',$id);
		$query = $this->db->get();
		echo $this->unit->run(false,'test' == $query->result(),'Expected Output = False');	
	}
	
	function testDBBoundaries(){
		$this->load->library('unit_test');
		
		//echo $this->unit->run('un',$query,	'Testing Database');
		 $this->db->select('name');
         $data = array();
         foreach($this->db->get('page')->result() as $key) {
            array_push($data,$key->name);
        }
		foreach($data as $key){
			echo $this->unit->run('search',$key != null, $key);
		}
	}	
	
	
}
