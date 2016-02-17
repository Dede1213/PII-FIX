<?php
class Risk extends APP_Model {
	/* RISK QUERIES FUNCTION */
	public function getRiskByIdNoRef($risk_id) 
	{
		$sql = "select 
				a.*,
				l.display_name as risk_input_by_v
				from t_risk a 
				left join m_user l on a.risk_input_by = l.username
				where a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}

	//cek libarary dari changes
	public function getRiskByIdNoRefChanges($risk_id, $user_by) 
	{
		$sql = "select 
				a.*,
				l.display_name as risk_input_by_v
				from t_risk_change a 
				left join m_user l on a.risk_input_by = l.username
				where a.risk_id = ? and risk_input_by='".$user_by."' ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}
	
	public function getRiskById($risk_id) 
	{
		$sql = "select 
				a.*,
				b.ref_value as risk_status_v,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				f.division_name as risk_owner_v,
				g.division_name as division_v,
				t_risk_add_user.username,
				concat(h.cat_code, '- Category ', h.cat_name) as risk_category_v,
				concat(i.cat_code, '- Category ', i.cat_name) as risk_sub_category_v,
				concat(j.cat_code, '- Category ', j.cat_name) as risk_2nd_sub_category_v,
				k.ref_value as treatment_v,
				l.display_name as risk_input_by_v,
				m.division_name as risk_input_division_v,
				n.risk_code as risk_library_code
				from t_risk a 
				left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_division f on a.risk_owner = f.division_id
				left join m_division g on a.risk_division = g.division_id
				left join m_risk_category h on a.risk_category = h.cat_id
				left join m_risk_category i on a.risk_sub_category = i.cat_id
				left join m_risk_category j on a.risk_2nd_sub_category = j.cat_id
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				left join m_user l on a.risk_input_by = l.username
				left join m_division m on a.risk_input_division = m.division_id
				left join t_risk n on a.risk_library_id = n.risk_id
				left join t_risk_add_user on a.risk_id = t_risk_add_user.risk_id
				
				where a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		if ($row) {
			$row['impact_list'] = $this->getRiskImpact($risk_id);
			$row['action_plan_list'] = $this->getActionPlan($risk_id);
			$row['control_list'] = $this->getControlList($risk_id);
			$row['objective_list'] = $this->getObjectiveList($risk_id);
		}
		
		return $row;
	}
//get risk owner
	public function getRiskByIdowner($risk_id) 
	{
		$sql = "select 
				a.*,
				b.ref_value as risk_status_v,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				f.division_name as risk_owner_v,
				g.division_name as division_v,
				t_risk_add_user.username,
				concat(h.cat_code, '- Category ', h.cat_name) as risk_category_v,
				concat(i.cat_code, '- Category ', i.cat_name) as risk_sub_category_v,
				concat(j.cat_code, '- Category ', j.cat_name) as risk_2nd_sub_category_v,
				k.ref_value as treatment_v,
				l.display_name as risk_input_by_v,
				m.division_name as risk_input_division_v,
				n.risk_code as risk_library_code
				from t_risk_change a 
				left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_division f on a.risk_owner = f.division_id
				left join m_division g on a.risk_division = g.division_id
				left join m_risk_category h on a.risk_category = h.cat_id
				left join m_risk_category i on a.risk_sub_category = i.cat_id
				left join m_risk_category j on a.risk_2nd_sub_category = j.cat_id
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				left join m_user l on a.risk_input_by = l.username
				left join m_division m on a.risk_input_division = m.division_id
				left join t_risk n on a.risk_library_id = n.risk_id
				left join t_risk_add_user on a.risk_id = t_risk_add_user.risk_id
				
				where a.risk_id = ? and a.switch_flag = 'P' ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		if ($row) {
			$row['impact_list'] = $this->getRiskImpactchanges($risk_id);
			$row['action_plan_list'] = $this->getActionPlanchanges($risk_id);
			$row['control_list'] = $this->getControlListchanges($risk_id);
		}
		
		return $row;
	}



	// get risk untuk change request head t_risk_change
	public function getRiskByIdchanges($risk_id) 
	{
		$sql = "select 
				a.*,
				b.ref_value as risk_status_v,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				f.division_name as risk_owner_v,
				g.division_name as division_v,
				t_risk_add_user.username,
				concat(h.cat_code, '- Category ', h.cat_name) as risk_category_v,
				concat(i.cat_code, '- Category ', i.cat_name) as risk_sub_category_v,
				concat(j.cat_code, '- Category ', j.cat_name) as risk_2nd_sub_category_v,
				k.ref_value as treatment_v,
				l.display_name as risk_input_by_v,
				m.division_name as risk_input_division_v,
				n.risk_code as risk_library_code
				from t_risk_change a 
				left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_division f on a.risk_owner = f.division_id
				left join m_division g on a.risk_division = g.division_id
				left join m_risk_category h on a.risk_category = h.cat_id
				left join m_risk_category i on a.risk_sub_category = i.cat_id
				left join m_risk_category j on a.risk_2nd_sub_category = j.cat_id
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				left join m_user l on a.risk_input_by = l.username
				left join m_division m on a.risk_input_division = m.division_id
				left join t_risk n on a.risk_library_id = n.risk_id
				left join t_risk_add_user on a.risk_id = t_risk_add_user.risk_id
				
				where a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		if ($row) {
			$row['impact_list'] = $this->getRiskImpactchanges($risk_id);
			$row['action_plan_list'] = $this->getActionPlanchanges($risk_id);
			$row['control_list'] = $this->getControlListchanges($risk_id);
			$row['objective_list'] = $this->getObjectiveListChange2($risk_id);
		}
		
		return $row;
	}

	public function getControlById($risk_id) 
	{
		$sql = "select 
				a.*
				from t_risk_control a
				where a.id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}

	public function getControlById2($risk_id) 
	{
		$sql = "select 
				a.existing_control
				from m_risk_existing_control a
				where a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}

	public function getControlById3($risk_id) 
	{
		$sql = "select 
				a.objective
				from t_risk_objective a
				where a.id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}
	
	public function getActionById($risk_id) 
	{
		$sql = "select 
				a.*
				from t_risk_action_plan a
				where a.id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}
	
