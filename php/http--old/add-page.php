<?php
///////////////////////////////////////////////////////////////////////////////
//GUS - Groups in a University Setting
//Author: Colby Blair
///////////////////////////////////////////////////////////////////////////////

include("conf/gus.php");
include("conf/form.php");

$gus_main = new gus;

print_r($_POST);

$content = "";
$form1 = new form("add-page","add-page.php");
if($form1->input_data()) {
	#$form1->set_required(array("name","content");
	$form1->process_input_data("page",array("name")); //table_name, unique fields
}
else {
	$form1->add_textfield("Page Name:","name");
	$form1->add_textfield("Initial Page Content:","content");
	$form1->add_submit("Submit");
	$content = $form1->get_content();
}

echo $gus_main->page_content($content);

?>
