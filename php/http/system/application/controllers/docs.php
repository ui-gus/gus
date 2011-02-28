<?php
/**
 * @package GusPackage
 * subpackage Admin
 * @author Alex Nilson <alexnilson@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Docs extends Controller {
	var $pdata;
	var $testmode;

	function docs(){
		parent::Controller();
		$this->load->model('Page');
		$this->load->helper('form');
		//set page content
                $this->pdata['footer'] = $this->Page->get_footer();
		$this->testmode = 'false';
	}
	
	function index() {
		if ($this->testmode == 'false') {
                $this->pdata['header'] = $this->Page->get_header('Docs');
                $this->pdata['content'] = $this->Page->get_content('docs');
		$this->load->view('docs', $this->pdata); }
		return('true');
	/*
	This function is called when a user visits the group's shared documents/files page.
	Steps
	1. Get the current group
	2. Get the user's permission level within the group
	3. Check user's permission level against each file, displaying only the appropriate ones
	*/
	}


	function uploadFile() {
	/*
	Outsourced to upload.php
	This function is called when a user wants to upload a file to the group.
	Codeigniter has a built in "File Uploading Class" that may be useful for this.
	Steps
	1. Get the current group
	2. Get the user's permission level within the group
	3. Check if file already exists
	3. Check the file's type
	4. Check the file's size
	5. Upload the file
	Notes:
	+ If the user doesn't have permision to upload to the group, they will receive an error.
	+ If the file already exists, the user will be informed and the new file won't be uploaded.
	+ If the file type is not allowed, the user will receive an error
		+ Allowed file types are determined by the Gus admin
	+ If the file is too large, the user will receive an error
		+ Maximum file size is determined by the Gus admin and may be restricted due to server memory
	*/
	}

	function downloadFile() {

	$this->load->helper('download');

	//$_POST['file']; The location of the filename
	$location = "uploads/" . $_POST['file'];
	//echo $location;

	$data = file_get_contents($location); // Read the file's contents
	$name = $_POST['file'];  //Name file will be downloaded as

	force_download($name, $data);
	/*
	This function is called when a user chooses to download a file.
	Steps
	1. Check user permissions
	2. Download/display the file
	Notes:
	+ If the file does not exist, the user will receive an error.
	*/
	}

	function deleteFile() {

	$file = "uploads/" . $_POST['file'];
	unlink($file);
	header( 'Location: docs' );


	/*
	This function is called when a user chooses to delete a file that has been uploaded.
	Steps
	1. Check user permissions.
	2. Double check that the user wants to delete the file.
	3. Delete the file.
	*/
	}

	function organizeFiles() {
	/*
	This function brings up a new menu that allows a user to organize, rename, and control access to files
	Steps
	1. Check user permissions.
	2. Display list of files with new options.
	3. User organizes files.
	4. User finishes organizing files.
	*/
	}

	function test() {
		$page_name = 'docs';
		$this->load->library('unit_test');
		$this->testmode = 'true';
		//begin tests
		//index
		echo $this->unit->run($this->index(), true, 'index');
		//upload
              	echo $this->unit->run($this->uploadFile(), true, 'Docs: Upload File should probably be commented out as it\'s in a different controller');
		//Not needed atm
		//Download - not really testable with these tests
              	//echo $this->unit->run($this->downloadFile(), true, 'downloadFile docs');
              	echo $this->unit->run(false, true, 'downloadFile docs');
		//Can't be tested afaik
		//Delete
              	echo $this->unit->run(false, true, 'deleteFile docs');
		//Can't be tested afaik
              	echo $this->unit->run($this->organizeFiles(), true, 'organizeFiles docs');
	}
}
