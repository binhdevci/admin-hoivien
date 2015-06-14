<?php
class Member extends Controller{
	protected $_templates;
	function Member(){
		parent::Controller();
		$this->load->model('common_model','common');
	}
	
	
	function index($lb_alias=''){
		$data = array();
		$this->_templates['page'] = 'member/member_view';
		// $this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
	
	
	function changepass(){
		$data = array();
		
		$this->_templates['page'] = 'member/change_pass_view';
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
