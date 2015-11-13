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
							<a href="#">Quản trị</a>
						</li>
						<li class="active">Đổi mật khẩu</li>
					</ul><!-- /.breadcrumb -->

					
				</div>

				<div class="page-content">
					
					<div class="page-content-area">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="page-content-area">
									<div class="page-header">
										<h1>
											Đổi mật khẩu
										</h1>
									</div><!-- /.page-header -->
									<? if(isset($message)&&!empty($message)){?>
										<div class="alert alert-success">
										 <? foreach($message as $k=>$v){?>
												<strong>
													<i class="ace-icon fa fa-check"></i>
												</strong>
											<? echo $v."<br/>";
											}?>
										</div>
									<?}?>
										<?php
												$attributes = array('class' => 'form-horizontal', 'role' => 'form' , 'enctype'=>"multipart/form-data" ,"autocomplete"=>"off");
												echo form_open(uri_string(), $attributes);
												?>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mật khẩu hiện tại </label>
											<div class="col-sm-9">
												<input type="password" name ="pass_current" autocomplete="off" placeholder="Mật khẩu hiện tại" class="col-xs-10 col-sm-5" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mật khẩu mới </label>
											<div class="col-sm-9">
												<input type="password" name ="pass_new" autocomplete="off" placeholder="Mật khẩu mới" class="col-xs-10 col-sm-5" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nhập lại mật khẩu mới </label>
											<div class="col-sm-9">
												<input type="password" name ="pass_confirm" autocomplete="off" placeholder="Nhập lại mật khẩu mới" class="col-xs-10 col-sm-5" />
											</div>
										</div>
										<input type="hidden" name="submit" value=""/>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>
											<div class="col-sm-9">
												<button class="btn btn-info" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Cập nhật
												</button>
											</div>
										</div>
									<?=form_close()?>
								</div><!-- /.page-content-area -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			