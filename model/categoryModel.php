<?php

/**
 * @classname            categoryModel
 *
 * This class is used to manage the categories such as to add, update and delete.Here All the functions
 * are defined

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 08-05-2013
 * @version              version - 1
 * ...
 */


include MODEL_PATH."db_connect.php";
class categoryModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	
	//Adding Category
	public function addCategory($category)
	{	$time	=	date('Y-m-d H:i:s');
	//echo $time;
	//die();
		$cat_name	=	$category['cat_name'];
		$user_id	=	$category['user_id'];
		echo $user_id;
		try {
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$cat_name,'created_by'=>$user_id,'updated_by'=>$user_id);
		
		
		$result = $this->_db->insert($data['tables'],$data['columns']);
		if($result)
		{
			return "done";
		}else {
			return "error";
		}
		
	}catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	
	//Viewing Category
	public function viewCategory()
	{
	try {
		$categoryArray	=	array();
		$data['tables'] = 'category';
		$data['columns']= array('name','id','status');
		
		
		$result = $this->_db->select($data);
		
		while($row	=	$result->fetch(PDO::FETCH_ASSOC))
		{
			if($row['status']==0)
			{
			$categoryArray['name'][]	=	$row['name'];
			$categoryArray['id'][]	=	$row['id'];
		
			}
		}
		
		return $categoryArray;
		
		
	}catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	// Deleting Category
	public function deleteCategory($cat_id)
	{
	try {
		//echo "hi";
		$data['tables'] 	= 	'category';
		$data['columns']	=	array('status'=>1);
		$data['conditions']	=	array('id'=>$cat_id);
		
		$result = $this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		if($result)
		{
			return "done";
		}else {
			return "error";
		}
	}
	catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	//Updating Category
	public function updateCategory($category)
	{
	try {
		$cat_name	=	$category['cat_name'];
		
		$id			=	$category['id'];
		$user_id	=	$category['user_id'];
		echo $user_id;
		//die();
		
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$cat_name,'updated_by'=>$user_id);
		$data['conditions']=array('id'=>$id);
				
		$result = $this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		if($result)
		{
			return "done";
		}else {
			return "error";
		}
	}
	catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}


