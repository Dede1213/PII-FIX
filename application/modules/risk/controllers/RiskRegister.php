<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiskRegister extends APP_Controller {
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/mperiode');
        $this->load->model('risk/risk');
        $this->load->model('risk/mriskregister');
    }
	
	public function index()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('risk/RiskRegister');
		$data['indonya'] = base_url('index.php/riski/RiskRegister/');
		$data['engnya'] = base_url('index.php/risk/RiskRegister/');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		
		<script src="assets/scripts/risk/risklist.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'RiskList.init();';
		
		$data['valid_mode'] = $this->validatePeriodeMode('periodic');
		
		$data['periode'] = null;
		if ($data['valid_mode']) {
			$data['periode'] = $this->mperiode->getCurrentPeriode();
		}
		
		
		$this->load->view('main/header', $data);
		$this->load->view('risk_register_list', $data);
		$this->load->view('main/footer', $data);
	}

	public function ChangeRequestRac($username)
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('risk/RiskRegister');
		$data['indonya'] = base_url('index.php/riski/RiskRegister/');
		$data['engnya'] = base_url('index.php/risk/RiskRegister/');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		
		<script src="assets/scripts/risk/risklist_change_rac.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'RiskList.init();';
		
		$data['valid_mode'] = $this->validatePeriodeMode('periodic');
		
		$data['periode'] = null;
		if ($data['valid_mode']) {
			$data['periode'] = $this->mperiode->getCurrentPeriode();
		}

		$data['username'] = $username;
		
		
		$this->load->view('main/header', $data);
		$this->load->view('risk_register_list_change_rac', $data);
		$this->load->view('main/footer', $data);
	}
	//ubah
	public function undermaintenance()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('risk/RiskRegister');
		$data['indonya'] = base_url('index.php/riski/RiskRegister/undermaintenance');
		$data['engnya'] = base_url('index.php/risk/RiskRegister/undermaintenance');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		
		<script src="assets/scripts/risk/risklist_under.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'RiskList.init();';
		
		$data['valid_mode'] = $this->validatePeriodeMode('periodic');
		
		$data['periode'] = null;
		if ($data['valid_mode']) {
			$data['periode'] = $this->mperiode->getCurrentPeriode();
		}
		
		
		$this->load->view('main/header', $data);
		$this->load->view('risk_register_list_under', $data);
		$this->load->view('main/footer', $data);
	}
