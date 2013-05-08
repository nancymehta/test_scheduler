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
	{
	try {
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$category,'created_by'=>1,'updated_by'=>1);
		
				
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
		$data['columns']= array('name','id');
		
		
		$result = $this->_db->select($data);
		
		while($row	=	$result->fetch(PDO::FETCH_ASSOC))
		{
			$categoryArray[name][]	=	$row['name'];
			$categoryArray[id][]	=	$row['id'];
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
		echo "hi";
		$data['tables'] = 'category';
		$data['conditions']=array('id'=>$cat_id);
		
		$result = $this->_db->delete($data['tables'],$data['conditions']);
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
		$name	=	$category['name'];
		
		$id	=	$category['id'];
		
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$name);
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


