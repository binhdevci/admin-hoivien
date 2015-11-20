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
		<li class="active">Thanh toán chi tiết</li>
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
							Thông tin chi tiết từ hội viên khác của <b><?=$main->lb_fullname_main;?>(<?=$main->cd_member_main;?>)</b>
						</h1>
					</div><!-- /.page-header -->
				
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
												<th class="hidden-480">Số tiền</th>
												
											</tr>
										</thead>
										
										<tbody class="payment-member-grid">
											<?foreach($rs as $row){ ?>
												<tr>
												<td class="center">
													<label class="position-relative">
														<input type="checkbox" class="ace">
														<span class="lbl"></span>
													</label>
												</td>

												<td>
												<?=$row->cd_member;?>
												</td>
												<td><?=$row->lb_fullname;?></td>
												<td><?=number_format($row->nb_amount);?>VNĐ</td>
											</tr>
											<? } ?>
											<tr>
												<td colspan="4" style="text-align:right;width:200px;">
												Tổng số tiền nhận: <b><?=number_format($main->nb_amount_main);?>VNĐ</b>
												</td>
											</tr>
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
