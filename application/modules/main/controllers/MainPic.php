<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPic extends APP_Controller {
	public function index()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('main/mainpic');
		$data['indonya'] = base_url('index.php/maini/mainpic');
		$data['engnya'] = base_url('index.php/main/mainpic');		
		$data['pageLevelStyles'] = '
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		
		<script src="assets/global/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/scripts/dashboard/main_pic.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		Dashboard.initUserChart();
		';
		
		$this->load->model('user/usermodel');
		if ($this->session->credential['main_role_id'] == 2) {
			$data['pic_list'] = $this->usermodel->getUserRACByDivision($this->session->credential['division_id']);
		} else {
			$data['pic_list'] = $this->usermodel->getUserPicByDivision($this->session->credential['division_id']);
		}
		
		$this->load->model('admin/mperiode');
		$periode = $this->mperiode->getCurrentPeriode();
		$data['adhoc_button'] = true;
		if ($periode) {
			$data['adhoc_button'] = false;
		}
		
		//cek owned
		$username = $this->session->credential['username'];
		$division_nya = $this->session->credential['division_id'];
		$this->load->model('risk/risk');
		$data['cekowned'] = $this->risk->cekOwned($username,$division_nya);
		$data['cekplan'] = $this->risk->cekPlan($username,$division_nya);
		$data['cekplanexec'] = $this->risk->cekPlanExec($username,$division_nya);
		$data['cekkri'] = $this->risk->cekKri($username,$division_nya);

		//cek change request
		$this->load->model('risk/risk');
		$data['cekChangeRequest'] = $this->risk->cekChangeRequestComplete($username);



		$this->load->view('header', $data);
		$this->load->view('main_pic', $data);
		$this->load->view('footer', $data);
	}
	
	public function viewRisk($rid = false) {
		if ($rid && is_numeric($rid)) {
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/maini/mainpic');
			$data['engnya'] = base_url('index.php/main/mainpic');			
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

			$data['risk_user']['nama'] = '';
			
			$this->load->view('main/header', $data);
			$this->load->view('risk/risk_register_view', $data);
			$this->load->view('main/footer', $data);
		}
	}
	
	public function viewOwnedRisk($rid = false) {
		if ($rid && is_numeric($rid)) {
			// check mode
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/maini/mainpic');
			$data['engnya'] = base_url('index.php/main/mainpic');			
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
			$data['pageLevelStyles'] = '';
			$data['pageLevelScripts'] = '';
			$data['pageLevelScriptsInit'] = '';
			
			$data['valid_mode'] = false;
			
			$this->load->model('risk/risk');
			$cred = $this->session->credential;
			$data['role'] = $cred['role_id'];
			$risk = $this->risk->getRiskValidate('viewRiskByDivision', $rid, $cred);
			$view = 'risk/risk_register_view';
			$data['risk_user']['nama'] = '';
			if ($risk) {
				if ($risk['risk_status']*1 > 2) {
					$data['valid_mode'] = true;
					$data['risk'] = $risk;
					
					if ($risk['risk_status']*1 == 3 && $risk['risk_treatment_owner'] == $cred['username']) {
						$data['approval'] = false;
						
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
						<script src="assets/scripts/risk/riskowned.js"></script>
						';
						
						$data['pageLevelScriptsInit'] = "RiskOwned.init();";
						
						$this->load->model('risk/mriskregister');
						$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
						$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
						$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
						$data['division_list'] = $this->mriskregister->getDivisionList();
						
						$view = 'risk/risk_owner_form';
					} else if  ($risk['risk_status']*1 == 4 && $cred['role_id'] == 4) { // on approval and is div head
						$data['approval'] = true;
						
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
						<script src="assets/scripts/risk/riskowned.js"></script>
						';
						
						$data['pageLevelScriptsInit'] = "RiskOwned.init();";
						
						$this->load->model('risk/mriskregister');
						$data['likelihood'] = $this->mriskregister->getRiskLikelihood();
						$data['impact_list'] = $this->mriskregister->getRiskImpactForList();
						$data['treatment_list'] = $this->mriskregister->getReference('treatment.status');
						$data['division_list'] = $this->mriskregister->getDivisionList();
						
						$view = 'risk/risk_owner_form';
					} else {
						$view = 'risk/risk_register_view';
					}
				}
			}
			
			
			$this->load->view('main/header', $data);
			$this->load->view($view, $data);
			$this->load->view('main/footer', $data);
		}
	}
	
	
	
	public function getSummaryCount($mode = null) {
		// MODE : myrisk myriskowned myactionplan kri
		$sess = $this->loadDefaultAppConfig();
		
		$this->load->model('risk/risk');
		 
		$defFilter = array(
			'userid' => $sess['session']['username'],
			'division_id' => $sess['session']['division_id']
		);
		
		$tmp = array(
			'HIGH' => 0, 'MODERATE' => 0, 'LOW' => 0
		);
		
		if ($mode == 'myrisk') {
			$data = $this->risk->getSummaryCount('riskLevel', $defFilter);
		} else if ($mode == 'myriskowned') {
			$data = $this->risk->getSummaryCount('myriskowned', $defFilter);
		} else if ($mode == 'myactionplan') {
			$data = $this->risk->getSummaryCount('myactionplan', $defFilter);
		} else if ($mode == 'kri') {
			$data = $this->risk->getSummaryCount('mykri', $defFilter);
		} else {
			exit;
		}
		
		if ($data) {
			foreach($data as $row) {
				$tmp[$row['risk_level']] = $row['numcount'];
			}
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
	
	public function getOwnedRisk() {
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
			'userid' => $sess['session']['username'],
			'role_id' => $sess['session']['role_id'], // 4 div head, 5 PIC
			'division_id' => $sess['session']['division_id']
		);
		
		$data = $this->risk->getDataMode('ownedRisk', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function assignPic() {
		$data = array();
		$data['success'] = false;
		$data['msg'] = '';
		
		if (isset($_POST['risk_id']) && isset($_POST['pic']) && is_numeric($_POST['risk_id'])) {
			$this->load->model('risk/risk');
			if ($_POST['mode'] == 'treatment') {
				$res = $this->risk->assignPic($_POST['risk_id'], $_POST['pic']);
			} else if ($_POST['mode'] == 'kri') {
				$res = $this->risk->assignPicKri($_POST['risk_id'], $_POST['pic']);
			} else {
				$res = $this->risk->assignPicAction($_POST['risk_id'], $_POST['pic']);
			}
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['msg'] = 'Error Assign PIC';
			}
		}
		
		echo json_encode($data);
	}
	
	public function riskOwnerGetData($rid = false) {
		if ($rid && is_numeric($rid)) {
			$this->load->model('risk/risk');

			// di ganti karena loading lama risk owner form
			//$data = $this->risk->getRiskChangeById($rid);

			$data = $this->risk->getRiskById($rid);
			if (!$data) {
				$data = $this->risk->getRiskById($rid);
			}
			echo json_encode($data);
		}
	}
//get changes
	public function riskOwnerGetData2($rid = false) {
		if ($rid && is_numeric($rid)) {
			$this->load->model('risk/risk');

			// di ganti karena loading lama risk owner form
			//$data = $this->risk->getRiskChangeById($rid);

			$data = $this->risk->getRiskByIdowner($rid);
			if (!$data) {
				$data = $this->risk->getRiskByIdowner($rid);
			}
			echo json_encode($data);
		}
	}
	
	public function treatmentSubmit()
	{
		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$data = $this->loadDefaultAppConfig();
			
			// if is div head then submit for verification, if pic for div head verify
			if ($this->session->credential['role_id'] == 4) {
				$stat = 5;
			}else if ($this->session->credential['role_id'] == 2) {
				$stat = 5;
			} else {
				$stat = 4;
			}
			
			// build data
			$risk = array(
				'risk_status' => $stat,
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
			
			$this->load->model('risk/risk');
			// save dulu ke dalam t_risk_change
			$res = $this->risk->treatmentSaveDraft($_POST['risk_id'], $risk, $impact_level, $actplan, $control, $data['session']['username']);
			
			//apus t_risk utama insert t_risk_chage yang di atas
			$res = $this->risk->treatmentSaveDraft2($_POST['risk_id'], $risk, $impact_level, $actplan, $control, $data['session']['username']);
			

			//$riskUpdate = array(
			//	'risk_status' => $stat,
			//	'created_by' => $data['session']['username']
			//);
			// ga perllu pake status udah berubah 
			//$res = $this->risk->treatmentSubmit($_POST['risk_id'], $riskUpdate, $data['session']['username']); 
			//ga ngerti buat apaan!
			//$res = $this->risk->actionPlanSetToDraft($_POST['risk_id']);
			
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
	
	public function treatmentSaveDraft()
	{
		if (isset($_POST['risk_id']) && is_numeric($_POST['risk_id'])) {
			$data = $this->loadDefaultAppConfig();
			
			//if ($_POST['existing_control_id'] == '') $_POST['existing_control_id'] = null;
			
			// build data
			$risk = array(
				'risk_status' => 4,
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
			
			$this->load->model('risk/risk');
			$res = $this->risk->treatmentSaveDraft($_POST['risk_id'], $risk, $impact_level, $actplan, $control, $data['session']['username']);
			
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
	
	public function getOwnedActionPlan() {
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
			'userid' => $sess['session']['username'],
			'role_id' => $sess['session']['role_id'], // 4 div head, 5 PIC
			'division_id' => $sess['session']['division_id']
		);

		$division_euy = $this->session->credential['division_name'];

		$cek_ap_change = $this->risk->cek_ap_change($division_euy);

		if($cek_ap_change == true){
			$data = $this->risk->getDataMode('ownedActionPlanChange', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		}else{
			$data = $this->risk->getDataMode('ownedActionPlan', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		}
		
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function viewOwnedActionPlan($rid = false) {
		if ($rid && is_numeric($rid)) {
			// check mode
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/maini/mainpic');
			$data['engnya'] = base_url('index.php/main/mainpic');			
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
			$data['pageLevelStyles'] = '';
			$data['pageLevelScripts'] = '';
			$data['pageLevelScriptsInit'] = '';
			
			$data['valid_mode'] = false;
			
			$this->load->model('risk/risk');
			$cred = $this->session->credential;
			$data['role'] = $cred['role_id'];
			$risk = $this->risk->getActionPlanById($rid);

			if ($risk && $risk['division'] == $cred['division_id']) {
				
				$this->load->model('risk/mriskregister');
				$data['division_list'] = $this->mriskregister->getDivisionList();
				
				if ($risk['action_plan_status']*1 > 0) {
					$data['valid_mode'] = true;
					$data['action_plan'] = $risk;
					$risk_data = $this->risk->getRiskById($risk['risk_id']);
					$data['risk'] = $risk_data;
					$data['action_plan_change'] = $this->risk->getActionPlanForChange($rid);
					
					if ($risk['action_plan_status']*1 == 1 && $risk['assigned_to'] == $cred['username']) {
						$data['approval'] = false;
						
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
						
						<script src="assets/scripts/risk/actionplanform.js"></script>
						';
						
						$data['pageLevelScriptsInit'] = "apForm.init();";
						
						$view = 'risk/action_plan_form';
					} else if ($risk['action_plan_status']*1 == 2 && $cred['role_id'] == 4) { // on approval and is div head
						$data['approval'] = true;
						
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
						
						<script src="assets/scripts/risk/actionplanform.js"></script>
						';
						
						$data['pageLevelScriptsInit'] = "apForm.init();";
						
						$view = 'risk/action_plan_form';
					} else {
						$view = 'risk/action_plan_view';
					}
					
					$this->load->view('main/header', $data);
					$this->load->view($view, $data);
					$this->load->view('main/footer', $data);
				}
			}
		}
	}
	
	public function actionSaveDraft() {
		if (isset($_POST['action_id']) && is_numeric($_POST['action_id'])) {
			$data = $this->loadDefaultAppConfig();
			
			// build data
			$dd = implode('-', array_reverse( explode('-', $_POST['due_date']) ));
			$risk = array(
				'action_plan' => $_POST['action_plan'],
				'due_date' => $dd,
				'division' => $_POST['division'],
				'created_by' => $data['session']['username']
			);
			
			$this->load->model('risk/risk');
			$res = $this->risk->actionPlanSaveDraft($_POST['action_id'], $_POST['risk_id'], $risk, $data['session']['username']);
			
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
	
	public function actionSubmit() {
		if (
			isset($_POST['risk_id']) && is_numeric($_POST['risk_id']) && 
			isset($_POST['action_id']) && is_numeric($_POST['action_id'])
		) {
			$data = $this->loadDefaultAppConfig();
			
			// if is div head then submit for verification, if pic for div head verify
			// tambah role 2 karena rac mau submit juga
			if ($this->session->credential['role_id'] == 4) {
				$stat = 3;
			}else if ($this->session->credential['role_id'] == 2) {
				$stat = 3;
			} else {
				$stat = 2;
			}
			
			// build data
			$dd = implode('-', array_reverse( explode('-', $_POST['due_date']) ));
			$risk = array(
				'action_plan_status' => $stat,
				'action_plan' => $_POST['action_plan'],
				'due_date' => $dd,
				'division' => $_POST['division'],
				'created_by' => $data['session']['username']
			);
			
			$this->load->model('risk/risk');
			$res = $this->risk->actionPlanSubmit($_POST['action_id'], $_POST['risk_id'], $risk, $data['session']['username']);
			$res = $this->risk->actionUpdateRiskStatus($_POST['risk_id'], $data['session']['username']);
			
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
	
	public function getOwnedActionPlanExec() {
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
			'userid' => $sess['session']['username'],
			'role_id' => $sess['session']['role_id'], // 4 div head, 5 PIC
			'division_id' => $sess['session']['division_id']
		);
		
		$data = $this->risk->getDataMode('ownedActionPlanExec', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function getOwnedActionPlanExec_adt() {
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
			'userid' => $sess['session']['username'],
			'role_id' => $sess['session']['role_id'], // 4 div head, 5 PIC
			'division_id' => $sess['session']['division_id']
		);
		
		$data = $this->risk->getDataMode('ownedActionPlanExec_adt', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function execSaveDraft() {
		if (isset($_POST['action_id']) && is_numeric($_POST['action_id'])) {
			$data = $this->loadDefaultAppConfig();
			
			if ($_POST['execution_status'] == 'COMPLETE') {
				$risk = array(
					'execution_status' => $_POST['execution_status'],
					'execution_explain' => $_POST['execution_explain'],
					'execution_evidence' => $_POST['execution_evidence'],
					'execution_reason' => null,
					'revised_date' => null
				);
			}
			
			if ($_POST['execution_status'] == 'EXTEND') {
				$dd = implode('-', array_reverse( explode('-', $_POST['revised_date']) ));
				$risk = array(
					'execution_status' => $_POST['execution_status'],
					'execution_explain' => null,
					'execution_evidence' => null,
					'execution_reason' => $_POST['execution_reason'],
					'revised_date' => $dd
				);
			}
			
			if ($_POST['execution_status'] == 'ONGOING') {
			 
				$risk = array(
					'execution_status' => $_POST['execution_status'],
					'execution_explain' => $_POST['execution_explain'],
					'execution_evidence' => null,
					'execution_reason' => null,
					'revised_date' => null
				);
			}
			
			// build data
			$this->load->model('risk/risk');
			$res = $this->risk->execSaveDraft($_POST['action_id'], $risk, $data['session']['username']);
			
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
	
	//rac mau submit juga mangkanya tambah role 2
	public function execSubmit() {
		if (isset($_POST['action_id']) && is_numeric($_POST['action_id'])) {
			$data = $this->loadDefaultAppConfig();
			
			if ($this->session->credential['role_id'] == 4) {
				$stat = 6;
			}else if ($this->session->credential['role_id'] == 2) {
				$stat = 6;
			} else {
				$stat = 5;
			}
			
			// build data
			$this->load->model('risk/risk');
			$res = $this->risk->execSubmit($_POST['action_id'], $stat, $data['session']['username']);
			
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
	
	public function getOwnedKri() {
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
			'userid' => $sess['session']['username'],
			'role_id' => $sess['session']['role_id'], // 4 div head, 5 PIC
			'division_id' => $sess['session']['division_id']
		);
		
		$data = $this->risk->getDataMode('ownedKri', $defFilter, $page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function viewOwnedKri($rid = false) {
		if ($rid && is_numeric($rid)) {
			// check mode
			$data = $this->loadDefaultAppConfig();
				$data['indonya'] = base_url('index.php/maini/mainpic');
				$data['engnya'] = base_url('index.php/main/mainpic');				
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main');
			$data['pageLevelStyles'] = '';
			$data['pageLevelScripts'] = '';
			$data['pageLevelScriptsInit'] = '';
			
			$data['valid_mode'] = false;
			
			$this->load->model('risk/risk');
			$cred = $this->session->credential;
			$data['role'] = $cred['role_id'];
			
			$kri = $this->risk->getKriById($rid);

			if ($kri && $kri['kri_owner'] == $cred['division_id']) {
				
				$data['kri'] = $kri;
				$risk = $this->risk->getRiskById($kri['risk_id']);
				$data['risk'] = $risk;
				
				if ($kri['kri_status']*1 == 0 && $kri['kri_pic'] == $cred['username']) {
					$data['approval'] = false;
					
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
					
					<script src="assets/scripts/risk/kriform.js"></script>
					';
					
					$data['pageLevelScriptsInit'] = "KriForm.init();";
					
					$view = 'risk/kri_form';
				} else if ($kri['kri_status']*1 == 1 && $cred['role_id'] == 4) { // on approval and is div head
					$data['approval'] = true;
					
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
					
					<script src="assets/scripts/risk/kriform.js"></script>
					';
					
					$data['pageLevelScriptsInit'] = "KriForm.init();";
					
					$view = 'risk/kri_form';
				} else {
					$view = 'risk/kri_view';
				}
				
				$this->load->view('main/header', $data);
				$this->load->view($view, $data);
				$this->load->view('main/footer', $data);
			}
		}
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
	
	public function actionplan_adt() {
	 
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('main/mainpic/actionplan_adt');
		$data['indonya'] = base_url('index.php/maini/mainpic/actionplan_adt');
		$data['engnya'] = base_url('index.php/main/mainpic/actionplan_adt');		
		$data['pageLevelStyles'] = '
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		';
		
		$data['pageLevelScripts'] = '
		<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		
		<script src="assets/global/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
		<script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/scripts/dashboard/main_pic.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Actionplan_adt.init();
		
		
		 
		';
		
		$this->load->model('admin/mperiode');
		/*
		$data['valid_mode'] = $this->validatePeriodeMode('periodic');
		
		$data['periode'] = null;
		if ($data['valid_mode']) {
			$data['periode'] = $this->mperiode->getCurrentPeriode();
			$data['periodenya'] = 1;
		}else{
			$data['periodenya'] = 0;
		}
		*/
		$data['periode'] = $this->mperiode->getCurrentPeriode_exec();
		if ($data['periode']) {
			//periode AP Exec nya
			$data['periodenya'] = 1;
		}else{
			$data['periodenya'] = 0;
		}
		
		$this->load->model('user/usermodel');
		if ($this->session->credential['main_role_id'] == 2) {
			$data['pic_list'] = $this->usermodel->getUserRACByDivision($this->session->credential['division_id']);
		} else {
			$data['pic_list'] = $this->usermodel->getUserPicByDivision($this->session->credential['division_id']);
		}
		
		$this->load->model('admin/mperiode');
		$periode = $this->mperiode->getCurrentPeriode();
		$data['adhoc_button'] = true;
		if ($periode) {
			$data['adhoc_button'] = false;
		}
		
		$this->load->view('header', $data);
		$this->load->view('actionplan_adtpic', $data);
		$this->load->view('footer', $data);
	}
}