	public function getRiskImpact($risk_id) 
	{
		$sql = "select * from t_risk_impact
				where risk_id = ?";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
//get risk impact dari changes
	public function getRiskImpactchanges($risk_id) 
	{
		$sql = "select * from t_risk_impact_change
				where risk_id = ? and switch_flag='P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getActionPlan($risk_id) 
	{
		$sql = "select a.*,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v
				from t_risk_action_plan a
				left join m_division b on a.division = b.division_id 
				where a.risk_id = ?";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
//get action plan dari changes
	public function getActionPlanchanges($risk_id) 
	{
		$sql = "select a.*,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v
				from t_risk_action_plan_change a
				left join m_division b on a.division = b.division_id 
				where a.risk_id = ? and switch_flag='P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
//get objective untuk library
	public function getObjectiveList($risk_id) 
	{
		$sql = "select a.*
				from t_risk_objective a
				where a.risk_id = ? ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getControlList($risk_id) 
	{
		$sql = "select a.*
				from t_risk_control a
				where a.risk_id = ? ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

//get control dari changes
	public function getControlListchanges($risk_id) 
	{
		$sql = "select a.*
				from t_risk_control_change a
				where a.risk_id = ? and switch_flag='P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getRiskChangeByIdNoRef($risk_id) 
	{
		$sql = "select 
				a.*
				from t_risk_change a 
				where a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		return $row;
	}
	
	public function getRiskChangeById($risk_id,$risk_input_by) 
	{
		
		//$user =$_GET['tes'];
		$sql = "select 
				a.*,
				b.ref_value as risk_status_v,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				f.division_name as risk_owner_v,
				g.division_name as division_v,
				t_risk_add_user.username,
				concat(h.cat_code, '- Category ', h.cat_name) as risk_category_v,
				concat(i.cat_code, '- Category ', i.cat_name) as risk_sub_category_v,
				concat(j.cat_code, '- Category ', j.cat_name) as risk_2nd_sub_category_v,
				k.ref_value as treatment_v,
				l.display_name as risk_input_by_v,
				m.division_name as risk_input_division_v,
				n.risk_code as risk_library_code
				from t_risk_change a 
				left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_division f on a.risk_owner = f.division_id
				left join m_division g on a.risk_division = g.division_id
				left join m_risk_category h on a.risk_category = h.cat_id
				left join m_risk_category i on a.risk_sub_category = i.cat_id
				left join m_risk_category j on a.risk_2nd_sub_category = j.cat_id
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				left join m_user l on a.risk_input_by = l.username
				left join m_division m on a.risk_input_division = m.division_id
				left join t_risk n on a.risk_library_id = n.risk_id
				left join t_risk_add_user on a.risk_id = t_risk_add_user.risk_id
				where a.risk_id = '".$risk_id."' and a.risk_input_by = '".$risk_input_by."' ";
//ubah
		$query = $this->db->query($sql);
		$row = $query->row_array();

		if ($row) {
			$row['impact_list'] = $this->getRiskImpactChange($risk_id,$risk_input_by);
			$row['action_plan_list'] = $this->getActionPlanChange($risk_id,$risk_input_by);
			$row['control_list'] = $this->getControlListChange($risk_id,$risk_input_by);
			$row['objective_list'] = $this->getObjectiveListChange($risk_id,$risk_input_by);
		}
		
		return $row;
	}


	
	public function getRiskImpactChange($risk_id,$risk_input_by) 
	{
		$sql = "select * from t_risk_impact_change
				where risk_id = ? and switch_flag = '".$risk_input_by."' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getActionPlanChange($risk_id,$risk_input_by) 
	{
		$sql = "select a.*,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v
				from t_risk_action_plan_change a
				left join m_division b on a.division = b.division_id 
				where a.risk_id = ? and switch_flag = '".$risk_input_by."' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getControlListChange($risk_id,$risk_input_by) 
	{
		$sql = "select a.*
				from t_risk_control_change a
				where a.risk_id = ? and switch_flag = '".$risk_input_by."' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function getObjectiveListChange($risk_id,$risk_input_by) 
	{
		$sql = "select a.*
				from t_risk_objective_change a
				where a.risk_id = ? and switch_flag = '".$risk_input_by."' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function getObjectiveListChange2($risk_id) 
	{
		$sql = "select a.*
				from t_risk_objective_change a
				where a.risk_id = ? and a.switch_flag='P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

//ini get risk change untuk verify risk owner
	public function getRiskChangeById2($risk_id,$risk_input_by) 
	{
		
		//$user =$_GET['tes'];
		$sql = "select 
				a.*,
				b.ref_value as risk_status_v,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				f.division_name as risk_owner_v,
				g.division_name as division_v,
				t_risk_add_user.username,
				concat(h.cat_code, '- Category ', h.cat_name) as risk_category_v,
				concat(i.cat_code, '- Category ', i.cat_name) as risk_sub_category_v,
				concat(j.cat_code, '- Category ', j.cat_name) as risk_2nd_sub_category_v,
				k.ref_value as treatment_v,
				l.display_name as risk_input_by_v,
				m.division_name as risk_input_division_v,
				n.risk_code as risk_library_code
				from t_risk_change a 
				left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_division f on a.risk_owner = f.division_id
				left join m_division g on a.risk_division = g.division_id
				left join m_risk_category h on a.risk_category = h.cat_id
				left join m_risk_category i on a.risk_sub_category = i.cat_id
				left join m_risk_category j on a.risk_2nd_sub_category = j.cat_id
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				left join m_user l on a.risk_input_by = l.username
				left join m_division m on a.risk_input_division = m.division_id
				left join t_risk n on a.risk_library_id = n.risk_id
				left join t_risk_add_user on a.risk_id = t_risk_add_user.risk_id
				where a.risk_id = '".$risk_id."' and a.switch_flag = 'P' ";
//ubah
		$query = $this->db->query($sql);
		$row = $query->row_array();

		if ($row) {
			$row['impact_list'] = $this->getRiskImpactChange2($risk_id,$risk_input_by);
			$row['action_plan_list'] = $this->getActionPlanChange2($risk_id,$risk_input_by);
			$row['control_list'] = $this->getControlListChange2($risk_id,$risk_input_by);
		}
		
		return $row;
	}

	public function getRiskImpactChange2($risk_id,$risk_input_by) 
	{
		$sql = "select * from t_risk_impact_change
				where risk_id = ? and switch_flag = 'P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function getActionPlanChange2($risk_id,$risk_input_by) 
	{
		$sql = "select a.*,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v
				from t_risk_action_plan_change a
				left join m_division b on a.division = b.division_id 
				where a.risk_id = ? and switch_flag = 'P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getControlListChange2($risk_id,$risk_input_by) 
	{
		$sql = "select a.*
				from t_risk_control_change a
				where a.risk_id = ? and switch_flag = 'P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	

	//get all risk rac tab 1 hilangkan yang draft nya
	public function getAllRisk($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
	{
		$ex_or = $ex_filter = '';
		$par = false;
		
		if ($order_by != null) {
			$order_by = $order_by;
			$ex_or = ' order by '.$order_by.' '.$order;
		}
		
		if ($filter_by != null && $filter_value != null) {
			//tadinya WHERE cuman bentrok
			$ex_filter = ' and '.$filter_by.' like ? ';
			$par['p1'] = '%'.$filter_value.'%';
		}
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
				left join m_periode on m_periode.periode_id = a.periode_id
				where a.risk_status != 0 and a.risk_status != 1 
				"
				
				.$ex_filter
				
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'risk_id', true);
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
		
		if ($mode == 'allRiskLibrary') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' and (UPPER(a.risk_code) like ? or UPPER(a.risk_event) like ? or UPPER(a.risk_description) like ?) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x2' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x3' => '%'.strtoupper($defFilter['filter_library']).'%'
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select 
					a.risk_id,
					a.risk_code,
					a.risk_event,
					a.risk_description
					from t_risk a
					where a.risk_status > 2 
					".$ext;
		}
		
		if ($mode == 'allActionLibrary') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' where (UPPER(a.action_plan) like ? or UPPER(a.id) like ? or UPPER(a.risk_id) like ?) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x2' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x3' => '%'.strtoupper($defFilter['filter_library']).'%'
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select 
					a.id,
					a.action_plan,
					a.risk_id
					from t_risk_action_plan a
					
					".$ext."GROUP BY action_plan";
		}
		
		if ($mode == 'allControlLibrary') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' where (UPPER(a.risk_existing_control) like ? or UPPER(a.risk_evaluation_control) like ? or UPPER(a.risk_control_owner) like ?) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x2' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x3' => '%'.strtoupper($defFilter['filter_library']).'%'
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select a.* from t_risk_control a
					join t_risk b on a.risk_id = b.risk_id and b.risk_status >= 0  
					".$ext." GROUP BY a.risk_existing_control";
		}

		if ($mode == 'allControlLibraryobjective') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' where (UPPER(a.objective) like ? ) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%'
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select a.* from t_risk_objective a  
					".$ext." GROUP BY a.objective";
		}

		if ($mode == 'allControlLibraryExisting') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' where (UPPER(a.existing_control) like ? or UPPER(a.description) like ? ) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x2' => '%'.strtoupper($defFilter['filter_library']).'%',
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select a.* from m_risk_existing_control a
					".$ext." ";
		}

		
		if ($mode == 'allRiskByOwner') {
			
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
					
					where 	
					a.risk_input_by = ?
					
					";
			$rpar = array('user_id' => $defFilter['userid']);
			if (isset($defFilter['risk_cat'])) {
				$sql .= " and a.risk_2nd_sub_category = ?";
				$rpar['cat'] = $defFilter['risk_cat'];
			}

			if ($par)	{ 
				$rpar['p1'] = $par['p1'];
			}
			$par = $rpar;
		}
		
		if ($mode == 'racPeriode') {
			$sql = "select 
					a.*,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					f.division_name as risk_owner_v
					from t_risk_change a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					where 
					a.periode_id = '".$defFilter['periodid']."'
					and a.risk_input_by = '".$defFilter['userid']."'
					and a.risk_id NOT IN (select r.risk_id from t_risk r where a.risk_id = r.risk_id and r.periode_id = '".$defFilter['periodid']."' and r.risk_input_by = '".$defFilter['userid']."' and r.risk_status > 1)
					";
		}
		
		if ($mode == 'racRollover') {
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
					and a.risk_status >= 0
					and a.risk_input_by = '".$defFilter['userid']."'
					and a.existing_control_id is null
					and a.periode_id = (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end)
					";
		}
		
		if ($mode == 'racTreatmentList') {
			
			$date = date("Y-m-d");
			
			$sql = "select 
					a.*,
					b.division_name as risk_owner_v,
					c.ref_value as suggested_risk_treatment_v
					from t_risk a
					left join m_division b on a.risk_owner = b.division_id
					left join m_reference c on a.suggested_risk_treatment = c.ref_key and c.ref_context = 'treatment.status'
					join m_periode on m_periode.periode_id = a.periode_id
					where 
					a.periode_id is not null
					and a.risk_status > 2
					
					";
		}
		
		if ($mode == 'ownedRisk') {
			if (isset($defFilter['role_id']) && ($defFilter['role_id'] == '4' || $defFilter['role_id'] == '5')) {
				$ext = '';
				$rpar = array('division_id' => $defFilter['division_id']);
				
				if ($defFilter['role_id'] == '4') { // division_head
				} else {  // pic
					$ext = ' and a.risk_treatment_owner = ? ';
					$rpar['uid'] = $defFilter['userid'];
				}
				
				$date = date("Y-m-d");
				
				$sql = "select 
						a.*,
						b.ref_value as risk_status_v,
						c.ref_value as risk_level_v,
						d.ref_value as impact_level_v,
						e.l_title as likelihood_v,
						f.division_name as risk_owner_v,
						g.display_name as risk_treatment_owner_v,
						h.ref_value as suggested_risk_treatment_v
						from t_risk a
						left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
						left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
						left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
						left join m_likelihood e on a.risk_likelihood_key = e.l_key
						left join m_division f on a.risk_owner = f.division_id
						left join m_user g on a.risk_treatment_owner = g.username
						left join m_reference h on a.suggested_risk_treatment = h.ref_key and h.ref_context = 'treatment.status'
						join m_periode on m_periode.periode_id = a.periode_id
						where 
						a.periode_id is not null
						and a.risk_status > 2
						and a.risk_division = ?
						
						".$ext;
				if ($par) {
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			} else {
				return false;
			}
		}
		
		if ($mode == 'ownedActionPlan') {
			if (isset($defFilter['role_id']) && ($defFilter['role_id'] == '4' || $defFilter['role_id'] == '5')) {
				$ext = '';
				$rpar = array('division_id' => $defFilter['division_id']);
				
				if ($defFilter['role_id'] == '4') { // division_head
				} else {  // pic
					$ext = ' and a.assigned_to = ? ';
					$rpar['uid'] = $defFilter['userid'];
				}
				$date = date("Y-m-d");
				
				$sql = "select 
						a.*,
						concat('AP.', LPAD(a.id, 6, '0')) as act_code,
						b.risk_code,
						c.display_name as assigned_to_v,
						d.division_name as division_name,
						date_format(a.due_date, '%d-%m-%Y') as due_date_v
						from 
						t_risk_action_plan a
						left join t_risk b on a.risk_id = b.risk_id
						left join m_user c on a.assigned_to = c.username
						left join m_division d on a.division = d.division_id
						join m_periode on m_periode.periode_id = b.periode_id
						where 
						a.action_plan_status > 0
						and a.division = ?
						
						".$ext;
				if ($par) {
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
				
				$sql = $sql.$ex_filter.$ex_or;
				$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
				return $res;
			} else {
				return false;
			}
		}
		
		if ($mode == 'ownedActionPlanExec') {
			if (isset($defFilter['role_id']) && ($defFilter['role_id'] == '4' || $defFilter['role_id'] == '5')) {
				$ext = '';
				$rpar = array('division_id' => $defFilter['division_id']);
				
				if ($defFilter['role_id'] == '4') { // division_head
				} else {  // pic
					$ext = ' and a.assigned_to = ? ';
					$rpar['uid'] = $defFilter['userid'];
				}
				
				$date = date("Y-m-d");
				
				$sql = "select
						a.*,
						concat('AP.', LPAD(a.id, 6, '0')) as act_code,
						b.risk_code,
						c.display_name as assigned_to_v,
						d.division_name as division_name,
						date_format(a.due_date, '%d-%m-%Y') as due_date_v,
						case 
							when a.assigned_to = '".$defFilter['userid']."' then 1
							else 0
						end as is_owner,
						case 
							when '4' = '".$defFilter['role_id']."' then 1
							else 0
						end as is_head,
						date_format(a.revised_date, '%d-%m-%Y') as revised_date_v
						from 
						t_risk_action_plan a
						left join t_risk b on a.risk_id = b.risk_id
						left join m_user c on a.assigned_to = c.username
						left join m_division d on a.division = d.division_id						 
						where 
						a.action_plan_status > 3
						and a.division = ?
						AND b.periode_id is null
						  
						".$ext;
				if ($par) {
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
				
				$sql = $sql.$ex_filter.$ex_or;
				$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
				return $res;
			} else {
				return false;
			}
		}
		
		if ($mode == 'ownedActionPlanExec_adt') {
			if (isset($defFilter['role_id']) && ($defFilter['role_id'] == '4' || $defFilter['role_id'] == '5')) {
				$ext = '';
				$rpar = array('division_id' => $defFilter['division_id']);
				
				if ($defFilter['role_id'] == '4') { // division_head
				} else {  // pic
					$ext = ' and a.assigned_to = ? ';
					$rpar['uid'] = $defFilter['userid'];
				}
				
				$date = date("Y-m-d");
				
				$sql = "select 
						a.*,
						concat('AP.', LPAD(a.id, 6, '0')) as act_code,
						b.risk_code,
						c.display_name as assigned_to_v,
						d.division_name as division_name,
						date_format(a.due_date, '%d-%m-%Y') as due_date_v,
						case 
							when a.assigned_to = '".$defFilter['userid']."' then 1
							else 0
						end as is_owner,
						case 
							when '4' = '".$defFilter['role_id']."' then 1
							else 0
						end as is_head,
						date_format(a.revised_date, '%d-%m-%Y') as revised_date_v
						from 
						t_risk_action_plan a
						left join t_risk b on a.risk_id = b.risk_id
						left join m_user c on a.assigned_to = c.username
						left join m_division d on a.division = d.division_id
						 
						where 
						a.action_plan_status > 3
						and a.division = ?
						AND b.periode_id is not null
					  
						".$ext;
				if ($par) {
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
				
				$sql = $sql.$ex_filter.$ex_or;
				$res = $this->getPagingData($sql, $par, $page, $row, 'id', true);
				return $res;
			} else {
				return false;
			}
		}
		
		if ($mode == 'racActionPlan') {
			
			$date = date("Y-m-d");
			
			$sql = "select 
					a.*,
					concat('AP.', LPAD(a.id, 6, '0')) as act_code,
					b.risk_code,
					c.display_name as assigned_to_v,
					d.division_name as division_name,
					date_format(a.due_date, '%d-%m-%Y') as due_date_v
					from 
					t_risk_action_plan a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.assigned_to = c.username
					left join m_division d on a.division = d.division_id
					join m_periode on m_periode.periode_id = b.periode_id
					where 
					a.action_plan_status > 0 
					
					";
		}
		
		if ($mode == 'racActionPlanExec') {
			
			$date = date("Y-m-d");
			$sql = "select
					a.*,
					concat('AP.', LPAD(a.id, 6, '0')) as act_code,
					b.risk_code,
					c.display_name as assigned_to_v,
					d.division_name as division_name,
					date_format(a.due_date, '%d-%m-%Y') as due_date_v
					from 
					t_risk_action_plan a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.assigned_to = c.username
					left join m_division d on a.division = d.division_id					
					where 
					a.action_plan_status > 3
						AND b.periode_id is null
					";
		}
		
			if ($mode == 'racActionPlanExec_adt') {
			
			$date = date("Y-m-d");
			$sql = "select 
					a.*,
					concat('AP.', LPAD(a.id, 6, '0')) as act_code,
					b.risk_code,
					c.display_name as assigned_to_v,
					d.division_name as division_name,
					date_format(a.due_date, '%d-%m-%Y') as due_date_v
					from 
					t_risk_action_plan a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.assigned_to = c.username
					left join m_division d on a.division = d.division_id
				 
					where 
					a.action_plan_status > 3
					 AND b.periode_id is not null
						 
					";
		}
		
		if ($mode == 'ownedKri') {
			if (isset($defFilter['role_id']) && ($defFilter['role_id'] == '4' || $defFilter['role_id'] == '5')) {
				$ext = '';
				$rpar = array('division_id' => $defFilter['division_id']);
				
				if ($defFilter['role_id'] == '4') { // division_head
				} else {  // pic
					$ext = ' and a.kri_pic = ? ';
					$rpar['uid'] = $defFilter['userid'];
				}
				
				$date = date("Y-m-d");
				
				$sql = "select 
						a.*,
						date_format(a.timing_pelaporan, '%d-%m-%Y') as timing_pelaporan_v,
						b.risk_code,
						c.division_name as kri_owner_v,
						d.display_name as kri_pic_v
						from t_kri a
						left join t_risk b on a.risk_id = b.risk_id
						left join m_division c on a.kri_owner = c.division_id
						left join m_user d on a.kri_pic = d.username
						join m_periode on m_periode.periode_id = b.periode_id
						where 
						a.kri_owner = ?
						
						".$ext;
				if ($par) {
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			} else {
				return false;
			}
		}
		
		if ($mode == 'racKri') {
			
			$date = date("Y-m-d");
			
			$sql = "select 
					a.*,
					date_format(a.timing_pelaporan, '%d-%m-%Y') as timing_pelaporan_v,
					b.risk_code,
					c.division_name as kri_owner_v,
					d.display_name as kri_pic_v
					from t_kri a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_division c on a.kri_owner = c.division_id
					left join m_user d on a.kri_pic = d.username
					join m_periode on m_periode.periode_id = b.periode_id
					where 
					a.kri_status >= 0
					
					";
					
		}
		
		if ($mode == 'kriRisk') {
			$sql = "select 
					a.*,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					f.division_name as risk_owner_v,
					g.display_name as risk_treatment_owner_v,
					h.ref_value as suggested_risk_treatment_v
					from t_risk a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					left join m_user g on a.risk_treatment_owner = g.username
					left join m_reference h on a.suggested_risk_treatment = h.ref_key and h.ref_context = 'treatment.status'
					where 
					risk_id in (
						select risk_id from t_kri_risk
					)";
		}
		
		if ($mode == 'kriNotRisk') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' and a.risk_level = ? ';
				$rpar = array(
					'x1' => $defFilter['filter_library']
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select 
					a.*,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					f.division_name as risk_owner_v,
					g.display_name as risk_treatment_owner_v,
					h.ref_value as suggested_risk_treatment_v
					from t_risk a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					left join m_user g on a.risk_treatment_owner = g.username
					left join m_reference h on a.suggested_risk_treatment = h.ref_key and h.ref_context = 'treatment.status'
					where 
					a.risk_status > 2
					and a.risk_id not in (
						select risk_id from t_kri_risk
					) ".$ext;
					
		}
		
		if ($mode == 'kriLibrary') {
			$ext = '';
			if (isset($defFilter['filter_library'])) {
				$ext = ' and (UPPER(a.kri_code) like ? or UPPER(a.key_risk_indicator) like ? or UPPER(a.treshold) like ?) ';
				$rpar = array(
					'x1' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x2' => '%'.strtoupper($defFilter['filter_library']).'%',
					'x3' => '%'.strtoupper($defFilter['filter_library']).'%'
				);
		
				if ($par)	{ 
					$rpar['p1'] = $par['p1'];
				}
				$par = $rpar;
			}
			
			$sql = "select 
					a.*,
					date_format(a.timing_pelaporan, '%d-%m-%Y') as timing_pelaporan_v,
					b.risk_code,
					c.division_name as kri_owner_v,
					d.display_name as kri_pic_v
					from t_kri a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_division c on a.kri_owner = c.division_id
					left join m_user d on a.kri_pic = d.username where kri_library_id is null
					".$ext;
		}
		
		if ($mode == 'allChangeByOwner') {
			$date = date("Y-m-d");
			$sql = "select a.*,
				b.risk_code
				from 
				t_cr_risk a LEFT OUTER JOIN t_risk b on a.risk_id = b.risk_id
				LEFT OUTER JOIN m_periode on m_periode.periode_id = b.periode_id
				where 
				a.created_by = ? ";
			/*$sql = "select 
					a.*,
					b.risk_code,
					b.risk_event
					from 
					t_cr_risk a join t_risk b on a.risk_id = b.risk_id
					join m_periode on m_periode.periode_id = b.periode_id
					where 
					a.created_by = ?
					
					";
			*/
			$rpar = array('user_id' => $defFilter['userid']);

			if ($par)	{ 
				$rpar['p1'] = $par['p1'];
			}
			$par = $rpar;
		}
		
		if ($mode == 'changesRac') {
			
			$date = date("Y-m-d");
			$sql = "select 
					a.*,
					b.risk_code,
					c.display_name as created_by_v
					from 
					t_cr_risk a LEFT OUTER JOIN t_risk b on a.risk_id = b.risk_id
					LEFT OUTER JOIN m_user c on a.created_by = c.username
					LEFT OUTER JOIN m_periode on m_periode.periode_id = b.periode_id
					
					
					";
		}
		
		$sql = $sql.$ex_filter.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'risk_id', true);
		return $res;
	}
	
	public function getRiskUsername($periode, $page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		
		$sql = "
				select 
				b.risk_status,
				a.username,
				a.display_name,
				a.division_id, 
				b.division_name 
				from m_user a 
				join m_division b on a.division_id = b.division_id
				join (
					select min(risk_status) as risk_status, risk_input_by from t_risk_change
					where
					risk_status > 1
					group by risk_input_by
				) b on a.username = b.risk_input_by
				WHERE a.username NOT IN (select username from m_user join t_risk on m_user.username = t_risk.risk_input_by)
				UNION
				select 
				b.risk_status,
				a.username,
				a.display_name,
				a.division_id, 
				b.division_name 
				from m_user a 
				join m_division b on a.division_id = b.division_id
				join (
					select min(risk_status) as risk_status, risk_input_by from t_risk
					where
					risk_status > 1
					group by risk_input_by
				) b on a.username = b.risk_input_by where a.username is not null"
				.$ex_filter
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'username', true);
		return $res;
	}
	
	public function getSummaryCount($mode, $defFilter) 
	{
		// MODE : risk riskregister treatment actionplan kri change
		if ($mode == 'riskLevel') {
			$sql = "select count(1) as numcount, risk_level 
					from t_risk
					where risk_input_by = ?
					group by risk_level";
			$par = array('uid' => $defFilter['userid']);
		}
		
		if ($mode == 'risk') {
			$sql = "select count(1) as numcount, risk_level 
					from t_risk
					where risk_status in (2, 5)
					group by risk_level";
			$par = array();
		}
		
		if ($mode == 'riskregister') {
			$sql = "select count(1) as numcount
				from m_user a 
				join m_division b on a.division_id = b.division_id
				join (
					select min(risk_status) as risk_status, risk_input_by from t_risk
					where
					risk_status = 2
					group by risk_input_by
				) b on a.username = b.risk_input_by
					";
			$par = array();
		}
		
		if ($mode == 'treatment') {
			$sql = "select count(1) as numcount, risk_level 
					from t_risk
					where risk_status = 5
					group by risk_level";
			$par = array();
		}
		
		if ($mode == 'actionplan') {
			$sql = "select count(1) as numcount, b.risk_level 
					from 
					t_risk_action_plan a join t_risk b on a.risk_id = b.risk_id
					where a.action_plan_status = 3
					group by b.risk_level";
			$par = array();
		}
		
		if ($mode == 'kri') {
			$sql = "select count(1) as numcount, b.risk_level 
					from 
					t_kri a join t_risk b on a.risk_id = b.risk_id
					where 
					a.kri_status = 2
					group by b.risk_level";
			$par = array();
		}
		
		if ($mode == 'change') {
			$sql = "select count(1) as numcount, b.risk_level 
					from 
					t_cr_risk a join t_risk b on a.risk_id = b.risk_id
					where 
					a.cr_status = 0
					group by b.risk_level";
			$par = array();
		}
		
		if ($mode == 'myriskowned') {
			$sql = "select count(1) as numcount, risk_level 
					from t_risk
					where risk_status > 2
					and risk_division = ?
					group by risk_level";
			$par = array('uid' => $defFilter['division_id']);
		}
		
		if ($mode == 'myactionplan') {
			$sql = "select count(1) as numcount, b.risk_level 
					from 
					t_risk_action_plan a join t_risk b on a.risk_id = b.risk_id
					where 
					a.action_plan_status > 0
					and b.risk_division = ?
					group by b.risk_level";
			$par = array('uid' => $defFilter['division_id']);
		}
		
		if ($mode == 'mykri') {
			$sql = "select count(1) as numcount, b.risk_level 
					from 
					t_kri a join t_risk b on a.risk_id = b.risk_id
					where 
					a.kri_owner = ?
					group by b.risk_level";
			$par = array('uid' => $defFilter['division_id']);
		}
		
		
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	/* RISK QUERIES FUNCTION */
		
	/* RISK ACTION FUNCTION */
	public function riskSetConfirm($risk_id, $data, $uid, $update_point = 'U') {
		//$this->_logHistory($risk_id, $uid, $update_point);
		
		
		
		$periode = $data['periode_id'];
		$sql = "insert into t_risk(risk_code,risk_date,risk_status,periode_id,risk_input_by,risk_input_division,risk_owner,risk_division,risk_library_id,risk_event,risk_description,risk_category,risk_sub_category,risk_2nd_sub_category,risk_cause,risk_impact,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,risk_level,risk_impact_level,risk_likelihood_key,suggested_risk_treatment,risk_treatment_owner,created_by,created_date,switch_flag)
				select risk_code,NOW(),1,'$periode',risk_input_by,risk_input_division,risk_owner,risk_division,risk_id,risk_event,risk_description,risk_category,risk_sub_category,risk_2nd_sub_category,risk_cause,risk_impact,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,risk_level,risk_impact_level,risk_likelihood_key,suggested_risk_treatment,risk_treatment_owner,created_by,created_date,'$uid' from t_risk where risk_id='$risk_id'";
		$res = $this->db->query($sql);
		
		$sql = "insert into t_risk_control(risk_id,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,switch_flag)
				select a.risk_id,b.existing_control_id,b.risk_existing_control,b.risk_evaluation_control,b.risk_control_owner,'$uid' from t_risk a,t_risk_control b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);
		

		$sql = "insert into t_risk_action_plan(risk_id,action_plan_status,action_plan,due_date,division,switch_flag)
				select a.risk_id,b.action_plan_status,b.action_plan,b.due_date,b.division,'$uid' from t_risk a,t_risk_action_plan b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);

		$sql = "insert into t_risk_impact(risk_id,impact_id,impact_level,switch_flag)
				select a.risk_id,b.impact_id,b.impact_level,b.switch_flag from t_risk a,t_risk_impact b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);

		$sql = "insert into t_risk_objective(risk_id,objective,switch_flag)
				select a.risk_id,b.objective,b.switch_flag from t_risk a,t_risk_objective b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);
		

		//ngambil risk id terakhir
		$sql_id = "select risk_id from t_risk where risk_input_by='$uid' and periode_id='$periode' order by risk_id desc LIMIT 1 ";
		$res_id = $this->db->query($sql_id);
		$row = $res_id->row();
		$hasil = $row->risk_id;

		//insert T_RISK CHANGE NYA JUGA!
		$sql = "insert into t_risk_change(risk_id,risk_code,risk_date,risk_status,periode_id,risk_input_by,risk_input_division,risk_owner,risk_division,risk_library_id,risk_event,risk_description,risk_category,risk_sub_category,risk_2nd_sub_category,risk_cause,risk_impact,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,risk_level,risk_impact_level,risk_likelihood_key,suggested_risk_treatment,risk_treatment_owner,created_by,created_date,switch_flag)
				select risk_id,risk_code,NOW(),1,'$periode',risk_input_by,risk_input_division,risk_owner,risk_division,risk_id,risk_event,risk_description,risk_category,risk_sub_category,risk_2nd_sub_category,risk_cause,risk_impact,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,risk_level,risk_impact_level,risk_likelihood_key,suggested_risk_treatment,risk_treatment_owner,created_by,created_date,switch_flag from t_risk where risk_id='$hasil' and risk_input_by='$uid' and periode_id='$periode' ";
		$res = $this->db->query($sql);
		

		$sql = "insert into t_risk_control_change(risk_id,existing_control_id,risk_existing_control,risk_evaluation_control,risk_control_owner,switch_flag)
				select a.risk_id,b.existing_control_id,b.risk_existing_control,b.risk_evaluation_control,b.risk_control_owner,'$uid' from t_risk a,t_risk_control b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);
		

		$sql = "insert into t_risk_action_plan_change(id,risk_id,action_plan_status,action_plan,due_date,division,switch_flag)
				select b.id,a.risk_id,b.action_plan_status,b.action_plan,b.due_date,b.division,'$uid' from t_risk a,t_risk_action_plan b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);
		
		$sql = "insert into t_risk_impact_change(risk_id,impact_id,impact_level,switch_flag)
				select a.risk_id,b.impact_id,b.impact_level,'$uid' from t_risk a,t_risk_impact b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);

		$sql = "insert into t_risk_objective_change(risk_id,objective,switch_flag)
				select a.risk_id,b.objective,'$uid' from t_risk a,t_risk_objective b where a.risk_input_by='$uid' and a.periode_id='$periode' and a.risk_library_id='$risk_id' and b.risk_id='$risk_id' ";
		$res = $this->db->query($sql);


		return $res;
		// LOG HISTORY
		//$sql = "insert into t_risk (risk_status, periode_id, created_by, created_date) values(1, ?, ?, NOW() )";

		//$sql = "update t_risk set 
		//		risk_status = 1,
		//		periode_id = ?,
		//		created_by = ?, 
		//		created_date = NOW()
		//		where risk_id = ?";
		//$par = array(
		//	'pid' => $data['periode_id'],
		//	'uid' => $uid,
			//'rid' => $risk_id
		//);
		//$res = $this->db->query($sql, $par);

		
		
		
		
		
		
		
		
		

		
		// LOG HISTORY
		//$sql = "insert into t_risk (risk_status, periode_id, created_by, created_date) values(1, ?, ?, NOW() )";

		//$sql = "update t_risk set 
		//		risk_status = 1,
		//		periode_id = ?,
		//		created_by = ?, 
		//		created_date = NOW()
		//		where risk_id = ?";
		//$par = array(
		//	'pid' => $data['periode_id'],
		//	'uid' => $uid,
			//'rid' => $risk_id
		//);
		//$res = $this->db->query($sql, $par);
	}

	public function riskSetConfirm_recover($risk_id, $data, $uid, $update_point = 'U') {
		//$this->_logHistory($risk_id, $uid, $update_point);
		
		$periode = $data['periode_id'];
		$sql = "update t_risk set existing_control_id = null where risk_id='$risk_id'";
		$res = $this->db->query($sql);
		
		return $res;
	}

//ubah maintenance
	public function riskSetConfirm_under($risk_id, $data, $uid, $update_point = 'U') {
		//$this->_logHistory($risk_id, $uid, $update_point);
		
		//$periode = $data['periode_id'];
		$sql = "update t_risk set risk_existing_control = 'under' where risk_id='$risk_id'";
		$res = $this->db->query($sql);
		
		return $res;
	}
	
	public function riskSetDraft($risk_id, $data, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		
		$sql = "update t_risk set 
				risk_status = 0,
				created_by = ?, 
				created_date = NOW()
				where risk_id = ?";
		$par = array(
			'uid' => $uid,
			'rid' => $risk_id
		);
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function riskSetDraftByPeriode($periode_id, $uid) {
		// LOG HISTORY
		$sql = "insert into t_risk_hist
				select a.*, 
					'RISK_REGISTER-SETDRAFT_PERIODE' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk a
				where 
				a.periode_id is not null
				and a.periode_id = ?
				and a.risk_status = '1'
				and a.risk_input_by = ?
				";
		$par = array(
			'pid'=>$periode_id,
			'uid'=>$uid
		);
		$this->db->query($sql, $par);	
		
		$sql = "update t_risk set 
				risk_status = 1,
				created_by = ?, 
				created_date = NOW()
				where
				periode_id is not null
				and periode_id = ?
				and risk_status = '1'
				and risk_input_by = ?
				";
		$par = array(
			'uid' => $uid,
			'pid' =>$periode_id,
			'uid2' =>$uid
		);
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	
	
	public function riskSetSubmitByPeriode($periode_id, $uid) {
		// LOG HISTORY
		$sql = "insert into t_risk_hist
				select a.*, 
					'RISK_REGISTER-SUBMIT_PERIODE' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk a
				where 
				a.periode_id is not null
				and a.periode_id = ?
				and a.risk_status in ('0', '1')
				and a.risk_input_by = ?
				";
		$par = array(
			'pid'=>$periode_id,
			'uid'=>$uid
		);
		$this->db->query($sql, $par);	
		
		$sql = "update t_risk set 
				risk_status = 2,
				created_by = ?, 
				created_date = NOW()
				where
				periode_id is not null
				and periode_id = ?
				and risk_status in ('0', '1')
				and risk_input_by = ?
				";
		$par = array(
			'uid' => $uid,
			'pid' =>$periode_id,
			'uid2' =>$uid
		);
		$res = $this->db->query($sql, $par);

		$sql = "update t_risk_change set 
				risk_status = 2,
				created_by = ?, 
				created_date = NOW()
				where
				periode_id is not null
				and periode_id = ?
				and risk_status in ('0', '1')
				and risk_input_by = ?
				";
		$par = array(
			'uid' => $uid,
			'pid' =>$periode_id,
			'uid2' =>$uid
		);
		$res = $this->db->query($sql, $par);

		return $res;
	}
	
	public function riskSetSubmitByPeriode2($periode_id, $uid) {
		// LOG HISTORY
		$sql2 = "select cr_code from t_cr_risk ORDER BY id DESC LIMIT 1  ";
		$query = $this->db->query($sql2);
		if ($query->num_rows() > 0){	
		$row = $query->row();	
		$hasil1 = $row->cr_code;
		}else{
		$hasil1 = 'CH.000001';
		} 
		$hasil2 = substr($hasil1, 4);
		$hasil3 = $hasil2 + 1 ;
		$hasil4 = strlen($hasil3);
		$hasil5 = 9 - $hasil4;
		$hasil6 = substr($hasil1,0,$hasil5);
		$hasil = $hasil6.$hasil3;
		$cr_type = "Risk Register";

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$sql = "insert into t_cr_risk (cr_code,cr_type,cr_status,created_by) values ('$hasil','$cr_type',0,'$uid')";
		
		$res = $this->db->query($sql);
		return $res;
	}

	public function riskSetSubmitByPeriode2_change($periode_id, $uid) {
		
		$sql = "update t_cr_risk set cr_status = 1 where created_by = '$uid' and cr_type= 'Risk Register' " ;
		
		$sql2 = "update t_risk set risk_status = 0 where periode_id='$periode_id' and risk_input_by='$uid' ";

		$sql3 = "update t_risk_change set risk_status = 0 where periode_id='$periode_id' and risk_input_by='$uid' ";
		
		$res = $this->db->query($sql);
		$res2 = $this->db->query($sql2);
		$res3 = $this->db->query($sql3);
		
		//return $res3;
		return $res2;
		return $res;
	}
	public function riskSetSubmitByPeriode2_ignore($periode_id, $uid) {
		
		$sql = "update t_cr_risk set cr_status = 1 where created_by = '$uid' and cr_type= 'Risk Register' " ;
		$res = $this->db->query($sql);
		return $res;
	}

	public function deleteRisk($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		// t_risk t_risk_change t_risk_action_plan t_risk_action_plan_change 
		// t_risk_control t_risk_control_change t_risk_impact t_risk_impact_change
		
		$par['risk_id'] = $risk_id;
		
		$sql = "update t_risk set existing_control_id = 1 where risk_id = ?";
		$res = $this->db->query($sql, $par);

		return $res;
	}

	public function deleteRiskrac($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		// t_risk t_risk_change t_risk_action_plan t_risk_action_plan_change 
		// t_risk_control t_risk_control_change t_risk_impact t_risk_impact_change
		
		$par['risk_id'] = $risk_id;
		
		$sql = "update t_risk set existing_control_id = 1 where risk_id = ?";
		$res = $this->db->query($sql, $par);

		return $res;
	}
//ubah under
	public function deleteRisk_under($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		// t_risk t_risk_change t_risk_action_plan t_risk_action_plan_change 
		// t_risk_control t_risk_control_change t_risk_impact t_risk_impact_change
		
		$par['risk_id'] = $risk_id;
		
		$sql = "update t_risk set risk_existing_control = null where risk_id = ?";
		$res = $this->db->query($sql, $par);

		return $res;
	}
	/*
	public function deleteRisk($risk_id, $uid, $update_point = 'D') {
		// delete risk in child
		// t_risk t_risk_change t_risk_action_plan t_risk_action_plan_change 
		// t_risk_control t_risk_control_change t_risk_impact t_risk_impact_change
		
		$par['risk_id'] = $risk_id;
		
		$sql = "delete from t_risk_action_plan where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_action_plan_change where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_control where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_control_change where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_impact where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_impact_change where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_change where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		$this->_logHistory($risk_id, $uid, $update_point);
		
		$sql = "delete from t_risk where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		return $res;
	}
	*/

	

	public function updateRisk($risk_id, $code, $risk, $impact, $actplan, $control, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ?  and risk_input_by = '$uid'";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ? and switch_flag = '$uid'";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?, '$uid')";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ? and switch_flag = '$uid'";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division, switch_flag) 
						values(?, ?, ?, ?, '$uid')";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ? and switch_flag = '$uid'";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner, switch_flag) 
						values(?, ?, ?, ?, ?, '$uid')";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		
	}

//ini untuk verify risk owner
	public function updateRiskverify($risk_id, $code, $risk, $impact, $actplan, $control, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set risk_status = 6 
			  	where risk_id = '".$risk_id."' ";
		$res = $this->db->query($sql, $par);

		//update assgin to action plan nih
		
		// insert action plan
				
				$sql = "update t_risk_action_plan set assigned_to = (select username from m_user where division_id = ? and role_id = 4)
			  	where risk_id = ? and division = ? ";
				foreach ($actplan as $key => $value) {
					$par = array(
						'div' => $value['division'],
						'rid' => $risk_id,
						'div2' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
		

		//$sql = "update t_risk_action_plan set assigned_to = (select username from m_user where division_id = '".$risk['risk_owner']."' and role_id = 4)
		//	  	where risk_id = '".$risk_id."' ";
		//$res = $this->db->query($sql, $par);


		//$sql = "update t_risk 
		//		set risk_treatment_owner = (select username from m_user where division_id = '".$risk['risk_division']."'  and role_id = 4) 
		//	  	where risk_id = '".$risk_id."' ";
		//$res = $this->db->query($sql);



		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_action_plan set action_plan_status = 1 where risk_id = '".$risk_id."' ";
		$res = $this->db->query($sql, $par);
		
			$par['risk_id'] = $risk_id;
			$sql="delete from t_risk_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_impact_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_action_plan_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_control_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_change 
				  select * from t_risk where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_impact_change (risk_id, impact_id, impact_level, switch_flag) 
				  select risk_id, impact_id, impact_level, switch_flag from t_risk_impact where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_action_plan_change ( )
				  select * from t_risk_action_plan where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_control_change (risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag) 
				  select risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag from t_risk_control where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

			return true;
		
			
		
		
	}

// save verify RAC pada bagian changes
	public function updateRisksave($risk_id, $code, $risk, $impact, $actplan, $control, $objective, $uid, $userasli, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_change set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ?  and risk_input_by = '".$userasli."'";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact_change where risk_id = ? and switch_flag = '".$userasli."' ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact_change(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?, '".$userasli."' )";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan_change where risk_id = ? and switch_flag = '".$userasli."' ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan_change(risk_id, action_plan, due_date, division, switch_flag) 
						values(?, ?, ?, ?, '".$userasli."')";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control_change where risk_id = ? and switch_flag = '".$userasli."' ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control_change(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner, switch_flag) 
						values(?, ?, ?, ?, ?, '".$userasli."' )";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_risk_objective_change where risk_id = ? and switch_flag = '".$userasli."' ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_objective_change(
							risk_id, objective, switch_flag) 
						values(?, ?, '".$userasli."' )";
				foreach ($objective as $key => $value) {
					$value['objective_id'] = $value['objective_id'] == '' || $value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'div' => $value['objective']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		
	}

//verify rac to T-risk pertama kali
	public function updateRiskrac($risk_id, $code, $risk, $impact, $actplan, $control, $objective, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ? ";
		$res = $this->db->query($sql, $par);

		//update assign to suggested risk treatment
		$sql = "update t_risk 
				set risk_treatment_owner = (select username from m_user where division_id = '".$risk['risk_division']."'  and role_id = 4) 
			  	where risk_id = '".$risk_id."' ";
		$res = $this->db->query($sql);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_risk_objective where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_objective(
							risk_id,objective) 
						values(?, ?)";
				foreach ($objective as $key => $value) {
					$value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['objective']
					);
					$res6 = $this->db->query($sql, $par);
				}
			}

//update P pada T-risk nya walaupun bukan dari library
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_impact set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_action_plan set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);
		
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_control set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_objective set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

			
			$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_change 
				  select * from t_risk where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_impact_change (risk_id, impact_id, impact_level, switch_flag) 
				  select risk_id, impact_id, impact_level, switch_flag from t_risk_impact where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_action_plan_change ( )
				  select * from t_risk_action_plan where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_control_change (risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag) 
				  select risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag from t_risk_control where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_objective_change ( )
				  select * from t_risk_objective where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);
	 		
			
			return true;
		} else {
			return false;
		}
		
	}

	//verify rac to T-risk pertama kali (SAVE)
	public function updateRiskracsave($risk_id, $code, $risk, $impact, $actplan, $control, $objective, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ? ";
		$res = $this->db->query($sql, $par);

		//update assign to suggested risk treatment
		$sql = "update t_risk 
				set risk_treatment_owner = (select username from m_user where division_id = '".$risk['risk_division']."'  and role_id = 4) 
			  	where risk_id = '".$risk_id."' ";
		$res = $this->db->query($sql);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_risk_objective where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_objective(
							risk_id,objective) 
						values(?, ?)";
				foreach ($objective as $key => $value) {
					$value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['objective']
					);
					$res6 = $this->db->query($sql, $par);
				}
			}

//update P pada T-risk nya walaupun bukan dari library
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_impact set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_action_plan set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);
		
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_control set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_objective set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

			/* ini untuk sava kayak nya ga kepake
			$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_change 
				  select * from t_risk where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_impact_change (risk_id, impact_id, impact_level, switch_flag) 
				  select risk_id, impact_id, impact_level, switch_flag from t_risk_impact where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_action_plan_change ( )
				  select * from t_risk_action_plan where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_control_change (risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag) 
				  select risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag from t_risk_control where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_objective_change ( )
				  select * from t_risk_objective where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);
	 		*/
			
			return true;
		} else {
			return false;
		}
		
	}

