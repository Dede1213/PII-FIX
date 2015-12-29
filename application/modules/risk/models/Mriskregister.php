<?php
class Mriskregister extends APP_Model {
	public function getRiskCategory($parent = 0) {
		$sql = 'select 
					cat_id as ref_key, 
					concat(cat_code, " - ", cat_name) as ref_value
				from m_risk_category a 
				where cat_parent = ?';
		$query = $this->db->query($sql, array('divid' => $parent));
		
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getRiskLikelihood() {
		$sql = 'select *
				from m_likelihood order by l_id';
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getRiskImpactReference() {
		$sql = "select *
				from m_reference 
				where ref_context = 'impact.display'";
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row) {
			$res[$row['ref_key']] = $row['ref_value'];
		}
		
		return $res;
	}
	
	public function getRiskImpact() {
		$sql = 'select *
				from m_risk_impact order by impact_id';
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getRiskLevel($impact, $likelihood) {
		$sql = "select a.risk_level as ref_key, b.ref_value
				from m_risklevel_matrix a
				left join m_reference b on a.risk_level = b.ref_key and ref_context = 'risklevel.display'
				where a.impact_value = ? and a.likelihood_key = ?";
		$query = $this->db->query($sql, array('im' => $impact, 'lvl' => $likelihood));
		$row = $query->row_array();
		
		return $row;
	}
	
	public function getRiskLevelList() {
		$sql = "select 
				concat(impact_value, '-', likelihood_key) as ref_key, 
				risk_level as ref_value
				from m_risklevel_matrix";
				
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		return $res;
	}
	
	public function getDivisionList() {
		$sql = "select 
				division_id as ref_key, 
				division_name as ref_value
				from m_division";
				
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		return $res;
	}
	
	public function getRiskImpactForList() {
		$impact_view = $this->getRiskImpactReference();
		$impact = $this->getRiskImpact();
		$res = $par_key = $par_desc = array();
		
		foreach($impact as $row) {
			$par_key[$row['impact_id']] = $row['impact_category'];
			$par_desc[$row['impact_id']] = array(
				$row['lvl_1_value'] => $impact_view[$row['lvl_1_value']].' ('.$row['lvl_1_desc'].')',
				$row['lvl_2_value'] => $impact_view[$row['lvl_2_value']].' ('.$row['lvl_2_desc'].')',
				$row['lvl_3_value'] => $impact_view[$row['lvl_3_value']].' ('.$row['lvl_3_desc'].')',
				$row['lvl_4_value'] => $impact_view[$row['lvl_4_value']].' ('.$row['lvl_4_desc'].')',
				$row['lvl_5_value'] => $impact_view[$row['lvl_5_value']].' ('.$row['lvl_5_desc'].')'
			);
		}
		
		$res['impact'] = $par_key;
		$res['impact_list'] = $par_desc;
		
		return $res;
	}
	
	public function getDataMode($mode, $defFilter, $page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			$ex_filter = ' and '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
				
		if ($mode == 'user') {
			$date = date("Y-m-d");
			$sql = "select 
					a.*,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					f.division_name as risk_owner_v
					from t_risk a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					join m_periode on m_periode.periode_id = a.periode_id
					where 
					a.periode_id is not null
					and a.periode_id = ".$defFilter['periodid']."
					and a.risk_input_by = '".$defFilter['userid']."'
					and (m_periode.periode_start <= '".$date."'
					and m_periode.periode_end >= '".$date."')
					";
		}
		
		if ($mode == 'userRollover') {
			$date = date("Y-m-d");
			$sql = "select 
					a.created_by,
					a.created_date,
					a.existing_control_id,
					a.periode_id,
					a.risk_2nd_sub_category,
					a.risk_category,
					a.risk_cause,
					a.risk_code,
					a.risk_control_owner,
					a.risk_date,
					a.risk_description,
					a.risk_division,
					a.risk_evaluation_control,
					a.risk_event,
					a.risk_existing_control,
					a.risk_id,
					a.risk_impact,
					a.risk_impact_level,
					a.risk_input_by,
					a.risk_input_division,
					a.risk_level,
					a.risk_library_id,
					a.risk_likelihood_key,
					a.risk_owner,
					a.risk_sub_category,
					a.risk_treatment_owner,
					a.suggested_risk_treatment,
					a.switch_flag,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					m_periode.periode_end,
					f.division_name as risk_owner_v,
					IF(m_periode.periode_end <= '".$date."', '0', a.risk_status) AS risk_status 
					from t_risk a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					join m_periode on m_periode.periode_id = a.periode_id
					where 
					a.periode_id not in (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end)
					and a.risk_input_by = '".$defFilter['userid']."'
					 
					";
		}
		
		$sql = $sql.$ex_filter.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'risk_id', true);
		return $res;
	}
	
	public function getDataById($id)
	{
		$sql = "select 
				a.*
				from t_risk a where risk_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function insertRiskRegister($risk, $code, $impact, $actplan, $control)
	{
		$sql = "INSERT INTO `t_risk` (
				`risk_code`, `risk_date`, 
				`risk_status`, `periode_id`, 
				`risk_input_by`, `risk_input_division`, `risk_owner`, `risk_division`, 
				`risk_library_id`, `risk_event`, `risk_description`, `risk_category`, 
				`risk_sub_category`, `risk_2nd_sub_category`, `risk_cause`, `risk_impact`, 
				`risk_level`, `risk_impact_level`, `risk_likelihood_key`, `suggested_risk_treatment`, 
				`created_by`, `created_date`)
		VALUES (
			?, NOW(),
			?,?,
			?,?,?,?,
			?,?,?,?,
			?,?,?,?,
			?,?,?,?,
			?, NOW() );
		";
		$res = $this->db->query($sql, $risk);
		if ($res) {
			$rid = $this->db->insert_id();
			// update risk code
			/*
			$code = $code.'-'.$rid;
			$sql = 'update t_risk set risk_code = ? where risk_id = ?';
			$res2 = $this->db->query($sql, array('rc' => $code, 'rid' => $rid));
			*/
			
			// insert impact
			$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $rid,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_action_plan(risk_id, action_plan_status, action_plan, due_date, division) 
					values(?, 0, ?, ?, ?)";
			foreach ($actplan as $key => $value) {
				$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
				$par = array(
					'rid' => $rid,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert control
			$sql = "insert into t_risk_control(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner) 
					values(?, ?, ?, ?, ?)";
			foreach ($control as $key => $value) {
				$ecid = $value['existing_control_id'];
				if ($value['existing_control_id'] == '') $ecid = null;
				$par = array(
					'rid' => $rid,
					'ap' => $ecid,
					'dd' => $value['risk_existing_control'],
					'div1' => $value['risk_evaluation_control'],
					'div2' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			return $rid;
		} else {
			return false;
		}
		
		return $res;
	}
	
	
	public function insertRiskRegisterLibrary($risk, $code, $impact, $actplan, $control)
	{
		$rid = $this->insertRiskRegister($risk, $code, $impact, $actplan, $control);
		if ($rid) {
			$par = array('rid'=>$rid);
			
			$sql = "select * from t_risk where risk_id = ?";
			$query = $this->db->query($sql, $par);
			$new_risk = $query->row_array();
			
			$lib_par = array('rid' => $new_risk['risk_library_id']);
			$sql = "insert into t_risk_change 
					select 
					".$rid." as risk_id,
					'".$new_risk['risk_code']."' as risk_code,
					NOW() as risk_date,
					'".$new_risk['risk_status']."' as risk_status,
					'".$new_risk['periode_id']."' as periode_id,
					'".$new_risk['risk_input_by']."' as risk_input_by,
					'".$new_risk['risk_input_division']."' as risk_input_division,
					risk_owner,
					risk_division,
					".$new_risk['risk_library_id']." as risk_library_id,
					risk_event,
					risk_description,
					risk_category,
					risk_sub_category,
					risk_2nd_sub_category,
					risk_cause,
					risk_impact,
					NULL as existing_control_id,
					NULL as risk_existing_control,
					NULL as risk_evaluation_control,
					NULL as risk_control_owner,
					risk_level,
					risk_impact_level,
					risk_likelihood_key,
					suggested_risk_treatment,
					NULL as risk_treatment_owner,
					'".$new_risk['created_by']."' as created_by,
					NOW() as created_date,
					NULL as switch_flag
					from t_risk where risk_id = ?";
			$res = $this->db->query($sql, $lib_par);
			
			// insert impact
			$sql = "insert into t_risk_impact_change(risk_id, impact_id, impact_level) 
					select 
					".$rid." as risk_id,
					impact_id, impact_level
					from t_risk_impact
					where risk_id = ?";
			$res = $this->db->query($sql, $lib_par);
			
			// insert action plan
			$sql = "insert into t_risk_action_plan_change(risk_id, action_plan_status, action_plan, due_date, division) 
					select 
					".$rid." as risk_id,
					0 as action_plan_status, action_plan, due_date, division
					from t_risk_action_plan
					where risk_id = ?";
			$res = $this->db->query($sql, $lib_par);
					
			// insert control
			$sql = "insert into t_risk_control_change(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner) 
					select 
					".$rid." as risk_id,
					existing_control_id, risk_existing_control, 
					risk_evaluation_control, risk_control_owner
					from t_risk_control
					where risk_id = ?";
			$res = $this->db->query($sql, $lib_par);
			return true;
		} else {
			return false;
		}
		return false;
	}
}