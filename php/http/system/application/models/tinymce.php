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
	function outputJScript($args){
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
		
		
		return $this->tinyMCE . 
		"<script type=\"text/javascript\">
			tinyMCE.init({
				mode : \"exact\",
				elements : " . $elementsString . ",
				theme : \"simple\"
			});
		</script>";
	}
}
?>