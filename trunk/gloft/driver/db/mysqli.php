<?php
if (!interface_exists('Gloft_Driver_Db')) {
	require_once 'db.php';
}
class Gloft_Driver_Db_Mysqli implements Gloft_Driver_Db{
	
	private $_connect = null;
	
	private $_result = null;
	
	private $_sql = '';
	
	private static $_handle = null;
	
	public function __construct($host, $port, $uname, $passwd, $dbname, $charset){
		$this->connect($host, $port, $uname, $passwd, $dbname, $charset);
	}
	
	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::close()
	 */
	public function close() {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::connect()
	 */
	public function connect($host, $port, $uname, $passwd, $dbname, $charset, $persistent = false) {
		// TODO Auto-generated method stub
		if(!extension_loaded('mysqli')){
			throw (new Gloft_Driver_Db_Exception('mysqli is not support'));
		}
		
		if ($persistent){
			throw (new Gloft_Driver_Db_Exception('mysqli doesnot support persistent connect'));
		}
		
		try{
			$this->_connect = mysqli_init();
			$connect = mysqli_real_connect(
				$this->_connect,
				$host,
				$uname,
				$passwd,
				$dbname,
				$port
			);
			$this->query("SET NAMES " . $charset);
		}catch (Exception $e){
			throw(new Gloft_Driver_Db_Exception('cannot connect to the db server' . $e->getMessage()));
		}
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::free()
	 */
	public function free() {
		// TODO Auto-generated method stub
		if ($this->_result){
			return $this->_result->free();
		}
		return true;
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::getDb()
	 */
	public function getDb() {
		//do nothing
		return true;
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::query()
	 */
	public function query($sql) {
		// TODO Auto-generated method stub
		$this->_sql = $sql;
		$this->_result = $this->_connect->query($this->_sql);
		if (true!=$this->_result) {
			$error = "error no:" . $this->_connect->errno
				. "error:" . $this->_connect->error
				. "sql:" . $sql;
			throw new Gloft_Driver_Db_Exception($error);
		}
		return $this;
		
	}
	
	public function fetchOne($type='ASSOC'){
		switch (strtoupper($type)){
			case 'ARRAY':
				$func = 'fetch_array';
				break;
			case 'BOTH':
				$func = 'fetch_array';
				break;
			case 'OBJECT':
				$func = 'fetch_object';
				break;
			default:
				$func = 'fetch_assoc';
		}
		return $this->_result->$func();
	}
	
	public function fetch($type='assoc'){
		switch (strtoupper($type)){
			case 'ARRAY':
				$func = 'fetch_array';
				break;
			case 'BOTH':
				$func = 'fetch_array';
				break;
			case 'OBJECT':
				$func = 'fetch_object';
				break;
			default:
				$func = 'fetch_assoc';
		}
		$data = array();
		while ($row=$this->_result->$func()){
			$data[] = $row;
		}
		return $data;
	}
	
	public function affectRows(){
		return $this->_connect->affected_rows;
	}
	
	public function lastId(){
		return $this->_connect->insert_id;
	}
	
	public function sql(){
		return $this->_sql;
	}
	
	public function escape($str){
		if ($this->_connect){
			return $this->_connect->real_escape_string($str);
		}else{
			return addslashes($str);
		}
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Db::selectDb()
	 */
	public function selectDb($dbname) {
		// TODO Auto-generated method stub
		$this->_connect->select_db($dbname);
	}

	public function error($type='string'){
		$error = $this->_connect->error;
		$errno = $this->_connect->errno;
		if ($type=='string'){
			return $errno . ':' . $error;
		}else{
			return array(
				'errno'	=> $errno,
				'error'	=> $error
			);
		}
	}
}