//verify rac lanjutan to T-risk changes
	public function updateRiskracchanges($risk_id, $code, $risk, $impact, $actplan, $control, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		//$par = array();
		//$keyupdate = '';
		//foreach($risk as $k=>$v) {
		//	$keyupdate .= $k.' = ?, ';
		//	$par[$k] = $v;
		//}

		//insert baru dulu buat dapet ID
		$sql = "INSERT INTO t_risk_change SELECT * FROM t_risk where risk_id = '".$risk_id."' ";
		$res = $this->db->query($sql);

		//$par['risk_id'] = $risk_id;
		//$sql = "update t_risk_change set ".$keyupdate
		//	  ."created_date = now()
		//	  	where risk_id = ? ";
		//$res = $this->db->query($sql, $par);

		//update assign to suggested risk treatment
		//$sql = "update t_risk_change
		//		set risk_treatment_owner = (select username from m_user where division_id = '".$risk['risk_division']."'  and role_id = 4) 
		//	  	where risk_id = '".$risk_id."' ";
		//$res = $this->db->query($sql);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				//$sql = "delete from t_risk_impact_change where risk_id = ? ";
				//$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact_change(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				//$sql = "delete from t_risk_action_plan_change where risk_id = ?";
				//$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan_change(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				//$sql = "delete from t_risk_control_change where risk_id = ?";
				//$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control_change(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		
	}

	public function updateRisk1($risk_id, $code, $risk, $impact, $actplan, $control, $objective, $uid, $userasli, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now(),switch_flag = 'P'
			  	where risk_id = ?  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_impact set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_action_plan set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);
		
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_control set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);

		//update objective
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_objective set switch_flag = 'P'
			  	where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql, $par);


		//delete t_risk chang by username nya
		$par['risk_id'] = $risk_id;
		$sql="delete from t_risk_change where risk_id = '".$risk_id."' and risk_input_by = '".$userasli."' ";
	 	$res = $this->db->query($sql, $par);

	 	$sql = "delete from t_risk_impact_change where risk_id = '".$risk_id."' and switch_flag = '".$userasli."' ";
		$this->db->query($sql, $par);

		$sql = "delete from t_risk_action_plan_change where risk_id = '".$risk_id."' and switch_flag = '".$userasli."' ";
		$this->db->query($sql, $par);
		
		$sql = "delete from t_risk_control_change where risk_id = '".$risk_id."' and switch_flag = '".$userasli."' ";
		$this->db->query($sql, $par);

		$sql = "delete from t_risk_objective_change where risk_id = '".$risk_id."' and switch_flag = '".$userasli."' ";
		$this->db->query($sql, $par);

		$par['risk_id'] = $risk_id;
		$sql="select * from t_risk_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
		$res2 = $this->db->query($sql, $par);

		if ($res2->num_rows() > 0){
			$par['risk_id'] = $risk_id;
			$sql="delete from t_risk_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_impact_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_action_plan_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_control_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$sql="delete from t_risk_objective_change where risk_id = '".$risk_id."' and switch_flag = 'P' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_change 
				  select * from t_risk where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_impact_change (risk_id, impact_id, impact_level, switch_flag) 
				  select risk_id, impact_id, impact_level, switch_flag from t_risk_impact where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_action_plan_change ( )
				  select * from t_risk_action_plan where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_control_change (risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag) 
				  select risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag from t_risk_control where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_objective_change (risk_id, objective, switch_flag) 
				  select risk_id, objective, switch_flag from t_risk_objective where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

		}else{
			$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_change 
				  select * from t_risk where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_impact_change (risk_id, impact_id, impact_level, switch_flag) 
				  select risk_id, impact_id, impact_level, switch_flag from t_risk_impact where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_action_plan_change ( )
				  select * from t_risk_action_plan where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_control_change (risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag) 
				  select risk_id, existing_control_id, risk_existing_control, risk_evaluation_control, risk_control_owner, switch_flag from t_risk_control where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 		$par['risk_id'] = $risk_id;
			$sql="insert into t_risk_objective_change (risk_id, objective, switch_flag) 
				  select risk_id, objective, switch_flag from t_risk_objective where risk_id = '".$risk_id."' ";
	 		$res = $this->db->query($sql, $par);

	 	}

		
		/*
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		*/
		return true;
	}



	public function updateRisk2($risk_id, $code, $risk, $impact, $actplan, $control, $objective, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ?  ";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_risk_objective where risk_id = ? ";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_objective(
							risk_id, objective) 
						values(?, ?)";
				foreach ($objective as $key => $value) {
					$value['objective_id'] = $value['objective_id'] == '' || $value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['objective']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		
	}

	public function updateRisk_primary($risk_id, $code, $risk, $impact, $actplan, $control, $uid, $update_point = 'U') {
		$this->_logHistory($risk_id, $uid, $update_point);
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_risk_impact where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				$sql = "delete from t_risk_action_plan where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_action_plan(risk_id, action_plan, due_date, division) 
						values(?, ?, ?, ?)";
				foreach ($actplan as $key => $value) {
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division']
					);
					$res4 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_risk_control where risk_id = ?";
				$this->db->query($sql, array('rid' => $risk_id));
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			return true;
		} else {
			return false;
		}
		
	}
	
	public function getRiskValidate($mode, $risk_id, $credential) {
		$ret = false;
		if ($mode == 'viewMyRisk') {
			$res = $this->getRiskById($risk_id);
			if ($res) {
				// check if id is same
				if ($res['risk_input_by'] == $credential['username']) {
					$risk = $res;
					return $risk;
				} else {
					return $ret;
				}
			}
		}
		
		if ($mode == 'viewRiskByRac') {
			if ($credential['role_id'] == '2') {
				$res = $this->getRiskById($risk_id);
				if ($res) {
					$risk = $res;
					return $risk;
				}
			} 
		}
		
		if ($mode == 'viewRiskByDivision') {
			$res = $this->getRiskById($risk_id);

			if ($res) {
				// check if id is same
				if ($res['risk_division'] == $credential['division_id']) {
					$risk = $res;
					return $risk;
				} else {
					return $ret;
				}
			}
		}
		
		if ($mode == 'viewActionByRac') {
			$res = $this->getActionPlanById($risk_id);

			if ($res) {
				$resRisk = $this->getRiskById($res['risk_id']);
				$resActionChange = $this->getActionPlanForChange($risk_id);
				$res['risk_data'] = $resRisk;
				$res['change_data'] = $resActionChange;
				return $res;
			}
		}
		
		if ($mode == 'valEntryRiskChange') {
			$res_p = $this->getPendingChangeByRiskId($risk_id);
			
			if ($res_p) {
				return false;
			} else {
				return true;
			}
		}
		
		if ($mode == 'valEntryActionChange') {
			$res_p = $this->getPendingChangeByActionId($risk_id);
			
			if ($res_p) {
				return false;
			} else {
				return true;
			}
		}
		
		if ($mode == 'viewMyChange') {
			$res = $this->getChangeById($risk_id);
			
			if ($res['created_by'] == $credential['username'] ) {
				$risk = $res;
				return $risk;
			} else {
				return $ret;
			}
		}
		
		return $ret;
	}
	
	public function assignPic($risk_id, $pic) {
		$sql = "update t_risk set 
				risk_treatment_owner = ?
				where
				risk_id = ?
				";
		$par = array(
			'pic' => $pic,
			'rid' => $risk_id
		);
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	//kepake buat save sama submit risk owner
	public function treatmentSaveDraft($risk_id, $risk, $impact, $actplan, $control, $uid)
	{
		//ubah2
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){


		$sql = "delete from t_risk_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_impact_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_action_plan_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_control_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "insert into t_risk_change 
				select * from t_risk where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$risk['risk_id'] = $risk_id;
		$sql = "update t_risk_change set
				risk_status = ?,
				risk_cause = ?,
				risk_impact = ?,
				risk_level = ?,
				risk_impact_level = ?,
				risk_likelihood_key = ?,
				suggested_risk_treatment = ?,
				created_by = ?,
				created_date = NOW()
				where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, $risk);
		if ($res) {
			// insert impact
			$sql = "insert into t_risk_impact_change(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?, 'P')";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $risk_id,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_action_plan_change(risk_id, action_plan_status, action_plan, due_date, division, switch_flag) 
					values(?, 0, ?, ?, ?, 'P')";
			foreach ($actplan as $key => $value) {
				$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_control_change(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner,switch_flag) 
					values(?, ?, ?, ?, ?, 'P')";
			foreach ($control as $key => $value) {
				$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['existing_control_id'],
					'dd' => $value['risk_existing_control'],
					'da' => $value['risk_evaluation_control'],
					'div' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			return true;
		} else {
			return false;
		}
		
		return $res;
	}
	}

//ini buat update t risk nya pada saat submit risk owner by me
	public function treatmentSaveDraft2($risk_id, $risk, $impact, $actplan, $control, $uid)
	{
		//ubah2
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		$r_status = $risk['risk_status'];
		//update T-risk risk status sama switch_flag
		$sql = "update t_risk set risk_status = '".$r_status."', switch_flag='P'  where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql);

		$sql = "update t_risk_impact set switch_flag='P' where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql);

		$sql = "update t_risk_action_plan set switch_flag='P' where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql);

		$sql = "update t_risk_control set switch_flag='P' where risk_id = '".$risk_id."'  ";
		$res = $this->db->query($sql);

/*
		$sql = "delete from t_risk where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_impact where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_action_plan where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_control where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "insert into t_risk 
				select * from t_risk_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		if ($res) {
			// insert impact
			$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?, 'P')";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $risk_id,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_action_plan(risk_id, action_plan_status, action_plan, due_date, division, switch_flag) 
					values(?, 0, ?, ?, ?, 'P')";
			foreach ($actplan as $key => $value) {
				$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_control(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner,switch_flag) 
					values(?, ?, ?, ?, ?, 'P')";
			foreach ($control as $key => $value) {
				$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['existing_control_id'],
					'dd' => $value['risk_existing_control'],
					'da' => $value['risk_evaluation_control'],
					'div' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			return true;
		} else {
			return false;
		}
		*/
		
		return $res;
	}

	}

	
	public function riskChangeUpdate1ajah($risk_id, $risk, $impact, $actplan, $control, $username)
	{
		
		$sql = "delete from t_risk_impact_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_action_plan_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_control_change where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		
		//$risk['risk_id'] = $risk_id;
		
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}
		$par['risk_id'] = $risk_id;

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_change set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ? and switch_flag='P' ";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			$sql = "insert into t_risk_impact_change(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?,'P')";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $risk_id,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_action_plan_change(risk_id, action_plan_status, action_plan, due_date, division,switch_flag) 
					values(?, 0, ?, ?, ?,'P')";
			foreach ($actplan as $key => $value) {
				$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert action control
			$sql = "insert into t_risk_control_change(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner,switch_flag) 
					values(?, ?, ?, ?, ?, 'P')";
			foreach ($control as $key => $value) {
				$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['existing_control_id'],
					'dd' => $value['risk_existing_control'],
					'da' => $value['risk_evaluation_control'],
					'div' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			return true;
		} else {
			return false;
		}
		
		return $res;
	}

	public function riskChangeUpdate($risk_id, $risk, $impact, $actplan, $control, $uid)
	{
		
		$sql = "delete from t_risk_impact where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_action_plan where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_control where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		
		//$risk['risk_id'] = $risk_id;
		
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}
		$par['risk_id'] = $risk_id;

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now(), switch_flag='P'
			  	where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level, switch_flag) values(?, ?, ?, 'P')";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $risk_id,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_action_plan(risk_id, action_plan_status, action_plan, due_date, division,switch_flag) 
					values(?, 0, ?, ?, ?, 'P')";
			foreach ($actplan as $key => $value) {
				$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert action control
			$sql = "insert into t_risk_control(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner,switch_flag) 
					values(?, ?, ?, ?, ?, 'P')";
			foreach ($control as $key => $value) {
				$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['existing_control_id'],
					'dd' => $value['risk_existing_control'],
					'da' => $value['risk_evaluation_control'],
					'div' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			return true;
		} else {
			return false;
		}
		
		return $res;
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function riskChangeUpdateprimary($risk_id, $risk, $impact, $actplan, $control, $uid)
	{
		$sql = "delete from t_risk_impact where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_action_plan where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		$sql = "delete from t_risk_control where risk_id = ?";
		$res = $this->db->query($sql, array('rid'=>$risk_id));
		
		//$risk['risk_id'] = $risk_id;
		
		$par = array();
		$keyupdate = '';
		foreach($risk as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}
		$par['risk_id'] = $risk_id;

		$par['risk_id'] = $risk_id;
		$sql = "update t_risk set ".$keyupdate
			  ."created_date = now()
			  	where risk_id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			// insert impact
			$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level) values(?, ?, ?)";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $risk_id,
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
					'rid' => $risk_id,
					'ap' => $value['action_plan'],
					'dd' => $dd,
					'div' => $value['division']
				);
				$res4 = $this->db->query($sql, $par);
			}
			
			// insert action plan
			$sql = "insert into t_risk_control(
						risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner) 
					values(?, ?, ?, ?, ?)";
			foreach ($control as $key => $value) {
				$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
				$par = array(
					'rid' => $risk_id,
					'ap' => $value['existing_control_id'],
					'dd' => $value['risk_existing_control'],
					'da' => $value['risk_evaluation_control'],
					'div' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			return true;
		} else {
			return false;
		}
		
		return $res;
	}
	
	public function treatmentSubmit($risk_id, $risk, $uid)
	{
		//ubah2
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		$this->_logHistory($risk_id, $uid, 'U');
		
		$sql = "update t_risk set
				risk_status = ?,
				created_by = ?,
				created_date = NOW()
				where risk_id = ?";
		
		$risk['risk_id'] = $risk_id;
		$res = $this->db->query($sql, $risk);
		
		return $res;
		}
	}
	
	public function riskSwitchPrimary($risk_id)
	{
		$res = false;
		$this->db->trans_start();
		$risk_change = $this->getRiskChangeByIdNoRef($risk_id);
		if ($risk_change) {
			$par['risk_id'] = $risk_id;
			
			// RISK
			$sql = "update t_risk set switch_flag = 'P' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "update t_risk_change set switch_flag = 'C' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			/*
			$sql = "insert into t_risk_change select * from t_risk where risk_id = ?";
			$res = $this->db->query($sql, $par);
			*/
			if ($res) {
				$sql = "delete from t_risk where risk_id = ?";
				$res2 = $this->db->query($sql, $par);
				
				$sql = "insert into t_risk select * from t_risk_change where switch_flag = 'C' and risk_id = ?";
				$res3 = $this->db->query($sql, $par);
				/*
				$sql = "delete from t_risk_change where switch_flag = 'C' and risk_id = ?";
				$res4 = $this->db->query($sql, $par);
				*/
			}
			
			// IMPACT
			$sql = "update t_risk_impact set switch_flag = 'P' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "update t_risk_impact_change set switch_flag = 'C' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			/*
			$sql = "insert into t_risk_impact_change 
					select 
					risk_id, impact_id, impact_level, switch_flag
					from t_risk_impact where risk_id = ?";
			$res = $this->db->query($sql, $par);
			*/
			if ($res) {
				$sql = "delete from t_risk_impact where risk_id = ?";
				$res2 = $this->db->query($sql, $par);
				
				$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level, switch_flag) 
						select risk_id, impact_id, impact_level, switch_flag
						from t_risk_impact_change where switch_flag = 'C' and risk_id = ?";
				$res3 = $this->db->query($sql, $par);
				/*
				$sql = "delete from t_risk_impact_change where switch_flag = 'C' and risk_id = ?";
				$res4 = $this->db->query($sql, $par);
				*/
			}
			
			// CONTROL
			$sql = "update t_risk_control set switch_flag = 'P' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "update t_risk_control_change set switch_flag = 'C' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			/*
			$sql = "insert into t_risk_control_change 
					select 
					risk_id, existing_control_id, risk_existing_control,
					risk_evaluation_control, risk_control_owner, switch_flag 
					from t_risk_control where risk_id = ?";
			$res = $this->db->query($sql, $par);
			*/
			if ($res) {
				$sql = "delete from t_risk_control where risk_id = ?";
				$res2 = $this->db->query($sql, $par);
				
				$sql = "insert into t_risk_control(
							risk_id, existing_control_id, risk_existing_control,
							risk_evaluation_control, risk_control_owner, switch_flag
						) 
						select 
						risk_id, existing_control_id, risk_existing_control,
						risk_evaluation_control, risk_control_owner, switch_flag
						from t_risk_control_change where switch_flag = 'C' and risk_id = ?";
				$res3 = $this->db->query($sql, $par);
				/*
				$sql = "delete from t_risk_control_change where switch_flag = 'C' and risk_id = ?";
				$res4 = $this->db->query($sql, $par);
				*/
			}
			
			// ACTION PLAN
			$sql = "update t_risk_action_plan set switch_flag = 'P' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "update t_risk_action_plan_change set switch_flag = 'C' where risk_id = ?";
			$res = $this->db->query($sql, $par);
			/*
			$sql = "insert into t_risk_action_plan_change 
					select 
					id, risk_id, action_plan_status, action_plan, 
					due_date, division, assigned_to, 
					execution_status, execution_explain, execution_evidence, 
					execution_reason, revised_date, switch_flag
					from t_risk_action_plan where risk_id = ?";
			$res = $this->db->query($sql, $par);
			*/
			if ($res) {
				$sql = "delete from t_risk_action_plan where risk_id = ?";
				$res2 = $this->db->query($sql, $par);
				
				$sql = "insert into t_risk_action_plan(
							risk_id, action_plan_status, action_plan, 
							due_date, division, assigned_to, 
							execution_status, execution_explain, execution_evidence, 
							execution_reason, revised_date, switch_flag
						) 
						select 
						risk_id, action_plan_status, action_plan, 
						due_date, division, assigned_to, 
						execution_status, execution_explain, execution_evidence, 
						execution_reason, revised_date, switch_flag
						from t_risk_action_plan_change where switch_flag = 'C' and risk_id = ?";
				$res3 = $this->db->query($sql, $par);
				
				/*
				$sql = "delete from t_risk_action_plan_change where switch_flag = 'C' and risk_id = ?";
				$res4 = $this->db->query($sql, $par);
				*/
			}
		}
		$this->db->trans_complete();
		return $res;
	}
	
	public function riskDeleteChange($risk_id,$user)
	{
		$par['risk_id'] = $risk_id;
		$sql = "delete from t_risk_change where risk_id = ? and risk_input_by = '$user'";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_action_plan_change where risk_id = ? and switch_flag = '$user'";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_control_change where risk_id = ? and switch_flag ='$user'";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_risk_impact_change where risk_id = ? and switch_flag='$user'";
		$res = $this->db->query($sql, $par);
		
		return true;
	}
	
	public function actionPlanSetToDraft($risk_id)
	{
		$par['risk_id'] = $risk_id;
		$sql = "update t_risk_action_plan set action_plan_status = 1 where risk_id = ?";
		$res = $this->db->query($sql, $par);
		return true;
	}
	
	public function assignPicAction($risk_id, $pic) {
		$sql = "update t_risk_action_plan set 
				assigned_to = ?
				where
				id = ?
				";
		$par = array(
			'pic' => $pic,
			'rid' => $risk_id
		);
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function getActionPlanById($risk_id) 
	{
		$sql = "select a.*,
				concat('AP.', LPAD(a.id, 6, '0')) as act_code,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v,
				c.display_name as display_name
				from t_risk_action_plan a
				left join m_division b on a.division = b.division_id 
				left join m_user c on a.assigned_to = c.username 
				where a.id = ?";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$row = $query->row_array();
		return $row;
	}
	
	public function getActionPlanChangeById($risk_id) 
	{
		$sql = "select a.*,
				concat('AP.', LPAD(a.id, 6, '0')) as act_code,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v,
				c.display_name as display_name
				from t_risk_action_plan_change a
				left join m_division b on a.division = b.division_id 
				left join m_user c on a.assigned_to = c.username 
				where a.id = ? and switch_flag ='P' ";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$row = $query->row_array();
		return $row;
	}
	
	public function getActionPlanForChange($rid)
	{
		$data = $this->getActionPlanChangeById($rid);
		if (!$data) {
			$data = $this->getActionPlanById($rid);
		}
		return $data;
	}
	
	//ubah2
	public function actionPlanSaveDraft($action_id, $risk_id, $risk, $uid) 
	{
		//ubah
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		/*
		$sql = "delete from t_risk_action_plan_change where id = ? and risk_id = ?";
		$query = $this->db->query($sql, array('id' => $action_id, 'risk_id' => $risk_id));
		
		$sql = "insert into t_risk_action_plan_change 
				select * from t_risk_action_plan
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, array('id' => $action_id, 'risk_id' => $risk_id));
		
	*/
		$sql = "update t_risk_action_plan_change 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);

		//update juga di t risk action plan nya tapi bakalan sama nanti pas verify RAC!
		/*
		$sql = "update t_risk_action_plan 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);
		*/

		return true;
		}
	}
