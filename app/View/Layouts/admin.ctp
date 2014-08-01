<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin</title>
		<?= $this->html->script('vendor/modernizr') ?>
		<?= $this->html->css('normalize') ?>
		<?= $this->html->css('foundation.min') ?>
		<style>
			.off-canvas-wrap {
				height: 100%;
			}

			.inner-wrap {
				height: 100%;
			}

			.main-section {
				height: 100%;
				overflow: scroll;
				padding: 30px 60px;
			}
		</style>
	</head>
	<body>
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<nav class="tab-bar">
					<section class="left-small">
						<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
					</section>

					<section class="middle tab-bar-section">
						<h1 class="title">Larach y Cia. Trivia</h1>
					</section>
				</nav>

				<!-- Off Canvas Menu -->
				<aside class="left-off-canvas-menu">
					<!-- whatever you want goes here -->
					<?= $this->element('left') ?>
				</aside>

				<section class="main-section">
					<!-- content goes here -->
					<?= $this->element('flash') ?>
					<?= $this->fetch('content') ?>
				</section>

				<!-- close the off-canvas menu -->
				<a class="exit-off-canvas"></a>
			</div>
		</div>
		<?= $this->html->script('vendor/jquery') ?>
		<?= $this->html->script('foundation.min') ?>
		<?= $this->html->script('foundation/foundation.offcanvas') ?>
		<?= $this->html->script('foundation/foundation.alert') ?>
		<script>
			$(document).foundation();
			$('[data-clickable]').on('click', function () {

			});
		</script>
		<link rel="stylesheet" href="/trivia/datatables/css/jquery.dataTables.min.css"/>
		<script src="/trivia/datatables/js/jquery.dataTables.min.js"></script>
		<?= $this->fetch('script') ?>
	</body>
</html>

