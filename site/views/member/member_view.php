<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="#">Thông tin chung</a>
						</li>

						<li class="active">Quản lý thành viên</li>
					</ul><!-- /.breadcrumb -->
					<div class="breadcrumb" style="float:right;">
							<button class="btn btn-xs btn-success" onclick="common.expend_collap();" >
								<i id="ex-coll" class="ace-icon glyphicon glyphicon-plus"></i>
								Thông tin
							</button>

					</div>
				</div>

				<div class="page-content">
					<fieldset class="scheduler-border">
						<div class="page-content-area">
						<div class="row">
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
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngày sinh</label>
											<div class="col-sm-4 col-xs-9">
												<input id="lb_birthday" type="text"  placeholder="Ngày sinh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Địa chỉ thường trú</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_address_resident" type="text"  placeholder="Thường trú tại..." class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Địa chỉ tạm trú</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_address_staying" type="text"  placeholder="Tạm trú tại..." class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Điện thoại</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_phone" type="text"  placeholder="Điện thoại" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Email</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_email" type="text"  placeholder="Email" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Trạng thái</label>
											<div class="checkbox">
												<label>
													<input id="bl_active" type="checkbox" class="ace" name="form-field-checkbox" value="1">
													<span class="lbl"> </span>
												</label>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6 col-xs-12">
											
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> CMND</label>
												<div class="col-sm-8 col-xs-9">
													<input id="lb_id_card" type="text"  placeholder="Số CMND" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngày cấp</label>
												<div class="col-sm-4 col-xs-9">
													<input id="dt_range" type="text"  placeholder="Ngày cấp" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Nơi cấp</label>
												<div class="col-sm-8 col-xs-9">
													<input id="lb_place_of_issue" type="text"  placeholder="Nơi cấp" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Người giới thiệu</label>
												<div class="col-sm-8 col-xs-9">
													<input id="lb_person_introduce" type="text"  placeholder="Gõ để tìm kiếm" class="col-xs-6 col-sm-10" />
													<input id="id_person_introduce" type="hidden" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Người chỉ định</label>
												<div class="col-sm-8 col-xs-9">
													<input id="lb_person_assign" type="text" placeholder="Gõ để tìm kiếm" class="col-xs-6 col-sm-10" />
													<input id="id_person_assign" type="hidden" />
												</div>
											</div>
<<<<<<< HEAD
											<!--<div class="form-group">
=======
											<div class="form-group">
>>>>>>> 0aad03419e42a8776caa2e2a2ee2cb2199eae06a
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số lần đóng hụi
												
												</label>
												<div class="col-sm-4 col-xs-9">
													<input id="nb_payment" type="text"  placeholder="Số lần đóng hụi" class="col-xs-6 col-sm-10" />
												</div>
<<<<<<< HEAD
											</div>-->
=======
											</div>