//ubah 
	public function riskGetRollOver_under()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover_under', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	//ubah 
	public function riskGetRollOver_under2()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover_under2', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	//ubah 
	public function riskGetRollOver_under3()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover_under3', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	//ubah

	public function confirmRisk_under() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			
			$periode = $this->mperiode->getCurrentPeriode();
			$periode_id = null;
			if ($periode) {
				$periode_id = $periode['periode_id'];
			}
			
			$data['periode_id'] = $periode_id;
			
			$res = $this->risk->riskSetConfirm_under($_POST['risk_id'], $data, $session_data['username'], 'RISK_REGISTER-CONFIRM');
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}
		
		echo json_encode($resp);
	}

	public function recover()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('risk/RiskRegister');
		$data['indonya'] = base_url('index.php/riski/RiskRegister/recover');
		$data['engnya'] = base_url('index.php/risk/RiskRegister/recover');
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		
		<script src="assets/scripts/risk/risklist_recover.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'RiskList.init();';
		
		$data['valid_mode'] = $this->validatePeriodeMode('periodic');
		
		$data['periode'] = null;
		if ($data['valid_mode']) {
			$data['periode'] = $this->mperiode->getCurrentPeriode();
		}
		
		
		$this->load->view('main/header', $data);
		$this->load->view('risk_register_list_recover', $data);
		$this->load->view('main/footer', $data);
	}

	

	public function riskGetRollOver_recover()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover_recover', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	public function confirmRisk_recover() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			
			$periode = $this->mperiode->getCurrentPeriode();
			$periode_id = null;
			if ($periode) {
				$periode_id = $periode['periode_id'];
			}
			
			$data['periode_id'] = $periode_id;
			
			$res = $this->risk->riskSetConfirm_recover($_POST['risk_id'], $data, $session_data['username'], 'RISK_REGISTER-CONFIRM');
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}
		
		echo json_encode($resp);
	}

	private function validatePeriodeMode($mode) 
	{
		
		$periode = $this->mperiode->getCurrentPeriode();
		
		if ($mode == 'adhoc') {
			if ($periode) return false;
			else return true;
		} else if ($mode == 'periodic') {
			if ($periode) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
	
	public function RiskRegisterInput($mode = false)
	{
		$data = $this->loadDefaultAppConfig();
		$menu = '';
		
		if ($mode == 'adhoc') {
			$data['submit_mode'] = 'adhoc';
			$menu = 'main';
		} else if ($mode == 'periodic') {
			$data['submit_mode'] = 'periodic';
			$menu = 'risk/RiskRegister';
		} else {
			exit;
		}
		$data['indonya'] = base_url('index.php/riski/RiskRegister/');
		$data['engnya'] = base_url('index.php/risk/RiskRegister/');				
		$data['valid_mode'] = $this->validatePeriodeMode($data['submit_mode']);
		
		$data['sidebarMenu'] = $this->getSidebarMenuStructure($menu);
		$data['pageLevelStyles'] = '
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
		
		<script src="assets/scripts/risk/riskinput.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = "RiskInput.init('".$mode."');
		RiskInput.initLoadCategory();
		";
		
		
		$data['category'] = $this->mriskregister->getRiskCategory();
		$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
		$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
		$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
		$data['division_list'] = $this->mriskregister->getDivisionList();
		
		$this->load->view('main/header', $data);
		$this->load->view('risk_register_input', $data);
		$this->load->view('main/footer', $data);	
	}
	
	public function modifyRisk($risk_id = null)
	{
		$session_data = $this->session->credential;
		
		if (!empty($risk_id) && is_numeric($risk_id)) {
			$res = $this->risk->getRiskValidate('viewMyRisk', $risk_id, $session_data);
			
			if ($res) {
				$data = $this->loadDefaultAppConfig();
				$menu = '';
				
				if ($res['periode_id'] == '') {
					$data['submit_mode'] = 'adhoc';
					$menu = 'main';
				} else {
					$data['submit_mode'] = 'periodic';
					//$menu = 'risk/RiskRegister';
					$menu = 'main';
				}
				$data['indonya'] = base_url('index.php/maini/mainpic');
				$data['engnya'] = base_url('index.php/main/mainpic');				
				$data['valid_mode'] = true;
				
				$data['sidebarMenu'] = $this->getSidebarMenuStructure($menu);
				$data['pageLevelStyles'] = '
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
				
				';
				
				$data['pageLevelScripts'] = '
				<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
				<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
				
				<script src="assets/scripts/risk/riskinput.js"></script>
				<script src="assets/scripts/risk/riskmodify.js"></script>
				';
				
				$data['pageLevelScriptsInit'] = "RiskInput.init('".$data['submit_mode']."');
				RiskModify.init('".$data['submit_mode']."');
				";
				
				$data['modifyRisk'] = true;
				$data['risk_id'] = $risk_id;
				
				$data['category'] = $this->mriskregister->getRiskCategory();
				$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
				$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
				$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
				$data['division_list'] = $this->mriskregister->getDivisionList();
				
				$this->load->view('main/header', $data);
				$this->load->view('risk_register_input', $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function getCategory($parent) 
	{
		
		$data = $this->mriskregister->getRiskCategory($parent);
		echo json_encode($data);
		exit;
	}
	
	public function getRiskLevelList() 
	{
		$res = array();
		
		$data = $this->mriskregister->getRiskLevelList();
		if ($data) {
			foreach($data as $row) {
				$res[$row['ref_key']] = $row['ref_value'];
			}
		}
		echo json_encode($res);
		exit;
	}
	
	public function getImpactLevelReference() 
	{
		$res = array();
		
		$data = $this->mriskregister->getReference('impact.display');
		if ($data) {
			foreach($data as $row) {
				$res[$row['ref_key']] = $row['ref_value'];
			}
		}
		echo json_encode($res);
		exit;
	}
	
	public function getRiskLevelReference() 
	{
		$res = array();
		
		$data = $this->mriskregister->getReference('risklevel.display');
		if ($data) {
			foreach($data as $row) {
				$res[$row['ref_key']] = $row['ref_value'];
			}
		}
		echo json_encode($res);
		exit;
	}
	
	public function getRiskLibrary() 
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
		$this->load->model('risk/risk');
		$defFilter = array();
		if (isset($_POST['filter_library']) && trim($_POST['filter_library']) != '') {
			$defFilter['filter_library'] = trim($_POST['filter_library']);
		}
		
		$data = $this->risk->getDataMode('allRiskLibrary', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function getActionLibrary() 
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
		$this->load->model('risk/risk');
		$defFilter = array();
		if (isset($_POST['filter_library']) && trim($_POST['filter_library']) != '') {
			$defFilter['filter_library'] = trim($_POST['filter_library']);
		}
		
		$data = $this->risk->getDataMode('allActionLibrary', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function loadRiskLibrary($rid) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getRiskById($rid);
			echo json_encode($data);
		}
	}
	
	public function loadRiskLibraryChange($rid,$risk_input_by) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			
			$this->load->model('risk/risk');
			$data = $this->risk->getRiskChangeById($rid,$risk_input_by);
			echo json_encode($data);
		}
	}
	
	public function loadRiskForChange($rid, $aid = false) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getRiskById($rid);
			
			$ap_list = $data['action_plan_list'];
			$data['action_plan_list'] = false;
			
			foreach($ap_list as $k=>$vdata) {
				if ($aid && $aid != $vdata['id']) {
					continue;
				} else {
					if ($aid) {
						$vdata['change_flag'] = 'CHANGE';						
						$vdata['data_flag'] = NULL;
						$data['action_plan_list'][$k] = $vdata;
					} else {
						$vdata['change_flag'] = 'CHANGE';
						
						$vdata['data_flag'] = NULL;
						$stat = $vdata['action_plan_status'];
						$ass = $vdata['assigned_to'];
						if ( $stat > 0 && ($ass != '' && $ass != null )  ) {
							$vdata['data_flag'] = 'LOCKED';
						}
						
						$data['action_plan_list'][$k] = $vdata;
					}
				}
			}
			
			echo json_encode($data);
		}
	}

	public function loadRiskForChange2($rid, $aid = false) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getRiskByIdchanges($rid);
			
			$ap_list = $data['action_plan_list'];
			$data['action_plan_list'] = false;
			
			foreach($ap_list as $k=>$vdata) {
				if ($aid && $aid != $vdata['id']) {
					continue;
				} else {
					if ($aid) {
						$vdata['change_flag'] = 'CHANGE';						
						$vdata['data_flag'] = NULL;
						$data['action_plan_list'][$k] = $vdata;
					} else {
						$vdata['change_flag'] = 'CHANGE';
						
						$vdata['data_flag'] = NULL;
						$stat = $vdata['action_plan_status'];
						$ass = $vdata['assigned_to'];
						if ( $stat > 0 && ($ass != '' && $ass != null )  ) {
							$vdata['data_flag'] = 'LOCKED';
						}
						
						$data['action_plan_list'][$k] = $vdata;
					}
				}
			}
			
			echo json_encode($data);
		}
	}
	
	public function getControlLibrary() 
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
		$this->load->model('risk/risk');
		$defFilter = array();
		if (isset($_POST['filter_library']) && trim($_POST['filter_library']) != '') {
			$defFilter['filter_library'] = trim($_POST['filter_library']);
		}
		
		$data = $this->risk->getDataMode('allControlLibrary', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	public function getControlLibraryobjective() 
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
		$this->load->model('risk/risk');
		$defFilter = array();
		if (isset($_POST['filter_library']) && trim($_POST['filter_library']) != '') {
			$defFilter['filter_library'] = trim($_POST['filter_library']);
		}
		
		$data = $this->risk->getDataMode('allControlLibraryobjective', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	public function getControlLibraryexisting() 
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
		$this->load->model('risk/risk');
		$defFilter = array();
		if (isset($_POST['filter_library']) && trim($_POST['filter_library']) != '') {
			$defFilter['filter_library'] = trim($_POST['filter_library']);
		}
		
		$data = $this->risk->getDataMode('allControlLibraryExisting', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function loadControlLibrary($rid) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getControlById($rid);
			echo json_encode($data);
		}
	}

	public function loadControlLibraryobjective($rid) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getControlById3($rid);
			echo json_encode($data);
		}
	}

	public function loadControlLibraryexisting($rid) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getControlById2($rid);
			echo json_encode($data);
		}
	}
	
	public function loadactionLibrary($rid) 
	{
		if (!empty($rid) && is_numeric($rid)) {
			$this->load->model('risk/risk');
			$data = $this->risk->getActionById($rid);
			echo json_encode($data);
		}
	}
	
	public function riskGetRollOver()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	public function riskGetRollOver_change_rac($username)
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $username,
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('userRollover', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	
	public function riskGetDataUser()
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('user', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}


	public function riskGetDataUser_change_rac($username)
	{
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
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
		} 
		
		
		$defFilter = array(
			'userid' => $username,
			'periodid' => $periode_id
		);
		$data = $this->mriskregister->getDataMode('user', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function insertRiskData()
	{
		$data = $this->loadDefaultAppConfig();

		// periode
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = 0;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			$rstatus = 0;
		} else {
			$rstatus = 2;
		}
		
		// category
		$this->load->model('admin/mcategory');
		$cats = $this->mcategory->getDataById($_POST['risk_2nd_sub_category']);
		$seq_id = $this->mcategory->getSequence($_POST['risk_2nd_sub_category']);
		$code = $cats['cat_code'].'-'.$seq_id;
		
		if ($_POST['risk_library_id'] == '') $_POST['risk_library_id'] = null;
		
		// build data
		$risk = array(
			'risk_code' => $code,
			'risk_status' => $rstatus,
			'periode_id' => $periode_id,
			'risk_input_by' => $data['session']['username'],
			'risk_input_division' => $data['session']['division_id'],
			'risk_owner' => $_POST['risk_division'],
			'risk_division' => $_POST['risk_division'],
			'risk_library_id' => $_POST['risk_library_id'],
			'risk_event' => $_POST['risk_event'],
			'risk_description' => $_POST['risk_description'],
			'risk_category' => $_POST['risk_category'],
			'risk_sub_category' => $_POST['risk_sub_category'],
			'risk_2nd_sub_category' => $_POST['risk_2nd_sub_category'],
			'risk_cause' => $_POST['risk_cause'],
			'risk_impact' => $_POST['risk_impact'],
			//'existing_control_id' => $_POST['existing_control_id'],
			//'risk_existing_control' => $_POST['risk_existing_control'],
			//'risk_evaluation_control' => $_POST['risk_evaluation_control'],
			//'risk_control_owner' => $_POST['risk_control_owner'],
			'risk_level' => $_POST['risk_level_id'],
			'risk_impact_level' => $_POST['risk_impact_level_id'],
			'risk_likelihood_key' => $_POST['risk_likelihood_id'],
			'suggested_risk_treatment' => $_POST['suggested_risk_treatment'],
			'created_by' => $data['session']['username']
		);
		// array untuk dari library nih ubah
		$risk2 = array(
			'risk_code' => $_POST['risk_library_code'],
			'risk_status' => $rstatus,
			'periode_id' => $periode_id,
			'risk_input_by' => $data['session']['username'],
			'risk_input_division' => $data['session']['division_id'],
			'risk_owner' => $_POST['risk_division'],
			'risk_division' => $_POST['risk_division'],
			'risk_library_id' => $_POST['risk_library_id'],
			'risk_event' => $_POST['risk_event'],
			'risk_description' => $_POST['risk_description'],
			'risk_category' => $_POST['risk_category'],
			'risk_sub_category' => $_POST['risk_sub_category'],
			'risk_2nd_sub_category' => $_POST['risk_2nd_sub_category'],
			'risk_cause' => $_POST['risk_cause'],
			'risk_impact' => $_POST['risk_impact'],
			//'existing_control_id' => $_POST['existing_control_id'],
			//'risk_existing_control' => $_POST['risk_existing_control'],
			//'risk_evaluation_control' => $_POST['risk_evaluation_control'],
			//'risk_control_owner' => $_POST['risk_control_owner'],
			'risk_level' => $_POST['risk_level_id'],
			'risk_impact_level' => $_POST['risk_impact_level_id'],
			'risk_likelihood_key' => $_POST['risk_likelihood_id'],
			'suggested_risk_treatment' => $_POST['suggested_risk_treatment'],
			'created_by' => $data['session']['username']
		);
		
		$impact_level = array();
		foreach($_POST['impact'] as $v) {
			$impact_level[] = $v;
		}
		
		$actplan = array();
		foreach($_POST['actplan'] as $v) {
			$actplan[] = $v;
		}
		
		$control = array();
		foreach($_POST['control'] as $v) {
			$control[] = $v;
		}

		$objective = array();
		foreach($_POST['objective'] as $v) {
			$objective[] = $v;
		}
		
		if ($_POST['risk_library_id'] != null) {
			$res = $this->mriskregister->insertRiskRegisterLibrary($risk2, $code, $impact_level, $actplan, $control, $objective);
		} else {
			$res = $this->mriskregister->insertRiskRegister($risk, $code, $impact_level, $actplan, $control, $objective);
		}
		
		$resp = array();
		if ($res) {
			$resp['success'] = true;
			$resp['msg'] = 'SUCCESS';
		} else {
			$resp['success'] = false;
			$resp['msg'] = $this->db->error();
		}
		echo json_encode($resp);
	}
	
	public function confirmRisk() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			
			$periode = $this->mperiode->getCurrentPeriode();
			$periode_id = null;
			if ($periode) {
				$periode_id = $periode['periode_id'];
			}
			
			$data['periode_id'] = $periode_id;
			
			$res = $this->risk->riskSetConfirm($_POST['risk_id'], $data, $session_data['username'], 'RISK_REGISTER-CONFIRM');
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}
		
		echo json_encode($resp);
	}
	
	public function draftRisk() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$data = array();
			
			$res = $this->risk->riskSetDraft($_POST['risk_id'], $data, $session_data['username'], 'RISK_REGISTER-SETDRAFT');
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}
		
		echo json_encode($resp);
	}
	
	public function draftRiskByPeriode() {
		$session_data = $this->session->credential;
		$resp = array('success' => false, 'msg' => 'Error');
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			
			$data = array();
			
			$res = $this->risk->riskSetDraftByPeriode($periode_id, $session_data['username']);
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}

		echo json_encode($resp);
	}
	
	public function submitRiskByPeriode() {
		$session_data = $this->session->credential;
		$resp = array('success' => false, 'msg' => 'Error');
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			
			$data = array();
			
			$res = $this->risk->riskSetSubmitByPeriode($periode_id, $session_data['username']);
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}

		echo json_encode($resp);
	}

	public function submitRiskByPeriode2() {
		$session_data = $this->session->credential;
		$resp = array('success' => false, 'msg' => 'Error');
		
		$periode = $this->mperiode->getCurrentPeriode();
		$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			
			$data = array();
			
			$res = $this->risk->riskSetSubmitByPeriode2($periode_id, $session_data['username']);
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}

		echo json_encode($resp);
	}

	public function submitRiskByPeriode2_change($user) {
		$session_data = $this->session->credential;
		$resp = array('success' => false, 'msg' => 'Error');
		
		$periode = $this->mperiode->getCurrentPeriode();
		//$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			
			$data = array();
			
			$res = $this->risk->riskSetSubmitByPeriode2_change($periode_id, $user);
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}

		echo json_encode($resp);
	}

	public function submitRiskByPeriode2_ignore($user) {
		$session_data = $this->session->credential;
		$resp = array('success' => false, 'msg' => 'Error');
		
		$periode = $this->mperiode->getCurrentPeriode();
		//$periode_id = null;
		if ($periode) {
			$periode_id = $periode['periode_id'];
			
			$data = array();
			
			$res = $this->risk->riskSetSubmitByPeriode2_ignore($periode_id, $user);
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			}
		}

		echo json_encode($resp);
	}
	
	public function deleteRisk() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$data = array();
			
			$res = $this->risk->getRiskValidate('viewMyRisk', $_POST['risk_id'], $session_data);
			
			if ($res && $res['risk_status'] >= '0') {
				$res = $this->risk->deleteRisk($_POST['risk_id'], $session_data['username'], 'RISK_EXERCISE-DELETE');
				
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			} else {
				$resp['msg'] = 'You Cannot Delete This Risk';
			}
		}
		
		echo json_encode($resp);
	}
	//ubah under
	public function deleteRisk_under() {
		$session_data = $this->session->credential;
		
		$resp = array('success' => false, 'msg' => 'Error');

		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$data = array();
			
			//$res = $this->risk->getRiskValidate('viewMyRisk', $_POST['risk_id'], $session_data);
			
			
				$res = $this->risk->deleteRisk_under($_POST['risk_id'], $session_data['username'], 'RISK_EXERCISE-DELETE');
				
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			
		}
		
		echo json_encode($resp);
	}
	
	public function modifyRiskData()
	{
		$resp['success'] = false;
		$resp['msg'] = '';
		
		$data = $this->loadDefaultAppConfig();
		$cred = $this->session->credential;
		
		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$risk = $this->risk->getRiskValidate('viewMyRisk', $_POST['risk_id'], $cred);
			if ($risk) {
				// category
				if ($risk['risk_2nd_sub_category'] != $_POST['risk_2nd_sub_category']) {
					$this->load->model('admin/mcategory');
					$cats = $this->mcategory->getDataById($_POST['risk_2nd_sub_category']);
					$seq_id = $this->mcategory->getSequence($_POST['risk_2nd_sub_category']);
					$code = $cats['cat_code'].'-'.$seq_id;
				} else {
					$code = $_POST['risk_code'];
				}
				
				if ($_POST['risk_library_id'] == '') $_POST['risk_library_id'] = null;
				
				// build data
				$risk = array(
					'risk_code' => $code,
					'risk_input_by' => $data['session']['username'],
					'risk_input_division' => $data['session']['division_id'],
					'risk_owner' => $_POST['risk_division'],
					'risk_division' => $_POST['risk_division'],
					'risk_library_id' => $_POST['risk_library_id'],
					'risk_event' => $_POST['risk_event'],
					'risk_description' => $_POST['risk_description'],
					'risk_category' => $_POST['risk_category'],
					'risk_sub_category' => $_POST['risk_sub_category'],
					'risk_2nd_sub_category' => $_POST['risk_2nd_sub_category'],
					'risk_cause' => $_POST['risk_cause'],
					'risk_impact' => $_POST['risk_impact'],
					'risk_level' => $_POST['risk_level_id'],
					'risk_impact_level' => $_POST['risk_impact_level_id'],
					'risk_likelihood_key' => $_POST['risk_likelihood_id'],
					'suggested_risk_treatment' => $_POST['suggested_risk_treatment'],
					'created_by' => $data['session']['username']
				);
				
				$impact_level = array();
				foreach($_POST['impact'] as $v) {
					$impact_level[] = $v;
				}
				
				$actplan = array();
				foreach($_POST['actplan'] as $v) {
					$actplan[] = $v;
				}
				
				$control = array();
				foreach($_POST['control'] as $v) {
					$control[] = $v;
				}
				
				$res = $this->risk->updateRisk($_POST['risk_id'], $code, $risk, $impact_level, $actplan, $control, $data['session']['username'], 'RISK_REGISTER-MODIFY');
				
				$resp = array();
				if ($res) {
					$resp['success'] = true;
					$resp['msg'] = 'SUCCESS';
				} else {
					$resp['success'] = false;
					$resp['msg'] = $this->db->error();
				}
			} else {
				$resp['msg'] = 'You Are Not Allowed to Modify this Risk';
			}
			echo json_encode($resp);
		}
	}
	
	public function ChangeRequestInput($risk_id)
	{
		$session_data = $this->session->credential;
		
		if (!empty($risk_id) && is_numeric($risk_id)) {
		
			$res = $this->risk->getRiskValidate('viewMyRisk', $risk_id, $session_data);
			
			if ($res) {
				$data = $this->loadDefaultAppConfig();
				
				$res_valid = $this->risk->getRiskValidate('valEntryRiskChange', $risk_id, $session_data);
				$data['valid_entry'] = false;

				if ($res_valid) {
					$data['valid_entry'] = true;
				}
				
				$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
				$data['indonya'] = base_url('index.php/riski/RiskRegister/ChangeRequestInput');
				$data['engnya'] = base_url('index.php/risk/RiskRegister/ChangeRequestInput');				
				$data['pageLevelStyles'] = '
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
				';
				
				$data['pageLevelScripts'] = '
				<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
				<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
				
				<script src="assets/scripts/risk/cr_riskregister.js"></script>
				';
				
				if ($res_valid) {
					$data['pageLevelScriptsInit'] = 'ChangeRequest.init();';
					
					$data['risk_id'] = $risk_id;
					$data['change_type'] = 'Risk Form';
					
					$data['category'] = $this->mriskregister->getRiskCategory();
					$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
					$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
					$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
					$data['division_list'] = $this->mriskregister->getDivisionList();
				}
				
				$this->load->view('main/header', $data);
				$this->load->view('change_request_input', $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function submitChangeRisk()
	{
		$session_data = $this->session->credential;
		if (isset($_POST['risk_id'])) {
			// build data
			if ($_POST['change_type'] == 'Risk Form') {
				$risk = array(
					'cr_type' => $_POST['change_type'],
					'risk_id' => $_POST['risk_id'],
					'risk_cause' => $_POST['risk_cause'],
					'risk_impact' => $_POST['risk_impact'],
					'risk_level' => $_POST['risk_level_id'],
					'risk_impact_level' => $_POST['risk_impact_level_id'],
					'risk_likelihood_key' => $_POST['risk_likelihood_id'],
					'suggested_risk_treatment' => $_POST['suggested_risk_treatment'],
					'created_by' => $session_data['username'],
					'risk_event' => $_POST['risk_event'],
					'risk_description' => $_POST['risk_description']
				);
			}
			
			if ($_POST['change_type'] == 'Risk Owner Form') {
				$drisk = $this->risk->getRiskByIdNoRef($_POST['risk_id']);
				$risk = array(
					'cr_type' => $_POST['change_type'],
					'risk_id' => $_POST['risk_id'],
					'risk_cause' => $drisk['risk_cause'],
					'risk_impact' => $drisk['risk_impact'],
					'risk_level' => $_POST['risk_level_id'],
					'risk_impact_level' => $_POST['risk_impact_level_id'],
					'risk_likelihood_key' => $_POST['risk_likelihood_id'],
					'suggested_risk_treatment' => $_POST['suggested_risk_treatment'],
					'created_by' => $session_data['username'],
					'risk_event' => $_POST['risk_event'],
					'risk_description' => $_POST['risk_description']
				);
			}
			
			if ($_POST['change_type'] == 'Action Plan Form') {
				$drisk = $this->risk->getRiskByIdNoRef($_POST['risk_id']);
				$risk = array(
					'cr_type' => $_POST['change_type'],
					'risk_id' => $_POST['risk_id'],
					'risk_cause' => $drisk['risk_cause'],
					'risk_impact' => $drisk['risk_impact'],
					'risk_level' => $drisk['risk_level'],
					'risk_impact_level' => $drisk['risk_impact_level'],
					'risk_likelihood_key' => $drisk['risk_likelihood_key'],
					'suggested_risk_treatment' => $drisk['suggested_risk_treatment'],
					'created_by' => $session_data['username'],
					'risk_event' => $_POST['risk_event'],
					'risk_description' => $_POST['risk_description']
				);
			}
			
			$impact_level = array();
			foreach($_POST['impact'] as $v) {
				$impact_level[] = $v;
			}
			
			$actplan = array();
			foreach($_POST['actplan'] as $v) {
				$actplan[] = $v;
			}
			
			$control = array();
			foreach($_POST['control'] as $v) {
				$control[] = $v;
			}
			
			$objective = array();
			foreach($_POST['objective'] as $v) {
				$objective[] = $v;
			}

			$res = $this->risk->insertChangeRequest($risk, $impact_level, $actplan, $control, $objective);
			
			$resp = array();
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			} else {
				$resp['success'] = false;
				$resp['msg'] = $this->db->error();
			}
			echo json_encode($resp);
		}
	}
	
	public function ChangeRequestView($risk_id)
	{
		$session_data = $this->session->credential;
		
		if (!empty($risk_id) && is_numeric($risk_id)) {
			
			$res = $this->risk->getRiskValidate('viewMyChange', $risk_id, $session_data);
			if ($res) {
				
				$data = $this->loadDefaultAppConfig();
				$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
				$data['indonya'] = base_url('index.php/maini');
				$data['engnya'] = base_url('index.php/main');				
				$data['pageLevelStyles'] = '';
				
				if ($res['cr_type'] == 'KRI Form')  {
					$kri = $this->risk->getKriById($res['risk_cause']);
					$data['kri'] = $kri;
					$risk = $this->risk->getRiskById($kri['risk_id']);
					$data['risk'] = $risk;
					
					$data['change'] = $res;
					
					$data['pageLevelScripts'] = '';
					$data['pageLevelScriptsInit'] = '';
					$v = 'change_request_kri';
				} else {
					$data['pageLevelScripts'] = '
					<script src="assets/scripts/risk/cr_riskregister_view.js"></script>
					';
					$data['pageLevelScriptsInit'] = 'ChangeRequest.init();';
					$v = 'change_request_view';
				}
				
				$data['change_id'] = $risk_id;
				$data['change_type'] = $res['cr_type'];
				$data['change_code'] = $res['cr_code'];
				$data['change_status'] = $res['cr_status'];
				
				$this->load->view('main/header', $data);
				$this->load->view($v, $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function loadChangeRequest($mode, $rid) {
		if (!empty($rid) && is_numeric($rid)) {
			$data = array();
			if ($mode == 'primary') {
				$data = $this->risk->getChangeById($rid, false);
			}
			
			if ($mode == 'changes') {
				$data = $this->risk->getChangeById($rid, true);
			}
			
			echo json_encode($data);
		}
	}
	
	public function ChangeRequestOwned($risk_id)
	{
		$session_data = $this->session->credential;
		
		if (!empty($risk_id) && is_numeric($risk_id)) {
		
			$res = $this->risk->getRiskValidate('viewRiskByDivision', $risk_id, $session_data);
			
			if ($res) {
				$data = $this->loadDefaultAppConfig();
				
				$res_valid = $this->risk->getRiskValidate('valEntryRiskChange', $risk_id, $session_data);
				$data['valid_entry'] = false;

				if ($res_valid) {
					$data['valid_entry'] = true;
				}
				$data['indonya'] = base_url('index.php/maini/mainpic');
				$data['engnya'] = base_url('index.php/main/mainpic');				
				$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
				$data['pageLevelStyles'] = '
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
				';
				
				$data['pageLevelScripts'] = '
				<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
				<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
				
				<script src="assets/scripts/risk/cr_riskregister.js"></script>
				';
				
				if ($res_valid) {
					$data['pageLevelScriptsInit'] = 'ChangeRequest.init();';
					
					$data['risk_id'] = $risk_id;
					$data['change_type'] = 'Risk Owner Form';
					
					$data['category'] = $this->mriskregister->getRiskCategory();
					$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
					$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
					$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
					$data['division_list'] = $this->mriskregister->getDivisionList();
				}
				
				$this->load->view('main/header', $data);
				$this->load->view('change_request_input', $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function ChangeRequestAction($act_id)
	{
		
		$session_data = $this->session->credential;
		$action = $this->risk->getActionPlanById($act_id);
		
		if ($action && !empty($act_id) && is_numeric($act_id)) {
			$risk_id = $action['risk_id'];
			
			$res = $this->risk->getRiskValidate('viewRiskByDivision', $risk_id, $session_data);

			if ($res) {
				$data = $this->loadDefaultAppConfig();
				$res_valid = $this->risk->getRiskValidate('valEntryActionChange', $act_id, $session_data);				
				$data['valid_entry'] = false;

				if ($res_valid) {
					$data['valid_entry'] = true;
				}
				
				$data['sidebarMenu'] = $this->getSidebarMenuStructure('main/mainpic');
				$data['indonya'] = base_url('index.php/maini/mainpic');
				$data['engnya'] = base_url('index.php/main/mainpic');					
				$data['pageLevelStyles'] = '
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
				<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
				<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
				';
				
				$data['pageLevelScripts'] = '
				<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
				<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
				<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
				<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
				
				<script src="assets/scripts/risk/cr_riskregister.js"></script>
				';
				
				if ($res_valid) {
					$data['pageLevelScriptsInit'] = 'ChangeRequest.init();';
					
					$data['risk_id'] = $risk_id;
					$data['act_id'] = $act_id;
					$data['change_type'] = 'Action Plan Form';
					
					$data['category'] = $this->mriskregister->getRiskCategory();
					$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
					$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
					$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
					$data['division_list'] = $this->mriskregister->getDivisionList();
					
				}
				
				$this->load->view('main/header', $data);
				$this->load->view('change_request_input', $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function ChangeRequestKri($rid)
	{
		if ($rid && is_numeric($rid)) {
			// check mode
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/maini/mainpic');
			$data['engnya'] = base_url('index.php/main/mainpic');				
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
			$data['pageLevelStyles'] = '
			<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
			<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
			';
			$data['pageLevelScripts'] = '
			<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
			<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
			<script src="assets/scripts/risk/cr_riskregister_kri.js"></script>';
			$data['pageLevelScriptsInit'] = 'ChangeRequest.init();';
			
			$data['valid_mode'] = false;
			
			$this->load->model('risk/risk');
			$cred = $this->session->credential;
			
			$kri = $this->risk->getKriById($rid);

			if ($kri && $kri['kri_owner'] == $cred['division_id']) {
				
				$data['kri'] = $kri;
				$risk = $this->risk->getRiskById($kri['risk_id']);
				$data['risk'] = $risk;
				$data['input'] = true;
				$view = 'risk/change_request_kri';
				$this->load->view('main/header', $data);
				$this->load->view($view, $data);
				$this->load->view('main/footer', $data);
			}
		}
	}
	
	public function submitChangeKri()
	{
		$session_data = $this->session->credential;
		if (isset($_POST['risk_id'])) {
			// build data
			$drisk = $this->risk->getRiskByIdNoRef($_POST['risk_id']);
			
			$kri = $this->risk->getKriById($_POST['kri_id']);
			$kri_warning = null;
			$report = $_POST['owner_report'];
			
			if ($kri['treshold_type'] == 'SELECTION') {
				
				foreach ($kri['treshold_list'] as $key => $value) {
					if ($value['value_1'] == $_POST['owner_report']) {
						$kri_warning = $value['result'];
					}
				}
			} else {
				$tt = 'NUMERIC';
				if ($report <= 100) $tt = 'PERCENTAGE';
				
				foreach ($kri['treshold_list'] as $key => $value) {
					if ($value['value_type'] == $tt && $value['operator'] == 'BELOW'
						&& $report < $value['value_1'] ) {
						$kri_warning = $value['result'];
					}
					
					if ($value['value_type'] == $tt && $value['operator'] == 'BETWEEN' 
						&& ($report >= $value['value_1'] && $report <= $value['value_2']) ) {
						$kri_warning = $value['result'];
					}
					
					if ($value['value_type'] == $tt && $value['operator'] == 'ABOVE'
						&& $report > $value['value_1'] ) {
						$kri_warning = $value['result'];
					}
				}
			}
			
			
			$risk = array(
				'cr_type' => 'KRI Form',
				'risk_id' => $_POST['risk_id'],
				'risk_cause' => $_POST['kri_id'],
				'risk_impact' => $report,
				'risk_level' => $kri_warning,
				'risk_impact_level' => NULL,
				'risk_likelihood_key' => NULL,
				'suggested_risk_treatment' => NULL,
				'created_by' => $session_data['username']
			);
			
			$impact_level = false;
			$actplan = false;
			$control = false;
			
			$res = $this->risk->insertChangeRequestKri($risk);
			
			$resp = array();
			if ($res) {
				$resp['success'] = true;
				$resp['msg'] = 'SUCCESS';
			} else {
				$resp['success'] = false;
				$resp['msg'] = $this->db->error();
			}
			echo json_encode($resp);
		}
	}
}
