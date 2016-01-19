<?php
class Mperiode extends APP_Model {
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
		
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode a "
				.$ex_filter
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'periode_id', true);
		return $res;
	}
	
	public function getAll()
	{
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode a order by a.periode_year, a.periode_start";
		$query = $this->db->query($sql);
		
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getDataById($id)
	{
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode a where a.periode_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function validatePeriode($periode_start, $periode_end) {
		/* TODO : Validation for insert and update */
		$resp_arr = array('status' => true, 'msg' => null);
		$dints = str_replace('-', '', $periode_start) * 1;
		$dinte = str_replace('-', '', $periode_end) * 1;
		
		if ($dints > $dinte) {
			$resp_arr['status'] = false;
			$resp_arr['msg'] = 'End Date must be after Start Date';
		}
		return $resp_arr;
	}
	
	public function validatePeriodeDelete($periode_start, $periode_end) {
		/* TODO : Validation for delete */
		$resp_arr = array('status' => true, 'msg' => null);
		return $resp_arr;
	}
	
	public function insertData($data)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$sql = "insert into m_periode
				(periode_name, periode_start, periode_end, created_by, created_date)
				values(?, ?, ?, ?, NOW())
				";
		$par = $data;
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function updateData($data_id, $data, $uid)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$this->_logHistory($data_id, $uid, 'U');
		
		$sql = "update m_periode
				set periode_name = ?, periode_start = ?, periode_end = ?,
					created_by = ?, 
					created_date = NOW()
				where periode_id = ?
				";
		$par = $data;
		$par['user_id'] = $uid;
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function deleteData($data_id, $uid)
	{
		// if year month start is <= current month
		
		$this->_logHistory($data_id, $uid, 'D');
		
		$sql = "delete from m_periode
				where periode_id = ?
				";
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	private function _logHistory($data_id, $uid, $mode) {
		$sql = "insert into m_periode_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from m_periode a
				where a.periode_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	public function getCurrentPeriode() 
	{
		$sql = "select * from m_periode where DATE(NOW()) between periode_start and periode_end";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}
	
	// ACTION PLAN PERIODE
	public function getDataPlan($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode_plan a "
				.$ex_filter
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'periode_id', true);
		return $res;
	}
	
	public function getAllPlan()
	{
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode_plan a order by a.periode_year, a.periode_start";
		$query = $this->db->query($sql);
		
		$res = array();
		foreach($query->result_array() as $row) {
			$res[] = $row;
		}
		
		return $res;
	}
	
	public function getDataByIdPlan($id)
	{
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode_plan a where a.periode_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function validatePeriodePlan($periode_start, $periode_end) {
		/* TODO : Validation for insert and update */
		$resp_arr = array('status' => true, 'msg' => null);
		$dints = str_replace('-', '', $periode_start) * 1;
		$dinte = str_replace('-', '', $periode_end) * 1;
		
		if ($dints > $dinte) {
			$resp_arr['status'] = false;
			$resp_arr['msg'] = 'End Date must be after Start Date';
		}
		return $resp_arr;
	}
	
	public function validatePeriodeDeletePlan($periode_start, $periode_end) {
		/* TODO : Validation for delete */
		$resp_arr = array('status' => true, 'msg' => null);
		return $resp_arr;
	}
	
	public function insertDataPlan($data)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$sql = "insert into m_periode_plan
				(periode_name, periode_start, periode_end, created_by, created_date)
				values(?, ?, ?, ?, NOW())
				";
		$par = $data;
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function updateDataPlan($data_id, $data, $uid)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$this->_logHistoryPlan($data_id, $uid, 'U');
		
		$sql = "update m_periode_plan
				set periode_name = ?, periode_start = ?, periode_end = ?,
					created_by = ?, 
					created_date = NOW()
				where periode_id = ?
				";
		$par = $data;
		$par['user_id'] = $uid;
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function deleteDataPlan($data_id, $uid)
	{
		// if year month start is <= current month
		
		$this->_logHistoryPlan($data_id, $uid, 'D');
		
		$sql = "delete from m_periode_plan
				where periode_id = ?
				";
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	private function _logHistoryPlan($data_id, $uid, $mode) {
		$sql = "insert into m_periode_plan_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from m_periode_plan a
				where a.periode_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	public function getCurrentPlanPeriode() 
	{
		$sql = "select * from m_periode_plan where DATE(NOW()) between periode_start and periode_end";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}

	//report

	public function validatePeriodeReport($periode_start, $periode_end) {
		/* TODO : Validation for insert and update */
		$resp_arr = array('status' => true, 'msg' => null);
		$dints = str_replace('-', '', $periode_start) * 1;
		$dinte = str_replace('-', '', $periode_end) * 1;
		
		if ($dints > $dinte) {
			$resp_arr['status'] = false;
			$resp_arr['msg'] = 'End Date must be after Start Date';
		}
		return $resp_arr;
	}

	public function insertDataReport($data)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$sql = "insert into m_periode_report
				(periode_name, periode_start, periode_end)
				values(?, ?, ?)
				";
		$par = $data;
		$res = $this->db->query($sql, $par);

		
$query2 = $this->db->query("select periode_id from m_periode_report where periode_name = '".$data['periode_name']."' ");
$row2 = $query2->row(); 

$query = $this->db->query("select risk_id from t_risk where created_date between '".$data['periode_start']."' and '".$data['periode_end']."' ");
if ($query->num_rows() > 0)
{
   foreach ($query->result() as $row)
   {
   	$sql = "insert into t_report_risk(periode_id, risk_id)
			values('".$row2->periode_id."' ,'".$row->risk_id."' )
				";
		$res = $this->db->query($sql);
   }
} 
		

		return $res;
	}

	// ACTION PLAN PERIODE
	public function getDataReport($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		
		$sql = "select 
				a.*,
				date_format(a.periode_start, '%d-%m-%Y') as periode_start_v,
				date_format(a.periode_end, '%d-%m-%Y') as periode_end_v
				from m_periode_report a "
				.$ex_filter
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'periode_id', true);
		return $res;
	}

	public function updateDataReport($data_id, $data, $uid)
	{
		// if year month start is >= next month
		// if year month periode is overlapping with existing data
		
		$this->_logHistoryPlan($data_id, $uid, 'U');
		
		$sql = "update m_periode_report
				set periode_name = ?, periode_start = ?, periode_end = ?
					
				where periode_id = ?
				";
		$par = $data;
		
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}

	public function validatePeriodeDeleteReport($periode_start, $periode_end) {
		/* TODO : Validation for delete */
		$resp_arr = array('status' => true, 'msg' => null);
		return $resp_arr;
	}

	public function deleteDataReport($data_id, $uid)
	{
		// if year month start is <= current month
		
		$this->_logHistoryPlan($data_id, $uid, 'D');
		
		$sql = "delete from m_periode_report
				where periode_id = ?
				";
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}


}