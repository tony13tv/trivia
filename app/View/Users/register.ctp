<div id="register">
	<?= $this->html->image('larach.logo.png') ?>
	<div>
		<h1 class="hwbf">Listos para jugar</h1>

		<h3 class="hwbf">Regístrate</h3>
	</div>
	<?= $this->form->create('user') ?>
	<?=
		$this->form->inputs(['first_name' => ['label' => 'Nombres:'], 'last_name' => ['label' => 'Apellidos:'], 'document' => ['label' => 'Número de identidad:'], 'email' => ['label' => 'Correo Electrónico:'], 'city' => ['label' => 'Ciudad:'], 'password' => ['label' => 'Contraseña:'], 'cpassword' => ['label' => 'Confirmar Contraseña:']], null, ['fieldset' => false]); ?>
	<div class="therms">
		Dale <?= $this->html->link('click aquí', ['/therms']) ?> para leer los términos y condiciones. <br/> Cuando las
		hayas leído acepta y diviertete.
	</div>
	<?= $this->form->input('therms', ['type' => 'checkbox', 'label' => 'Acepto los terminos y condiciones']) ?>
	<?= $this->form->button('Registrar') ?>
	<?= $this->form->end() ?>
</div>