//ubah
	public function actionPlanSaveDraft2($action_id, $risk_id, $risk, $uid) 
	{
		$sql = "update t_risk_action_plan 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);
		return true;
	}
//ubah
	public function actionPlanSaveDraftprimary($action_id, $risk_id, $risk, $uid) 
	{
		$sql = "delete from t_risk_action_plan_change where id = ? and risk_id = ?";
		$query = $this->db->query($sql, array('id' => $action_id, 'risk_id' => $risk_id));
		
		$sql = "insert into t_risk_action_plan_change 
				select * from t_risk_action_plan
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, array('id' => $action_id, 'risk_id' => $risk_id));
		
		$sql = "update t_risk_action_plan_change 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);

		$sql = "update t_risk_action_plan 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);
		return true;
	}

	public function actionPlanSaveDraftprimary2($action_id, $risk_id, $risk, $uid) 
	{
		
		$sql = "update t_risk_action_plan 
				set action_plan = ?, due_date = ?, division = ?
				where id = ? and risk_id = ?";
		$par = array(
			'ap' => $risk['action_plan'], 'dd' => $risk['due_date'], 'division' => $risk['division'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		$query = $this->db->query($sql, $par);
		return true;
	}
	
	public function actionPlanSubmit($action_id, $risk_id, $risk, $uid) 
	{
		//ubah2
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		$this->actionPlanSaveDraft($action_id, $risk_id, $risk, $uid);
		$division = $risk['division'];
		$par = array(
			'ap' => $risk['action_plan_status'],
			'id' => $action_id, 'risk_id' => $risk_id
		);
		
		$sql = "update t_risk_action_plan_change 
				set action_plan_status = ?, assigned_to = (select username from m_user where division_id = '$division' and role_id = 4)
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, $par);
		
		$sql = "update t_risk_action_plan 
				set action_plan_status = ?
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, $par);

		//$sql = "update t_risk_action_plan set assigned_to = (select username from m_user where division_id = ? and role_id = 4)
		//	  	where risk_id = ? and division = ? ";
		//$query = $this->db->query($sql, $par);


		return true;
	}
}
	//ubah
	public function actionSwitchPrimary($id)
	{
		$this->db->trans_start();
		$action = $this->getActionPlanChangeById($id);
		if ($action) {
			$par['id'] = $id;
			$par['risk_id'] = $action['risk_id'];
						
			// ACTION PLAN
			/*
			$sql = "update t_risk_action_plan set switch_flag = 'P' where id = ? and risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "update t_risk_action_plan_change set switch_flag = 'C' where id = ? and risk_id = ?";
			$res = $this->db->query($sql, $par);
			
			$sql = "insert into t_risk_action_plan_change (
						id, risk_id, action_plan_status, action_plan, 
						due_date, division, assigned_to, switch_flag
					)
					select 
					id, risk_id, action_plan_status, action_plan, 
					due_date, division, assigned_to, switch_flag
					from t_risk_action_plan where id = ? and risk_id = ?";
			$res = $this->db->query($sql, $par);
			*/
			if ($res) {

				//$sql = "delete from t_risk_action_plan where id = ? and risk_id = ?";
				//$res2 = $this->db->query($sql, $par);
				
				$sql = "insert into t_risk_action_plan(
							id, risk_id, action_plan_status, action_plan, 
							due_date, division, assigned_to
						) 
						select 
						id, risk_id, action_plan_status, action_plan, 
						due_date, division, assigned_to
						from t_risk_action_plan_change where id = ?  and risk_id = ?";
				$res3 = $this->db->query($sql, $par);
				/*
				$sql = "delete from t_risk_action_plan_change where id = ?  and risk_id = ?";
				$res4 = $this->db->query($sql, $par);
				*/
			}
		}
		$this->db->trans_complete();
		return $res;
	}
	//ubah
	public function actionPlanVerify($action_id, $risk_id, $risk, $uid) 
	{	
		$division = $risk['division'];
		$par = array(
			'ap' => $risk['action_plan_status'],
			//'action_plan' => $risk['action_plan'],
			//'due_date' => $risk['due_date'],
			//'division' => $risk['division'],
			'id' => $action_id, 
			'risk_id' => $risk_id
		);
		
		$sql = "update t_risk_action_plan 
				set action_plan_status = ?,assigned_to = (select username from m_user where division_id = '$division' and role_id = 4)
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, $par);
		
		$par = array(
			'id' => $action_id, 'risk_id' => $risk_id
		);
		
		
		$sql = "delete from t_risk_action_plan_change 
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, $par);
		
		return true;
	}

	public function actionPlanVerify1form($action_id, $risk_id, $risk, $uid) 
	{	
		$division = $risk['division'];
		$par = array(
			'ap' => $risk['action_plan_status'],
			'action_plan' => $risk['action_plan'],
			'due_date' => $risk['due_date'],
			'division' => $risk['division'],
			'id' => $action_id, 
			'risk_id' => $risk_id
		);
		
		$sql = "update t_risk_action_plan 
				set action_plan_status = ?,action_plan = ?,due_date = ?,division = ?,assigned_to = (select username from m_user where division_id = '$division' and role_id = 4)
				where id = ? and risk_id = ?";

		$query = $this->db->query($sql, $par);
		
		$par = array(
			'id' => $action_id, 'risk_id' => $risk_id
		);
		
		
		$sql = "delete from t_risk_action_plan_change 
				where id = ? and risk_id = ?";
		$query = $this->db->query($sql, $par);
		
		return true;
	}
	
	public function actionUpdateRiskStatus($risk_id, $uid) 
	{
		//ubah2
		$risk_id_cek = $risk_id;
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		$sql = "select count(1) numcount from t_risk_action_plan 
				where risk_id = ? and action_plan_status < 3";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$row = $query->row_array();
		if ($row['numcount'] == 0) {
			$sql = "update t_risk 
					set risk_status = 10
					where risk_id = ?";
			$query = $this->db->query($sql, $par);

			$sql = "update t_risk_change 
					set risk_status = 10
					where risk_id = ? and switch_flag='P' ";
			$query = $this->db->query($sql, $par);
		}
		
		return true;
	}
	}
	
	public function execSaveDraft($id, $risk, $uid) 
	{
		//ubah2
		//$risk_id_cek = $risk_id;
		$sql="select t1.risk_existing_control from t_risk t1 join t_risk_action_plan t2 on t1.risk_id = t2.risk_id where t1.risk_id = (select t3.risk_id from t_risk_action_plan t3 where t3.id =  '$id') ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){

		$sql = "update t_risk_action_plan 
				set 
				execution_status = ?,
				execution_explain = ?,
				execution_evidence = ?,
				execution_reason = ?,
				revised_date = ?
				where id = ?
				";
		$par = array(
			'execution_status' => $risk['execution_status'],
			'execution_explain' => $risk['execution_explain'],
			'execution_evidence' => $risk['execution_evidence'],
			'execution_reason' => $risk['execution_reason'],
			'revised_date' => $risk['revised_date'],
			'rid' => $id
		);
		
		$query = $this->db->query($sql, $par);
		return true;
	}
}
	
	public function execSubmit($id, $status, $uid) 
	{
		$sql = "update t_risk_action_plan 
				set 
				action_plan_status = ?
				where id = ?
				";
		$par = array(
			'stat' => $status,
			'rid' => $id
		);
		
		$query = $this->db->query($sql, $par);
		return true;
	}
	
	public function execComplete($action_id, $risk, $uid) 
	{
		$par = array(
			'stat' => 7,
			'es' => 'COMPLETE',
			'eexplain' => $risk['execution_explain'],
			'eevi' => $risk['execution_evidence'],
			'id' => $action_id
		);
		
		$sql = "update t_risk_action_plan 
				set 
				action_plan_status = ?,
				execution_status = ?,
				execution_explain = ?,
				execution_evidence = ?
				where id = ?";
		$query = $this->db->query($sql, $par);
		return true;
	}
	
	public function execOngoing($action_id, $risk, $uid) 
	{
		$par = array(
			'stat' => 4,
			'es' => 'ONGOING',
			'eexplain' => $risk['execution_explain'],
			'eevi' => $risk['execution_evidence'],
			'id' => $action_id
		);
		
		$sql = "update t_risk_action_plan 
				set 
				action_plan_status = ?,
				execution_status = ?,
				execution_explain = ?,
				execution_evidence = ?
				where id = ?";
		$query = $this->db->query($sql, $par);
		return true;
	}
	
	public function execExtend($action_id, $risk, $uid) 
	{
		$par = array(
			'es' => 'EXTEND',
			'eexplain' => $risk['execution_reason'],
			'dd1' => $risk['revised_date'],
			'dd2' => $risk['revised_date'],
			'id' => $action_id
		);
		
		$sql = "update t_risk_action_plan 
				set 
				execution_status = ?,
				execution_reason = ?,
				revised_date = ?,
				due_date = ?
				where id = ?";
		
		$query = $this->db->query($sql, $par);
		
		$sql = "insert into t_risk_action_plan_extend
				select * from t_risk_action_plan where id = ?";
		$query = $this->db->query($sql, array('aid'=>$action_id));		
		
		$sql = "update t_risk_action_plan 
				set 
				action_plan_status = 4,
				execution_status = NULL,
				execution_reason = NULL,
				revised_date = NULL,
				due_date = ?
				where id = ?";
				
		$query = $this->db->query($sql, array('dd' => $risk['revised_date'], 'aid'=>$action_id));		
		return true;
	}
	
	public function execUpdateRiskStatus($risk_id, $uid) 
	{
		$sql = "select count(1) numcount from t_risk_action_plan 
				where risk_id = ? and action_plan_status < 7";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$row = $query->row_array();
		if ($row['numcount'] == 0) {
			$sql = "update t_risk 
					set risk_status = 20
					where risk_id = ?";
			$query = $this->db->query($sql, $par);
		}
		
		return true;
	}

	
	
	private function _logHistory($data_id, $uid, $mode) {
		$sql = "insert into t_risk_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk a
				where a.risk_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	/* RISK ACTION FUNCTION */
	
	/* KRI FUNCTION */
	public function insertNewKri($kri, $treshold) {
		$sql = "insert into t_kri (
			risk_id, kri_library_id, key_risk_indicator,
			kri_status, kri_pic,treshold, treshold_type,
			timing_pelaporan, kri_owner, created_by
		) values (
			?, ?, ?,?,
			?, ?, ?,
			?, ?, ?
		)";
		$res = $this->db->query($sql, $kri);	
		if ($res) {
			$rid = $this->db->insert_id();
			$sql = "update t_kri set 
					kri_code = concat('KRI.', LPAD(id, 6, '0'))
					where id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	
			
			// insert treshold
			$sql = "insert into t_kri_treshold(kri_id, operator, value_1, value_2, value_type, result) values(?, ?, ?, ?, ?, ?)";
			
			foreach ($treshold as $key => $value) {
				if ($value['value_2'] == '-') {
					$value['value_2'] = null;
				}
				if ($value['value_type'] == '-') {
					$value['value_type'] = null;
				}
				
				$par = array(
					'rid' => $rid,
					'op' => $value['operator'],
					'v1' => $value['value_1'],
					'v2' => $value['value_2'],
					'r' => $value['value_type'],
					'r2' => $value['result']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			if ($kri['treshold_type'] == 'VALUE'){
			$sql = "select value_1 from t_kri_treshold where kri_id='".$rid."' and operator ='BELOW' ";
			$query = $this->db->query($sql);
			$row = $query->row();
			$below = $row->value_1;


			$sql = "select value_1, value_2 from t_kri_treshold where kri_id='".$rid."' and operator ='BETWEEN' ";
			$query = $this->db->query($sql);
			$row = $query->row();
			$between = $row->value_1;
			$between2 = $row->value_2;
			

			$sql = "select value_1 from t_kri_treshold where kri_id='".$rid."' and operator ='ABOVE' ";
			$query = $this->db->query($sql);
			$row = $query->row();
			$above = $row->value_1;

			if($below == $between){
			$tambah = $between+1;
			$sql = "update t_kri_treshold set value_1='".$tambah."'  where kri_id='".$rid."' and operator ='BETWEEN' ";
			$res7 = $this->db->query($sql);
			}

			if($between2 == $above){
			$tambah2 = $above+1;
			$sql = "update t_kri_treshold set value_1='".$tambah2."'  where kri_id='".$rid."' and operator ='ABOVE' ";
			$res8 = $this->db->query($sql);
			}
		}
			return $res;
		}
	}
	
	public function assignPicKri($risk_id, $pic) {
		$sql = "update t_kri set 
				kri_pic = ?
				where
				id = ?
				";
		$par = array(
			'pic' => $pic,
			'rid' => $risk_id
		);
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function getTreshold($risk_id) 
	{
		$sql = "select * from t_kri_treshold
				where kri_id = ?";
		$par = array('uid' => $risk_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getKriById($risk_id) 
	{
		$sql = "select 
				a.*,
				date_format(a.timing_pelaporan, '%d-%m-%Y') as timing_pelaporan_v,
				b.risk_code,
				c.division_name as kri_owner_v,
				d.display_name as kri_pic_v
				from t_kri a
				left join t_risk b on a.risk_id = b.risk_id
				left join m_division c on a.kri_owner = c.division_id
				left join m_user d on a.kri_pic = d.username
				where a.id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		
		if ($row) {
			$row['treshold_list'] = $this->getTreshold($risk_id);
		}
		
		return $row;
	}
	
	public function updateKri($id, $kri, $uid) {
		//$this->_logHistory($risk_id, $uid, 'U');
		
		$par = array();
		$keyupdate = '';
		foreach($kri as $k=>$v) {
			$keyupdate .= $k.' = ?, ';
			$par[$k] = $v;
		}

		$par['id'] = $id;
		$sql = "update t_kri set ".$keyupdate
			  ."created_date = now()
			  	where id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
	
	public function addRiskToKri($rids)
	{
		$ex = '('.implode("),(", $rids).')';
		$sql = "insert into t_kri_risk values ".$ex;
		$res = $this->db->query($sql);
		return $res;
	}
	
	public function riskAddUser($risk_id, $username, $date_changed)
	{
		//delete dulu yang ada add user nya
		$sql = "delete from t_risk_add_user where risk_id ='".$risk_id."' ";
		$res = $this->db->query($sql);

		$sql = "insert into t_risk_add_user values(?, ? ,?)";
		$par = array(
			'rid' => $risk_id,
			'un' => $username,
			'dc' => $date_changed
		);
		$res = $this->db->query($sql, $par);
		return $res;
	}
	/* KRI FUNCTION */
	
	/* CHANGE REQUEST */
	public function getPendingChangeByRiskId($risk_id) {
		$sql = "select 
				a.*
				from t_cr_risk a 
				where a.cr_status = 0 and a.risk_id = ? ";
		$query = $this->db->query($sql, array('divid' => $risk_id));
		$row = $query->row_array();
		return $row;
	}
	
	public function getPendingChangeByActionId($act_id) {
		$sql = "select 
				a.*
				from t_cr_action_plan a join t_cr_risk b on a.change_id = b.id
				where b.cr_status = 0 and a.id = ? ";
		$query = $this->db->query($sql, array('divid' => $act_id));
		$row = $query->row_array();
		return $row;
	}
	
	
	
	public function getChangeById($ch_id, $change = false) {
		$tab = 't_cr_risk';
		if ($change) $tab = 't_cr_risk_change';
		
		$sql = "select 
				a.*,
				b.risk_code,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				k.ref_value as treatment_v
				from ".$tab." a 
				left join t_risk_change b on a.risk_id = b.risk_id
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				where a.id = ? ";
				
		$query = $this->db->query($sql, array('divid' => $ch_id));
		$row = $query->row_array();
		
		if ($row) {
			$row['impact_list'] = $this->getChangeRequestRiskImpact($ch_id, $change);
			$row['action_plan_list'] = $this->getChangeRequestActionPlan($ch_id, $change);
			$row['control_list'] = $this->getChangeRequestControlList($ch_id, $change);
			$row['objective_list'] = $this->getChangeRequestObjectiveList($ch_id, $change);
		}
		
		return $row;
	}
	
	public function getChangeByIdNoRef($ch_id, $change = false) {
		$tab = 't_cr_risk';
		if ($change) {
			$tab = 't_cr_risk_change';
		}
		
		$sql = "select 
				a.*,
				b.risk_code,
				c.ref_value as risk_level_v,
				d.ref_value as impact_level_v,
				e.l_title as likelihood_v,
				k.ref_value as treatment_v
				from ".$tab." a 
				join t_risk b on a.risk_id = b.risk_id
				left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
				left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
				left join m_likelihood e on a.risk_likelihood_key = e.l_key
				left join m_reference k on a.suggested_risk_treatment = k.ref_key and k.ref_context = 'treatment.status'
				where a.id = ? ";
				
		$query = $this->db->query($sql, array('divid' => $ch_id));
		$row = $query->row_array();
		return $row;
	}
	
	public function getChangeRequestRiskImpact($ch_id, $change = false) 
	{
		$tab = 't_cr_impact';
		if ($change) {
			$tab = 't_cr_impact_change';
		}
		
		$sql = "select * from ".$tab."
				where change_id = ?";
		$par = array('uid' => $ch_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getChangeRequestActionPlan($ch_id, $change = false) 
	{
		$tab = 't_cr_action_plan';
		if ($change) {
			$tab = 't_cr_action_plan_change';
		}
		
		$sql = "select a.*,
				date_format(a.due_date, '%d-%m-%Y') as due_date_v,
				b.division_name as division_v
				from ".$tab." a
				left join m_division b on a.division = b.division_id 
				where a.change_id = ?";
		$par = array('uid' => $ch_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getChangeRequestControlList($ch_id, $change = false) 
	{
		$tab = 't_cr_control';
		if ($change) {
			$tab = 't_cr_control_change';
		}
		
		$sql = "select a.*
				from ".$tab." a
				where a.change_id = ?";
		$par = array('uid' => $ch_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function getChangeRequestObjectiveList($ch_id, $change = false) 
	{
		$tab = 't_cr_objective';
		if ($change) {
			$tab = 't_cr_objective_change';
		}
		
		$sql = "select a.*
				from ".$tab." a
				where a.change_id = ?";
		$par = array('uid' => $ch_id);
		
		$query = $this->db->query($sql, $par);
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function insertChangeRequest($risk, $impact, $actplan, $control, $objective)
	{
		//ubah
		$risk_id_cek = $_POST['risk_id'];
		$sql="select risk_existing_control from t_risk where risk_id = '$risk_id_cek' ";
		$query = $this->db->query($sql);
		$row = $query->row(); 
		$hasil = $row->risk_existing_control;
		if($hasil != 'under'){


		$this->db->trans_start();
		$retval = false;
		
		$sql = "INSERT INTO t_cr_risk (
			cr_type, cr_status, risk_id, risk_cause, risk_impact, 
			risk_level, risk_impact_level, risk_likelihood_key, 
			suggested_risk_treatment, created_by, created_date,risk_event,risk_description
		) VALUES (
			?, 0, ?, ?, ?,
			?, ?, ?,
			?, ?, NOW(), ?, ? 
		)";
		$res = $this->db->query($sql, $risk);
		if ($res) {
			$rid = $this->db->insert_id();
			$risk_id = $_POST['risk_id'];
			
			$sql = "update t_cr_risk set 
					cr_code = concat('CH.', LPAD(id, 6, '0'))
					where id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	
			
			// copy to change
			$sql = "INSERT INTO t_cr_risk_change select * from t_cr_risk
					where id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	

			// update from primary
			$sql = "update t_cr_risk a
					join t_risk b on a.risk_id = b.risk_id
					set 
						a.risk_event = b.risk_event,
						a.risk_description = b. risk_description,
						a.risk_cause = b.risk_cause,
						a.risk_impact = b.risk_impact,
						a.risk_level = b.risk_level,
						a.risk_impact_level = b.risk_impact_level,
						a.risk_likelihood_key = b.risk_likelihood_key,
						a.suggested_risk_treatment = b.suggested_risk_treatment
					where a.id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	

			//delete dulu biar ga bentrok di Change request owner
			$sql = "delete from t_cr_impact_change where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);
			
			// insert impact
			$sql = "insert into t_cr_impact_change(change_id, risk_id, impact_id, impact_level) 
					values(?, ?, ?, ?)";
			foreach ($impact as $key => $value) {
				$par = array(
					'rid' => $rid,
					'risk_id' => $risk_id,
					'iid' => $value['impact_id'],
					'il' => $value['impact_level']
				);
				$res3 = $this->db->query($sql, $par);
			}
			
			$sql = "delete from t_cr_impact where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);

			// copy to change
			$sql = "INSERT INTO t_cr_impact 
					select 
						id, ".$rid." as change_id, risk_id, impact_id, impact_level, switch_flag 
					from t_risk_impact
					where risk_id = ?";
			$res2 = $this->db->query($sql, array('a'=>$risk_id));	
			
			$sql = "delete from t_cr_control_change where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);
			
			// insert control
			$sql = "insert into t_cr_control_change(
						change_id, risk_id, existing_control_id, risk_existing_control, 
						risk_evaluation_control, risk_control_owner) 
					values(
						?, ?, ?, ?, 
					?, ?)";

			foreach ($control as $key => $value) {
				$ecid = $value['existing_control_id'];
				if ($value['existing_control_id'] == '') $ecid = null;
				$par = array(
					'rid' => $rid,
					'risk_id' => $risk_id,
					'ap' => $ecid,
					'dd' => $value['risk_existing_control'],
					'div1' => $value['risk_evaluation_control'],
					'div2' => $value['risk_control_owner']
				);
				$res5 = $this->db->query($sql, $par);
			}

			$sql = "delete from t_cr_control where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);
			
			$sql = "INSERT INTO t_cr_control
					select 
						id, ".$rid." as change_id, risk_id, existing_control_id, 
						risk_existing_control, risk_evaluation_control, risk_control_owner,
						switch_flag 
					from t_risk_control
					where risk_id = ?";
			$res2 = $this->db->query($sql, array('a'=>$risk_id));	

			$sql = "delete from t_cr_action_plan where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);

			// insert action plan
			$add = '';
			$par = array('i' => $risk_id);
			if ($risk['cr_type'] == 'Action Plan Form') {
				$act_id = $actplan[0]['id'];
				$add = ' and id = ? ';
				$par = array('i' => $risk_id, 'a' => $act_id);
			}
			$sql = "insert into t_cr_action_plan(change_id, id, risk_id, action_plan_status, action_plan, due_date, division)
					select 
					".$rid." as change_id, id, risk_id, action_plan_status, action_plan, due_date, division
					from t_risk_action_plan
					where risk_id = ? ".$add;
			$res4 = $this->db->query($sql, $par);
			/*
			$sql = "insert into t_cr_action_plan_change(
								change_id, risk_id, action_plan_status, action_plan, 
								due_date, division, 
								change_flag, data_flag
							) values(
								?, ?, 0, ?, 
								?, ?, 
								?, ?
							)";
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $rid,
						'risk_id' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division'],
						'cf' => $value['change_flag'],
						'df' => $value['data_flag']
					);
					$res4 = $this->db->query($sql, $par);

				*/

			$sql = "delete from t_cr_action_plan_change where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);

			foreach ($actplan as $key => $value) {
					$sql = "insert into t_cr_action_plan_change(
								change_id, risk_id, action_plan_status, action_plan, 
								due_date, division, 
								change_flag, data_flag
							) values(
								?, ?, 0, ?, 
								?, ?, 
								?, ?
							)";
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'rid' => $rid,
						'risk_id' => $risk_id,
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division'],
						'cf' => $value['change_flag'],
						'df' => $value['data_flag']
					);
					$res4 = $this->db->query($sql, $par);
				}
				/*
				if ($value['change_flag'] == 'CHANGE') {
					$sql = "update t_cr_action_plan set
								action_plan = ?, due_date = ?, division = ?, 
								change_flag = ?, data_flag = ?
							where id = ? ";
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'ap' => $value['action_plan'],
						'dd' => $dd,
						'div' => $value['division'],
						'cf' => $value['change_flag'],
						'df' => $value['data_flag'],
						'xid' => $value['id']
					);
					$res4 = $this->db->query($sql, $par);
				}
				
				if ($value['change_flag'] == 'DELETE') {
					$sql = "update t_cr_action_plan set
								change_flag = ?
							where id = ? ";
					$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
					$par = array(
						'cf' => $value['change_flag'],
						'xid' => $value['id']
					);
					$res4 = $this->db->query($sql, $par);
				}
				
			}
			// copy to change
			$sql = "INSERT INTO t_cr_action_plan_change
					select * from t_cr_action_plan
					where change_id = ? and change_flag not in ('ADD')";
			$res2 = $this->db->query($sql, array('a'=>$rid));
			
			// update from primary	
			$sql = "update t_cr_action_plan_change a
					join t_risk_action_plan b on a.id = b.id
					set 
						a.action_plan = b.action_plan,
						a.due_date = b.due_date,
						a.division = b.division,
						a.change_flag = if (a.change_flag = 'DELETE', 'CHANGE', a.change_flag)
					where a.change_id = ? and a.id is not null";
			$res2 = $this->db->query($sql, array('a'=>$rid));
			*/
			$sql = "delete from t_cr_objective_change where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);

			// insert objective
			$sql = "insert into t_cr_objective_change(
					risk_id, objective, change_id) 
					values(?, ?, ?)";
			foreach ($objective as $key => $value) {
				$ecid = $value['objective_id'];
				if ($value['objective_id'] == '') $ecid = null;
				$par = array(
					'risk_id' => $risk_id,
					'dd' => $value['objective'],
					'rid' => $rid,
				);
				$res5 = $this->db->query($sql, $par);
			}
			
			$sql = "delete from t_cr_objective where risk_id = ?";
			$par = array('risk_id' => $risk_id);
			$res = $this->db->query($sql, $par);

			// copy to change
			$sql = "INSERT INTO t_cr_objective(risk_id,objective,change_id)
					select 
						  risk_id, objective , ? as change_id 
					from t_risk_objective
					where risk_id = ?";

			$res2 = $this->db->query($sql, array('rid' => $rid,'a'=>$risk_id));		
			
			$retval = $rid;
		} else {
			$retval = false;
		}
		$this->db->trans_complete();
		return $retval;
		}
	}
	
	
	public function insertChangeRequestKri($risk)
	{
		$this->db->trans_start();
		$retval = false;
		
		$sql = "INSERT INTO t_cr_risk (
			cr_type, cr_status, risk_id, risk_cause, risk_impact, 
			risk_level, risk_impact_level, risk_likelihood_key, 
			suggested_risk_treatment, created_by, created_date
		) VALUES (
			?, 0, ?, ?, ?,
			?, ?, ?,
			?, ?, NOW() 
		)";
		$res = $this->db->query($sql, $risk);
		if ($res) {
			$rid = $this->db->insert_id();
			$risk_id = $_POST['risk_id'];
			
			$sql = "update t_cr_risk set 
					cr_code = concat('CH.', LPAD(id, 6, '0'))
					where id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	
			
			// copy to change
			$sql = "INSERT INTO t_cr_risk_change select * from t_cr_risk
					where id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));	
			
			// update from primary
			$sql = "update t_cr_risk_change a
					join t_kri b on a.risk_cause = b.id
					set 
						a.risk_impact = b.owner_report,
						a.risk_level = b.kri_warning
					where a.id = ?";
			$res2 = $this->db->query($sql, array('a'=>$rid));
			
			$retval = $res2;
		} else {
			$retval = false;
		}
		$this->db->trans_complete();
		return $retval;
	}
	
	public function changeRequestSaveDraft($ch_id, $risk_id, $change, $impact, $actplan, $control, $objective, $uid)
	{
		$par = array();
		$keyupdate = '';
		$res = true;
		
		if ($change) {
			foreach($change as $k=>$v) {
				$keyupdate .= $k.' = ?, ';
				$par[$k] = $v;
			}
	
			$par['ch_id'] = $ch_id;
			$sql = "update t_cr_risk set ".$keyupdate
				  ."created_date = now()
				  	where id = ?";
			$res = $this->db->query($sql, $par);
		}
		
		//ini buat AP change set as primary yahh
		if ($change == false) {
			foreach ($actplan as $key => $value) {
						$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
						$par = array(
							'ap' => $value['action_plan'],
							'dd' => $dd,
							'div' => $value['division'],
							'ch_flag' => $value['change_flag'],
							'change_id' => $value['change_id']
						);
						$sql = "update t_cr_action_plan	
									set action_plan = ?, due_date = ?, division = ?, change_flag = ?
								where change_id = ?";
						$res4 = $this->db->query($sql, $par);
				}
			}
		

		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_cr_impact where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_impact(change_id, risk_id, impact_id, impact_level) values(?, ?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'cid' => $ch_id,
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_cr_control where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_control(
							change_id, risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'cid' => $ch_id,
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_cr_objective where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_objective(
							risk_id, objective, change_id) 
						values(?, ?, ?)";
				foreach ($objective as $key => $value) {
					$value['objective_id'] = $value['objective_id'] == '' || $value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['objective'],
						'cid' => $ch_id
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				foreach ($actplan as $key => $value) {
					if ($value['cr_id'] != '') {
						$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
						$par = array(
							'ap' => $value['action_plan'],
							'dd' => $dd,
							'div' => $value['division'],
							'ch_flag' => $value['change_flag'],
							'cr_id' => $value['cr_id']
						);
						$sql = "update t_cr_action_plan	
									set action_plan = ?, due_date = ?, division = ?, change_flag = ?
								where cr_id = ?";
						$res4 = $this->db->query($sql, $par);
					} else {
						$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
						$par = array(
							'change_id' => $ch_id,
							'risk_id' => $risk_id,
							'ap' => $value['action_plan'],
							'dd' => $dd,
							'div' => $value['division'],
							'ch' => 'ADD'
						);
						$sql = "insert into t_cr_action_plan	
									(change_id, id, risk_id, action_plan_status, action_plan,
									due_date, division, change_flag)
								values(?, NULL, ?, 0, ?,
									?, ?, ?)";
						$res4 = $this->db->query($sql, $par);
					}
				}
			}
			
			
			
			return true;
		} else {
			return false;
		}
	}

	public function changeRequestSaveDraftchanges($ch_id, $risk_id, $change, $impact, $actplan, $control, $objective, $uid)
	{
		$par = array();
		$keyupdate = '';
		$res = true;
		
		if ($change) {
			foreach($change as $k=>$v) {
				$keyupdate .= $k.' = ?, ';
				$par[$k] = $v;
			}
	
			$par['ch_id'] = $ch_id;
			$sql = "update t_cr_risk_change set ".$keyupdate
				  ."created_date = now()
				  	where id = ?";
			$res = $this->db->query($sql, $par);
		}
		
		if ($res) {
			// insert impact
			if ($impact !== false) {
				$sql = "delete from t_cr_impact_change where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_impact_change(change_id, risk_id, impact_id, impact_level) values(?, ?, ?, ?)";
				foreach ($impact as $key => $value) {
					$par = array(
						'cid' => $ch_id,
						'rid' => $risk_id,
						'iid' => $value['impact_id'],
						'il' => $value['impact_level']
					);
					$res3 = $this->db->query($sql, $par);
				}
			}
			
			// insert control
			if ($control !== false) {
				$sql = "delete from t_cr_control_change where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_control_change(
							change_id, risk_id, existing_control_id, risk_existing_control, 
							risk_evaluation_control, risk_control_owner) 
						values(?, ?, ?, ?, ?, ?)";
				foreach ($control as $key => $value) {
					$value['existing_control_id'] = $value['existing_control_id'] == '' || $value['existing_control_id'] == '0' ? null : $value['existing_control_id'];
					
					$par = array(
						'cid' => $ch_id,
						'rid' => $risk_id,
						'ap' => $value['existing_control_id'],
						'dd' => $value['risk_existing_control'],
						'da' => $value['risk_evaluation_control'],
						'div' => $value['risk_control_owner']
					);
					$res5 = $this->db->query($sql, $par);
				}
			}

			// insert objective
			if ($objective !== false) {
				$sql = "delete from t_cr_objective_change where change_id = ?";
				$this->db->query($sql, array('rid' => $ch_id));
				
				$sql = "insert into t_cr_objective_change(
							risk_id, objective, change_id) 
						values(?, ?, ?)";
				foreach ($objective as $key => $value) {
					$value['objective_id'] = $value['objective_id'] == '' || $value['objective_id'] == '0' ? null : $value['objective_id'];
					
					$par = array(
						'rid' => $risk_id,
						'ap' => $value['objective'],
						'cid' => $ch_id
					);
					$res5 = $this->db->query($sql, $par);
				}
			}
			
			// insert action plan
			if ($actplan !== false) {
				foreach ($actplan as $key => $value) {
					if ($value['cr_id'] != '') {
						$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
						$par = array(
							'ap' => $value['action_plan'],
							'dd' => $dd,
							'div' => $value['division'],
							'ch_flag' => $value['change_flag'],
							'cr_id' => $value['cr_id']
						);
						$sql = "update t_cr_action_plan_change	
									set action_plan = ?, due_date = ?, division = ?, change_flag = ?
								where cr_id = ?";
						$res4 = $this->db->query($sql, $par);
					} else {
						$dd = implode('-', array_reverse( explode('-', $value['due_date']) ));
						$par = array(
							'change_id' => $ch_id,
							'risk_id' => $risk_id,
							'ap' => $value['action_plan'],
							'dd' => $dd,
							'div' => $value['division'],
							'ch' => 'ADD'
						);
						$sql = "insert into t_cr_action_plan_change	
									(change_id, id, risk_id, action_plan_status, action_plan,
									due_date, division, change_flag)
								values(?, NULL, ?, 0, ?,
									?, ?, ?)";
						$res4 = $this->db->query($sql, $par);
					}
				}
			}
			
			
			
			return true;
		} else {
			return false;
		}
	}
	
	public function changeRequestSwitchPrimary($change_id)
	{
		$res = false;
		$this->db->trans_start();
		
		$par['change_id'] = $change_id;
		
		// Risk Change
		$sql = "delete from t_cr_risk_change where switch_flag = 'C' and id = ?";
		$res4 = $this->db->query($sql, $par); 
		 
		$sql = "update t_cr_risk_change set switch_flag = 'C' where id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_risk_change select * from t_cr_risk where id = ?";
		$res = $this->db->query($sql, $par);
		
		
		// IMPACT
		 $sql = "update t_cr_impact set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "update t_cr_impact_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_impact_change 
				(change_id, risk_id, impact_id, impact_level, switch_flag)
				select 
				change_id, risk_id, impact_id, impact_level, switch_flag
				from t_cr_impact where change_id = ?";
		$res = $this->db->query($sql, $par);
		if ($res) {
			/*$sql = "delete from t_cr_impact where change_id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_impact(change_id, risk_id, impact_id, impact_level, switch_flag) 
					select change_id, risk_id, impact_id, impact_level, switch_flag
					from t_cr_impact_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			*/
			$sql = "delete from t_cr_impact_change where switch_flag = 'C' and change_id = ?";
			$res4 = $this->db->query($sql, $par);
		}
		 
		
		// CONTROL
		$sql = "update t_cr_control set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "update t_cr_control_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_control_change 
				select 
				id, change_id, risk_id, existing_control_id, risk_existing_control,
				risk_evaluation_control, risk_control_owner, switch_flag 
				from t_cr_control where change_id = ?";
		$res = $this->db->query($sql, $par);
		if ($res) {
			/*$sql = "delete from t_cr_control where change_id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_control(
						change_id, risk_id, existing_control_id, risk_existing_control,
						risk_evaluation_control, risk_control_owner, switch_flag
					) 
					select 
					change_id, risk_id, existing_control_id, risk_existing_control,
					risk_evaluation_control, risk_control_owner, switch_flag
					from t_cr_control_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			*/
			$sql = "delete from t_cr_control_change where switch_flag = 'C' and change_id = ?";
			$res4 = $this->db->query($sql, $par);
		} 
		
		
		// ACTION PLAN
		$sql = "update t_cr_action_plan set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "update t_cr_action_plan_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_action_plan_change 
				select 
				cr_id, change_id, id, risk_id, action_plan_status, action_plan, 
				due_date, division, assigned_to, 
				execution_status, execution_explain, execution_evidence, 
				execution_reason, revised_date, switch_flag, change_flag, data_flag
				from t_cr_action_plan where change_id = ?";
		$res = $this->db->query($sql, $par);
		if ($res) {
			//$sql = "delete from t_cr_action_plan where change_id = ?";
			//$res2 = $this->db->query($sql, $par);
			
			/*$sql = "insert into t_cr_action_plan(
						change_id, id, risk_id, action_plan_status, action_plan, 
						due_date, division, assigned_to, 
						execution_status, execution_explain, execution_evidence, 
						execution_reason, revised_date, switch_flag, change_flag, data_flag
					) 
					select 
					change_id, id, risk_id, action_plan_status, action_plan, 
					due_date, division, assigned_to, 
					execution_status, execution_explain, execution_evidence, 
					execution_reason, revised_date, switch_flag, change_flag, data_flag
					from t_cr_action_plan_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			*/
			
			$sql = "delete from t_cr_action_plan_change where switch_flag = 'C' and change_id = ?";
			
			$res4 = $this->db->query($sql, $par);
		}
		 
		
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestSwitchPrimary_($change_id)
	{
		$res = false;
		$this->db->trans_start();
		
		$par['change_id'] = $change_id;
		
		// Risk Change
		/*$sql = "update t_cr_risk set switch_flag = 'P' where id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "update t_cr_risk_change set switch_flag = 'C' where id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_risk_change select * from t_cr_risk where id = ?";
		$res = $this->db->query($sql, $par);
		if ($res) {
			$sql = "delete from t_cr_risk where id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_risk select * from t_cr_risk_change where switch_flag = 'C' and id = ?";
			$res3 = $this->db->query($sql, $par);
			
			$sql = "delete from t_cr_risk_change where switch_flag = 'C' and id = ?";
			$res4 = $this->db->query($sql, $par);
		}
		*/
		
		$sql = "delete from t_cr_risk_change where switch_flag = 'C' and id = ?";
		$res4 = $this->db->query($sql, $par); 
		 
		$sql = "update t_cr_risk_change set switch_flag = 'C' where id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_risk_change select * from t_cr_risk where id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			/*
			$sql = "delete from t_cr_risk where id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_risk select * from t_cr_risk_change where switch_flag = 'C' and id = ?";
			$res3 = $this->db->query($sql, $par);
			
			$sql = "delete from t_cr_risk_change where switch_flag = 'C' and id = ?";
			$res4 = $this->db->query($sql, $par);*/
		}
		
		// IMPACT
		 
		$sql = "update t_cr_impact set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_cr_impact_change where switch_flag = 'C' and change_id = ?";
		$res4 = $this->db->query($sql, $par);
		
		$sql = "update t_cr_impact_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_impact_change 
				(change_id, risk_id, impact_id, impact_level, switch_flag)
				select 
				change_id, risk_id, impact_id, impact_level, switch_flag
				from t_cr_impact where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			/*$sql = "delete from t_cr_impact where change_id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_impact(change_id, risk_id, impact_id, impact_level, switch_flag) 
					select change_id, risk_id, impact_id, impact_level, switch_flag
					from t_cr_impact_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			*/
			
		}
		
		// CONTROL
		
		
		$sql = "update t_cr_control set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "delete from t_cr_control_change where switch_flag = 'C' and change_id = ?";
		$res4 = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_control_change 
				select 
				id, change_id, risk_id, existing_control_id, risk_existing_control,
				risk_evaluation_control, risk_control_owner, switch_flag 
				from t_cr_control where change_id = ?";
		$res = $this->db->query($sql, $par);
		 /*
		$sql = "update t_cr_control_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		if ($res) {
			/*$sql = "delete from t_cr_control where change_id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_control(
						change_id, risk_id, existing_control_id, risk_existing_control,
						risk_evaluation_control, risk_control_owner, switch_flag
					) 
					select 
					change_id, risk_id, existing_control_id, risk_existing_control,
					risk_evaluation_control, risk_control_owner, switch_flag
					from t_cr_control_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			
			$sql = "delete from t_cr_control_change where switch_flag = 'C' and change_id = ?";
			$res4 = $this->db->query($sql, $par);
			
		}*/
		
		// ACTION PLAN
		$sql = "update t_cr_action_plan set switch_flag = 'P' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "update t_cr_action_plan_change set switch_flag = 'C' where change_id = ?";
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_cr_action_plan_change 
				select 
				cr_id, change_id, id, risk_id, action_plan_status, action_plan, 
				due_date, division, assigned_to, 
				execution_status, execution_explain, execution_evidence, 
				execution_reason, revised_date, switch_flag, change_flag, data_flag
				from t_cr_action_plan where change_id = ?";
		$res = $this->db->query($sql, $par);
		if ($res) {
			$sql = "delete from t_cr_action_plan where change_id = ?";
			$res2 = $this->db->query($sql, $par);
			
			$sql = "insert into t_cr_action_plan(
						change_id, id, risk_id, action_plan_status, action_plan, 
						due_date, division, assigned_to, 
						execution_status, execution_explain, execution_evidence, 
						execution_reason, revised_date, switch_flag, change_flag, data_flag
					) 
					select 
					change_id, id, risk_id, action_plan_status, action_plan, 
					due_date, division, assigned_to, 
					execution_status, execution_explain, execution_evidence, 
					execution_reason, revised_date, switch_flag, change_flag, data_flag
					from t_cr_action_plan_change where switch_flag = 'C' and change_id = ?";
			$res3 = $this->db->query($sql, $par);
			
			$sql = "delete from t_cr_action_plan_change where switch_flag = 'C' and change_id = ?";
			$res4 = $this->db->query($sql, $par);
		}
		
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestApplyVerify($change_id, $uid, $risk = true, $control = true, $action = true, $objective = true)
	{
		$res = false;
		$this->db->trans_start();
		
		$par['change_id'] = $change_id;
		$change = $this->getChangeByIdNoRef($change_id, false);
		
		if ($change) {
			// Risk Change
			$par = array(
				'risk_status' => 0,
				'risk_cause' => $change['risk_cause'],
				'risk_impact' => $change['risk_impact'],
				'risk_level' => $change['risk_level'],
				'risk_impact_level' => $change['risk_impact_level'],
				'risk_likelihood_key' => $change['risk_likelihood_key'],
				'suggested_risk_treatment' => $change['suggested_risk_treatment'],
				'risk_event' => $change['risk_event'],
				'risk_description' => $change['risk_description']
			);
			
			if ($risk) {
				$this->updateRisk($change['risk_id'], null, $par, false, false, false, $uid, 'CHANGE_REQUEST-VERIFY');

				$this->changeRequestUpdateImpact($change_id, $change['risk_id'], $uid);
			}
			
			if ($control) {
				$this->changeRequestUpdateControl($change_id, $change['risk_id'], $uid);
			}
			
			if ($action) {
				$this->changeRequestUpdateActionPlan($change_id, $change['risk_id'], $uid);
			}

			if ($objective) {
				$this->changeRequestUpdateObjective($change_id, $change['risk_id'], $uid);
			}
			
			$sql = "update t_cr_risk set cr_status = 1 where id = ?";
			$par = array('cid' => $change_id);
			$res = $this->db->query($sql, $par);
		}
		
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestApplyKri($change_id, $uid)
	{
		$res = false;
		$this->db->trans_start();
		
		$par['change_id'] = $change_id;
		$change = $this->getChangeByIdNoRef($change_id, false);
		
		if ($change) {
			// Risk Change
			$id = $change['risk_cause'];
			$kri = array(
				'owner_report' => $change['risk_impact'],
				'kri_warning' => $change['risk_level']
			);
			
			$res = $this->updateKri($id, $kri, $uid);
			
			$sql = "update t_cr_risk set cr_status = 1 where id = ?";
			$par = array('cid' => $change['id']);
			$res = $this->db->query($sql, $par);
		}
		
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestUpdateImpact($change_id, $risk_id, $uid)
	{
		$res = false;
		$this->db->trans_start();
		
		$this->_logHistoryImpact($risk_id, $uid, 'CHANGE_REQUEST-VERIFY');
		
		$sql = "delete from t_risk_impact where risk_id = ?";
		$par = array('rid' => $risk_id);
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_risk_impact(risk_id, impact_id, impact_level, switch_flag) 
				select risk_id, impact_id, impact_level, switch_flag
				from t_cr_impact where change_id = ?";
		$par = array('cid' => $change_id);
		$res3 = $this->db->query($sql, $par);
				
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestUpdateControl($change_id, $risk_id, $uid)
	{
		$res = false;
		$this->db->trans_start();
		
		$this->_logHistoryControl($risk_id, $uid, 'CHANGE_REQUEST-VERIFY');
		
		$sql = "delete from t_risk_control where risk_id = ?";
		$par = array('rid' => $risk_id);
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_risk_control
				(risk_id, existing_control_id, risk_existing_control, 
				risk_evaluation_control, risk_control_owner) 
				select 
				risk_id, existing_control_id, risk_existing_control, 
				risk_evaluation_control, risk_control_owner
				from t_cr_control where change_id = ?";
		$par = array('cid' => $change_id);
		$res3 = $this->db->query($sql, $par);
				
		$this->db->trans_complete();
		return $res;
	}

	public function changeRequestUpdateObjective($change_id, $risk_id, $uid)
	{
		$res = false;
		$this->db->trans_start();
		
		//$this->_logHistoryControl($risk_id, $uid, 'CHANGE_REQUEST-VERIFY');
		
		$sql = "delete from t_risk_objective where risk_id = ?";
		$par = array('rid' => $risk_id);
		$res = $this->db->query($sql, $par);
		
		$sql = "insert into t_risk_objective
				(risk_id, objective) 
				select 
				risk_id, objective
				from t_cr_objective where change_id = ?";
		$par = array('cid' => $change_id);
		$res3 = $this->db->query($sql, $par);
				
		$this->db->trans_complete();
		return $res;
	}
	
	public function changeRequestUpdateActionPlan($change_id, $risk_id, $uid)
	{
		$res = false;
		$this->db->trans_start();
		
		$this->_logHistoryAction($risk_id, $uid, 'CHANGE_REQUEST-VERIFY');
		
		$cr_actplan = $this->getChangeRequestActionPlan($change_id, false);
		
		foreach ($cr_actplan as $key => $value) {
			if ($value['data_flag'] == 'LOCKED') {
				continue;
			} else {
				if ($value['change_flag'] == 'CHANGE' && is_numeric($value['id'])) {
					$sql = "update t_risk_action_plan set 
							action_plan = ?, due_date = ?, division = ?
							where id = ?";
					$par = array('a'=> $value['action_plan'], 'd' => $value['due_date'], 'div' => $value['division'], 'id' => $value['id']);
					$res3 = $this->db->query($sql, $par);
				} else if ($value['change_flag'] == 'ADD' && empty($value['id'])) {
					$sql = "insert into t_risk_action_plan
							(risk_id, action_plan_status, action_plan, due_date, division)
							values(?, 1, ?, ?, ?)";
					$par = array(
						'r'=> $value['risk_id'],
						'a'=> $value['action_plan'], 'd' => $value['due_date'], 'div' => $value['division']);
					$res3 = $this->db->query($sql, $par);
				} else if ($value['change_flag'] == 'DELETE' && is_numeric($value['id'])) {
					$sql = "delete from t_risk_action_plan
							where id = ?";
					$par = array('r'=> $value['id']);
					$res3 = $this->db->query($sql, $par);
				}
			}
		}
		
		$this->db->trans_complete();
		return $res;
	}
	/* CHANGE REQUEST */
	
	private function _logHistoryImpact($data_id, $uid, $mode) {
		$sql = "insert into t_risk_impact_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk_impact a
				where a.risk_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	private function _logHistoryControl($data_id, $uid, $mode) {
		$sql = "insert into t_risk_control_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk_control a
				where a.risk_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	private function _logHistoryAction($data_id, $uid, $mode) {
		$sql = "insert into t_risk_action_plan_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from t_risk_action_plan a
				where a.risk_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	
	function getAllRisk_export($filter){
	 
			$filtaradd = "";
			
				if(isset($filter['search'])){
					if($filter['search']!=""){
						$filtaradd = "where risk_event like '%".$filter['search']."%'";
					}
				}	
		
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
				 
				".$filtaradd;
		
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
	
	function getUserList_export($filter){
		 
		$filtaradd = "";
			
			if(isset($filter['search'])){
				if($filter['search']!=""){
						if($filter['orderby']=="risk_owner"){
							$ordernya = "a.display_name";
						}else{
							$ordernya = "b.division_name";
						}
						$filtaradd = "where ".$ordernya." like '%".$filter['search']."%'";
					}
			}	
		 
		$sql = "select 
				b.risk_status,
				a.username,
				a.display_name,
				a.division_id, 
				b.division_name 
				from m_user a 
				join m_division b on a.division_id = b.division_id
				join (
					select min(risk_status) as risk_status, risk_input_by from t_risk
					where
					risk_status > 1
					group by risk_input_by
				) b on a.username = b.risk_input_by ".$filtaradd;
		
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
	
	function getTreatment_export($filter){
		
				$filtaradd = "";
			
				if(isset($filter['search'])){
					if($filter['search']!=""){
						$filtaradd = "and risk_event like '%".$filter['search']."%'";
					}
				}	
				 		
			$sql = "select 
					a.*,
					b.division_name as risk_owner_v,
					c.ref_value as suggested_risk_treatment_v
					from t_risk a
					left join m_division b on a.risk_owner = b.division_id
					left join m_reference c on a.suggested_risk_treatment = c.ref_key and c.ref_context = 'treatment.status'
					where 
					a.periode_id is not null
					and a.risk_status > 4
					 ".$filtaradd;
		
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
	
	function getActionplan_export($filter){
		
				$filtaradd = "";
				
					if(isset($filter['search'])){
						if($filter['search']!=""){
							$filtaradd = "and action_plan like '%".$filter['search']."%'";
						}
					}	
		  
					$sql = "select 
					a.*,
					concat('AP.', LPAD(a.id, 6, '0')) as act_code,
					b.risk_code,
					c.display_name as assigned_to_v,
					d.division_name as division_name,
					date_format(a.due_date, '%d-%m-%Y') as due_date_v
					from 
					t_risk_action_plan a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.assigned_to = c.username
					left join m_division d on a.division = d.division_id
					where 
					a.action_plan_status > 2
					".$filtaradd;
		
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
	
	function getExecution_export(){
		 
		$sql = "select 
					a.*,
					concat('AP.', LPAD(a.id, 6, '0')) as act_code,
					b.risk_code,
					c.display_name as assigned_to_v,
					d.division_name as division_name,
					date_format(a.due_date, '%d-%m-%Y') as due_date_v
					from 
					t_risk_action_plan a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.assigned_to = c.username
					left join m_division d on a.division = d.division_id
					where 
					a.action_plan_status > 5
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
	
	function getKRI_export(){
		 
			$sql = "select 
					a.*,
					date_format(a.timing_pelaporan, '%d-%m-%Y') as timing_pelaporan_v,
					b.risk_code,
					c.division_name as kri_owner_v,
					d.display_name as kri_pic_v
					from t_kri a
					left join t_risk b on a.risk_id = b.risk_id
					left join m_division c on a.kri_owner = c.division_id
					left join m_user d on a.kri_pic = d.username
					where 
					a.kri_status >= 0";
		
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
	
	function getChangeReq_export(){
		 
			$sql = "select 
					a.*,
					b.risk_code,
					b.risk_event,
					c.display_name as created_by_v
					from 
					t_cr_risk a join t_risk b on a.risk_id = b.risk_id
					left join m_user c on a.created_by = c.username";
		
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
	
	function updateRisk_level($risk_id,$data){
		
		unset($data['id']);
		unset($data['owner_report']);
		 
		$this->db->where("risk_id" , $risk_id);
		
		$this->db->update("t_risk",$data);
		 
	}
	
	function updateKRI_Risk_level($risk_id,$data){
		
		$this->db->set("risk_impact_level_after_mitigation",$data['risk_impact_level_after_mitigation']);
		$this->db->set("risk_likelihood_key_after_mitigation",$data['risk_likelihood_key_after_mitigation']);	
		$this->db->set("risk_level_after_mitigation",$data['risk_level_after_mitigation']);			
		 
		$this->db->where("risk_id" , $risk_id);
		
		$this->db->update("t_risk");
		 
	}
	
	function kri_pic($div){
	
	$sql = "select username from m_user where division_id = '".$div."' and role_id = 4";
	
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
	
	
}