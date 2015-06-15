﻿<?php
class Member extends Controller{
	protected $_templates;
	protected $_table = 'tt_member';
	protected $_primary_key = 'id_member';
	protected $_field_search = 'lb_fullname';
	function Member(){
		parent::Controller();
		@session_start();
		$this->pre_message = "";
		$this->load->model('common_model','common');
	}
	
	
	function index($lb_alias=''){
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
		}else{
			redirect('/');
		}
		
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
	function save(){
		$data_res = array();
		if(IS_AJAX){
			$data = $_POST;
			$array_check =  $this->check_input($data);
			
			if($array_check['flag']== true){
				if($data['id_member'] > 0){
					// proccess update data
					$data_update = $this->build_data($data,0);
					$id = $data['id_member'];
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
		
		if(trim($data['lb_birthday'])==""){
			$error[] ="Yêu cầu nhập ngày sinh!";	
		}
		if(trim($data['lb_address_staying'])==""){
			$error[] ="Yêu cầu nhập địa chỉ tạm trú!";	
		}
		
		if(trim($data['lb_phone'])==""){
			$error[] ="Yêu cầu nhập điện thoại!";	
		}
		if(trim($data['lb_email'])==""){
			$error[] ="Yêu cầu nhập email!";	
		}
		if(trim($data['lb_id_card'])==""){
			$error[] ="Yêu cầu nhập CMND!";	
		}
		if(trim($data['lb_name_account_1'])==""){
			$error[] ="Yêu cầu nhập tên tài khoản 1!";	
		}
		if(trim($data['lb_number_account_1'])==""){
			$error[] ="Yêu cầu nhập số tài khoản 1!";	
		}
		if(trim($data['lb_name_bank_1'])==""){
			$error[] ="Yêu cầu nhập  tên ngân hàng 1!";	
		}
		if(!empty($error)){
			$flag = false;
		}
		$data_check['flag'] = $flag;
		$data_check['error'] = $error;
		return $data_check;
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
			$member = $this->common->get_person_member($result->id_person_introduce);
			if(!empty($member)){
				$array['lb_person_introduce'] = $member->cd_member.' '.$member->lb_fullname;;
			}else{
				$array['lb_person_introduce'] ='';
			}
			$member = $this->common->get_person_member($result->id_person_assign);
			if(!empty($member)){
				$array['lb_person_assign'] = $member->cd_member.' '.$member->lb_fullname;;
			}else{
				$array['lb_person_assign'] ='';
			}
			if($k=='dt_range'){
				$array[$k] =format_date_view($v);
			}else{
				$array[$k] =$v;
			}
			
		} 
		$data_res['flag'] = $flag;
		$data_res['detail'] = $array;
		echo json_encode($data_res);
	}

	function build_data($data,$flag=1){
		//flag=1:0?insert:update
		$id_user = -1;
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
			$id_user = $_SESSION['id_user'];
		}
		$dataUpdate["lb_fullname"]=formatInputStr(trim($data["lb_fullname"]));
		$dataUpdate["lb_birthday"]=formatInputStr(trim($data["lb_birthday"]));
		$dataUpdate["lb_address_resident"] = formatInputStr(trim($data["lb_address_resident"]));
		$dataUpdate["lb_address_staying"] = formatInputStr(trim($data["lb_address_staying"]));
		$dataUpdate["lb_phone"] = formatInputStr(trim($data["lb_phone"]));
		$dataUpdate["lb_email"] = formatInputStr(trim($data["lb_email"]));
		$dataUpdate["lb_id_card"] = formatInputStr(trim($data["lb_id_card"]));
		$dataUpdate["dt_range"] = formatInputStr(trim($data["dt_range"]));
		$dataUpdate["lb_place_of_issue"] = formatInputStr(trim($data["lb_place_of_issue"]));
		$dataUpdate["id_person_introduce"] = formatInputStr(trim($data["id_person_introduce"]));
		$dataUpdate["id_person_assign"] = formatInputStr(trim($data["id_person_assign"]));
		$dataUpdate["lb_name_account_1"] = formatInputStr(trim($data["lb_name_account_1"]));
		$dataUpdate["lb_number_account_1"] = formatInputStr(trim($data["lb_number_account_1"]));
		$dataUpdate["lb_name_bank_1"] = formatInputStr(trim($data["lb_name_bank_1"]));
		$dataUpdate["lb_bank_branch_1"] = formatInputStr(trim($data["lb_bank_branch_1"]));
		$dataUpdate["lb_name_account_2"] = formatInputStr(trim($data["lb_name_account_2"]));
		$dataUpdate["lb_number_account_2"] = formatInputStr(trim($data["lb_number_account_2"]));
		$dataUpdate["lb_name_bank_2"] = formatInputStr(trim($data["lb_name_bank_2"]));
		$dataUpdate["lb_bank_branch_2"] = formatInputStr(trim($data["lb_bank_branch_2"]));
		$bl_active = (int)trim($data["bl_active"]) ;
		$dataUpdate["bl_active"] = $bl_active;
		
		if($flag==1){
			$rs = $this->common->get_max_member();
			$dataUpdate["cd_member"] = $this->generate_code($rs);
			$dataUpdate["dt_create"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_create_by'] = $id_user ;
		}else{
			$dataUpdate["dt_update"] = date('Y-m-d H:i:s') ;
			$dataUpdate['id_update_by'] = $id_user ;
		}
		return $dataUpdate;
	}
	
	function del(){
		$flag = false;
		if(isset($_POST['id_member'])&&$_POST['id_member']>0){
			$id = $_POST['id_member'];
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
				$member = $this->common->get_person_member($row->id_member);
				if(!empty($member)){
					$row->lb_person_introduce = $member->cd_member.' '.$member->lb_fullname;;
				}else{
					$row->lb_person_introduce = "";
				}
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
				
				$member = $this->common->get_person_member($row->id_member);
				if(!empty($member)){
					$row->lb_person_introduce = $member->cd_member.' '.$member->lb_fullname;;
				}else{
					$row->lb_person_introduce = "";
				}
				$array[] = $row;
			} 
		}
		$total_page = ceil($total_rows / $per_page );
		$data_res['ofs'] = $ofs;
		$data_res['total_page'] = $total_page;
		$data_res['list'] = $array;
		echo json_encode($data_res);
	}
	function generate_code($rs=array()){
		$str = "";
		if(empty($rs)){
			$str = "T".date('Ymd').'001';
		}else{
			$mystring = $rs->cd_member;
			$findme   = date('Ymd');
			$pos = strpos($mystring, $findme);
			if ($pos === false) {
				$str = "T".date('Ymd').'001';
			} else {
				 $temp = substr($rs->cd_member,(strlen($rs->cd_member)-3) ,3); 
				 $number = (int)$temp+1;
				if($number <10){
					$str = "T".date('Ymd').'00'.$number;			
				}elseif($number<100){
					$str = "T".date('Ymd').'0'.$number;
				}else{
					$str = "T".date('Ymd').$number;
				}
			}
		}
		return  $str;
	}
	function  find_member(){
		if(IS_AJAX){
			$per_page =PER_PAGE;
			$data_respone = array();
			
			if(isset($_GET['term'])){
				$query =$_GET['term'];
				$a_json = array();
				$a_json_row = array();
				$rs = $this->common->get_friend_search(formatInputStr($query),$per_page);
				foreach($rs as $row){
					$a_json_row["id"] = $row->id_member;
					$a_json_row["value"] = $row->cd_member.' '.$row->lb_fullname;;
					$a_json_row["label"] = $row->cd_member.' '.$row->lb_fullname;
					array_push($a_json, $a_json_row);
				}
			}
			echo json_encode($a_json);
			exit;
		}
	}
}
?>
