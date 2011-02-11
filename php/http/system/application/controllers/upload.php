<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
		Alex Nilson
******************************************************************************/

class Upload extends Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->testmode = 'false';
		$this->load->model('Page');
		//set page content
                $this->pdata['footer'] = $this->Page->get_footer();
	}


	function index()
	{
		if($this->testmode == 'false') {
                $this->pdata['header'] = $this->Page->get_header('Upload');
                $this->pdata['content'] = $this->Page->get_content('upload');
		$this->load->view('upload_form', array('error' => ' ' )); }
		return(true);
	}

	function do_upload()
	{
		/*File upload settings are in config/upload.php*/
		$this->load->library('upload');

		{
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				if($this->testmode == 'false') {
				  $this->pdata['header'] = $this->Page->get_header('Upload');
				  $this->pdata['content'] = $this->Page->get_content('upload');
				  $this->load->view('upload_form', $error); }
				return($this->upload->display_errors());
			}
			else
			{
				//file pointer? $_POST["userfile"];
				$data = array('upload_data' => $this->upload->data());
				if($this->testmode == 'false') {
				  $this->pdata['header'] = $this->Page->get_header('Upload');
				  $this->pdata['content'] = $this->Page->get_content('upload');
				  $this->load->view('upload_success', $data); }
				return('success');
			}
		}
	}

	function test()
	{
		$page_name = 'upload';
		$this->load->library('unit_test');
		$this->testmode = 'true';

		//index
		echo $this->unit->run($this->index(), true, 'index');

		//do_upload
		echo $this->unit->run($this->do_upload(), '<p>You did not select a file to upload.</p>', 'do_upload - no file');
/*Last three tests don't work because I can't automate the uploading process.  The uploader does throw errors, though.
		echo $this->unit->run($this->do_upload(), '<p>The uploaded file exceeds the maximum allowed size in your PHP configuration file.</p>', 'do_upload - file too large');
		echo $this->unit->run($this->do_upload(), '<p>The filetype you are attempting to upload is not allowed.</p>', 'do_upload - bad file type');
		echo $this->unit->run($this->do_upload(), 'success', 'do_upload - success');
*/
	}
}
?>
