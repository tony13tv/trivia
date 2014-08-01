<? if ($this->session->check('Message')) { ?>
	<? foreach ($this->session->read('Message') as $key => $message) : ?>
		<div data-alert class="alert-box <?= join(" ", $message['params']) ?> radius">
			<?= $this->session->flash($key) ?>
			<a href="#" class="close">&times;</a>
		</div>
	<? endforeach; ?>
<? } ?>