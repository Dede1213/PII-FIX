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
		$sql = "
		SELECT * FROM ( SELECT
                                  t_risk.risk_id,
                                  t_risk.risk_code,
                                  t_risk.risk_event,
                                  t_risk.risk_description,
                                  t_risk.risk_cause,
                                  t_risk.risk_impact,
                                  m3.cat_name AS cat_name1,
                                  m2.cat_name AS cat_name2,
                                  m1.cat_name AS cat_name3,
                                  m3.cat_id AS cat_id1,
                                  m2.cat_id AS cat_id2,
                                  m1.cat_id AS cat_id3
                                  
                                FROM
                                  t_risk 
                                  JOIN m_risk_category m1 
                                                ON t_risk.risk_2nd_sub_category = m1.cat_id 
                                  JOIN m_risk_category m2 
                                                ON t_risk.risk_sub_category = m2.cat_id 
                                  JOIN m_risk_category m3 
                                                ON t_risk.risk_category = m3.cat_id 
                                  WHERE t_risk.risk_library_id IS NULL
                                and t_risk.risk_status >= 3
                                and t_risk.existing_control_id IS NULL ORDER BY t_risk.risk_id desc) as another
                                GROUP BY another.risk_code
								order by SUBSTRING_INDEX(another.risk_code,'.',1),SUBSTRING_INDEX(SUBSTRING_INDEX(another.risk_code,'.',2),'.',-1)+0,SUBSTRING_INDEX(SUBSTRING_INDEX(another.risk_code,'.',-1),'-',1)+0,SUBSTRING_INDEX(another.risk_code,'-',-1) +0

				"
				
				.$ex_filter;
				//.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'risk_id', true);
		return $res;
	}
	
	public function getAllRisk_export()
	{
	 
		$sql = "
		SELECT
		  t_risk.risk_id,
		  t_risk.risk_code,
		  t_risk.risk_event,
		  t_risk.risk_description,
		  t_risk.risk_cause,
		  t_risk.risk_impact,
		  m3.cat_name AS cat_name1,
		  m2.cat_name AS cat_name2,
		  m1.cat_name AS cat_name3,
		  m3.cat_id AS cat_id1,
		  m2.cat_id AS cat_id2,
		  m1.cat_id AS cat_id3
		  
		FROM
		  t_risk 
		  JOIN m_risk_category m1 
			ON t_risk.risk_2nd_sub_category = m1.cat_id 
		  JOIN m_risk_category m2 
			ON t_risk.risk_sub_category = m2.cat_id 
		  JOIN m_risk_category m3 
			ON t_risk.risk_category = m3.cat_id 
		WHERE t_risk.risk_library_id IS NULL 
				";
				 
		$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
			
	}

	public function getAllObjective_export()
	{
	 
		$sql = "select t_risk_objective.id, t_risk_objective.objective
				from t_risk_objective
				group by t_risk_objective.objective
				";
				 
		$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
			
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
		//editdoni 	Home-Library Management-Risk-List of Action Plan 
		$date = date("Y-m-d");
		$sql = "
				
				SELECT @nourut:=IFNULL(@nourut,-1)+1 AS id,
				another.action_plan AS action_plan,
				another.due_date AS due_date,
				another.division AS division,
				another.risk_id,
				another.risk_code,
				another.id AS id1
				FROM (SELECT t_risk_action_plan.*,
				t_risk.risk_code
				FROM t_risk_action_plan
				JOIN t_risk ON t_risk.risk_id = t_risk_action_plan.risk_id
				GROUP BY division, action_plan) AS another 
				ORDER BY another.id
				
				"
				/*
				select t_risk_action_plan.id, t_risk_action_plan.action_plan, t_risk_action_plan.due_date, t_risk_action_plan.division,
				t_risk_action_plan.risk_id,t_risk.risk_code
				from t_risk_action_plan
				JOIN t_risk ON t_risk.risk_id = t_risk_action_plan.risk_id 
				group by t_risk_action_plan.division, t_risk_action_plan.action_plan
				
				
				SET @noo=0;
				SELECT @noo:=@noo+1 AS id1,
				another.action_plan AS action_plan,
				another.due_date as due_date,
				another.division AS division,
				another.risk_id,
				another.risk_code,
				another.id AS id
				FROM (SELECT t_risk_action_plan.*,
				t_risk.risk_code
				FROM t_risk_action_plan
				JOIN t_risk ON t_risk.risk_id = t_risk_action_plan.risk_id
				GROUP BY division, action_plan) AS another 
				ORDER BY another.id
				*/
				
				
				.$ex_filter;
				
				//.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_ap_report()
	{
		 
		$sql = "select t_risk_action_plan.id, t_risk_action_plan.action_plan, t_risk_action_plan.due_date, t_risk_action_plan.division
					from t_risk_action_plan
					group by t_risk_action_plan.division, t_risk_action_plan.action_plan
				";
				
		$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	}
	
	public function getAllRisk_kri($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		$sql = "select t1.id, t1.kri_code, t1.key_risk_indicator, t1.treshold, (select GROUP_CONCAT(t2.operator,' ', t2.value_1, ' = ', t2.result) from t_kri_treshold t2 where t2.kri_id=t1.id) as 'threshold value',t1.risk_id,t_risk.risk_code 
from t_kri t1 
join t_risk on t_risk.risk_id = t1.risk_id where kri_library_id is null
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_kri_report()
	{
		 
		$sql = "select t1.id, t1.kri_code, t1.key_risk_indicator, t1.treshold, (select GROUP_CONCAT(t2.operator,' ', t2.value_1, ' = ', t2.result) from t_kri_treshold t2 where t2.kri_id=t1.id) as 'threshold value' 
from t_kri t1 where kri_library_id is null
				";
				
		$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
				 
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
			order by cat_id
				"
				//GROUP BY another.risk_code
				//order by SUBSTRING_INDEX(another.risk_code,'.',1),SUBSTRING_INDEX(SUBSTRING_INDEX(another.risk_code,'.',2),'.',-1)+0,SUBSTRING_INDEX(SUBSTRING_INDEX(another.risk_code,'.',-1),'-',1)+0,SUBSTRING_INDEX(another.risk_code,'-',-1) +0
				.$ex_filter;
				
				//.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_tax_report()
	{
		 
		$sql = "select cat_id as id,cat_code, cat_name, cat_desc
		from m_risk_category
				";
				
		$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
				 
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
			  t_risk_control.risk_control_owner,
			  t_risk_control.risk_id,
			  t_risk.risk_code
			FROM t_risk_control
			JOIN t_risk ON t_risk.risk_id = t_risk_control.risk_id 
			
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
		return $res;
	}
	
	public function getAllRisk_ec_report()
	{ 
		$sql = "SELECT
			  t_risk_control.id,
			  t_risk_control.risk_existing_control,
			  t_risk_control.risk_evaluation_control,
			  t_risk_control.risk_control_owner
			FROM t_risk_control
			WHERE existing_control_id IS NULL
			 AND risk_existing_control <> 'NONE'
				"; 
				
			$query = $this->db->query($sql);
			
			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	public function getAllRisk_objective($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		//editdoni 	Home Library Management Risk List of Objective 
		$sql = 	"
					SELECT @nourut:=IFNULL(@nourut,-1)+1 AS id,
					another.objective,
					another.risk_id,
					another.risk_code,
					another.id AS id1
					FROM (SELECT t_risk_objective.*,
					t_risk.risk_code
					FROM t_risk_objective
					JOIN t_risk ON t_risk.risk_id = t_risk_objective.risk_id
					GROUP BY objective) AS another 
					ORDER BY another.id
				"
				/*
					
				select @nourut:=IFNULL(@nourut,-1)+1 AS id, t_risk_objective.objective, t_risk_objective.risk_id,
				t_risk.risk_code,t_risk_objective.id AS id1
				from t_risk_objective
				JOIN t_risk ON t_risk.risk_id = t_risk_objective.risk_id
				group by t_risk_objective.objective
				
				
				SELECT @nourut:=IFNULL(@nourut,-1)+1 AS id,
				another.action_plan AS action_plan,
				another.due_date AS due_date,
				another.division AS division,
				another.risk_id,
				another.risk_code,
				another.id AS id1
				FROM (SELECT t_risk_action_plan.*,
				t_risk.risk_code
				FROM t_risk_action_plan
				JOIN t_risk ON t_risk.risk_id = t_risk_action_plan.risk_id
				GROUP BY division, action_plan) AS another 
				ORDER BY another.id
				*/
				.$ex_filter;
				
				//.$ex_or
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

		$sql = "select action_plan,division from t_risk_action_plan where id = ?";
		$res = $this->db->query($sql, $par);
		$row = $res->row();
		$action_plan = $row->action_plan;
		$division = $row->division;
		
		$sql1 = "delete  from t_risk_action_plan where action_plan = '".$action_plan."' and division= '".$division."' ";
		$sql2 = "delete  from t_risk_action_plan_change where action_plan = '".$action_plan."' and division= '".$division."' "; 
		
		$res = $this->db->query($sql1);
		$res = $this->db->query($sql2); 

		return $res;
	}
	
	public function deleteRisk_kri($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql1 = "delete from t_kri where id=?";
		$sql2 = "delete from t_kri_treshold where id=?"; 
		
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

	public function deleteRisk_objective($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		  
		$par['risk_id'] = $risk_id;
		
		$sql = "select objective from t_risk_objective where id = ?";
		$res = $this->db->query($sql, $par);
		$row = $res->row();
		$hasil = $row->objective;

		$sql1 = "delete   from t_risk_objective where objective = '".$hasil."'";
		$res = $this->db->query($sql1);

		$sql2 = "delete   from t_risk_objective_change where objective = '".$hasil."'";
		$res = $this->db->query($sql2, $par); 

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
		SET `risk_code`='".$data['risk_id']."',
		`risk_impact`='".$data['risk_impact']."',
		`risk_cause`='".$data['risk_cause']."',
		`risk_event`='".$data['risk_event']."',
		`risk_description`='".$data['risk_description']."',
		`risk_category`='".$data['risk_category']."',
		`risk_sub_category`='".$data['risk_sub_category']."',
		`risk_2nd_sub_category`='".$data['cat_name']."'
		WHERE `risk_code`= '".$data['risk_id']."'";
  
	$res = $this->db->query($sql);
	return $res;
	
	}
	 
	function listriskap_update($data){
	 
		$idnya = explode("AP.",$data['id']);
		
		if($data['id'] !=""){
			$sql = " 
			update `t_risk_action_plan`
			SET  `action_plan`='".$data['action_plan']."'	 , `division`='".$data['division']."'
			WHERE `action_plan`='".$data['action_plan_ex']."'	  AND  `division`='".$data['division_ex']."'			 
			";
		}
		else{
			$sql = " 
			INSERT INTO `t_risk_action_plan`( `action_plan` ,`division` ) VALUES ('".$data['action_plan']."' ,'".$data['division']."')
			";
		}
	  
		$res = $this->db->query($sql);
		return $res;
	
	}
	
	function listriskkri_update($data){
	 
			$sql = " 
			UPDATE t_kri
			SET key_risk_indicator='".$data['kri_code']."', treshold='".$data['treshold']."', treshold_type='".$data['treshold_type']."'
			WHERE kri_code= '".$data['kri_code']."'	
			 
			";
		 
		$res = $this->db->query($sql);
		return $res;
	
	}
	
	function listriskec_update($data){
	 
		$idnya = explode("EC.",$data['id']);
		  
		if($data['id'] =="akal"){
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

	function listriskobjective_update($data){
	 
		$idnya = explode("OB.",$data['id']);
		  
		if($data['id'] !=""){
			$sql = " 			 
				UPDATE t_risk_objective
				SET objective='".$data['objective']."'
				WHERE `objective`='".$data['objective_ex']."'	
			";
		}
		else{
			$sql = " 
							
				INSERT INTO `t_risk_objective`(`id`,`objective` ) VALUES ('".$data['id']."','".$data['objective']."')
				 
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
	
	function get_tresholddetail($data){
	
	$sql = 'SELECT kri_id FROM t_kri_treshold WHERE id = "'.$data['id'].'" ';
		$query = $this->db->query($sql);
		
		if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}	
	 
	}
	
	function delete_tresholddetail($data,$kri_id){
	
	$this->db->where('id',$data['id']);
	$this->db->delete('t_kri_treshold');
	 
	$sql = 'SELECT * FROM t_kri_treshold WHERE kri_id =  "'.$kri_id.'"';
		$query = $this->db->query($sql);
		
		if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}
	
	function add_treshold($data){
	
		$this->db->insert("t_kri_treshold",$data);
		 $res = "true";
		return $res;
	
	}
	
	function add_treshold2($data){
	
	
		//set value below
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","BELOW");
		$this->db->set("value_1",$data['value-below-1']);
		$this->db->set("value_2",$data['value-below-2']);
		$this->db->set("value_type",$data['value-below-value_type']);
		$this->db->set("result",$data['value-below-result']);
		$this->db->insert("t_kri_treshold");
		
		//set value between
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","BETWEEN");
		$this->db->set("value_1",$data['value-between-1']);
		$this->db->set("value_2",$data['value-between-2']);
		$this->db->set("value_type",$data['value-between-value_type']);
		$this->db->set("result",$data['value-between-result']);
		$this->db->insert("t_kri_treshold");
		
		//set value above
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","ABOVE");
		$this->db->set("value_1",$data['value-above-1']);
		$this->db->set("value_2",$data['value-above-2']);
		$this->db->set("value_type",$data['value-above-value_type']);
		$this->db->set("result",$data['value-above-result']);
		$this->db->insert("t_kri_treshold");
		
		if(isset($data['is_percentage_treshold'])){
		//perc value below
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","BELOW");
		$this->db->set("value_1",$data['perc-below-1']);
		$this->db->set("value_2",$data['perc-below-2']);
		$this->db->set("value_type",$data['perc-below-value_type']);
		$this->db->set("result",$data['perc-below-result']);
		$this->db->insert("t_kri_treshold");
		
		//perc value between
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","BETWEEN");
		$this->db->set("value_1",$data['perc-between-1']);
		$this->db->set("value_2",$data['perc-between-2']);
		$this->db->set("value_type",$data['perc-between-value_type']);
		$this->db->set("result",$data['perc-between-result']);
		$this->db->insert("t_kri_treshold");
		
		//perc value above
		$this->db->set("kri_id",$data['kri_id']);
		$this->db->set("operator","ABOVE");
		$this->db->set("value_1",$data['perc-above-1']);
		$this->db->set("value_2",$data['perc-above-2']);
		$this->db->set("value_type",$data['perc-above-value_type']);
		$this->db->set("result",$data['perc-above-result']);
		$this->db->insert("t_kri_treshold");
		}
		
		$res = "true";
		return $res;
	
	}
	
	function yap_tresholddetail($kri_id){
	 
	$sql = 'SELECT * FROM t_kri_treshold WHERE kri_id =  "'.$kri_id.'"';
		$query = $this->db->query($sql);
		
		if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	
	}

	function get_properties($risk_code){
		$sql = "select risk_id from t_risk where risk_code = '".$risk_code."' ";
		$run_sql = $this->db->query($sql)->row();
		$risk_id = $run_sql->risk_id;


		$sql2 = "select * from t_risk_add_user 
				where risk_id IN (select risk_id from t_risk where risk_code = (select risk_code from t_risk where risk_id = '".$risk_id."'))";
		$run_sql2 = $this->db->query($sql2)->result_array(); 
		return $run_sql2;
	}
	
	function get_all_username(){
		$sql2 = "select * from m_user order by username ";
		$run_sql2 = $this->db->query($sql2)->result_array(); 
		return $run_sql2;
	}

	function get_all_username_edit($username){
		$sql2 = "select * from m_user  where username != '$username' order by username ";
		$run_sql2 = $this->db->query($sql2)->result_array(); 
		return $run_sql2;
	}

	function update_properties($data){
		$username_asli = $data['username_asli'];
		$date_asli = $data['date_asli'];
		$username = $data['username'];
		$date_change = date("Y-m-d", strtotime($data['date_change']));



		$sql2 = "update t_risk_add_user set username = '$username', date_changed = '$date_change' where username = '$username_asli' and date_changed = '$date_asli' ";
		$run_sql2 = $this->db->query($sql2); 
		return true;
	}

	function delete_properties($risk_id,$username){
		$sql2 = "delete from t_risk_add_user where risk_id = '$risk_id' and username = '$username' ";
		$run_sql2 = $this->db->query($sql2); 
		return true;
	}
	 
}
