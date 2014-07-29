<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset(); ?>
		<title>
			<?= $title_for_layout; ?>
		</title>
		<?= $this->Html->meta('icon') ?>

		<?= $this->Html->script('vendor/modernizr') ?>
		<?= $this->Html->css('normalize') ?>
		<?= $this->Html->css('foundation.min') ?>
		<?= $this->Html->css('pilot.app') ?>

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
	</head>
	<body>
		<div id="container" class="container">
			<div id="header container">
				<?= $this->fetch('header'); ?>
			</div>
			<div id="content container">
				<?= $this->Session->flash(); ?>
				<?= $this->fetch('content'); ?>
			</div>
			<div id="footer container">
				<?= $this->fetch('footer'); ?>
			</div>
		</div>
		<?= $this->Html->script('vendor/jquery') ?>
		<?= $this->Html->script('foundation.min') ?>
		<?= $this->Html->script('foundation/foundation.equalizer') ?>
		<?= $this->Html->script('foundation/foundation.offcanvas') ?>
		<?= $this->Html->script('vendor/placeholder') ?>
		<script>
			$(document).foundation();
			$('[data-clickable]').on('click', function() {
				window.location = $(this).attr('href');
			});
		</script>
	</body>
</html>
