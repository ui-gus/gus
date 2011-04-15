<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
		Alex Nilson

*Config file for file uploading
******************************************************************************/


$config['upload_path'] = './uploads/'; //The directory to store uploaded files
$config['allowed_types'] = 'gif|jpg|png|txt|png|bmp|doc|pdf'; //Allowed file types; uses MIME types to check, not just extensions
//$config['overwrite'] = 'TRUE';  //If a file with the name is already uploaded, do we overwrite?
$config['max_size'] = '2048';//In kilobytes
$config['max_width'] = '0';  //For images; 0 is infinite
$config['max_height'] = '0'; //For images; 0 is infinite
$config['max_filename'] = '0'; //Refers to number of characters, 0 is infinite
$config['remove_spaces'] = 'TRUE'; //Replaces spaces with underscores: '_'
?>