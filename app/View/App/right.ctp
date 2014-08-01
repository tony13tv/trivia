<?= $this->start('css') ?>
<style>
	#right {
		background: #219c09 url(img/ask.png) no-repeat;
		position: relative;
	}

	.brain-flower {
		text-align: center;
		color: #fff;
	}

	.show {
		overflow: hidden;
		position: relative;
	}

	.focus {
		position: absolute;
		top: 0;
		-webkit-animation: spin 4s linear infinite;
		-moz-animation: spin 4s linear infinite;
		animation: spin 4s linear infinite;
	}

	.check {
		margin: 0 auto;
		display: block;
	}

	@-moz-keyframes spin {
		100% {
			-moz-transform: rotate(360deg);
		}
	}

	@-webkit-keyframes spin {
		100% {
			-webkit-transform: rotate(360deg);
		}
	}

	@keyframes spin {
		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
</style>
<?= $this->end() ?>
<div id="right">
	<?= $this->html->image('paper.cut.up.png') ?>
	<?= $this->html->image('pencils.up.png', ['style' => "position: absolute; top: 0; right: 0;"]) ?>
	<?= $this->html->image('blue.pilot.png', ['style' => "position: absolute; left: 10px; top: 70px;"]) ?>
	<div class="show">
		<?= $this->html->image('focus.roullette2.png', ['class' => 'focus']); ?>
		<?= $this->html->image('right.png', ['class' => 'check']) ?>
		<div class="brain-flower" style="font-size: 135px">
			CORRECTO!!!
		</div>
		<div>
			<?=$fact['Fact']['name']?>
		</div>
		<div class="health">
			INTENTOS
			<? for ($i = 0; $i < $lives; $i++) : ?>
				<?= $this->html->image('heart.png', ['width' => '36']) ?>
			<? endfor; ?>
		</div>
	</div>
</div>