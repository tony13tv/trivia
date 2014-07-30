<div id="question">
	<div class="image">
		<div class="progress small-10 small-offset-1 secondary round">
			<span class="meter" style="width: 80%"></span>
		</div>
		<?= $this->html->image('/files/' . $question['Question']['image'], ['width' => '100%']) ?>
	</div>
	<div class="health">
		INTENTOS<br/><br/>
		<? for ($i = 0; $i < $lives; $i++) : ?>
			<?= $this->html->image('heart.png', ['width' => '36']) ?>
		<? endfor; ?>
	</div>
	<div class="question">
		<?= $this->form->create('Entry') ?>
		<h1 class="brain-flower"><?= $question['Question']['content'] ?></h1>
		<?= $this->form->input('Answers', ['type' => 'select', 'class' => 'hidden', 'label' => ['class' => 'brain-flower'], 'options' => $question['Answer']], ['legend' => false]) ?>
		<?= $this->form->end() ?>
	</div>
</div>