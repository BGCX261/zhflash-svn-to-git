<?php
include_once 'gloft/gloft.php';
include_once 'gloft/conf/core.php';
include 'gloft/conf/card.php';


$fileDir = ROOT_PATH . $GLOBALS['card']['ria']['path'];
		
		
		header('Content-type: image/jpeg');
		imagejpeg($im);