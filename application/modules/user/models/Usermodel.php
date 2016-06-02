<?php
class Usermodel extends APP_Model {
	public function getData($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		
		$sql = "select mtable.* from (
				select 
				a.username,
				a.display_name,
				a.email,
				a.role_id,
				a.role_status,
				b.role_name,
				a.division_id,
				c.division_name
				from m_user a 
				left join m_role b on a.role_id = b.role_id
				left join m_division c on a.division_id = c.division_id
				where a.role_id <> 1 and password <> 1
				) mtable "
				.$ex_filter
				.$ex_or ;
		$res = $this->getPagingData($sql, $par, $page, $row, 'username', true);
		return $res;
	}


	public function getAllUsername()
	{
		$sql = "select 
				*
				from m_user where role_id != 1 and password != 1 ";
		$query = $this->db->query($sql);
		
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function getAllUsernameHide()
	{
		$sql = "select 
				*
				from m_user where role_id != 1 and password = 1 ";
		$query = $this->db->query($sql);
		
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}

	public function updateMove($data_id, $data, $uid)
	{
		//$this->_logHistory($data_id, $uid, 'U');
		$sql = "update t_risk
				set risk_input_by = ?
				where risk_input_by = ?";

		$par = $data;
		
		$res = $this->db->query($sql, $par);

		$sql = "update m_user
				set password = 1
				where username = '$data_id' ";

		$par = $data;
		
		$res2 = $this->db->query($sql, $par);

		return $res;
	}
	
	public function getDataById($id)
	{
		$sql = "select 
				a.username,
				a.display_name,
				a.role_id,
				b.role_name,
				a.division_id,
				c.division_name
				from m_user a 
				left join m_role b on a.role_id = b.role_id
				left join m_division c on a.division_id = c.division_id
				where a.username = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function getUserPicByDivision($div_id)
	{
		$sql = "select 
				a.username,
				a.display_name,
				a.role_id,
				b.role_name,
				a.division_id,
				c.division_name
				from m_user a 
				left join m_role b on a.role_id = b.role_id
				left join m_division c on a.division_id = c.division_id
				where 
				a.role_id in (4, 5)
				and a.division_id = ?
				";
		$query = $this->db->query($sql, array('divid' => $div_id));
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getUserRACByDivision($div_id)
	{
		$sql = "select 
				a.username,
				a.display_name,
				a.role_id,
				b.role_name,
				a.division_id,
				c.division_name
				from m_user a 
				left join m_role b on a.role_id = b.role_id
				left join m_division c on a.division_id = c.division_id
				where 
				a.role_id in (2, 4, 5)
				and a.division_id = ?
				";
		$query = $this->db->query($sql, array('divid' => $div_id));
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function insertData($data)
	{
	
		$sql = "insert into m_user
				(username, password, display_name, 
				 role_id, division_id, 
				 created_by, created_date)
				values(?, ?, ?, 
				 ?, ?, 
				 ?, NOW())
				";
		$par = $data;
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function updateData($data_id, $data, $uid)
	{
		//$this->_logHistory($data_id, $uid, 'U');
		
		$pass = '';
		if (isset($data['password']) && $data['password'] != '') {
			$pass = ' username <> ?, ';
			//$pass = ' password = ?, ';
		}
		$sql = "update m_user
				set display_name = ?,
					role_id = ?,
					role_status = ?,
					division_id = ?,
					email = ?,					
					".$pass." 
					created_by = ?, 
					created_date = NOW()
				where username = ?";

		$par = $data;
		$par['user_id'] = $uid;
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function deleteData($data_id, $uid)
	{
		$this->_logHistory($data_id, $uid, 'D');
		
		$sql = "delete from m_user
				where username = ?
				";
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}

	
	
	private function _logHistory($data_id, $uid, $mode) {
		$sql = "insert into m_user_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from m_user a
				where a.username = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	function get_role($id){
		$this->db->where("role_id");
		$res = $this->db->get("m_role");
		return $res;
		
		
		
		
	}


	public function deleteRiskHide($username, $uid, $update_point = 'D') {
		// delete risk in child
		// t_risk t_risk_change t_risk_action_plan t_risk_action_plan_change 
		// t_risk_control t_risk_control_change t_risk_impact t_risk_impact_change
		
		$par['username'] = $username;
		
		$sql = "update m_user set password = 1 where username = ?";
		$res = $this->db->query($sql, $par);

		return $res;
	}

	function cekStatusLogin($username){

	$sql = "select status_login from m_user_login where username = '".$username."' ";
	$query = $this->db->query($sql);
	$row = $query->row();
	$hasil = $row->status_login;
	return $hasil;
	}

}