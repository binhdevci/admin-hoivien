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
			$_SESSION['flag_upload'] = $data['flag_upload'];
			redirect(base_url().'payment.html');
		}
		$this->_templates['page'] = 'payment/payment_view';
		// $this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
	private function __upload_file(){
		$id_user = -1;
						if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
							$id_user = $_SESSION['id_user'];
						}
		$flag = false;
		if(isset($_POST['type-submit'])&&$_POST['type-submit']==1&&!empty($_FILES['filedata']['name'])){
			
			$folderName = date('Y-m-d-h-i');
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
					

					try {
						$this->load->file(APPPATH.'libraries/PHPExcel.php'); //full path to 
						$this->load->file(APPPATH.'libraries/PHPExcel/IOFactory.php'); //full path to 
						$objPHPExcel = IOFactory::load($lb_path);
						$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
						//extract to a PHP readable array format
						foreach ($cell_collection as $cell) {
							$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
							$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
							$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
							//header will/should be in row 1 only. of course this can be modified to suit your need.
							if ($row == 2) {
								$header[$row][$column] = $data_value;
							} else {
								if($row>2){
									$arr_data[$row][$column] = $data_value;
								}
							}
						}
						//send the data in an array format
						$data['header'] = $header;
						$data['values'] = $arr_data;
						// print_r($data);
						// exit;
						$insert_id = 0;
						
						foreach ($data['values'] as $row){
							$data_payment = array();
							if(!empty($row['A'])&&!empty($row['B'])&&!empty($row['C'])){
								$data_payment['dt_receive'] = $this->format_date_mysql_payment($row['A']);
								$data_payment['lb_fullname'] = $row['B'];
								$data_payment['cd_member'] = $row['C'];
								$data_payment['nb_amount'] = (float)$row['J'];
								$this->common->insert_data('tt_payment',$data_payment);
								$insert_id = $this->db->insert_id();
								$data_payment = array();
								
								$data_payment['dt_receive'] = $this->format_date_mysql_payment($row['A']);
								$data_payment['lb_fullname'] = $row['D'];
								$data_payment['cd_member'] = $row['E'];
								$data_payment['nb_amount'] = (float)$row['F'];
								$data_payment['id_payment'] = $insert_id;
								$this->common->insert_data('tt_payment_detail',$data_payment);
							}else{
								$data_payment['dt_receive'] = $this->format_date_mysql_payment($row['A']);
								$data_payment['lb_fullname'] = $row['D'];
								$data_payment['cd_member'] = $row['E'];
								$data_payment['nb_amount'] = (float)$row['F'];
								$data_payment['id_payment'] = $insert_id;
								$this->common->insert_data('tt_payment_detail',$data_payment);
							}
							/* if(!empty($row['A'])&&!empty($row['B'])&&!empty($row['C'])&&!empty($row['D'])&&!empty($row['E'])){
								$data_payment['cd_member'] = $row['A'];
								$data_payment['lb_fullname'] = $row['B'];
								$data_payment['lb_fullname_receive'] = $row['C'];
								$data_payment['nb_amount'] = (float)$row['D'];
								$data_payment['dt_receive'] = $this->format_date_mysql_payment($row['E']);
								$data_payment["dt_create"] = date('Y-m-d H:i:s') ;
								$data_payment['id_create_by'] = $id_user ;
								$this->common->insert_data('tt_payment',$data_payment);
							} */
						}
					} catch (Exception $e) {
						
					}
				
				//exit;
						// define('EXCEL_HOME', dirname(dirname(__FILE__)));
						// require('vendor/excel/php-excel-reader/excel_reader2.php');
						// require('vendor/excel/SpreadsheetReader.php');
						// $Spreadsheet = new SpreadsheetReader($lb_path);
						// $Sheets = $Spreadsheet -> Sheets();
						// foreach ($Spreadsheet as $Key => $Row){
							// $data_payment = array();	
							// if ($Row &&!empty($Row)){
								// if($Key >0){
									// if(!empty($Row[0])&&!empty($Row[1])&&!empty($Row[2])&&!empty($Row[3])&&!empty($Row[4])){
										// $data_payment['cd_member'] = $Row[0];
										// $data_payment['lb_fullname'] = $Row[1];
										// $data_payment['lb_fullname_receive'] = $Row[2];
										// $data_payment['nb_amount'] = (float)$Row[3];
										// $data_payment['dt_receive'] = $this->format_date_mysql_payment($Row[4]);
										// $data_payment["dt_create"] = date('Y-m-d H:i:s') ;
										// $data_payment['id_create_by'] = $id_user ;
										// $this->common->insert_data('tt_payment',$data_payment);
									// }
								// }
							// }
						// }
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
				$row->nb_amount = number_format($row->nb_amount);
				
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
				$row->nb_amount = number_format($row->nb_amount);
				$array[] = $row;
			} 
		}
		$total_page = ceil($total_rows / $per_page );
		$data_res['ofs'] = $ofs;
		$data_res['total_page'] = $total_page;
		$data_res['list'] = $array;
		echo json_encode($data_res);
	}
	function detail($id_payment){
		if(isset($_SESSION['id_user'])&&$_SESSION['id_user']>0){
		}else{
			redirect('/');
		}
		$data['rs'] = $this->common->detail_payment($id_payment);
		$data['main'] = $data['rs'][0];
		$this->_templates['page'] = 'payment/payment_detail_view';
		// $this->load->view($this->_templates['page'],$data);
		$this->site_library->load($this->_templates['page'],$data);
	}
}
?>
