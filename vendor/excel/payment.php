<?php
class Payment extends Controller{
	protected $_templates;
	protected $_table = 'tt_payment';
	protected $_primary_key = 'id_payment';
	protected $_field_search = 'lb_fullname';
	function Payment(){
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
		if(isset($_POST['type-submit'])&&$_POST['type-submit']==1){
			$data['flag_upload'] = $this->__upload_file();
		}
		$this->_templates['page'] = 'payment/payment_view';
		// $this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
	private function __upload_file(){
		set_time_limit ( 30);
		$id_user = -1;
						if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
							$id_user = $_SESSION['id_user'];
						}
		$flag = false;
		if(isset($_POST['type-submit'])&&$_POST['type-submit']==1&&!empty($_FILES['filedata']['name'])){
			
			$folderName = '2015-11-16-11-27';
			$array= array('xls','xlsx','xlsm','xlsb');
			$extension = strtolower($this->__file_extension(stripslashes($_FILES['filedata']['name']))); 
			if (in_array($extension, $array)) {
				$pathToUpload = 'uploads/' . $folderName;
				$pathDir = '/' . $folderName.'/';
				if ( ! file_exists($pathToUpload) )	{
					$create = mkdir($pathToUpload, 0777);
					if ( ! ($create))
					return;
				}
				if(is_uploaded_file($_FILES['filedata']['tmp_name'])){
					$name = $_FILES['filedata']['name'] ;  
					$extension = strtolower($this->__file_extension(stripslashes($_FILES['filedata']['name']))); 
					$lb_path = $pathToUpload.'/'. $name ;
					if(move_uploaded_file($_FILES['filedata']['tmp_name'], $lb_path)){
						try{
							chmod($lb_path, 0755);
							define('_root',$_SERVER['DOCUMENT_ROOT']);
							// include(_root.'/Control/Profile_Control.php');
							define('EXCEL_HOME', dirname(dirname(__FILE__)));
							include(_root.'/site/vendor/excel/php-excel-reader/excel_reader2.php');
							include(_root.'/site/vendor/excel/SpreadsheetReader.php');
							$Spreadsheet = new SpreadsheetReader($lb_path,false);
							// print_r($Spreadsheet);
							// exit;
							$Sheets = $Spreadsheet -> Sheets();
							foreach ($Spreadsheet as $Key => $Row){
								$data_payment = array();	
								if ($Row &&!empty($Row)){
									if($Key >0){
										if(!empty($Row[0])&&!empty($Row[1])&&!empty($Row[2])&&!empty($Row[3])&&!empty($Row[4])){
											$data_payment['cd_member'] = $Row[0];
											$data_payment['lb_fullname'] = $Row[1];
											$data_payment['lb_fullname_receive'] = $Row[2];
											$data_payment['nb_amount'] = (float)$Row[3];
											$data_payment['dt_receive'] = $this->format_date_mysql_payment($Row[4]);
											$data_payment["dt_create"] = date('Y-m-d H:i:s') ;
											$data_payment['id_create_by'] = $id_user ;
											$this->common->insert_data('tt_payment',$data_payment);
										}
									}
								}
							}
						}catch(Exception  $e){
							// print_r($e->getMessage());
							// exit;
						}
						$flag = true;
						$dataUpdate = array();
						
						$dataUpdate["lb_path"]= $lb_path ;
						$dataUpdate["dt_create"] = date('Y-m-d H:i:s') ;
						$dataUpdate['id_create_by'] = $id_user ;
						$this->common->insert_data('tt_upload_file',$dataUpdate);
					}else{
						
					}   
					
				}
			}
			
			
		}
		return $flag;
	}
	function format_date_mysql_payment($date){
		if(empty($date)){
			return NULL;
		}else{
			$arr = explode('/',$date);
			return $arr[2].'-'.$arr[1].'-'.$arr[0];
		}
	}
	private function __file_extension($filename){
		$path_info = pathinfo($filename); 
		return $path_info['extension'];
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
		$arr_search =$_POST;
		$total_rows = $this->common->get_num_rows_payment($this->_table,$arr_search);
		$data['num'] = $total_rows;
		$result =   $this->common->get_all_paging_payment($this->_table,$this->_primary_key,$per_page , $start,$arr_search);		
		$array = array();
		if($total_rows > 0){
			foreach($result as $row){
				if($row->dt_receive!=null){
					$row->dt_receive = format_date_view($row->dt_receive);
				}else{
					$row->dt_receive = "";
				}
				// $member = $this->common->get_person_member($row->id_person_introduce);
				// if(!empty($member)){
					// $row->lb_person_introduce = $member->cd_member.' '.$member->lb_fullname;;
				// }else{
					// $row->lb_person_introduce = "";
				// }
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
		$arr_search =$_POST;
		$total_rows = $this->common->get_num_rows_payment($this->_table,$arr_search);
		$data['num'] = $total_rows;
		$result =   $this->common->get_all_paging_payment($this->_table,$this->_primary_key,$per_page , $start,$arr_search);		
		$array = array();
		if($total_rows > 0){
			foreach($result as $row){
				
				if($row->dt_receive!=null){
					$row->dt_receive = format_date_view($row->dt_receive);
				}else{
					$row->dt_receive = "";
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
}
?>
