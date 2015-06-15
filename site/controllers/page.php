<?php
class Page extends Controller{
	protected $_templates;
	function Page(){
		parent::Controller();
		@session_start();
		$this->pre_message = "";
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
				if($check_input['flag'] ==true){
					$rs = $check_input['rs'];
					$this->create_session($rs);
					$url = base_url() . 'dashboard.html';
					redirect($url);
				}else{
					$this->pre_message = $check_input['message'];
				}
				
			}
			$data = array();
			$data['message'] = $this->pre_message;
			$this->_templates['page'] = 'page/page_login_view';
			$this->site_library->load($this->_templates['page'],$data,'login');
		}
	}
	
	
	function dashboard(){
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
		}else{
			redirect('/');
		}
		$data = array();
		$this->_templates['page'] = 'page/page_dashboard_view';
		$this->site_library->load($this->_templates['page'],$data);
	}
	
	function check_login($data){
		$flag = true;
		$error = array();
		if(trim($data['lb_username'])==""){
			$flag = false;
			$error[] = 'Yêu cầu nhập Username';	
		}
		if(trim($data['lb_password'])==""){
			$flag = false;
			$error[] = 'Yêu cầu nhập Password';	
		}
		if(trim($data['lb_username'])!=""&&trim($data['lb_password'])!=""){
			$rs = $this->common->check_login($data['lb_username']);
			if(count($rs)){
				
				if(md5($data['lb_password'])!=$rs->lb_password){
					$flag = false;
					$error[] = "Vui lòng kiểm tra Username hoặc Password";
				}else{
					if($rs->bl_active!=1){
						$flag = false;
						$error[] ='Tài bạn đã khóa vui lòng liên hệ Administor';
					}
				}
				$data_chech['rs'] = $rs;
			}else{
				$flag = false;
				$error[] = "Vui lòng kiểm tra Username hoặc Password";
			}
		}
		
		$data_chech['flag'] =  $flag;
		$data_chech['message'] =  $error;
		return $data_chech;
	}
	function create_session($data){
		$_SESSION['id_user'] = $data->id_user;
		$_SESSION['lb_fullname'] = $data->lb_fullname;
		$_SESSION['lb_image'] = $data->lb_image;
		$_SESSION['bl_super_admin'] = $data->bl_super_admin;
	}
	function log_out(){
		unset($_SESSION['id_user'] );
		unset($_SESSION['lb_fullname'] );
		redirect('/');
	}
}
?>
