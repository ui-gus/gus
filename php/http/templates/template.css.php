<?php
header( 'Content-type: text/css' ); 
?>
/*Quick Reference
Link Font: Lucida Sans Unicode
General Use: Georgia
Headers and Otherwise: Trebuchet MS

*/



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
	font-family: "Trebuchet MS";
}

/* IDs (unique) elements */

/*space elements*/
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

/*top right navigation css*/
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


/*inside the top right navigation, float left and float right the two different elements*/
div#links_left{
	font-family: "Lucida Sans Unicode";
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

/*Giant div that will contain both left and right columns*/
div#container{
	width: 1024px;
	padding-left: 7px;
	background-image: url('../templates/content_background_slice.png');
	background-position: left top;
	background-repeat: repeat-y;
	
	font-size: 10pt;
	height: 100%;
	position: relative;
	padding-bottom: 50px;
}


/*left column. Static links go here*/
#group_column{
	float: left;
	left: 0px;
	text-align: left;
	font-size: 20pt;
	padding-bottom: 40px;	
	font-family: "Rockwell";
	color: white;
	margin-top: 20px;
}

#group_column img.lawl{
	position: absolute;
	left: 0px;
	top: -50px; 
}

//LOLHACK
#group_controls{
	margin: auto;
	margin-top: 20px;
	width: auto;
	text-align: left;
	padding-left: 10px;
}

#group_column ul{
	list-style: none;
	text-align: right;
	color: white;
	display: inline;
}

#group_column li{
	
}

#group_column li:hover{

}

#group_column a:link{
	padding: 4px;
	padding-left: 20px;
	display: block;	
	padding-right: 6px;
	text-decoration: none;
	color: #404349;	
}

#group_column a:visited{
	padding: 4px;
		padding-left: 20px;
	display: block;	
	padding-right: 6px;
	text-decoration: none;
	color: #404349;		
}

#group_column a:hover{
	background-color: #404349;
	display: block;
	padding: 4px;
		padding-left: 20px;
	padding-right: 6px;
	text-decoration: none;
	color: white;
}


li#group_column_current {
	background-image: url('../templates/drop_shadow_group_current.png');
}
	

/*right content window, where all the dynamic stuff usually will go*/
div#content{	
 	margin-left: 170px;
	width:	830px;  
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

div#content table#t2{
	font-size: 12pt;
	padding: 0px;
	margin: 0px;
	width: 80%;
	color: #404349;	
}

div#content tr:hover,td:hover {
	backround-color: #a69d815;
}

div#content table#user td{
	padding-left: 10px;
	padding-right: 10px;
	padding: 5px;
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

#content a#user {
	border: 0 none;
	text-decoration: none;
}

div#content a:link {
		color: #a69d81;
		text-decoration: none;
		border: 0px;
}

div#content a:visited{
	color: #c7c3c3; 
}

div#content a:hover{
	text-decoration: underline;
}


/*small divs that will fall inside content*/
div.update{
	padding: 10px;	
	padding-left: 7px;
	float: center;
	width: 770px;	
	font-size: 10pt;
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

div.update_user h1{
	font-size: 13px;
	font-family: "Times New Roman";
	margin-left: 10px;
	font-weight: normal;
	color: #5b3c33;
}

/*Footer Style*/

div#footer{
	height: 50px;
	margin-left: 6px;
	margin-right: 6px;
	border-top: 1px dashed #436188;
	font-size: 9px;
	font-color: #666;
	font-family: "Verdana";
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
