<?php 

include MODEL_PATH."db_connect.php";
class categoryModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	public function addCategory($category)
	{
		echo $category;
		
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$category,'created_by'=>1,'updated_by'=>1);
		
				
		$result = $this->_db->insert($data['tables'],$data['columns']);
		if($result)
		{
			return "done";
		}else {
			return "error";
		}
		
	}
	
	public function viewCategory()
	{
		$data['tables'] = 'category';
		$data['columns']= array('name');
		
		
		$result = $this->_db->select($data);
		
		
	}
}
