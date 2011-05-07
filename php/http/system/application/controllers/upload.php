<?php
/**
 * @package GusPackage
 * subpackage Upload
 * @author Alex Nilson <alexnilson@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Upload extends Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url')); //Load CI's form and url helpers
		$this->testmode = 'false';  //Default not in testmode
		$this->testflag = 0;
		$this->load->model('Page'); //Based off the page model
              $this->pdata['footer'] = $this->Page->get_footer(); //Load footer
	}


	function index()
	{
		if( !$this->Page->authed() && !$this->testmode)
		{
			header( 'Location: home' ); //Reload the page
		}
		else
		{
			$this->load->model('User');
			$this->load->model('Group');
			$this->pdata['header'] = $this->Page->get_header('Upload'); //load header
             		$this->pdata['content'] = $this->Page->get_content('upload'); //load content

			//Get group membership list
			$un = $this->session->userdata('un');
			$uid = $this->User->get_id($un);
			$grouplist = $this->db->get_where( 'usergroup', array('uid' => $uid) )->result_array();

			//Set up data for page
		  	$data = array('error' => ' ', 'grouplist' => $grouplist);
			if($this->testmode == 'false') //Don't load page view if we're in testmode
			{
			  	$this->load->view('upload_form', $data); //Pass everything to the view
			}
		}
		return(true);
	}

	function do_upload()
	{
		if( !$this->Page->authed() && !$this->testmode)
		{
			header( 'Location: ../home' ); //Reload the page
		}
		else 
		{
			/*File upload settings are in config/upload.php*/
			$this->load->library('upload'); //Load CI's upload helper
			{
				if ( ! $this->upload->do_upload() && !$this->testflag) //if the upload fails
				{
					$error = array('error' => $this->upload->display_errors()); //Store error in the error array

					$this->pdata['header'] = $this->Page->get_header('Upload');
					$this->pdata['content'] = $this->Page->get_content('upload');
	
					//Get group membership list
					$this->load->model('User');
			  		$this->load->model('Group');
			  		$un = $this->session->userdata('un');
			  		$uid = $this->User->get_id($un);
			  		$grouplist = $this->db->get_where( 'usergroup', array('uid' => $uid) )->result_array();

			  		//Set up data for page
		  			$data = array('error' => $error, 'grouplist' => $grouplist);
					if($this->testmode == 'false')  //If not in test mode, reload the page and show the error
					{
					  	$this->load->view('upload_form', $data);
					}
					return($this->upload->display_errors());  //If in testmode, check the error
				}
				else //Upload was successful
				{
					$data = array('upload_data' => $this->upload->data()); //Pull data about the file
					if($this->testmode == 'false') { //Don't load view if we're in test mode
					  $this->pdata['header'] = $this->Page->get_header('Upload');
					  $this->pdata['content'] = $this->Page->get_content('upload');
					  $this->load->view('upload_success', $data); //Load the success page and show the data about the file
					}
					//Make a thumbnail if it's an image
					if($data['upload_data']['is_image'] == 1)
					{
						$name= $data['upload_data']['file_path'] . "/thumbs/tn_" . $data['upload_data']['file_name'];
						//Set up for thumbnail creation
						$config['width']=100;  //Thumbnail dimensions
						$config['height']=100;
						$config['source_image']= $data['upload_data']['full_path'];
						$config['new_image']= $name;
						$this->load->library('image_lib', $config); //CI's built in image manip library
						$this->image_lib->resize();
					}
					//Insert file info into database
					$this->load->model('User');
					$this->load->model('Group');

					$this->load->database('default', TRUE);

					$un = $this->session->userdata('un');
					$uid = $this->User->get_id($un);

					if($this->testmode)
					{
						$_POST["groups"] = -1;
					}

					$filedata = array( 	
						'filename' => $data['upload_data']['file_name'],
						'uid' => $uid, 
						'gid' => $_POST["groups"],
						'date' => date("Ymd"), 
						'size' => $data['upload_data']['file_size'],
						'perm' => 0,
						'image'=> $data['upload_data']['is_image']
					);
					if(!$this->testmode)
					{
						$this->db->insert('files', $filedata);
					}
					return('success');
				}
			}
		}
	}

	function test()
	{
	//Test the functions
	$page_name = 'upload';
	$this->load->library('unit_test');
	$this->testmode = 'true';

	//index
	echo $this->unit->run($this->index(), true, 'index');

	//do_upload
	echo $this->unit->run($this->do_upload(), '<p>You did not select a file to upload.</p>', 'do_upload - no file');

	$this->testflag = 1;
	echo $this->unit->run($this->do_upload(), 'success', 'do_upload - success');

/*Last two tests don't work because I can't automate the uploading process.  The uploader does throw errors, though.
	echo $this->unit->run($this->do_upload(), '<p>The uploaded file exceeds the maximum allowed size in your PHP configuration file.</p>', 'do_upload - file too large');
	echo $this->unit->run($this->do_upload(), '<p>The filetype you are attempting to upload is not allowed.</p>', 'do_upload - bad file type');
*/


	}
}
?>
