<?php
class User extends Controller{
	protected $_templates;
	protected $_table = 'tt_user';
	protected $_primary_key = 'id_user';
	protected $_field_search = 'lb_fullname';
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
	function index(){
		$data = array();
		
		$this->_templates['page'] = 'user/user_view';
		$this->site_library->load($this->_templates['page'],$data);
	}
	function save(){
		$data_res = array();
		if(IS_AJAX){
			$data = $_POST;
			$array_check =  $this->check_input($data);
			
			if($array_check['flag']== true){
				if($data['id_user'] > 0){
					// proccess update data
					$data_update = $this->build_data($data,0);
					$id = $data['id_user'];
					if($this->common->update_data($this->_table,$data_update,$this->_primary_key,$id)){
						$data_res['message'] = 'Cập nhập thành công!';
					}else{
						$data_res['message'] = 'Cập nhập bị lỗi!';
					}
				}else{
					//proccess insert data
					$data_update = $this->build_data($data,1);
					if($this->common->insert_data($this->_table,$data_update)){
						$data_res['message'] = 'Thêm thành công!';
					}else{
						$data_res['message'] = 'Thêm bị lỗi!';
					}
				}
				$data_res['flag'] = true;
			}else{
				$data_res['flag'] = false; 
				$data_res['error'] = $array_check['error']; 
			}
			echo json_encode($data_res);
			exit;
		}else{
			redirect('/');
		}
	}
	function  check_input($data){
		$flag = true;
		$error =array();
		if(trim($data['lb_fullname'])==""){
			$error[] ="Yêu cầu nhập họ tên!";	
		}
		if(trim($data['lb_username'])==""){
			$error[] ="Yêu cầu nhập username";	
		}else{
			$check =$this->common->check_duplicate($this->_table,'lb_username',$data['lb_username'],$this->_primary_key,$data['id_user']);
			if(!$check){
				$error[] = 'Username đã tồn tại!';
			}
		}
		if(trim($data['lb_password'])==""){
			if($data['id_user'] >0){
			}else{	
				$error[] ="Yêu cầu nhập password!";	
			}
		}
		if(trim($data['lb_address'])==""){
			$error[] ="Yêu cầu nhập địa chỉ!";	
		}
		if(trim($data['lb_phone'])==""){
			$error[] ="Yêu cầu nhập điện thoại!";	
		}
		if(trim($data['lb_email'])==""){
			$error[] ="Yêu cầu nhập email!";	
		}
		if(!empty($error)){
			$flag = false;
		}
		$data_check['flag'] = $flag;
		$data_check['error'] = $error;
		return $data_check;
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

	function edit($id){
		$data = array();
		$flag =  true ;
		$result = $this->common->get_item($this->_table,$this->_primary_key,$id);
		if(empty($result)){
			$flag =  false ;
		}
		$array = array();
		foreach($result as $k=>$v){
			$array[$k] =$v;
		} 
		$data_res['flag'] = $flag;
		$data_res['detail'] = $array;
		echo json_encode($data_res);
	}

	function build_data($data,$flag=1){
		//flag=1:0?insert:update
		$dataUpdate["lb_username"]=formatInputStr(trim($data["lb_username"]));
		$dataUpdate["lb_fullname"]=formatInputStr(trim($data["lb_fullname"]));
		$dataUpdate["lb_address"] = formatInputStr(trim($data["lb_address"]));
		$dataUpdate["lb_phone"] = formatInputStr(trim($data["lb_phone"]));
		$dataUpdate["lb_email"] = formatInputStr(trim($data["lb_email"]));
		$bl_active = (int)trim($data["bl_active"]) ;
		$dataUpdate["bl_active"] = $bl_active;
		
		if($flag==1){
			$dataUpdate["lb_password"] = md5(formatInputStr(trim($data["lb_password"])));
			$dataUpdate["dt_create"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_create_by'] = SESSIONUSER;
		}else{
			if(!empty($data["lb_password"])){
				$dataUpdate["lb_password"] = md5(formatInputStr(trim($data["lb_password"])));
			}
			$dataUpdate["dt_update"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_update_by'] = SESSIONUSER;
		}
		return $dataUpdate;
	}
	
	function del(){
		$flag = false;
		if(isset($_POST['id_user'])&&$_POST['id_user']>0){
			$id = $_POST['id_user'];
			$arr_where = array($this->_primary_key=>$id);
			if($this->common->delete_data($this->_table,$arr_where)){
				$flag = true;
			}
		}
		$data_res['flag'] = $flag;
		echo  json_encode($data_res);
	}
	function load_grid(){
		$per_page  = PER_PAGE;
		$arr_search = array();
		$total_page = 0;
		if(isset($_POST['ofs'])){
			$ofs = $_POST['ofs'];
		}
		$ofs = 1;
		if (empty($ofs) || $ofs <1){$ofs =1;}
		$start =($ofs - 1)* $per_page;
		
		$total_rows = $this->common->get_num_rows($this->_table,$arr_search);
		$data['num'] = $total_rows;
		$result =   $this->common->get_all_paging($this->_table,$this->_primary_key,$per_page , $start,$arr_search);		
		$array = array();
		if($total_rows > 0){
			foreach($result as $row){
				$array[] =$row;
			} 
		}
		$total_page = ceil($total_rows / $per_page );
		$data_res['ofs'] = $ofs;
		$data_res['total_page'] = $total_page;
		$data_res['list'] = $array;
		echo json_encode($data_res);
	}
	function load_grid_paging(){
		$per_page  = PER_PAGE;
		$arr_search = array();
		$total_page = 0;
		
		$ofs = 1;
		if(isset($_POST['page_current'])){
			$ofs = $_POST['page_current'];
		}
		if (empty($ofs) || $ofs <1){$ofs =1;}
		$start =($ofs - 1)* $per_page;
		
		$total_rows = $this->common->get_num_rows($this->_table,$arr_search);
		$data['num'] = $total_rows;
		$result =   $this->common->get_all_paging($this->_table,$this->_primary_key,$per_page , $start,$arr_search);		
		$array = array();
		if($total_rows > 0){
			foreach($result as $row){
				$array[] =$row;
			} 
		}
		$total_page = ceil($total_rows / $per_page );
		$data_res['ofs'] = $ofs;
		$data_res['total_page'] = $total_page;
		$data_res['list'] = $array;
		echo json_encode($data_res);
	}
}
?>
