<?php
class Mlibrary extends APP_Model {
	 
	
	public function insertQuestion($uid, $data) 
	{
		$sql = "insert into t_qna(status, subject, question, created_date, created_by)
				values(0, ?, ?, NOW(), ?)";
		$par = array(
			'subject' => $data['subject'], 
			'question' => $data['question'], 
			'created_by' => $uid
		);
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function insertAnswer($qid, $answer) 
	{
		$sql = "update t_qna
				set status = 1, answer = ?
				where id = ?";
		$par = array(
			'answer' => $answer, 
			'id' => $qid
		);
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function getAllRisk($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			$ex_filter = ' where '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
		$date = date("Y-m-d");
		$sql = "select t_risk.risk_id,t_risk.risk_code, t_risk.risk_event, t_risk.risk_description, m_risk_category.cat_name, m_risk_category.cat_parent
				from t_risk join m_risk_category ON t_risk.risk_2nd_sub_category = m_risk_category.cat_id where t_risk.risk_library_id is null
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'risk_id', true);
		return $res;
	}
	
	public function getAllRisk_ap($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			$ex_filter = ' where '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
		$date = date("Y-m-d");
		$sql = "select t_risk_action_plan.id, t_risk_action_plan.action_plan, t_risk_action_plan.due_date, t_risk_action_plan.division
				from t_risk_action_plan group by t_risk_action_plan.action_plan
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_tax($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			$ex_filter = ' where '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
		 
		$sql = "select cat_id as id,cat_code, cat_name, cat_desc
from m_risk_category
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_ec($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			$ex_filter = ' where '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
		$date = date("Y-m-d");
		$sql = "SELECT
			  t_risk_control.id,
			  t_risk_control.risk_existing_control,
			  t_risk_control.risk_evaluation_control,
			  t_risk_control.risk_control_owner
			FROM t_risk_control
			WHERE existing_control_id IS NULL
			 
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function deleteRisk($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql1 = "delete  from t_risk where risk_id = ?";
		$sql2 = "delete  from t_risk_change where risk_id = ?";
		$sql3 = "delete  from t_risk_action_plan where risk_id = ?";
		$sql4 = "delete  from  t_risk_action_plan_change where risk_id = ?";
		$sql5 = "delete  from t_risk_add_user where risk_id = ?";
		$sql6 = "delete from t_risk_control where risk_id = ?";
		$sql7 = "delete  from t_risk_control_change where risk_id = ?";
		$sql8 = "delete  from t_risk_impact where risk_id = ?";
		
		$res = $this->db->query($sql1, $par);
		$res = $this->db->query($sql2, $par);
		$res = $this->db->query($sql3, $par);
		$res = $this->db->query($sql4, $par);
		$res = $this->db->query($sql5, $par);
		$res = $this->db->query($sql6, $par);
		$res = $this->db->query($sql7, $par);
		$res = $this->db->query($sql8, $par);

		return $res;
	}
	
	public function deleteRisk_ap($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql1 = "delete  from t_risk_action_plan where id = ?";
		$sql2 = "delete  from t_risk_action_plan_change where id = ?"; 
		
		$res = $this->db->query($sql1, $par);
		$res = $this->db->query($sql2, $par); 

		return $res;
	}
	
	public function deleteRisk_ec($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql1 = "delete   from t_risk_control where id = ?";
		//$sql2 = "delete   from t_risk_control_change where id = ?"; 
		
		$res = $this->db->query($sql1, $par);
		//$res = $this->db->query($sql2, $par); 

		return $res;
	}
	
	public function deleteRisk_tax($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql1 = "delete  from m_risk_category where cat_id = ?";
		//$sql2 = "delete   from t_risk_control_change where id = ?"; 
		
		$res = $this->db->query($sql1, $par);
		//$res = $this->db->query($sql2, $par); 

		return $res;
	}
	
	function listrisk_update($data){
	
	$sql = "update `t_risk`
		SET `risk_code`='".$data['risk_id']."', `risk_event`='".$data['risk_event']."', `risk_description`='".$data['risk_description']."',`risk_2nd_sub_category`='".$data['cat_name']."'
		WHERE `risk_code`= '".$data['risk_id']."'";
  
	$res = $this->db->query($sql);
	return $res;
	
	}
	 
	function listriskap_update($data){
	
		$newdate = date("Y-m-d",strtotime($data['due_date'])); 
		
		$idnya = explode("AP.",$data['id']);
		
		if($data['id'] !=""){
			$sql = " 
			update `t_risk_action_plan`
			SET  `action_plan`='".$data['action_plan']."'	,`due_date`='".$newdate."', `division`='".$data['division']."'
			WHERE `id`='".$idnya[1]."'	
			";
		}
		else{
			$sql = " 
			INSERT INTO `t_risk_action_plan`( `action_plan`,`due_date`,`division` ) VALUES ('".$data['action_plan']."','".$newdate."','".$data['division']."')
			";
		}
	  
		$res = $this->db->query($sql);
		return $res;
	
	}
	
	function listriskec_update($data){
	 
		$idnya = explode("EC.",$data['id']);
		  
		if($data['id'] !=""){
			$sql = " 			 
				UPDATE t_risk_control
				SET risk_existing_control='".$data['risk_existing_control']."', risk_evaluation_control='".$data['risk_evaluation_control']."', risk_control_owner= '".$data['risk_control_owner']."'
				WHERE `id`='".$idnya[1]."'	
			";
		}
		else{
			$sql = " 
							
				INSERT INTO t_risk_control (risk_existing_control,risk_evaluation_control,risk_control_owner) VALUES ('".$data['risk_existing_control']."','".$data['risk_evaluation_control']."','".$data['risk_control_owner']."')
				 
			";
		}
	  
		$res = $this->db->query($sql);
		return $res;
	
	}
	
	function listrisktax_update($data){
	  
			$sql = " 			 
				 update m_risk_category
				SET cat_code='".$data['cat_code']."', cat_name='".$data['cat_name']."', cat_desc='".$data['cat_desc']."'
				WHERE cat_code='".$data['cat_code']."'
			";
	 
		$res = $this->db->query($sql);
		return $res;
	
	}
	
	function getRiskCategory_bycatname($catname) {
		$sql = 'select 
					cat_parent
				from m_risk_category a 
				where cat_name = "'.$catname.'"';
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	function getDivision() {
		$sql = 'select 
					*
				from m_division ';
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
}
