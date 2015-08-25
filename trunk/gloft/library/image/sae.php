<?php
class Sae{
	private $_url;
	private $_thumb_url;
	private $_thumb_max_width = 150;
	private $_thumb_max_height = 120;
	private $_ext = 'jpg';
	private $_imgdata;
	private $_image_info;
	private $_handle;
	private $_width;
	private $_height;
	private $_filehandle;
	
	public function __construct($imgData){
		$this->_imgdata = $imgData;
		$this->_handle = new SaeImage($this->_imgdata);
		
		$image_info = $this->_handle->getImageAttr();
		$this->_width = $image_info[0];
		$this->_height = $image_info[1];
	}
	
	public function getUrl(){
		if (!$this->_width || !$this->_height) {
			return false;
		}
		$this->_url = $this->_write($this->_imgdata, $this->_getFileName('jpg'));
		return $this->_url;
	}
	
	public function getThumbUrl($max_width=150, $max_height=120){
		if (!$this->_width || !$this->_height) {
			return false;
		}
		$this->_thumb_max_width = $max_width;
		$this->_thumb_max_height = $max_height;
		$thumb_data = $this->_resize();
		$this->_thumb_url = $this->_write($thumb_data, $this->_getFileName('jpg'));
		return $this->_thumb_url;
	}
	
	private function _resize(){
		$propWidth = $this->_thumb_max_width / $this->_width;
		$propHeight = $this->_thumb_max_height / $this->_height;
		
		$prop = $propHeight > $propWidth ? $propWidth : $propHeight;
		
		$thumb_width = $this->_width * $prop;
		$thumb_height = $this->_height * $prop;
		
		$this->_handle->resize($thumb_width, $thumb_height);
		$thumb_data = $this->_handle->exec('jpg');
		return $thumb_data;
	}
	
	private function _getFileName($ext='jpg'){
		return sprintf('%02d', mt_rand(0, 99)) . '/' . sprintf('%02d', mt_rand(0, 99)) . '/'
			. md5(time() . mt_rand(0, 99999)) . '.' . $ext;
	}
	
	private function _write($filedata, $filename){
		if (!$this->_filehandle){
			$this->_filehandle = new SaeStorage();
		}
		$ret = $this->_filehandle->write('img', $filename, $filedata);
		return $ret;
	}
}