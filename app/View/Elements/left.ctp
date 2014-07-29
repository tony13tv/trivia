<ul class="off-canvas-list">
	<li><label>Models</label></li>
	<?php
		$aCtrlClasses = App::objects('controller');

		foreach ($aCtrlClasses as $controller) {
			if ($controller != 'AppController') {
				App::uses($controller, 'Controller');
				$controller2 = new $controller();
				echo "<li>";
				echo $this->html->link($controller2->name, ['controller' => $controller2->name, 'action' => 'index']);
				echo "</li>";
			}
		}
	?>
	<li><label>Actions</label></li>
	<li><?= $this->html->link('New', ['action' => 'add']) ?></li>
</ul>