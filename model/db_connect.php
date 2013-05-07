<?php
/**
 * Filename : db_connect.php
 * Created By : Nancy Mehta
 * Description : provides connection to the database
 * Date_of_creation :30-3-2013
 */
include LIBRARY_ROOT.'cxpdo/cxpdo.php';
class dbConnectModel extends cxpdo{	
	 function __construct() {
		$config = array();
		$config['user'] = 'root';
		$config['pass'] = 'root';
		$config['name'] = 'test_scheduler';
		$config['host'] = 'localhost';
		$config['type'] = 'mysql';
		$config['port'] = null;
		$config['persistent'] = true;
		$this->_db = @db::instance($config);		
	}	 
		
}
