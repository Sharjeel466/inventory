<?php 
require_once('../include/header.php');

$data = select('inventory');
$production = select('production');

?>

<div class="page-wrapper">
	<!-- HEADER MOBILE-->
	<header class="header-mobile d-block d-lg-none">
		<div class="header-mobile__bar">
			<div class="container-fluid">
				<div class="header-mobile-inner">
					<h3>Inventory</h3>
					<button class="hamburger hamburger--slider" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<nav class="navbar-mobile">
			<div class="container-fluid">
				<ul class="navbar-mobile__list list-unstyled">
					<li>
						<!-- <a href="index.php"><h4>Inventory</h4></a>
							<a href="costing.php"><h4>Costing</h4></a> -->
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<h3>Inventory</h3>
			</div>
			<!-- <div class="menu-sidebar__content js-scrollbar1"> -->
			<!-- <nav class="navbar-sidebar">
				<ul class="list-unstyled navbar__list">
					<li>
						<a href="index.php">
							<h4>Inventory</h4>
						</a>
					</li>
					<li>
						<a href="costing.php">
							<h4>Costing</h4>
						</a>
					</li>
				</ul>
			</nav> -->
			<!-- </div> -->
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<nav class="navbar-sidebar">
								<ul class="list-unstyled navbar">
									<li>
										<a href="../index/" class="btn btn-info">Inventory</a>
										<a href="../production/costing" class="btn btn-info">Production</a>

										<?php if ($_SESSION['role'] == 'employee'){ ?>
											
										<?php } else{ ?>
											<a href="../users/users" class="btn btn-info">Users</a>
											<a href="../logs/logs" class="btn btn-info">Logs</a>
										<?php	} ?>
									</li>
								</ul>
							</nav>
							<div class="header-button">
								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="content">
											Hi, <a class="js-acc-btn"><strong><?= $_SESSION['user_name'] ?> ( <?= $_SESSION['role'] ?> )</strong></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="account-dropdown__body">
												<div class="account-dropdown__item">
													<a href="../auth/logout.php">
														<i class="zmdi zmdi-power"></i>Logout
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<?php foreach ($data as $key => $value): ?>
				
				<div class="modal fade" id="delete_stock-<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content" id="modal-popup-wrapper">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Are you sure to delete <strong><?= $value['product_name'] ?></strong>?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								
								<a href="../stock/delete-inventory.php?id=<?= $value['id']?>" class="btn btn-danger">Yes</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>

			<!-- Modal -->
			<div class="modal fade" id="costing-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="shake"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="modal-body">
							<div class="row">
								<div class="col-md-4">
									<strong>Product Name</strong>
									<div id="product_name"></div>
								</div>
								<div class="col-md-4">
									<strong>User QTY</strong>
									<div id="user_qty"></div>
								</div>
								<div class="col-md-4">
									<strong>Product QTY</strong>
									<div id="product_qty"></div>
								</div>
							</div> 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="card">