<div id="register">
	<?= $this->html->image('larach.logo.png') ?>
	<div id="registerTitle">
		<h1 class="brain-flower">Listos para jugar</h1>

		<h3 class="brain-flower">Regístrate</h3>
	</div>
	<?= $this->form->create('user') ?>
	<?= $this->form->input('first_name', ['label' => 'Nombres:']) ?>
	<?= $this->form->input('last_name', ['label' => 'Apellidos:']) ?>
	<?= $this->form->input('document', ['label' => 'Número de identidad:']) ?>
	<?= $this->form->input('city', ['label' => 'Ciudad:']) ?>
	<?= $this->form->input('email', ['label' => 'Correo Electrónico:']) ?>
	<?= $this->form->input('password', ['type' => 'password', 'label' => 'Contraseña:']) ?>
	<?= $this->form->input('cpassword', ['type' => 'password', 'label' => 'Confirmar Contraseña:']) ?>
	<div class="therms">
		Dale <?= $this->html->link('click aquí', ['/therms']) ?> para leer los términos y condiciones. <br/> Cuando las
		hayas leído acepta y diviertete.
	</div>
	<?= $this->form->input('therms', ['type' => 'checkbox', 'label' => 'Acepto los terminos y condiciones']) ?>
	<?= $this->form->button('Enviar', ['class' => 'secondary brain-flower']) ?>
	<?= $this->form->end() ?>
</div>