<? if ($this->session->check('Message.flash')) { ?>
	<div data-alert class="alert-box <?= join(" ", $this->session->read('Message.flash.params')) ?> radius">
		<?= $this->session->flash() ?>
		<a href="#" class="close">&times;</a>
	</div>
<? } ?>