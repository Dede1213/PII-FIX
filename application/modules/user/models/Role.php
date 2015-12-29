<?php
class Role extends APP_Model {
	public function getData($page, $row, $order_by = null, $order = null, $filter_by = null, $filter_value = null)
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
		
		$sql = "select 
				a.*
				from m_role a "
				.$ex_filter
				.$ex_or;
		$res = $this->getPagingData($sql, $par, $page, $row, 'role_id', true);
		return $res;
	}
	
	public function getAll()
	{
		$sql = "select 
				*
				from m_role order by role_name ";
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
				a.*
				from m_role a where role_id = ?";
		$query = $this->db->query($sql, array('divid' => $id));
		$row = $query->row_array();
		return $row;
	}
	
	public function insertData($data)
	{
	
		$sql = "insert into m_role
				(role_name, created_by, created_date)
				values(?, ?, NOW())
				";
		$par = $data;
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function updateData($data_id, $data, $uid)
	{
		$this->_logHistory($data_id, $uid, 'U');
		
		$sql = "update m_role
				set role_name = ?, 
					created_by = ?, 
					created_date = NOW()
				where role_id = ?
				";
		$par = $data;
		$par['user_id'] = $uid;
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	public function deleteData($data_id, $uid)
	{
		$this->_logHistory($data_id, $uid, 'D');
		
		$sql = "delete from m_role_menu where role_id = ?";
		$query = $this->db->query($sql, array('par' => $data_id));
		
		$sql = "delete from m_role
				where role_id = ?
				";
		$par['data_id'] = $data_id;
		
		$res = $this->db->query($sql, $par);
		return $res;
	}
	
	private function _logHistory($data_id, $uid, $mode) {
		$sql = "insert into m_role_hist
				select a.*, 
					'".$mode."' as update_status, '".$uid."' as update_by, NOW() as update_date
				from m_role a
				where a.role_id = ?
				";
		$this->db->query($sql, array('did'=>$data_id));	
	}
	
	public function getRecursiveMenu($par_id) {
		$sql = "select * from m_menu where menu_id > 22 and menu_parent = ? order by menu_order";
		$query = $this->db->query($sql, array('par' => $par_id));
		
		$menu = false;
		foreach($query->result_array() as $row) {
			$rec = $this->getRecursiveMenu($row['menu_id']);
			$menu[$row['menu_id']] = array(
				'menu' => $row,
				'child' => $rec
			);
		}
		return $menu;
	}
	
	public function buildRecursiveMenu($menu, $assignedMenu) {
		$node_arr  = array();
		
		/*
			{
			  id          : "string" // will be autogenerated if omitted
			  text        : "string" // node text
			  icon        : "string" // string for custom
			  state       : {
			    opened    : boolean  // is the node open
			    disabled  : boolean  // is the node disabled
			    selected  : boolean  // is the node selected
			  },
			  children    : []  // array of strings or objects
			  li_attr     : {}  // attributes for the generated LI node
			  a_attr      : {}  // attributes for the generated A node
			}
		*/
		
		foreach($menu as $mitem) {
			if ($mitem['child']) {
				$child_arr = $this->buildRecursiveMenu($mitem['child'], $assignedMenu);
			} else {
				$child_arr =  array();
			}
			$vbol = in_array($mitem['menu']['menu_id'], $assignedMenu) ? true : false;
			$node_arr[]  = array(
				'id' => $mitem['menu']['menu_id'],
				'text' => $mitem['menu']['menu_name'],
				'state' => array( 
					'opened' => true,
					'selected' => $vbol
				),
				'children' => $child_arr
			);
		}
		return $node_arr;
	}
	
	public function getRoleMenu($role_id) {
		$sql = "select * from m_role_menu a where role_id = ? ";
		$query = $this->db->query($sql, array('par' => $role_id));
		$arr = array();
		foreach($query->result_array() as $row) {
			$arr[] = $row['menu_id'];
		}
		return $arr;
	}
	
	public function roleAssignMenu($role_id, $menu_id) {
		$sql = "delete from m_role_menu where role_id = ?";
		$query = $this->db->query($sql, array('par' => $role_id));
		
		foreach ($menu_id as $key => $value) {
			$sql = "insert into m_role_menu(role_id, menu_id) values(?, ?)";
			$query = $this->db->query($sql, array('rid' => $role_id, 'mid' => $value));
		}
		
		return true;
	}
}