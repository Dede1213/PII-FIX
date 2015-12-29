<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Risk extends APP_Controlleri {
		public function index()
		{
			$data = $this->loadDefaultAppConfig();
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('main/mainpic');
			$data['pageLevelStyles'] = '
			<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
			<link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
			';
			$data['indonya'] = base_url('index.php/maini/mainpic');
			$data['engnya'] = base_url('index.php/main/mainpic');		
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
			$data['pic_list'] = $this->usermodel->getUserPicByDivision($this->session->credential['division_id']);
			
			$this->load->model('admin/mperiode');
			$periode = $this->mperiode->getCurrentPeriode();
			$data['adhoc_button'] = true;
			if ($periode) $data['adhoc_button'] = false;
			
			$this->load->view('header', $data);
			$this->load->view('main_pic', $data);
			$this->load->view('footer', $data);
		}

		public function getallrisk(){
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/report/risk/getallrisk');
			$data['engnya'] = base_url('index.php/report/risk/getallrisk');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/getallrisk');
			
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>
			';
			
			$this->load->view('maini/header', $data);
			$this->load->view('getallrisk', $data);
			$this->load->view('footer', $data);
		}

		public function getallriskperiode(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/getallriskperiode');
			$data['engnya'] = base_url('index.php/report/risk/getallriskperiode');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/getallriskperiode');
			$data['periode'] = $this->risk->getAllPeriode();
			
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('getallriskperiode', $data);
			$this->load->view('footer', $data);
		}

		public function getactionplan(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/getactionplan');
			$data['engnya'] = base_url('index.php/report/risk/getactionplan');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/getactionplan');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('getactionplan', $data);
			$this->load->view('footer', $data);
		}	

		public function get2ndcategory(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/getallriskperiode');
			$data['engnya'] = base_url('index.php/report/risk/getallriskperiode');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/getallriskperiode');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['category'] = $this->risk->getcategory();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('get2ndcategory', $data);
			$this->load->view('footer', $data);
		}				

		public function gettreatment(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/gettreatment');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('gettreatment', $data);
			$this->load->view('footer', $data);
		}

		public function gettopten(){
			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettopten');
			$data['engnya'] = base_url('index.php/report/risk/gettopten');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/gettopten');
			
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>
			';
			
			$this->load->view('maini/header', $data);
			$this->load->view('gettopten', $data);
			$this->load->view('footer', $data);
		}

		public function getkri(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/riski/getkri');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('getkri', $data);
			$this->load->view('footer', $data);
		}	

		public function getcomparison(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/getcomparison');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('getcomparison', $data);
			$this->load->view('footer', $data);
		}				

		public function gettable(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettable');
			$data['engnya'] = base_url('index.php/report/risk/gettable');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('reporti/risk/gettable');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('maini/header', $data);
			$this->load->view('gettable', $data);
			$this->load->view('footer', $data);
		}				
		/* Excel */

		public function allrisk(){
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');			
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getAllrisk();
			$rows = $allrisk->num_rows();
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;
			
			$this->load->view('excelAllrisk',$res);	
		}

		public function allriskperiode(){
			$periode = $this->input->post('periode');
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');			
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getAllriskperiode($periode);
			$periode = $this->risk->getPeriode($periode);
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;
			$res['rows'] = $allrisk->num_rows();
			$res['data'] = $allrisk->result();
			
			$this->load->view('excelAllriskPeriode',$res);	
		}

		public function apperiode(){
			$periode = $this->input->post('periode');
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');				
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getActionPlanPeriode($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;
			$res['rows'] = $allrisk->num_rows();
			$res['data'] = $allrisk->result();
			
			$this->load->view('excelActionplan',$res);	

		}

		public function risktreatmentperiode(){
			$periode = $this->input->post('periode');
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');				
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getRiskTreatment($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;
			$res['rows'] = $allrisk->num_rows();
			$res['data'] = $allrisk->result();
			
			$this->load->view('excelriskTreatment',$res);	

		}

		public function toptenrisk(){
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');			
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getTopTenRisk();
			$rows = $allrisk->num_rows();
			$res['rows'] = $rows;
			$res['data'] = $allrisk->result();
			
			$this->load->view('exceltopten',$res);	
		}

		public function krimonitoring(){
			$periode = $this->input->post('periode');
	        $this->load->library('excel/Biffwriter');
	        $this->load->library('excel/Format');
	        $this->load->library('excel/OLEwriter');
	        $this->load->library('excel/Parser');
	        $this->load->library('excel/Workbook');
	        $this->load->library('excel/Worksheet');			
			$this->load->model('report/risk_model','risk',true);
			$allrisk = $this->risk->getkri($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;	
			$res['rows'] = $rows;
			$res['data'] = $allrisk->result();			
			$this->load->view('excelkri',$res);
		}

		public function allRiskpdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$allrisk = $this->risk->getAllrisk();
			$rows = $allrisk->num_rows();
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/risk_list',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("risk_list.pdf");
		}	

		public function allriskperiodepdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$periode = $this->input->post('periode');
			$allrisk = $this->risk->getAllriskperiode($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;			
			$rows = $allrisk->num_rows();
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/risk_listp',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("risk_listp.pdf");
		}

		public function actionplanpdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$periode = 6;//$this->input->post('periode');
			$allrisk = $this->risk->getActionPlanPeriode($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;			
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/actionp',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("actionp.pdf");
		}

		public function risktreatmentpdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$periode = 6;//$this->input->post('periode');
			$allrisk = $this->risk->getRiskTreatment($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;			
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/risk_treatment',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("risk_treatment.pdf");
		}

		public function toptenpdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$allrisk = $this->risk->getTopTenRisk();
			$rows = $allrisk->num_rows();
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/risk_topten',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("risk_topten.pdf");
		}	

		public function kripdf(){
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('dompdf_gen');
			$periode = 6;//$this->input->post('periode');
			$allrisk = $this->risk->getkri($periode);
			$periode = $this->risk->getPeriode($periode);
			$rows = $allrisk->num_rows();
			foreach ($periode as $key) {
				$p = $key->periode_name . ' ' . $key->periode_start . ' s/d ' . $key->periode_end;
			}
			
			$res['periode'] = $p;			
			//$res['rows'] = 
			$res['data'] = $allrisk->result();
			$res['rows'] = $rows;			 
		 
			//$data['datatable'] = $this->risk->getAllRisk_export();
			 
			$this->load->view('pdf/kri_monitoring',$res);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("kri_monitoring.pdf");
		}										
	}

?>