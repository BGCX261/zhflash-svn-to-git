<?php
class App extends Gloft{
	function run(){
		require_once 'app/controller/default/default.php';
		$ctrl = new DefaultController();
		$ctrl->test();
	}
	
	//
	function _router(){
		
	}
}