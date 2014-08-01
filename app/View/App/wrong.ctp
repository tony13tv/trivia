<?= $this->start('css') ?>
<style>
	#right {
		background: #219c09 url(img/paper.wrong.jpg) no-repeat;
		position: relative;
	}

	.brain-flower {
		text-align: center;
		color: #fff;
	}

	.show {
		overflow: hidden;
		position: relative;
		margin-top: 50px;
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

	.paper-bottom {
		position: absolute;
		bottom: 0;
		z-index: 100;
	}

	.white-bar {
		height: 10px;
		position: absolute;
		bottom: 0;
		width: 100%;
		z-index: 100;
		background-color: white;
	}

	.castor {
		height: 141px;
		width: 141px;
		background: white;
		border-radius: 75%;
		overflow: hidden;
		text-align: center;
		margin: 0 auto;
		position: relative;
		z-index: 100;
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
	<div class="show ground">
		<div class="background">
			<?= $this->html->image('focus.roullette.png', ['class' => 'focus']) ?>
		</div>
		<div class="middle-ground">
			<?= $this->html->image('wrong.png', ['class' => 'check']) ?>
			<div class="brain-flower" style="font-size: 135px">
				INCORRECTO!!!
			</div>
			<div class="health">
				INTENTOS
				<? for ($i = 0; $i < 5; $i++) : ?>
					<? if ($i < $lives): ?>
						<?= $this->html->image('heart.png', ['width' => '36']) ?>
					<? else : ?>
						<?= $this->html->image('empty.heart.png', ['width' => '36']) ?>
					<?endif; ?>
				<? endfor; ?>
			</div>
		</div>
		<div class="foreground">
			<div class="paper-bottom">
				<?= $this->html->image('paper.cut.down.png') ?>
			</div>
			<div class="white-bar"></div>
			<div class="castor">
				<?= $this->html->image('castor.head.jpg') ?>
			</div>
		</div>
	</div>
</div>