>>>>>>> 0aad03419e42a8776caa2e2a2ee2cb2199eae06a
									</div>
								</div>
								<!--//Bank account-->
								<div class="row">
									<div class="page-content-area">
										<div class="page-header">
											<h1>
												Thông tin tài khoản
											</h1>
										</div><!-- /.page-header -->
									</div>
									<div class="col-sm-6 col-xs-12">
									<label class="col-sm-12 col-xs-12 title-bankaccount-info" for="form-field-1"> Tài khoản hưởng thụ </label>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Tên chủ tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_name_account_1" type="text"  placeholder="Tên chủ tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_number_account_1" type="text"  placeholder="Số tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngân hàng</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_name_bank_1" type="text"  placeholder="Ngân hàng" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Chi nhánh</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_bank_branch_1" type="text"  placeholder="Chi nhánh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
									</div>
									<!--<div class="col-sm-6 col-xs-12">
									<label class="col-sm-12 col-xs-12 title-bankaccount-info" for="form-field-1"> Tài khoản hưởng thụ thứ 2</label>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Tên chủ tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_name_account_2" type="text"  placeholder="Tên chủ tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_number_account_2" type="text"  placeholder="Số tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngân hàng</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_name_bank_2" type="text"  placeholder="Ngân hàng" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Chi nhánh</label>
											<div class="col-sm-8 col-xs-9">
												<input id="lb_bank_branch_2" type="text"  placeholder="Chi nhánh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
									</div>-->
								</div>
								<!--//End bank account-->
								<div class="space-10"></div>
								<input id="page_current" type="hidden" value="1" >
								<input id="id_member" type="hidden" value="0" >
								<div class="row overw-style">
										<center>
										<p class="float-right">
											<button class="btn btn-white btn-default btn-bold" onclick="common.save_member();">
												<i class="ace-icon fa fa-save bigger-120 orange"></i>
												Lưu
											</button>
											<button class="btn btn-white btn-default btn-bold" onclick="common.load_grid_member_paging(1);">
												<i class="ace-icon fa fa-search bigger-120 orange"></i>
												Tìm kiếm
											</button>
											<button class="btn btn-white btn-default btn-bold" onclick="common.delete_member_edit();">
												<i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
												Xóa
											</button>
											<button class="btn btn-white btn-default btn-bold" onclick="common.reset_form_member();	common.load_grid_member(true);">
												<i class="ace-icon fa fa-undo bigger-120 orange"></i>
												Làm mới
											</button>
										</p>
										</center>
									
								</div><!--//end user detail -->
								
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							</form>
						</div><!-- /.row -->
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
															<!-- <input type="checkbox" class="ace"> -->
															<span class="lbl"></span>
														</label>
													</th>
													<th>Mã số</th>
													<th>Họ tên</th>
													<th class="hidden-480">Người giới thiệu</th>
													<th >
														Điện thoại
													</th>
<<<<<<< HEAD
													
=======
													<th >
														Số lần đóng hụi
													</th>
>>>>>>> 0aad03419e42a8776caa2e2a2ee2cb2199eae06a
													<th class="hidden-480">
														Tình trạng
													</th>
													<th  style="width:200px;">Chức năng</th>
												</tr>
											</thead>

											<tbody class="member-grid">
												<script>
													common.load_grid_member(true);
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
					</fieldset>	
				</div><!-- /.page-content -->
			<!-- inline scripts related to this page -->
<script id="member-grid" type="text/x-jquery-tmpl">
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
	<td><a href="javascript:;;">${lb_fullname}</a></td>
	<td class="hidden-480">${lb_person_introduce}</td>
	<td>${lb_phone}</td>
<<<<<<< HEAD
=======
	<td>${nb_payment}</td>
>>>>>>> 0aad03419e42a8776caa2e2a2ee2cb2199eae06a
	<td>
	{{if $.trim(bl_delete)==1}} 
			
			<span class="label label-danger ">
				<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
				Đã xóa
			</span>

		{{else}} 
			{{if $.trim(bl_active)==1}} Được truy cập{{else}} 
			Đã khóa
			{{/if}}
	{{/if}}
	</td>

	<td>
		{{if $.trim(bl_delete)==1}} 
			

		{{else}} 
			<div class=" btn-group">
				<button class="btn btn-xs btn-info" onclick="common.load_member_detail(${id_member})">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>
					<button class="btn btn-xs btn-danger" onclick="common.delete_member(${id_member})" >
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>
			</div>
		{{/if}}
		
	</td>
</tr>


</script>
 <script type="text/javascript">
										
									 
	  var cal = Calendar.setup({
		onSelect: function(cal) { cal.hide();}
		});
		cal.manageFields("lb_birthday", "lb_birthday",'%Y-%m-%d');
		cal.manageFields("dt_range", "dt_range",'%Y-%m-%d');

  </script>
	  <script>
	
	$(function() {
		common.find_info_person_introduce();
		common.find_info_person_assign();
	});
	
</script>
<script id="item_member" type="text/x-jquery-tmpl"> 
	<span>
		${cd_member}-${lb_fullname}
	</span>
</script>