<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends APP_Controlleri {
	 
	public function list_risk()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/list_risk');
		$data['engnya'] = base_url('index.php/library/list_risk');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/list_risk');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		 
		 
		$this->load->view('maini/header', $data);
		$this->load->view('library', $data);
		$this->load->view('maini/footer', $data);
		 
	}
	
	public function list_risk_pdf() {
	
		$this->load->model('Mlibrary');		
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
		
		$orientation = "landscape";
		$paper_size='a4';
		  
		$data['datanya'] = $this->Mlibrary->getAllRisk_export($this->input->post());
			 
		//$data['total_data'] = count($data['datanya']);
		 
		$this->load->view('export/list_risk',$data);
		 
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->render();			
		$this->dompdf->stream("risktreatmentreport.pdf");
		 
	}
	
	public function list_risk_excel() {
		
		$this->load->model('Mlibrary');
		  
		//$data['dataget'] = $this->input->get();
		 
		$data['datanya'] = $this->Mlibrary->getAllRisk_export($this->input->post());
		 
		$this->load->library('parser');
		
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('export/list_risk', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=actionplan_list.xls');
		header("Content-Description: File Transfer");
	 
		echo $stringData;
		exit;		   
	}
	
	public function list_ap_pdf() {
	
		$this->load->model('Mlibrary');		
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
		
		$orientation = "landscape";
		$paper_size='a4';
		  
		$data['datanya'] = $this->Mlibrary->getAllRisk_ap_report($this->input->post());
			  
		$this->load->view('export/list_ap',$data);
		 
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->render();			
		$this->dompdf->stream("list_ap.pdf");
		  
	}
	
	public function list_ap_excel() {
		
		$this->load->model('Mlibrary');
		    
		$data['datanya'] = $this->Mlibrary->getAllRisk_ap_report($this->input->post());
		 
		$this->load->library('parser');
		
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('export/list_ap', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=actionplan_list.xls');
		header("Content-Description: File Transfer");
	 
		echo $stringData;
		exit;		   
	}
	
	public function list_ec_pdf() {
	
		$this->load->model('Mlibrary');		
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
		
		$orientation = "landscape";
		$paper_size='a4';
		  
		$data['datanya'] = $this->Mlibrary->getAllRisk_ec_report($this->input->post());
			  
		$this->load->view('export/list_ec',$data);
		 
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->render();			
		$this->dompdf->stream("list_ec.pdf");
		  
	}
	
	public function list_ec_excel() {
		
		$this->load->model('Mlibrary');
		    
		$data['datanya'] = $this->Mlibrary->getAllRisk_ec_report($this->input->post());
		 
		$this->load->library('parser');
		
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('export/list_ec', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=actionplan_list.xls');
		header("Content-Description: File Transfer");
	 
		echo $stringData;
		exit;		   
	}
	
	public function taksonomi_pdf() {
	
		$this->load->model('Mlibrary');		
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
		
		$orientation = "landscape";
		$paper_size='a4';
		  
		$data['datanya'] = $this->Mlibrary->getAllRisk_tax_report($this->input->post());
			  
		$this->load->view('export/taksonomi',$data);
		 
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->render();			
		$this->dompdf->stream("taksonomi.pdf");
		  
	}
	
	public function taksonomi_excel() {
		
		$this->load->model('Mlibrary');
		    
		$data['datanya'] = $this->Mlibrary->getAllRisk_tax_report($this->input->post());
		 
		$this->load->library('parser');
		
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('export/taksonomi', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=taksonomi.xls');
		header("Content-Description: File Transfer");
	 
		echo $stringData;
		exit;		   
	}
	 
	public function getAllRisk() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk($page, $row, $order_by, $order, $filter_by, $filter_value);
		
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	 
	public function libraryriskDeleteData()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}
	
	public function libraryriskDeleteData_ap()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk_ap($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}
	
	public function libraryriskDeleteData_kri()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk_kri($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}
	
	public function libraryriskDeleteData_ec()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk_ec($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}

	public function libraryriskDeleteData_objective()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk_objective($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}
	
	public function libraryriskDeleteData_tax()
	{
	
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$risk_id = $_POST['id'];
			$this->load->model('Mlibrary');
			$res = $this->Mlibrary->deleteRisk_tax($risk_id, $this->session->credential['username'], 'RISK_REGISTER_RAC-DELETE');
			
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Deleting Data';
			}
			echo json_encode($data);
		}
	}
	
	public function listrisk_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listrisk_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}
	
	public function list_ap()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/list_ap');
		$data['engnya'] = base_url('index.php/library/list_ap');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/list_ap');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		$this->load->model('risk/mriskregister');
		$data['category'] = $this->mriskregister->getRiskCategory();
		 
		$this->load->view('maini/header', $data);
		$this->load->view('library_ap', $data);
		$this->load->view('maini/footer', $data);
		 
	}
	
	function getRiskCategory(){
	 
		$this->load->model('Mlibrary');
		$this->load->model('risk/mriskregister');
		$data['getparent'] = $this->Mlibrary->getRiskCategory_bycatname($this->input->post('id'));
		
		$data = $this->mriskregister->getRiskCategory($data['getparent'][0]['cat_parent']);
		 
		echo json_encode($data);
	
	}
	
	function getDivision(){
	 
		$this->load->model('Mlibrary'); 
		 
		$data = $this->Mlibrary->getDivision();
		 
		echo json_encode($data);
	
	}
	
	function get_treshold_type(){
	 
		$this->load->model('Mlibrary'); 
		  
		$this->load->model('risk/risk');
		if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
			$kri = $this->risk->getKriById($this->input->post('id'));
			 
			echo json_encode($kri);
		}
		 
		//echo json_encode($data);
	
	}
	
	public function getAllRisk_ap() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk_ap($page, $row, $order_by, $order, $filter_by, $filter_value);
		 
		$i = 0;
		foreach($data['data'] as $key){
		
			$newdate = date("d-m-Y",strtotime($key['due_date'])); 
			 
			$data['data'][$i]['due_date'] = $newdate;
			$i++;
		}
		 
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function getAllRisk_kri() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk_kri($page, $row, $order_by, $order, $filter_by, $filter_value);
		 
		 
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function kri_pdf() {
	
		$this->load->model('Mlibrary');		
		$this->load->library('parser');
		$this->load->library('dompdf_gen');
		
		$orientation = "landscape";
		$paper_size='a4';
		  
		$data['datanya'] = $this->Mlibrary->getAllRisk_kri_report($this->input->post());
			  
		$this->load->view('export/kri',$data);
		 
		// Get output html
		$html = $this->output->get_output();
		  
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->render();			
		$this->dompdf->stream("kri.pdf");
		  
	}
	
	public function kri_excel() {
		
		$this->load->model('Mlibrary');
		    
		$data['datanya'] = $this->Mlibrary->getAllRisk_kri_report($this->input->post());
		 
		$this->load->library('parser');
		
		//pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('export/kri', $data, true);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		
		header('Content-type: application/ms-excel');
		header("Expires: 0");
		header('Content-Disposition: attachment; filename=taksonomi.xls');
		header("Content-Description: File Transfer");
	 
		echo $stringData;
		exit;		   
	}
	
	public function listriskap_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listriskap_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}
	
		public function listriskkri_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listriskkri_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}
	
	public function listriskec_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listriskec_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}

	public function listriskobjective_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listriskobjective_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}
	
	public function listrisktax_update(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->listrisktax_update($this->input->post());
		 
			if ($res) {
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error saving Data';
			}
			echo json_encode($data);
	
	}
	
	public function list_ec()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/list_ec');
		$data['engnya'] = base_url('index.php/library/list_ec');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/list_ec');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		 
		 
		$this->load->view('maini/header', $data);
		$this->load->view('library_ec', $data);
		$this->load->view('maini/footer', $data);
		 
	}

	public function list_objective()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/list_objective');
		$data['engnya'] = base_url('index.php/library/list_objective');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/list_ec');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		 
		 
		$this->load->view('maini/header', $data);
		$this->load->view('library_objective', $data);
		$this->load->view('maini/footer', $data);
		 
	}
	
	public function getAllRisk_ec() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk_ec($page, $row, $order_by, $order, $filter_by, $filter_value);
		   
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}

	public function getAllRisk_objective() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk_objective($page, $row, $order_by, $order, $filter_by, $filter_value);
		   
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function taksonomi()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/taksonomi');
		$data['engnya'] = base_url('index.php/library/taksonomi');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/taksonomi');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		 
		 
		$this->load->view('maini/header', $data);
		$this->load->view('taksonomi', $data);
		$this->load->view('maini/footer', $data);
		 
	}
	
	public function getAllRisk_tax() {
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
		$this->load->model('Mlibrary');
		
		$defFilter = array(
			'userid' => $sess['session']['username']
		);
		$data = $this->Mlibrary->getAllRisk_tax($page, $row, $order_by, $order, $filter_by, $filter_value);
		 
		 
		$data['draw'] = $_POST['draw']*1;
		$data['page'] = $page;
		echo json_encode($data);
	}
	
	public function kri()
	{
		$data = $this->loadDefaultAppConfig();
		$data['indonya'] = base_url('index.php/libraryin/library/kri');
		$data['engnya'] = base_url('index.php/library/kri');			
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('library/kri');
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
		<script src="assets/scripts/dashboard/library.js"></script>
		';
		
		$data['pageLevelScriptsInit'] = 'Dashboard.init();
		 
		';
		$this->load->model('risk/mriskregister');
		$data['category'] = $this->mriskregister->getRiskCategory();
		 
		$this->load->view('maini/header', $data);
		$this->load->view('kri', $data);
		$this->load->view('maini/footer', $data);
		 
	}
	
	public function getKri($rid) {
		$this->load->model('risk/risk');
		if ($rid && is_numeric($rid)) {
			$kri = $this->risk->getKriById($rid);
			echo json_encode($kri);
		}
	}
	
	function delete_treshold(){
	
		$this->load->model('Mlibrary');
		$kri_idnya = $this->Mlibrary->get_tresholddetail($this->input->post());
		$res = $this->Mlibrary->delete_tresholddetail($this->input->post(),$kri_idnya[0]['kri_id']);
		 
		$res['totaldata'] = count($res); 
		 
			if ($res) {
				$res['success'] = true;
				$res['msg'] = 'SUCCESS';
			} else {
				$res['success'] = false;
				$res['msg'] = 'Error Deleting Data';
			}
			
			echo json_encode($res);
	
	}
	
	function add_treshold(){
	
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->add_treshold($this->input->post());
		 
		if ($res) {			 
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
				$data['kri_id'] = $this->input->post('kri_id');
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Adding Data';
				$data['kri_id'] = "";
			}
			  
			echo json_encode($data);
	}
	
	function add_treshold_2(){
	 
		$this->load->model('Mlibrary');
		$res = $this->Mlibrary->add_treshold2($this->input->post());
		 
		if ($res) {			 
				$data['success'] = true;
				$data['msg'] = 'SUCCESS';
				$data['kri_id'] = $this->input->post('kri_id');
			} else {
				$data['success'] = false;
				$data['msg'] = 'Error Adding Data';
				$data['kri_id'] = "";
			}
			  
			echo json_encode($data);
	}
	
	function load_tresholddet(){
	
		$this->load->model('Mlibrary');		 
		$res = $this->Mlibrary->yap_tresholddetail($this->input->post('id'));
		 
		$res['totaldata'] = count($res); 
		 
			if ($res) {
				$res['success'] = true;
				$res['msg'] = 'SUCCESS';
			} else {
				$res['success'] = false;
				$res['msg'] = 'Error Deleting Data';
			}
			
			echo json_encode($res);
	
	}
	 
}
