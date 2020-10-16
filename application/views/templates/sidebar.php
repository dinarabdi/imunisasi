<br>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<!-- <h3>General</h3> -->
		<ul class="nav side-menu">

			<?php
			$role_id = $this->session->userdata('role_id');
			$queryMenu = "SELECT user_menu.id, user_menu.menu 
                    FROM user_menu JOIN user_access_menu
                    ON user_menu.id = user_access_menu.menu_id
                    WHERE user_access_menu.role_id = $role_id
                    ORDER BY user_access_menu.menu_id ASC";

			$menu = $this->db->query($queryMenu)->result_array();
			?>

			<!-- Looping Menu -->
			<?php foreach ($menu as $m) : ?>
				<h3></i><?= $m['menu']; ?></h3>
				<br>
				<ul class="nav side-menu">


					<?php
						$menuId = $m['id'];
						$querySubMenu = "SELECT *
                    FROM user_sub_menu JOIN user_menu 
                    ON user_sub_menu.menu_id = user_menu.id
                    WHERE user_sub_menu.menu_id = $menuId
                    AND user_sub_menu.is_active = 1
                    ";

						$subMenu = $this->db->query($querySubMenu)->result_array();
						?>
					<?php foreach ($subMenu as $sm) : ?>
						<li><a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>"></i><?= $sm['title']; ?></a> </li>
					<?php endforeach; ?>
					<!-- Divider -->
					<hr class="sidebar-divider mt-3">
				</ul>
			<?php endforeach; ?>

			<!-- 		
			<li><a><i class="fa fa-user"></i>Users</a> </li>

			<li><a><i class="fa fa-list"></i>Kriteria</a></li>

			<li><a><i class="fa fa-line-chart"></i>Range Penilaian</a></li>

			<li><a><i class="fa fa-bars"></i>Sub Kriteria</a></li>

			<li><a><i class="fa fa-group"></i>Peserta</a></li>

			<li><a><i class="fa fa-pencil"></i>Penilaian</a></li>

			<li><a><i class="fa fa-file-excel-o"></i>Laporan</a></li>

			<li><a><i class="fa fa-sign-out"></i>Logout</a></li> -->

		</ul>
	</div>

</div>
<!-- /sidebar menu -->
</div>
</div>