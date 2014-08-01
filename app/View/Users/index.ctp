<h1>Edit User</h1>
<?= $this->form->create('User', ['autocomplete' => 'off']) ?>
<?= $this->form->input('id') ?>
<?= $this->form->input('first_name') ?>
<?= $this->form->input('last_name') ?>
<?
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false) {
		?>
		<div style="background:#ffff66;border:1px solid #ff9900;font-size:1.5em;padding:1em;">
			The Safari browser has a known bug: autocomplete replaces required data in our form with incorrect values.
			Unfortunately this may prevent you from adding products to the shopping cart. <br/><br/>Please try a
			different browser or go to your browser settings and turn off autocomplete and refresh the page.
		</div>
	<?php
	}
?>
<?= $this->form->input('username', ['autocomplete' => 'off']) ?>
<?= $this->form->input('password', ['autocomplete' => 'off']) ?>
<?= $this->form->button('Save') ?>
<?= $this->form->end() ?>