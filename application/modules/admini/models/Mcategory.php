<?php
class Mcategory extends APP_Model {
	public function getDataById($id)
	{
		$sql = "select 
				a.*
				from m_risk_category a where a.cat_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function getSequence($id)
	{
		$sql = "select 
				seq
				from t_cat_sequence where cat_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		
		if (!$row) {
			$sqls = "insert into t_cat_sequence values(?, 2)";
			$query2 = $this->db->query($sqls, array('divid' => $id));
			return '1';
		} 
		
		$sql = "update t_cat_sequence 
				set seq = seq+1
				where cat_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		return $row['seq'];
	}
	
}