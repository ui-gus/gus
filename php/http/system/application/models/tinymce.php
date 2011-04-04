<?php
/**
 * @package GusPackage
 * subpackage tinyMCE
 * @author Scott Beddall <sbeddall@gmail.com>
 * @version 0.1
 * @copyright University of Idaho 2011
 */

class tinyMCE extends Model{
	function tinyMCE(){
		parent::Model();
		$this->tinyMCE = '<script type="text/javascript" src="'. base_url() . 'scripts/tiny_mce/tiny_mce.js"></script>';
		$this->elements = array();	
	}
	
	
	//Add this function to pdata under ['tinyMCE']
	//passing it an argument of array("<id1>","<id2>","etc") example use in Colby's Pages controller
	//second argument will be a character switch
	//2 == simple
	//1 == advanced
	function outputJScript($args,$selection){
		foreach($args as $element){
			array_push($this->elements,$element);
		}
		
		$sweet = 1;
		$elementsString = "";
		foreach($this->elements as $element){
			if($sweet == 1)$elementsString .= "\"" . $element . "\"";
			else{
				$elementsString .= ", \"";
				$elementsString .= $element . "\"";
			}
			$sweet+=1;
		}
		
		switch($selection){
		
			case 1:
				return $this->tinyMCE . 
					"<script type=\"text/javascript\">
						tinyMCE.init({
							mode : \"exact\",
							elements : " . $elementsString . ",
							theme : \"advanced\",	
							theme_advanced_buttons1 : \"bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,fontselect,fontsizeselect,formatselect\",
							theme_advanced_buttons2 : \"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image\",  
							theme_advanced_buttons3 : \"\",
							theme_advanced_toolbar_location : \"bottom\",
							theme_advanced_toolbar_align : \"left\",
							theme_advanced_resizing : false
						});
					</script>";
				break;
			case 2:
				return $this->tinyMCE .
				"<script type=\"text/javascript\">
					tinyMCE.init({
						mode : \"exact\",
						elements : " . $elementsString . ",
						theme: \"simple\"
					});
				</script>";
				break;
		}
	}
}
		//theme_advanced_buttons3 : \"insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions\",  
?>