<table>
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('content') ?></th>
			<th><?= $this->Paginator->sort('image') ?></th>
			<th><?= $this->Paginator->sort('category') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($questions as $question) : ?>
			<tr data-clickable>
				<td>
					<?= $question['Question']['id'] ?>
				</td>
				<td>
					<?= $question['Question']['content'] ?>
				</td>
				<td>
					<? if ($question['Question']['image']) {
						echo $this->html->image('/files' . DS . $question['Question']['image']);
					} else {
						echo $this->html->image('http://placehold.it/100x100');
					} ?>

				</td>
				<td>
					<?= $question['Question']['category_id'] ?>
				</td>
				<td>
					<?= $question['Question']['created'] ?>
				</td>
				<td>
					<?= $question['Question']['modified'] ?>
				</td>
				<td>
					<?= $this->html->link('Edit', ['action' => 'edit', $question['Question']['id']]) ?>
					<?= $this->html->link('View', ['action' => 'view', $question['Question']['id']]) ?>
					<?= $this->html->link('Delete', ['action' => 'delete', $question['Question']['id']]) ?>
				</td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>