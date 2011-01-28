<?php

class Docs extends Controller {

	function Docs(){
		parent::Controller();
		$this->load->model('Page');
		//set page content
                $this->pdata['footer'] = $this->Page->get_footer();
	}
	
	function index() {
                $this->pdata['header'] = $this->Page->get_header('forum');
                $this->pdata['content'] = $this->Page->get_content('forum');
		$this->load->view('forum', $this->pdata);
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
}
