<?php
class User extends Controller{
	protected $_templates;
	protected $_table = 'tt_user';
	protected $_primary_key = 'id_user';
	protected $_field_search = 'lb_name';
	function User(){
		parent::Controller();
		@session_start();
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
		}else{
			redirect('/');
		}
		$this->pre_message = "";
		$this->load->model('common_model','common');
		
	}
	
	/**
	* @author binh ngo
	* @method load page default
	* @date 1/4/2014
	*/
	function index(){
		$data = array();
		$arr_search = array();
		$q = isset($_GET['q'])?$_GET['q']:'' ;
		if(!empty($q)){
			$arr_search['key_search']=$q;
			$arr_search['field_search']=$this->_field_search;
		}
		$url = base_url() . 'user.html?q='.$q;
		$total_rows = $this->common->get_num_rows($this->_table,$arr_search);
		$config=build_config_paging($url,$total_rows);
		$this->pagination->initialize($config);
		$data['pagination']    = $this->pagination->create_links(); 
		$start = isset($_GET['page'])?(int)$_GET['page']:0 ;
		$data['num'] = $total_rows;
		$data['list'] =   $this->common->get_all_paging($this->_table,$this->_primary_key,PER_PAGE, $start,$arr_search);		
		$data['url_search'] = base_url() . 'user.html?q=';
		$this->_templates['page'] = 'user/user_view';
		$this->site_library->load($this->_templates['page'],$data);
	}
	/**
	* @author binh ngo
	* @method load page default
	* @date 14/1/2015
	*/
	function add(){
		$data = array();
		if(isset($_POST['submit'])){
			$check_input = $this->check_error($_POST,0);
			if($check_input['flag'] ==true){
				$data = $this->build_data($_POST,1);
				if($this->common->insert_data($this->_table,$data)){
					$url = base_url() . 'user.html';
					redirect($url);
				}
			}else{
				$this->pre_message = $check_input['message'];
			}
		}
		$url_reset = base_url() . 'user-add.html';
		$data['url_reset'] = $url_reset;
		$data['message'] = $this->pre_message;
		$data['list_group'] = $this->common->get_parent('r_user_group');
		$this->_templates['page'] = 'user/user_add_view';
		$this->site_library->load($this->_templates['page'],$data);
	}
	function check_error($data,$val_primary_key){
		if(empty($data)){
			return true;
		}
		$flag =true;
		$error = array();
		if(trim($data['lb_name'])==""){
			$flag = false;
			$error[] = set_error(lang('name_u'),lang('require_u'));	
		}
		if(trim($data['lb_first_name'])==""){
			$flag = false;
			$error[] = set_error(lang('firstname_u'),lang('require_u'));	
		}
		if(trim($data['nb_employee'])==""){
			$flag = false;
			$error[] = set_error(lang('employeenumber_u'),lang('require_u'));	
		}
		if(trim($data['id_user_group'])<1){
			$flag = false;
			$error[] = set_error(lang('group_u'),lang('require_u'));	
		}
		if(trim($data['lb_username'])==""){
			$flag = false;
			$error[] = set_error(lang('username_u'),lang('require_u'));	
		}else{
			$check =$this->common->check_duplicate($this->_table,'lb_username',$data['lb_username'],$this->_primary_key,$val_primary_key);
			if(!$check){
				$error[] = set_error(lang('username_u'),lang('dulicate_field_u'));
				$flag = false;
			}
		}
		if($val_primary_key==0){
			if(trim($data['lb_password'])==""){
				$flag = false;
				$error[] = set_error(lang('password_u'),lang('require_u'));	
			}
		}
		$data_chech['flag'] =  $flag;
		$data_chech['message'] =  $error;
		return $data_chech;
	}
	/**
	* @author binh ngo
	* @method edit
	* @date 14/1/2015
	*/
	function edit($id){
		$data = array();
		$rs = $this->common->get_item($this->_table,$this->_primary_key,$id);
		if(empty($rs)){
			$url = base_url() . 'user.html';
			redirect($url);
		}
		if(isset($_POST['submit'])){
			$check_input = $this->check_error($_POST,$id);
			if($check_input['flag'] ==true){
				$data = $this->build_data($_POST,0);
				if($this->common->update_data($this->_table,$data,$this->_primary_key,$id)){
					$url = base_url() . 'user.html';
					redirect($url);
				}
			}else{
				$this->pre_message = $check_input['message'];
			}
		}
		$url_reset = base_url() . 'user-'.$id.'.html';
		$data['url_reset'] = $url_reset;
		$data['message'] = $this->pre_message;
		$data['rs'] = $rs;
		$data['list_group'] = $this->common->get_parent('r_user_group');
		$this->_templates['page'] = 'user/user_edit_view';
		$this->site_library->load($this->_templates['page'],$data);
	}
	/**
	* @author binh.ngo
	* @date create 14/1/2015
	* @method build data for user
	* @return array;
	**/
	function build_data($data,$flag=1){
		//flag=10?insert:update
		$dataUpdate["lb_username"]=formatInputStr(trim($data["lb_username"]));
		$dataUpdate["lb_name"]=formatInputStr(trim($data["lb_name"]));
		$dataUpdate["lb_first_name"] = formatInputStr(trim($data["lb_first_name"]));
		$dataUpdate["nb_employee"] = formatInputStr(trim($data["nb_employee"]));
		$dataUpdate["id_user_group"]=trim($data["id_user_group"]);
		$bl_status = (int)trim($data["bl_status"]) ;
		$dataUpdate["bl_status"] = $bl_status;
		if($bl_status ==0){
			$dataUpdate["dt_deactive"] = date('Y-m-d H:i:s') ;
		}
		if($flag==1){
			$dataUpdate["lb_password"] = md5(formatInputStr(trim($data["lb_password"])));
			$dataUpdate["dt_create"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_user_create'] = SESSIONUSER;
		}else{
			if(!empty($data["lb_password"])){
				$dataUpdate["lb_password"] = md5(formatInputStr(trim($data["lb_password"])));
			}
			$dataUpdate["dt_update"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_user_update'] = SESSIONUSER;
		}
		return $dataUpdate;
	}
	/**
	 * @author binh.ngo
	 * @date create 15/1/2015
	 * @method delete record
	 * @return array;
	**/
	function del($id){
		$arr_where = array($this->_primary_key=>$id);
		if($this->common->delete_data($this->_table,$arr_where)){
			$url = base_url() . 'user.html';
			redirect($url);
		}
	}
}
?>
