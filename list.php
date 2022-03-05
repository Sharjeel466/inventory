<?php 
include('header.php');

$data = select('inventory');
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
						<a href="index.php"><h4>Inventory</h4></a>
						<a href="costing.php"><h4>Costing</h4></a>
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
										<a href="index.php" class="btn btn-info">Inventory</a>
										<a href="costing.php" class="btn btn-info">Costing</a>
										<a href="users.php" class="btn btn-info">Users</a>
									</li>
								</ul>
							</nav>
							<div class="header-button">
								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="content">
											Hi,<a class="js-acc-btn"><strong><?= $_SESSION['user_name'] ?></strong></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="account-dropdown__body">
												<div class="account-dropdown__item">
													<a href="logout.php">
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
								Are you sure to delete <strong><?= $value['product_name'] ?> (<?= $value['category'] ?>)</strong>?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								
								<a href="delete.php?id=<?= $value['id']?>" class="btn btn-danger">Yes</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>

			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="card">