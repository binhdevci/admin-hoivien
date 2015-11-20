	<script type="text/javascript">
		window.onload = function() {
		  var input = document.getElementById("username").focus();
		}
	</script>
	<div class="row" style="padding-top:150px;">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<!-- <div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Ace</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div> -->

							<div class="space-6"></div>
								<?php
								$attributes = array('class' => 'form-horizontal', 'role' => 'form' , 'enctype'=>"multipart/form-data" ,"autocomplete"=>"off");
								echo form_open(uri_string(), $attributes);
								?>
							<div class="position-relative">
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
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Nhập thông tin đăng nhập
											</h4>

											<div class="space-6"></div>

											<form onsubmit="<?=base_url()?>dashboard.html">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="username" name ="lb_username" type="text" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name ="lb_password" type="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>
														<input type="hidden" name="submit" value=""/>
														<button  type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								</div><!-- /.position-relative -->
								
								<?=form_close()?>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			