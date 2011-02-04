<?php

/******************************************************************************
*Gus - Groups in a University Setting
 University of Idaho CS 384 - Spring 2011
 GusPHP Subteam
 File Authors:
		Alex Nilson
******************************************************************************/

/* Config file for file uploading*/
$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|png|txt|png|bmp|doc|pdf';
$config['overwrite'] = 'TRUE';
$config['max_size'] = '2048';//In kilobytes
$config['max_width'] = '0';
$config['max_height'] = '0';
$config['max_filename'] = '0';
$config['remove_spaces'] = 'TRUE';
?>