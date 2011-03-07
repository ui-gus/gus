<?php
header( 'Content-type: text/css' ); 
?>

html {
	/*Fall Back Option*/
	background: white;
	background-image: url('../templates/html_background.png');
	background-position: left top;
	background-repeat: repeat-x;
	
}

body{
	display:block;
	margin: auto;
	width: 1024px;
	height: auto;
	background-image: url('../templates/body_background.png');
	background-position: left top;
	background-repeat: no-repeat;
	padding-bottom: 50px;
}

/* IDs (unique) elements */

div#spreader_top{
	height: 150px;
	width: 1024px;
	clear: both;
}

div#spreader_bottom{
	height: 150px;
	width: 1024px;
	clear: both;
}

div#links{
	border: 1px solid black;
	border-top: 0px;
		
	-moz-border-bottom-left-radius: 10px;
	-moz-border-bottom-right-radius: 1px;
	-moz-border-top-left-radius: 0px;
	-moz-border-top-right-radius: 0px;
	
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	
	border-color: black;
	width: 500px;
	height: 20px;
	float: right;
	margin-right: 7px;
	padding-top: 5px;
	padding-left: 10px;
	padding-right: 10px;
	
	background-image: url('../templates/link_background_swatch.png');
	background-position: left top;
	background-repeat: repeat-x;
	background-attachment: fixed;
	color: white;
}

div#links a:link {
	color: #ffecc0;
	text-decoration: none;
}

div#links a:visited{
	color: #c7c3c3; 
}

div#links a:hover{
	text-decoration: underline;
}

div#links_left{

	font-family: "calibri";
	text-align: left;
	font-size: 12px;
	float: left;
}

div#links_right{
	font-family: "Lucida Sans Unicode";
	text-align: right;
	font-size: 12px;
	float: right;
}


div#container{
	width: 1024px;
	padding-left: 7px;
	background-image: url('../templates/content_background_slice.png');
	background-position: left top;
	background-repeat: repeat-y;
	font-family: "Lucida Sans Unicode";
	font-size: 10pt;
	height: 100%;
	position: relative;
	padding-bottom: 50px;
}

div#footer{
	height: 50px;
	margin-left: 6px;
	margin-right: 6px;
	border-top: 1px dashed #436188;
	font-size: 9px;
	font-color: #666;
	text-align: center;
	width: 1010px;
	background: #404349;
	position: absolute;
	left: 0px;
	bottom: 0px;
	border-left: 1px solid #535353;
	border-right: 1px solid #535353;
	color: white;
}

div#content{	
 	margin-left: 250px;
	width:	750px;  
	padding: 10px;
	padding-bottom: 40px;
	background-image: url('../templates/admin_small_edited.png');
	background-position: bottom right;
	background-repeat: no-repeat;
	min-height: 750px;
}

div#content img.profile_pic{
	margin-right: 10px;
	float: left;
}

div#content img.side{
	position: absolute;
	right: 10px;
}

div#content img.background{
	position: absolute;
	right: 10px;
        bottom: 50px;
        z-index: -1;
}

div#content table{
	font-size: 10pt;
	padding: 0px;
	margin: 0px;
	width: 100%;
}

div#content tr:hover,td:hover {
	backround-color: #a69d815;
}

div#content td{
	padding-left: 10px;
	padding-right: 10px;
	padding: 5px;
	border-left: 1px solid #f2ebd5;
	border-top: 1px solid #f2ebd5;
}

div#content table.login td {
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	border-left-width: 0px;
	border-right-width: 0px;
	border-top-width: 0px;
}

div#content a:link {
		color: #a69d81;
		text-decoration: none;
}

div#content a:visited{
	color: #c7c3c3; 
}

div#content a:hover{
	text-decoration: underline;
}

div.update{
	padding: 10px;	
	padding-left: 7px;
	float: center;
	width: 680px;
	font-family: verdana;
	font-size: 11px;
	color: #434750;
	margin-bottom: 15px;
	background-image: url('../templates/update_holder_bottom.png');
	background-position: bottom right;
	background-repeat: no-repeat;
	text-align: justify;
	min-height: 175px;
}

div.update_user{
	margin-top: 5px;
	margin-bottom: 5px;
	margin-left: 15px;
	padding: 10px;
	float: right;
	width: 100px;
	font-size: 9px;
	background: #b2b5c5;
	border: 1px solid #b1b1b1;
	text-align: center;
	color: #848e9f;
}

div.read_more{
	margin-left: 15px;
	margin-top: 10px;
	color: #7f7f7f;
}

img.user_pic{
	border: 1px solid #3f3f3f;
	clear: right;
}

h1.title{
	font-size: 13px;
	font-family: arial;
	margin-left: 10px;
	font-weight: normal;
	color: #5b3c33;
}

#group_column{
	float: left;
	left: 0px;
	width: 240px;
	text-align: center;
	font-family: "Arial";
	font-size: 14pt;
	padding-bottom: 40px;	
	padding-top: 10px;
}

#group_controls{
	margin: auto;
	width: 150px;
	text-align: left;
	padding-left: 10px;
}

#group_column ul{
	list-style: none;
	padding: 0;
	margin: 0;
	text-align: left;
	color:#9e9e9e;
}

#group_column li{
	margin-top: 3px;
	height: 26px;
	width: 188px;
	margin: 0;
	padding: 0;
	padding-top: 4px;
	padding-bottom: 2px;
	display: block;
	background-image: url('../templates/drop_shadow_group.png');
	
	padding-left: 12px;
}

li#group_column_current {
	background-image: url('../templates/drop_shadow_group_current.png');
}


