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
		
		
		public function listofrisk(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/listofrisk');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_listofrisk', $data);
			$this->load->view('footer', $data);
		}	
		
		function listofrisk_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->listofrisk($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('listofrisk_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=listofrisk.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
			function listofrisk_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->listofrisk($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('listofrisk_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("listofrisk.pdf");
			
		}
		
		public function listofrisketc(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/listofrisketc');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_listofrisketc', $data);
			$this->load->view('footer', $data);
		}	
		
		function listofrisketc_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->listofrisketc($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('listofrisk_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=listofrisketc.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function listofrisketc_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->listofrisketc($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('listofrisketc_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("listofrisketc.pdf");
			
		}
		
		function risktreatmentreport(){
			
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/risktreatmentreport');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_risktreatmentreport', $data);
			$this->load->view('footer', $data);
			
		}
		
		function risktreatmentreport_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->risktreatmentreport($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('risktreatmentreport_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=risktreatmentreport.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function risktreatmentreport_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->risktreatmentreport($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('risktreatmentreport_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("risktreatmentreport.pdf");
			
		}
		
		public function listofall(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/listofall');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_listofall', $data);
			$this->load->view('footer', $data);
		}	
		
		function listofall_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->listofall($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('listofall_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=listofall.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function listofall_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->listofall($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('listofall_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("listofall.pdf");
			
		}
		
		public function listofall1(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/listofall1');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_listofall1', $data);
			$this->load->view('footer', $data);
		}	
		
		function listofall1_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->listofall1($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('listofall1_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=listofall1.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function listofall1_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->listofall1($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('listofall1_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("listofall1.pdf");
			
		}
		
		public function comparison1(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/gettreatment');
			$data['engnya'] = base_url('index.php/report/risk/gettreatment');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/comparison1');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_comparison1', $data);
			$this->load->view('footer', $data);
		}	
		
		function comparison1_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->comparison1($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('comparison1_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=comparison1.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function comparison1_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->comparison1($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('comparison1_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("comparison1.pdf");
			
		}
		
		public function comparison2(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/comparison2');
			$data['engnya'] = base_url('index.php/report/risk/comparison2');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/comparison2');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_comparison2', $data);
			$this->load->view('footer', $data);
		}	
		
		function comparison2_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->comparison2($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('comparison2_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=comparison2.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function comparison2_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->comparison2($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('comparison2_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("comparison2.pdf");
			
		}
		
		public function topten(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/topten');
			$data['engnya'] = base_url('index.php/report/risk/topten');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/topten');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_topten', $data);
			$this->load->view('footer', $data);
		}	
		
		function topten_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->topten($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('topten_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=topten.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function topten_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->topten($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('topten_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("topten.pdf");
			
		}
		
		public function topten2(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/topten2');
			$data['engnya'] = base_url('index.php/report/risk/topten2');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/topten2');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_topten2', $data);
			$this->load->view('footer', $data);
		}	
		
		function topten2_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->topten2($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('topten_table2', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=topten2.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function topten2_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->topten2($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('topten_table2',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("topten2.pdf");
			
		}
		
		public function KRI_monitoring(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/KRI_monitoring');
			$data['engnya'] = base_url('index.php/report/risk/KRI_monitoring');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/KRI_monitoring');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_KRI_monitoring', $data);
			$this->load->view('footer', $data);
		}	
		
		function KRI_monitoring_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->KRI_monitoring($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('KRI_monitoring_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=KRI_monitoring.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function KRI_monitoring_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->KRI_monitoring($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('KRI_monitoring_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("KRI_monitoring.pdf");
			
		}
		
		
		public function getcomparison1(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/getcomparison1');
			$data['engnya'] = base_url('index.php/report/risk/getcomparison1');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/getcomparison1');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_getcomparison1', $data);
			$this->load->view('footer', $data);
		}	
		
		function getcomparison1_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->getcomparison1($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('getcomparison1_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=getcomparison1.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function getcomparison1_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->getcomparison1($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('getcomparison1_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("getcomparison1.pdf");
			
		}
		
		public function getcomparison2(){
			$this->load->model('report/risk_model','risk',true);

			$data = $this->loadDefaultAppConfig();
			$data['indonya'] = base_url('index.php/reporti/risk/getcomparison2');
			$data['engnya'] = base_url('index.php/report/risk/getcomparison2');		
			$data['sidebarMenu'] = $this->getSidebarMenuStructure('report/risk/getcomparison2');
			$data['periode'] = $this->risk->getAllPeriode();
			$data['pageLevelStyles'] = '
			<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			';
			
			$data['pageLevelScripts'] = '
			<script src="assets/scripts/dashboard/getallrisk.js"></script>';
			
			$this->load->view('main/header', $data);
			$this->load->view('report_getcomparison2', $data);
			$this->load->view('footer', $data);
		}	
		
		function getcomparison2_excel(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			  
			$data['datanya'] = $this->risk->getcomparison2($this->input->post());
			
			$data['total_data'] = count($data['datanya']);
			 
			$stringData = $this->parser->parse('getcomparison2_table', $data, true);
			 
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");			
			header('Content-type: application/ms-excel');
			header("Expires: 0");
			header('Content-Disposition: attachment; filename=getcomparison2.xls');
			header("Content-Description: File Transfer");
	  
			echo $stringData;
			exit;
			
		}
		
		function getcomparison2_pdf(){
			
			$this->load->model('report/risk_model','risk',true);
			$this->load->library('parser');
			$this->load->library('dompdf_gen');
			
			$orientation = "landscape";
			$paper_size='a4';
			 
			$data['datanya'] = $this->risk->getcomparison2($this->input->post());
			  
			$data['total_data'] = count($data['datanya']);
			 
			$this->load->view('getcomparison2_table',$data);
			// Get output html
			$html = $this->output->get_output();
			  
			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->render();			
			$this->dompdf->stream("getcomparison2.pdf");
			
		}


			
	}

?>