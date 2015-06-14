<?php
class Page extends Controller{
	protected $_templates;
	function Page(){
		parent::Controller();
		@session_start();
		$this->load->model('common_model','common');
	}
	
	
	function index($lb_alias=''){
		$data = array();
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
			$url = base_url() . 'dashboard.html';
			redirect($url);
		}else{
			if(isset($_POST['submit'])){
				
				$check_input = $this->check_login($_POST);
				// if($check_input['flag'] ==true){
					// $rs = $check_input['rs'];
					// $this->create_session($rs);
					// $url = base_url() . 'dashboard.html';
					// redirect($url);
				// }else{
					// $this->pre_message = $check_input['message'];
				// }
				
			}
			$data = array();
			$this->_templates['page'] = 'page/page_login_view';
			$this->site_library->load($this->_templates['page'],$data,'login');
		}
	}
	
	
	function dashboard(){
		$data = array();
		
		$this->_templates['page'] = 'page/page_dashboard_view';
		//$this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
	
	function check_login($data){
		$flag = true;
		$error = array();
		if(trim($data['lb_username'])==""){
			$flag = false;
			$error[] = set_error(lang('username_u'),lang('require_u'));	
		}
		if(trim($data['lb_password'])==""){
			$flag = false;
			$error[] = set_error(lang('password_u'),lang('require_u'));	
		}
		if(trim($data['lb_username'])!=""&&trim($data['lb_password'])!=""){
			$rs = $this->common->check_login($data['lb_username']);
			if(count($rs)){
				
				if(md5($data['lb_password'])!=$rs->lb_password){
					$flag = false;
					$error[] =lang('wrong_account_u');
				}else{
					if($rs->bl_status!=1){
						$flag = false;
						$error[] =lang('account_deactive_u');
					}
				}
				$data_chech['rs'] = $rs;
			}else{
				$flag = false;
				$error[] =lang('wrong_account_u');
			}
		}
		
		$data_chech['flag'] =  $flag;
		$data_chech['message'] =  $error;
		return $data_chech;
	}
	function create_session($data){
		$_SESSION['id_user'] = $data->id_user;
		$_SESSION['id_toolbox'] = $data->id_toolbox;
		$_SESSION['lb_name'] = $data->lb_name;
		$_SESSION['lb_first_name'] = $data->lb_first_name;
		$_SESSION['lb_type_permission'] = $data->lb_type_permission;
	}
	function log_out(){
		unset($_SESSION['id_user'] );
		unset($_SESSION['lb_name'] );
		unset($_SESSION['lb_first_name'] );
		unset($_SESSION['lb_type_permission'] );
		redirect('/');
	}
}
?>
