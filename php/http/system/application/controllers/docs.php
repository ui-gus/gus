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

	function docs()
	{
		parent::Controller();
		$this->load->model('Page');  //Use page model as base
		$this->load->model('User');
		$this->load->model('Group');
		$this->load->model('Images');
		$this->load->helper('form'); //CI's built in form helper
              $this->pdata['footer'] = $this->Page->get_footer(); //Set the footer
		$this->testmode = 'false';
	}
	
	/*
	index
	General outline of the use case; used for reference.
	This function is called when a user visits the group's shared documents/files page.
	Steps
	1. Get the current group
	2. Get the user's permission level within the group
	3. Check user's permission level against each file, displaying only the appropriate ones
	*/
	function index() 
	{		
		if( !$this->Page->authed() && !$this->testmode)
		{
			header( 'Location: home' ); //Reload the page
		}
		else {
			  $this->pdata['header'] = $this->Page->get_header('Docs'); //Set the header
              	  $this->pdata['content'] = $this->Page->get_content('docs'); //Pull the content from the database
			  $un = $this->session->userdata('un');
			  $uid = $this->User->get_id($un);
			  $this->pdata['grouplist'] = $this->db->get_where( 'usergroup', array('uid' => $uid) )->result_array();
			if ($this->testmode == 'false')
			{ //Don't load the page views if we're testing
			  $this->load->view('docs', $this->pdata); //Load the docs view
			}
		}
		return('true');
	}


	/*
	uploadFile
	Outsourced to upload.php
	General outline of the use case; used for reference.
	This function is called when a user wants to upload a file to the group.
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


	/*
	downloadFile
	General outline of the use case; used for reference.
	This function is called when a user chooses to download a file.
	Steps
	1. Check user permissions
	2. Download/display the file
	Notes:
	+ If the file does not exist, the user will receive an error.
	*/

	function downloadFile()
	{
		if( !$this->Page->authed() && !$this->testmode)
		{
			header( 'Location: ../home' ); //Reload the page
		}
		else
		{
			$this->load->helper('download');  //Load CI's download helper
			if($this->testmode)
			{
				$_POST['file'] = "";
			}
			$location = "uploads/" . $_POST['file']; //Set the location for file on the server
			$name = $_POST['file'];  //Name file will be downloaded as will be the same as the one on ther server
			if ($this->testmode == 'false') //Don't download if testing
			{
				$data = file_get_contents($location); // Read the file's contents
				force_download($name, $data); //Force the user to download the file rather than displaying it
			}
		}
		return($_POST['file'] != "");
	}


	/*
	deleteFile
	General outline of the use case; used for reference.
	This function is called when a user chooses to delete a file that has been uploaded.
	Steps
	1. Check user permissions.
	2. Double check that the user wants to delete the file.
	3. Delete the file.
	*/

	function deleteFile()
	{
		$file = "uploads/" . $_POST['file'];  //Location of the file on the server; $_POST['file'] given from a form
		if ($this->testmode == 'false')
		{
			unlink($file);   //Delete the file from the server
			//Get thumbnail too
			$file = "uploads/thumbs/tn_" . $_POST['file'];
			unlink($file);
			//And let's not forget the database
			$this->load->database('default', TRUE);
			$this->db->where('filename',$_POST['file']);
			$this->db->delete('files');
			header( 'Location: ../docs' ); //Reload the page
		}
		return ($_POST['file'] != "");
	}


	/*
	view (File)
	This Function is called when a user wants to view a file online, without downloading it directly.
	Steps
	1. Check user permissions.
	2. Check file type.
	3. Open new window.
	4. Display file in window.
	*/

	function view($item)
	{
		$display = "";

		//Get uid
		$un = $this->session->userdata('un');
		$uid = $this->User->get_id($un);

		//Get gids and perms for those groups
		$grouplist = $this->db->get_where( 'usergroup', array('uid' => $uid) )->result_array();
		$filedata  = $this->db->get_where( 'files', array('filename' =>$item))->result_array();
		$groupmember=0;
		foreach ($filedata as $key)
		{
			$fgid=$key['gid'];	//file group membership
			$groupname=$this->Group->get_name($key['gid']);
			$fperm=$key['perm']; //file permissions
			$fsize=$key['size']; //file size
			$fdate=str_split($key['date']); //file upload date
			$fuid=$key['uid'];
		}

		foreach ($grouplist as $key)
		{
			if ( $fgid == $key['gid'])
			{
				$groupmember=1;
				break;
			}
			else
			{
				continue;
			}
		}
		if ($this->testmode == 'false')
		{
			if($groupmember && ($fperm <= $key['perm'] || $fuid == $uid))
			{
				$file = "uploads/" . $item;
				$display = $item . " owned by " . $groupname . "<br>"
					. "Size: " . $fsize . " KB<br>" . "Upload date: " . $fdate['4'] . $fdate['5'] . "/"
					. $fdate['6'] . $fdate['7'] . "/" . $fdate['0'] . $fdate['1'] . $fdate['2'] . $fdate['3'] . "<br>"
					. "Uploader: " . $this->User->get_name($fuid) . "<br>";
				//Download button
				$download= form_open('docs/downloadFile') . form_hidden('file', $item) . form_submit('submit', 'Download') . form_close();
				$display .="<br>" . $download;

				//Delete button
				$delete='';
				if($key['perm'] == 7 || $fuid == $uid) //You need to be a group officer/admin to delete files
				{
					$delete = form_open('docs/deleteFile') . form_hidden('file', $item) . form_submit('submit', 'Delete') . form_close();
				}
				$display .=$delete;
	
				//Edit button
				$edit='';
				if($key['perm'] == 7 || $fuid == $uid) //You need to be a group officer/admin to modify files
				{
					$edit = form_open('docs/modifyFile') . form_hidden('file', $item) . form_submit('submit', 'Modify') . form_close();
				}
				$display .=$edit;

				$display .= "<iframe src=" . base_url() . $file . " width=100% height=100% frameborder=0></iframe>";
			}
			else
			{
				$display = "You don't have permission to view this file.<br>"
					. "<a href=\"" . base_url() . "index.php/docs\">Go Back</a>";
			}
		}
		$this->pdata['content'] = $display;//$this->Page->get_content('docs');
		if ($this->testmode == 'false')
		{
			$this->load->view('view_doc', $this->pdata);
		}
		return($this->pdata['content']);
	}

	/*
	modifyFile and do_modify()
	General outline of the use case; used for reference.
	This function brings up a new menu that allows a user to organize, rename, and control access to files
	Steps
	1. Check user permissions.
	2. Display list of files with new options.
	3. User organizes files.
	4. User finishes organizing files.
	*/
	//Load view to get infos from user
	function modifyFile() 
	{
		$this->pdata['header'] = $this->Page->get_header('Docs'); //Set the header
              $this->pdata['content'] = $this->Page->get_content('docs');//Set content
		if ($this->testmode == 'false')
		{
			$this->load->view('modify_doc', $this->pdata);
		}
		return(true);
	}
	//Do the actual modifying
	function do_modify()
	{
	
		//Set up view
		$this->pdata['header'] = $this->Page->get_header('Docs'); //Set the header
              $this->pdata['content'] = $this->Page->get_content('docs'); //Pull the content from the database
		if ($this->testmode == 'false')
		{
			$this->load->view('modify_doc', $this->pdata);
		}
		if (isset($_POST['perm']) && isset($_POST['file']))
		{
		}
		else 
		{
			$_POST['perm']=9;
			$_POST['file']="testfile";
		}
		//echo $_POST['new_name']; //new name
		//echo $_POST['file']; //old name
		//echo $_POST['perm']; //permission level for file

		//Build new file entry for database
		//$data = array('filename'=>$_POST['new_name'], 'perm'=> $_POST['perm']);
		$data = array('perm'=> $_POST['perm']);
		
		if($this->testmode== 'false')
		{
			//update database
			$this->load->database('default', TRUE);
			$this->db->where('filename',$_POST['file']);
			$this->db->update('files',$data);
		}
		
		//Return to docs
		if ($this->testmode == 'false')
		{
			header( 'Location: ../docs' ); 
		}
		return($_POST['perm']);
	}

	function test() 
	{
	//Test the functions
		$page_name = 'docs';
		$this->load->library('unit_test');
		$this->testmode = 'true';

		$item =0;
		
		//index
			echo $this->unit->run($this->index(), true, 'index');
		
		//Download
              	echo $this->unit->run($this->downloadFile(), false, 'downloadFile');
		//Delete
              	echo $this->unit->run($this->deleteFile(), false, 'deleteFile docs');
		//View
			echo $this->unit->run($this->view($item), "", 'view docs');
		//Organize files
              	echo $this->unit->run($this->modifyFile(), true, 'modifyFile docs');
			echo $this->unit->run($this->do_modify(), 9, 'do_modify docs');
	}
}
?>
