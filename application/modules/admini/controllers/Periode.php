<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends APP_Controlleri {
	public $month_list = array(
		'Januari', 'Februari', 'Maret', 'April',
		'Mei', 'Juni', 'Juli', 'Agustus',
		'September', 'Oktober', 'November', 'Desember'
	);
	
	public function index()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/admini/periode');
		$data['engnya'] = base_url('index.php/admin/periode');		
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('admini/periode');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		';
//		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/scripts/admin/periode.js"></script>
		';
//		<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		
		$data['pageLevelScriptsInit'] = 'Periode.init();';
		
		$this->load->view('maini/header', $data);
		$this->load->view('periode', $data);
		$this->load->view('main/footer', $data);
	}
	
	public function periodeGetData()
	{
		$order_by = $order = $filter_by = $filter_value = null;
		
		if (isset($_POST['order'][0]['column'])) {
			$order_idx = $_POST['order'][0]['column'];
			$order_by = $_POST['columns'][$order_idx]['data'];
			$order = $_POST['order'][0]['dir'];
		}
		
		if (isset($_POST['filter_by']) && isset($_POST['filter_value']) && $_POST['filter_value'] != '' ) {
			$filter_by = $_POST['filter_by'];
			$filter_value = $_POST['filter_value'];
		}
		
		$page = ceil($_POST['start'] / $_POST['length'])+1;

		$row = $_POST['length'];
		$this->load->model('admin/mperiode');
		$data = $this->mperiode->getData($page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function periodeInsertData()
	{
		$session_data = $this->session->credential;
	
		$this->load->model('admin/mperiode');
		
		$dints = implode('-', array_reverse( explode('-', $_POST['periode_start']) ) );
		$dinte = implode('-', array_reverse( explode('-', $_POST['periode_end']) ) );
		
		$par['periode_name'] = $_POST['periode_name'];
		$par['periode_start'] = $dints;
		$par['periode_end'] = $dinte;
		$par['created_by'] = $session_data['username'];
		
		$val = $this->mperiode->validatePeriode($par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->insertData($par);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = $this->db->error();
			}
		}
		
		echo json_encode($data);
	}
	
	public function periodeEditData()
	{
		$session_data = $this->session->credential;
		
		$this->load->model('admin/mperiode');
		
		$dints = implode('-', array_reverse( explode('-', $_POST['periode_start']) ) );
		$dinte = implode('-', array_reverse( explode('-', $_POST['periode_end']) ) );
		
		$par['periode_name'] = $_POST['periode_name'];
		$par['periode_start'] = $dints;
		$par['periode_end'] = $dinte;
		
		$val = $this->mperiode->validatePeriode($par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->updateData($_POST['periode_id'], $par, $session_data['username']);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = $this->db->error();
			}
		}
		
		echo json_encode($data);
	}
	
	public function periodeDeleteData() {
		$session_data = $this->session->credential;
		$this->load->model('admin/mperiode');
		$par = $this->mperiode->getDataById($_POST['id']);
		
		$val = $this->mperiode->validatePeriodeDelete( $par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->deleteData($_POST['id'], $session_data['username']);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
		}
		
		
		echo json_encode($data);
	}
	
	/* Periode Action Plan */
	public function actplan()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('admini/periode/actplan');
		$data['indonya'] = base_url('index.php/admini/periode/actplan');
		$data['engnya'] = base_url('index.php/admin/periode/actplan');		
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		';
//		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/scripts/admin/periode_plan.js"></script>
		';
//		<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		
		$data['pageLevelScriptsInit'] = 'Periode.init();';
		
		$this->load->view('maini/header', $data);
		$this->load->view('periode_plan', $data);
		$this->load->view('main/footer', $data);
	}
	
	public function periodePlanGetData()
	{
		$order_by = $order = $filter_by = $filter_value = null;
		
		if (isset($_POST['order'][0]['column'])) {
			$order_idx = $_POST['order'][0]['column'];
			$order_by = $_POST['columns'][$order_idx]['data'];
			$order = $_POST['order'][0]['dir'];
		}
		
		if (isset($_POST['filter_by']) && isset($_POST['filter_value']) && $_POST['filter_value'] != '' ) {
			$filter_by = $_POST['filter_by'];
			$filter_value = $_POST['filter_value'];
		}
		
		$page = ceil($_POST['start'] / $_POST['length'])+1;

		$row = $_POST['length'];
		$this->load->model('admin/mperiode');
		$data = $this->mperiode->getDataPlan($page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function periodePlanInsertData()
	{
		$session_data = $this->session->credential;
	
		$this->load->model('admin/mperiode');
		
		$dints = implode('-', array_reverse( explode('-', $_POST['periode_start']) ) );
		$dinte = implode('-', array_reverse( explode('-', $_POST['periode_end']) ) );
		
		$par['periode_name'] = $_POST['periode_name'];
		$par['periode_start'] = $dints;
		$par['periode_end'] = $dinte;
		$par['created_by'] = $session_data['username'];
		
		$val = $this->mperiode->validatePeriodePlan($par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->insertDataPlan($par);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = $this->db->error();
			}
		}
		
		echo json_encode($data);
	}
	
	public function periodePlanEditData()
	{
		$session_data = $this->session->credential;
		
		$this->load->model('admin/mperiode');
		
		$dints = implode('-', array_reverse( explode('-', $_POST['periode_start']) ) );
		$dinte = implode('-', array_reverse( explode('-', $_POST['periode_end']) ) );
		
		$par['periode_name'] = $_POST['periode_name'];
		$par['periode_start'] = $dints;
		$par['periode_end'] = $dinte;
		
		$val = $this->mperiode->validatePeriodePlan($par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->updateDataPlan($_POST['periode_id'], $par, $session_data['username']);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = $this->db->error();
			}
		}
		
		echo json_encode($data);
	}
	
	public function periodePlanDeleteData() {
		$session_data = $this->session->credential;
		$this->load->model('admin/mperiode');
		$par = $this->mperiode->getDataByIdPlan($_POST['id']);
		
		$val = $this->mperiode->validatePeriodeDeletePlan( $par['periode_start'], $par['periode_end']);
		if (!$val['status']) {
			$data['success'] = false;
			$data['msg'] = $val['msg'];
		} else {
			$res = $this->mperiode->deleteDataPlan($_POST['id'], $session_data['username']);
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
		}
		
		
		echo json_encode($data);
	}
}







