<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends APP_Controller {
	public function index()
	{
		exit;
	}
	
	public function help()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('pages/help');
		
		$this->load->view('main/header', $data);
		$this->load->view('help', $data);
		$this->load->view('main/footer', $data);
	}
}







