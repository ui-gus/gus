<?php
/**
 * @package GusPackage
 * subpackage Admin
 * @author Alex Nilson <alexnilson@vandals.uidaho.edu>
 * @version 0.4
 * @copyright University of Idaho 2011
 */

class Docs extends Controller {
	var $pdata;    //Page data
	var $testmode; //Keep track of if we're testing

	function docs(){
		parent::Controller();
		$this->load->model('Page');  //Use page model as base
		$this->load->helper('form'); //CI's built in form helper
              $this->pdata['footer'] = $this->Page->get_footer(); //Set the footer
		$this->testmode = 'false';
	}
	
	function index() {
		if ($this->testmode == 'false') { //Don't load the page views if we're testing
                $this->pdata['header'] = $this->Page->get_header('Docs'); //Set the header
                $this->pdata['content'] = $this->Page->get_content('docs'); //Pull the content from the database
		  $this->load->view('docs', $this->pdata); } //Load the docs view
		return('true');

	/*
	General outline of the use case; used for reference.
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
	General outline of the use case; used for reference.
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
	$this->load->helper('download');  //Load CI's download helper

	//$_POST['file']; //The location of the filename; passed in by a form
	$location = "uploads/" . $_POST['file']; //Set the location for file on the server
	//echo $location; //Check the location for debugging

	$data = file_get_contents($location); // Read the file's contents
	$name = $_POST['file'];  //Name file will be downloaded as will be the same as the one on ther server

	force_download($name, $data); //Force the user to download the file rather than displaying it

	/*
	General outline of the use case; used for reference.
	This function is called when a user chooses to download a file.
	Steps
	1. Check user permissions
	2. Download/display the file
	Notes:
	+ If the file does not exist, the user will receive an error.
	*/
	}

	function deleteFile() {

	$file = "uploads/" . $_POST['file'];  //Location of the file on the server; $_POST['file'] given from a form
	unlink($file);   //Delete the file from the server
	header( 'Location: docs' ); //Reload the page

	/*
	General outline of the use case; used for reference.
	This function is called when a user chooses to delete a file that has been uploaded.
	Steps
	1. Check user permissions.
	2. Double check that the user wants to delete the file.
	3. Delete the file.
	*/
	}

	function organizeFiles() {
	//WIP
	/*
	General outline of the use case; used for reference.
	This function brings up a new menu that allows a user to organize, rename, and control access to files
	Steps
	1. Check user permissions.
	2. Display list of files with new options.
	3. User organizes files.
	4. User finishes organizing files.
	*/
	}

	function test() {
	//Test the functions
		$page_name = 'docs';
		$this->load->library('unit_test');
		$this->testmode = 'true';
		
		//index
		echo $this->unit->run($this->index(), true, 'index');
		
		//Download
              	echo $this->unit->run($this->downloadFile(), true, 'downloadFile');
		//Delete
              	echo $this->unit->run($this->deleteFile(), true, 'deleteFile docs');
		//Organize files
              	echo $this->unit->run($this->organizeFiles(), true, 'organizeFiles docs');
	}
}
