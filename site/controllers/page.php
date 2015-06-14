﻿<?php
class Page extends Controller{
	protected $_templates;
	function Page(){
		parent::Controller();
		$this->load->model('common_model','common');
	}
	
	
	function index($lb_alias=''){
		$data = array();
		$this->_templates['page'] = 'page/page_login_view';
		// $this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data,'login');
	}
	
	
	function dashboard(){
		$data = array();
		
		$this->_templates['page'] = 'page/page_dashboard_view';
		//$this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
	
	function  item($lb_alias){
		$data = array();
		
		$this->_templates['page'] = 'page/page_view';
		$this->load->view($this->_templates['page'],$data);
		//$this->site_library->load($this->_templates['page'],$data);
	}
}
?>
