<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends APP_Controller {
	private function dashboardRoute($role_id){
		if ($role_id == 2) {
			redirect($this->config->config['app_config']['DASHBOARD_RAC']);
			exit;
		} else if ($role_id == 3) {
			redirect($this->config->config['app_config']['DASHBOARD_USER']);
			exit;
		} else if ($role_id == 4 || $role_id == 5) {
			redirect($this->config->config['app_config']['DASHBOARD_PIC']);
			exit;
		} else {
			redirect($this->config->config['app_config']['DASHBOARD_USER']);
			exit;
		}
	}
		
	public function index()
	{
		if ($this->session->credential['role_id'] != '3' && $this->session->credential['role_id'] != '1') {
			$this->dashboardRoute($this->session->credential['role_id']);
		}
		if ($this->session->credential['role_id'] == '3'){
			$user= $this->session->credential['username'];
			$sql = "select display_name from m_user where username='$user' and display_name='new' ";
			$this->load->database();
			$rs = $this->db->query($sql);
			if ($rs->num_rows() > 0){
					//$this->load->view('userbaru');
					//echo"$rs";
					echo"<script type='text/javascript'>alert('Thank You $user, Your Account Has Been Created, Please Inform the RAC Team to Make Your Account Active!');document.location = '../index.php'</script>";	
			}
		}
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/maini');
		$data['engnya'] = base_url('index.php/main');	
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		';
		/*
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		<script src="assets/scripts/dashboard/main_user.js"></script>
		';
		
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

		<script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
		<script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
		<script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>

		<script src="assets/scripts/dashboard/main_user.js"></script>
		';
		
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

		<script src="assets/scripts/highcharts-custom.js" type="text/javascript"></script>
		<script src="assets/scripts/dashboard/main_user.js"></script>
		';
		*/
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		<script src="assets/scripts/dashboard/main_user.js"></script>
		';
		
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		Dashboard.initUserChart();
		';
		
		$this->load->model('admin/mperiode');
		$periode = $this->mperiode->getCurrentPeriode();
		$data['adhoc_button'] = true;
		if ($periode) $data['adhoc_button'] = false;
		
		
		
		$this->load->view('header', $data);
		$this->load->view('main', $data);
		$this->load->view('footer', $data);
		
	}
	
	public function getSummaryCount() {
		$this->load->model('risk/risk');
		
		$defFilter = array(
			'userid' => $this->session->credential['username']
		);
		
		$data = $this->risk->getSummaryCount('riskLevel', $defFilter);
		$tmp = array();
		foreach($data as $row) {
			$tmp[$row['risk_level']] = $row['numcount'];
		}
		
		$high = isset($tmp['HIGH']) ? $tmp['HIGH'] : 0;
		$moderate = isset($tmp['MODERATE']) ? $tmp['MODERATE'] : 0;
		$low = isset($tmp['LOW']) ? $tmp['LOW'] : 0;
		
		$resp = array(
			array('data' => array(array($high, "Tinggi"))),
			array('data' => array(array($moderate, "Sedang"))),
			array('data' => array(array($low, "Rendah")))
		);
		
		echo json_encode($resp);
	}
	
	public function getMyRiskRegister() {
		$sess = $this->loadDefaultAppConfig();
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
		$this->load->model('risk/risk');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		
		if (isset($_POST['risk_cat']) && $_POST['risk_cat'] != '') {
			$defFilter['risk_cat'] = $_POST['risk_cat'];
		}
		$data = $this->risk->getDataMode('allRiskByOwner', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function viewRisk($rid = false) {
		if ($rid && is_numeric($rid)) {
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/maini');
			$data['engnya'] = base_url('index.php/main');			
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
			$data['pageLevelStyles'] = '';
			$data['pageLevelScripts'] = '';
			$data['pageLevelScriptsInit'] = '';
			
			$data['valid_mode'] = false;
			
			$this->load->model('risk/risk');
			$cred = $this->session->credential;
			
			$risk = $this->risk->getRiskValidate('viewMyRisk', $rid, $cred);
			if ($risk) {
				$data['valid_mode'] = true;
				$data['risk'] = $risk;
			}
			
			$this->load->view('main/header', $data);
			$this->load->view('risk/risk_register_view', $data);
			$this->load->view('main/footer', $data);
		}
	}
	
	public function getMyChangeRequest() {
		$sess = $this->loadDefaultAppConfig();
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
		$this->load->model('risk/risk');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		
		if (isset($_POST['risk_cat']) && $_POST['risk_cat'] != '') {
			$defFilter['risk_cat'] = $_POST['risk_cat'];
		}
		$data = $this->risk->getDataMode('allChangeByOwner', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
}
