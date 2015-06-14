<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="dashboard.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Thông tin chung </span>
						</a>

					</li>

					

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-gift"></i>
							<span class="menu-text"> Quản trị </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="#">
								<a href="<?=base_url()?>changepass.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Đổi mật khẩu
								</a>
								<b class="arrow"></b>
							</li>
							<li class="#">
								<a href="user.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Quản lý User
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon ace-icon fa fa-users"></i>
							<span class="menu-text"> Thành viên </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="#">
								<a href="<?=base_url()?>member.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách thành viên
								</a>
								<b class="arrow"></b>
							</li>
							<li class="#">
								<a href="payment.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Quản lý thanh toán
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
			