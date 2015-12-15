<div id="navbar" class="navbar navbar-default navbar-fixed navbar-fixed-top">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
                       <div class="navbar-container" id="navbar-container">
                           <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="menu-icon fa fa-leaf"></i>
                                                        <?php echo strtoupper($this->session->userdata('nama')) ?>- Kontributor
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
                                            <?php
                                            $foto = $this->session->userdata('foto');
                                            ?>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url() ?>foto/<?php echo $foto ?>" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo ($this->session->userdata('nama')) ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo base_url(); ?>kontributor/dashboard/profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url(); ?>kontributor/auth/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
</div>