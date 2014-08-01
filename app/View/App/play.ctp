<? if ($question): ?>
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
			<?= $this->form->input('answer_id', ['type' => 'radio', 'label' => ['class' => 'brain-flower'], 'legend' => false, 'before' => '<div class="option">', 'separator' => '</div><div class="option">', 'after' => '</div>']) ?>
			<?= $this->form->hidden('question_id', ['value' => $question['Question']['id']]) ?>
			<?= $this->form->end() ?>
		</div>
	</div>
	<?= $this->start('script') ?>
	<script>
		$('.option input').on('change', function (e) {
			$(this).closest('form').submit();
		});

		$('.progress .meter').css({'width': '0%'}).animate({'width': '100%'}, 25000, function () {
			$('#EntryIndexForm').submit();
		});
	</script>
	<?= $this->end() ?>
<? endif; ?>