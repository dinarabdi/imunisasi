      <!-- top navigation -->
      <div class="top_nav">
      	<div class="nav_menu">
      		<nav>
      			<div class="nav toggle">
      				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
      			</div>

      			<ul class="nav navbar-nav navbar-right">
      				<li class="">
      					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      						<img src="<?php echo base_url(); ?>uploads/users/<?= $user['image'] ?>" onerror="this.src='<?= base_url('assets/image/profile/default.png'); ?>';" alt="Missing Image" />
      						<?= $user['name']; ?>
      						<span class=" fa fa-angle-down"></span>
      					</a>
      					<ul class="dropdown-menu dropdown-usermenu pull-right">
      						<li><a href="<?= base_url('user'); ?>"> Profile</a></li>
      						<li>
      							<a href="<?= base_url('user/edit'); ?>">
      								<span class="badge bg-red pull-right"></span>
      								<span>Pengaturan Profile</span>
      							</a>
      						</li>
      						<li><a onclick="outConfirm(' <?= base_url('auth/logout'); ?>')" href="#!"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
      					</ul>
      				</li>

      				<!-- Modal Logout -->
      				<div class="modal fade" id="outModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      					<div class="modal-dialog" role="document">
      						<div class="modal-content">
      							<div class="modal-header">
      							</div>
      							<div class="modal-body">Apakah kamu yakin ingin keluar?</div>
      							<div class="modal-footer">
      								<a id="btn-out" class="btn btn-danger" href="#">Keluar</a>
      								<button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
      							</div>
      						</div>
      					</div>
      				</div>
      			</ul>
      		</nav>
      	</div>
      </div>
      <!-- /top navigation -->

      <script>
      	function outConfirm(url) {
      		$('#btn-out').attr('href', url);
      		$('#outModal').modal();
      	}
      </script>