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
					<!-- <div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div> -->
					<!-- /.nav-search -->
				</div>

				<div class="page-content">
					<fieldset class="scheduler-border">
						<div class="page-content-area">
						<div class="row">
							<form class="form-horizontal" role="form" onsubmit="return false;">
							<div class="col-xs-12 target" style ="display:none;">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="space-10"></div>
									<div class="col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Mã số</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_name" type="text" id="form-field-1" placeholder="TT150608001" class="col-xs-6 col-sm-10" disabled="disabled" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Họ và tên</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_name" type="text" id="form-field-1" placeholder="Họ và tên" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngày sinh</label>
											<div class="col-sm-8 col-xs-9">
												<input name="nb_employee" type="text" id="form-field-1" placeholder="Ngày sinh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Địa chỉ thường trú</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_password" type="text" id="form-field-1" placeholder="Thường trú tại..." class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Địa chỉ tạm trú</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_password" type="text" id="form-field-1" placeholder="Tạm trú tại..." class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Điện thoại</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_password" type="text" id="form-field-1" placeholder="Điện thoại" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1">Email</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_password" type="text" id="form-field-1" placeholder="Email" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Trạng thái</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="ace" name="form-field-checkbox">
													<span class="lbl"> </span>
												</label>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Hình đại diện</label>
												<div class="form-group">
													<div class="col-xs-6 col-sm-6">
														<input type="file" id="id-input-file-2" />
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> CMND</label>
												<div class="col-sm-8 col-xs-9">
													<input name="lb_first_name" type="text" id="form-field-1" placeholder="Số CMND" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngày cấp</label>
												<div class="col-sm-8 col-xs-9">
													<input name="lb_first_name" type="text" id="form-field-1" placeholder="Ngày cấp" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Nơi cấp</label>
												<div class="col-sm-8 col-xs-9">
													<input name="lb_first_name" type="text" id="form-field-1" placeholder="Nơi cấp" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Người giới thiệu</label>
												<div class="col-sm-8 col-xs-9">
													<input name="lb_first_name" type="text" id="form-field-1" placeholder="Selectbox cho phép search" class="col-xs-6 col-sm-10" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Người chỉ định</label>
												<div class="col-sm-8 col-xs-9">
													<input name="lb_first_name" type="text" id="form-field-1" placeholder="Selectbox cho phép search" class="col-xs-6 col-sm-10" />
												</div>
											</div>
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
									<label class="col-sm-12 col-xs-12 title-bankaccount-info" for="form-field-1"> Tài khoản hưởng thụ thứ 1</label>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Tên chủ tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Tên chủ tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Số tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngân hàng</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Ngân hàng" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Chi nhánh</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Chi nhánh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-12">
									<label class="col-sm-12 col-xs-12 title-bankaccount-info" for="form-field-1"> Tài khoản hưởng thụ thứ 2</label>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Tên chủ tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Tên chủ tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Số tài khoản</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Số tài khoản" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Ngân hàng</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Ngân hàng" class="col-xs-6 col-sm-10" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 col-xs-3 control-label no-padding-right" for="form-field-1"> Chi nhánh</label>
											<div class="col-sm-8 col-xs-9">
												<input name="lb_first_name" type="text" id="form-field-1" placeholder="Chi nhánh" class="col-xs-6 col-sm-10" />
											</div>
										</div>
									</div>
								</div>
								<!--//End bank account-->
								<div class="space-10"></div>
								<div class="row overw-style">
										<center>
										<p class="float-right">
											<button class="btn btn-white btn-default btn-bold">
												<i class="ace-icon fa fa-save bigger-120 orange"></i>
												Lưu
											</button>
											<button class="btn btn-white btn-default btn-bold">
												<i class="ace-icon fa fa-search bigger-120 orange"></i>
												Tìm kiếm
											</button>
											<button class="btn btn-white btn-default btn-bold">
												<i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
												Xóa
											</button>
											<button class="btn btn-white btn-default btn-bold">
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
													<th class="hidden-480">
														Điện thoại
													</th>
													<th class="hidden-480">
														Tình trạng
													</th>
													<th  style="width:200px;">Chức năng</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="center">
														<label class="position-relative">
															<input type="checkbox" class="ace">
															<span class="lbl"></span>
														</label>
													</td>

													<td>
														TT150608001
													</td>
													<td><a href="#">Võ Trương Hoàng Đông</a></td>
													<td class="hidden-480">Thiện Tâm</td>
													<td>0909 888 888</td>
													<td>Hoạt động</td>

													<td>
														<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-warning">
																<i class="ace-icon fa fa-flag bigger-120"></i>
															</button>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline position-relative">
																<button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-info" href="#" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td class="center">
														<label class="position-relative">
															<input type="checkbox" class="ace">
															<span class="lbl"></span>
														</label>
													</td>

													<td>
														TT150608002
													</td>
													<td><a href="#">Nguyễn Đức Trung</a></td>
													<td class="hidden-480">Thiện Tâm</td>
													<td>0919 888 888</td>
													<td>Hoạt động</td>
													<td>
														<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-warning">
																<i class="ace-icon fa fa-flag bigger-120"></i>
															</button>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline position-relative">
																<button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-info" href="#" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div><!-- /.span -->
									<div class="col-xs-12">
									<ul class="pagination pull-right no-margin">
										<li class="prev disabled">
											<a href="#">
												<i class="ace-icon fa fa-angle-double-left"></i>
											</a>
										</li>

										<li class="active">
											<a href="#">1</a>
										</li>

										<li>
											<a href="#">2</a>
										</li>

										<li>
											<a href="#">3</a>
										</li>

										<li class="next">
											<a href="#">
												<i class="ace-icon fa fa-angle-double-right"></i>
											</a>
										</li>
									</ul>
									</div>		
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
					</fieldset>	
				</div><!-- /.page-content -->
			<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Chọn',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
		</script>