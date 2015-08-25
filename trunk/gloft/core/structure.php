<?php
class Gloft_Core_Structure{
	protected $structure;
	
	protected $seed;
	
	function __construct($structure, $seed=''){
		if ($structure) $this->structure = $structure;
		if ($seed) $this->seed = $seed;
	}
	
	function key(){
		$var = $this->seed[$this->structure['cache']['hash']['by']];
		
	}
	
	function seed($seed){
		$this->seed = $seed;
	}
}