<!DOCTYPE html>
<html lang="en">
	<head>
		<?=$this->load->view('html/meta_skin')?>
	</head>

	<body class="no-skin">
		<?=$this->load->view('common/header_view')?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?=$this->load->view('common/slidebar_view')?>
			
			<div class="main-content">
				<?php echo $this->load->view($page) ; ?>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">WG</span>
							Application &copy; 2015-2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		
		

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo base_url()?>templates/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url()?>templates/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
