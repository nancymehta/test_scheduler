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
		$catName	=	$category['catName'];
		$userId	=	$category['userId'];
		try {
			
			$data['tables']		=	'category';
			$data['columns']	=	array('name','id');
			$result				=	$this->_db->select($data);
			
			while($row			=	$result->fetch(PDO::FETCH_ASSOC))
			{
				if($catName		==	$row['name'])
				{
					$catId				=	$row['id'];
					$data['tables']		=	'category';
					$data['columns']	=	array('status'=>0);
					$data['conditions']	=	array('id'=>$catId);
			
					$result				=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
					if($result)
					{
						return "done";
					}
			
				}
			}
				
			
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$catName,'created_by'=>$userId,'updated_by'=>$userId);
		
		
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
	public function deleteCategory($catId)
	{
	try {
		//echo "hi";
		$data['tables'] 	= 	'category';
		$data['columns']	=	array('status'=>1);
		$data['conditions']	=	array('id'=>$catId);
		
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
		$catName	=	$category['catName'];
		
		$id			=	$category['id'];
		$userId	=	$category['userId'];
		
		$data['tables'] = 'category';
		$data['columns']= array('name'=>$catName,'updated_by'=>$userId);
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


