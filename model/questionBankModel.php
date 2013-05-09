<?php 
include MODEL_PATH."db_connect.php";
class questionBankModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	
	function singleUploadModel(){
		//isset()
	    echo "single manage model";
	}
	
	function bulkUploadModel(){
		$error=array();
		$file=$_FILES["file"]["tmp_name"];
		$handle=fopen($file,"r");
		$data = array();
		while(($fileop=fgetcsv($handle,1000,",")) !==false){
			//fetching ques_type's id from master table
			$data['tables']= 'master';
			$data['columns']= array('id');
			
			$data['conditions']	= array('code_type'=>'ques_type','code_value'=>$fileop[0]);
			$result = $this->_db->select($data);
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$questionType = $row['id'];
			}
			//fetching category's id from category table.
			$data1['tables']= 'category';
			$data1['columns']= array('id');
			$data1['conditions']= array('name'=>$fileop[1]);
			//print_r($data1);die;
			$result = $this->_db->select($data1);
			if($row1=$result->fetch(PDO::FETCH_ASSOC)){
				$questionCategory = $row1['id'];
			}
			else{
				$questionCategory = "";
			}
			//echo $questionCategory;
			if(!($questionCategory == ""))
			{
				$question = '\''.$fileop[2].'\'';
				$options = $fileop[3].','.$fileop[4].','.$fileop[5].','.$fileop[6];
				if ($questionType==7){
					$correct = $fileop[7].','.$fileop[8].','.$fileop[9];
					$arrCorrect= explode(",", $correct);
					$arrCorrect=array_filter($arrCorrect);
				}
				else{
					$correctAnswer=$fileop[7];
				}
				$arrOption= explode(",", $options);
				$arrOption=array_filter($arrOption);
				$countOp=count($arrOption);
				$createdBy=4;//supposed to be from session
				$status =0;
				if(($questionType==6 && $countOp==2) || (($questionType==5 || $questionType==7) && $countOp>2)){
					$data2= array('id'=>'',
								'question'=>$question,
								'ques_type_id'=>$questionType,
								'category_id'=>$questionCategory,
								'created_by'=>$createdBy,
								'status'=>$status
								);
					
					$result = $this->_db->insert('question', $data2);
					if($result){
						
						$data3['tables']= 'question';
						$data3['columns']= array('id');
						$data3['conditions'] = array('question'=>$question,
													'ques_type_id'=>$questionType,
													'created_by'=>$createdBy
												);
						$result = $this->_db->select($data3);
						
						while($row3=$result->fetch(PDO::FETCH_ASSOC)){
							$questionId = $row3['id'];
						}
						foreach($arrOption as $key=>$value){
							if($questionType==7){
								if(in_array($key+1, $arrCorrect)){
									$corr=1;
								}
								else{
									$corr=0;
								}
							}
							else{
			
								if($key==($correctAnswer-1)){
									$corr=1;
								}
								else{
									$corr=0;
								}
							}
							$data4= array('id'=>'',
									'ques_id'=>$questionId,
									'option'=>$value,
									'correct'=>$corr
									);
							$result = $this->_db->insert('question_options', $data4);
							
						}
						if($result)
						{
							$error[]=$question."uploaded successfully<br/>";
						}
					}
					
				}
				
			}	//loop ends here
			else
				$error[]="cannot upload Question".$question."<br/>";
		}
		return $error;
	}
}
?>	