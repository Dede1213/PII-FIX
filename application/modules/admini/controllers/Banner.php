<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends APP_Controlleri {
	public function index()
	{
		$data = $this->loadDefaultAppConfig();
		$data['sidebarMenu'] = $this->getSidebarMenuStructure('admini/banner');
		$data['pageLevelStyles'] = '
		';
		
		$data['pageLevelScripts'] = '
		';
		
		$data['pageLevelScriptsInit'] = '';
		$data['indonya'] = base_url('index.php/admini/banner');
		$data['engnya'] = base_url('index.php/admin/banner');		
		$this->load->model('admin/mbanner');
		$data['banner'] = $this->mbanner->getBanner();
		
		$data['update_success'] = false;
		if ($this->session->flashdata('update_success') != null) {
			$data['update_success'] = true;
		}
		
		$this->load->view('maini/header', $data);
		$this->load->view('banner', $data);
		$this->load->view('main/footer', $data);
	}
		
	public function updateBanner()
	{
		$this->load->model('admin/mbanner');
		$data = $this->mbanner->updateBanner($_POST['banner_text'], $_POST['banner_status']);
		$this->session->set_flashdata('update_success', true);	
		redirect('admin/banner');
	}
}







