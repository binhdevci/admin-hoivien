<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>
	
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="#">Trang chủ</a>
		</li>
		
		<li>
			<a href="#">Thành viên</a>
		</li>
		<li class="active">Thanh toán</li>
	</ul><!-- /.breadcrumb -->
	<div style="float:right;" class="breadcrumb">
		<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal">
			<i class="ace-icon glyphicon glyphicon-th" ></i>
			Import data
		</button>

	</div>
	
</div>
	<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Import data</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <div class="col-xs-12">
				<label class="ace-file-input"><input type="file" name="filedata"><span data-title="Choose" class="ace-file-container"><span data-title="please choose file  ..." class="ace-file-name"><i class=" ace-icon fa fa-upload"></i></span></span><a href="#" class="remove"><i class=" ace-icon fa fa-times"></i></a></label>
				</div>
            </div>
			<div class="space-10"></div>
			
			<div class="form-group" >
              <div class="col-xs-12" style="padding-bottom: 20px;padding-top: 20px;">
			  <b>Mẫu dữ liệu tham khảo</b>
			  <br/>
				<img src="<?php echo base_url()?>templates/img/template.png" width="475"/>
				</div>
				<div class="clear"></div>
            </div>
			
				<input type="hidden" name="type-submit" value="1"/>
			<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>
          </form>
        </div>
      
      </div>
      
    </div>
</div>
<div class="page-content">
	
	<div class="page-content-area">
		
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="page-content-area">
					<div class="page-header">
						<h1>
							Quản lý thanh toán
						</h1>
					</div><!-- /.page-header -->
					<? if(isset($_SESSION['flag_upload'])){
						$flag_upload = $_SESSION['flag_upload'];
						?>
					<div class="alert alert-success" id="message">
							<strong>
								<i class="ace-icon fa fa-check"></i>
							</strong>
						<?
							if($flag_upload==true){
								echo "upload file thành công!!!";
							}else{
								echo "upload file có vấn đề vui lòng thử lại!!!";
							}
							unset($_SESSION['flag_upload']);
						?>
							
						
					</div>
					<? } ?>
					<form class="form-horizontal" role="form" onsubmit="return false;">
						<div class="col-xs-12 target" >
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="space-10"></div>
								<div class="col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Mã số</label>
										<div class="col-sm-8 col-xs-9">
											<input id="cd_member" type="text"  class="col-xs-6 col-sm-10"  />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Họ và tên</label>
										<div class="col-sm-8 col-xs-9">
											<input id="lb_fullname" type="text"  placeholder="Họ và tên" class="col-xs-6 col-sm-10" />
										</div>
									</div>
									<!-- <div class="form-group">
										<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số điện thoại</label>
										<div class="col-sm-4 col-xs-9">
											<input id="lb_phone" type="text"  placeholder="Số điện thoại" class="col-xs-6 col-sm-10" />
										</div>
									</div> -->
									
									
								</div>
								
								<div class="col-sm-6 col-xs-12">
									
									<div class="form-group">
										<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Từ ngày</label>
										<div class="col-sm-4 col-xs-9">
											<input id="dt_from" type="text"  placeholder="Từ ngày" class="col-xs-6 col-sm-10" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Đến ngày</label>
										<div class="col-sm-4 col-xs-9">
											<input id="dt_to" type="text"  placeholder="Đến ngày" class="col-xs-6 col-sm-10" />
										</div>
									</div>
									
								</div>
							</div>
							<!--//Bank account-->
							
							<!--//End bank account-->
							<div class="space-10"></div>
							<input id="page_current" type="hidden" value="1" >
							<input id="id_member" type="hidden" value="0" >
							<div class="row overw-style">
								<center>
									<p class="float-right">
										<button class="btn btn-white btn-default btn-bold" onclick="common.load_grid_payment(true);">
											<i class="ace-icon fa fa-search bigger-120 orange"></i>
											Tìm kiếm
										</button>
										<button class="btn btn-white btn-default btn-bold" onclick="$('.form-horizontal')[0].reset();common.load_grid_payment(true);">
											<i class="ace-icon fa fa-undo bigger-120 orange"></i>
											Làm mới
										</button>
									</p>
								</center>
								
							</div><!--//end user detail -->
							
							
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
						
					</form>
					<div class="space-10"></div>
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="col-xs-12">
									<table class="table table-striped table-bordered table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center" style="width:20px;">
													<label class="position-relative">
														<input type="checkbox" class="ace"> 
														<span class="lbl"></span>
													</label>
												</th>
												<th>Mã số</th>
												<th>Họ tên</th>
												<th class="hidden-480">Thu nhập từ HV</th>
												
												<th class="hidden-480">
													Thu nhập
												</th>
												<th  style="width:200px;">Chức năng</th>
											</tr>
										</thead>
										
										<tbody class="payment-member-grid">
											<script>
												common.load_grid_payment(true);
											</script>
										</tbody>
									</table>
								</div><!-- /.span -->
								<div class="col-xs-12"  id="paging-form">
								</div>		
							</div>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
					
				</div><!-- /.page-content-area -->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content-area -->
</div><!-- /.page-content -->
<script id="payment-member-grid" type="text/x-jquery-tmpl">
	<tr>
	<td class="center">
		<label class="position-relative">
			<input type="checkbox" class="ace">
			<span class="lbl"></span>
		</label>
	</td>

	<td>
		${cd_member}
	</td>
	<td>${lb_fullname}</td>
	<td class="hidden-480"><i class="ace-icon fa fa-eye"><a href="<?=base_url()?>payment-detail-${id_payment}.html" data-toggle="modal">Xem chi tiết HV</a></i> </td>
	<td>${nb_amount}VNĐ</td>
	<td>
		
	</td>

	
</tr>


</script>
 <script type="text/javascript">
										
									 
	  var cal = Calendar.setup({
		onSelect: function(cal) { cal.hide();}
		});
		cal.manageFields("dt_from", "dt_from",'%Y-%m-%d');
		cal.manageFields("dt_to", "dt_to",'%Y-%m-%d');

  </script>
	  <script>
	function remove(){
		$('#message').toggle("slow");
	}
	$(function() {
		// common.find_info_person_introduce();
		// common.find_info_person_assign();
		<? if(isset($flag_upload)){?>
		 setTimeout("remove()", 5000);
		<? }?>
	});
	
</script>
<script id="item_member" type="text/x-jquery-tmpl"> 
	<span>
		${cd_member}-${lb_fullname}
	</span>
</script>