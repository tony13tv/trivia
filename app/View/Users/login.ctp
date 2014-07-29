<div id="login">
	<?= $this->html->image('larach.logo.png') ?>
	<?= $this->form->create('user') ?>
	<?= $this->form->inputs(['username' => ['label' => 'Nombre de usuario'], 'password' => ['label' => 'Contraseña']], null, ['fieldset' => false]) ?>
	<?=$this->html->link('¿No tienes cuenta? Regístrate', 'register')?> |
	<?=$this->html->link('Olvidé mi contraseña', 'forgot')?>
	<?= $this->form->button('Entrar')?>
	<?= $this->form->end() ?>
</div>