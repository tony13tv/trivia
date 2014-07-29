<table>
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($groups as $question) : ?>
			<tr data-clickable>
				<td>
					<?= $question['Group']['id'] ?>
				</td>
				<td>
					<?= $question['Group']['name'] ?>
				</td>
				<td>
					<?= $question['Group']['created'] ?>
				</td>
				<td>
					<?= $question['Group']['modified'] ?>
				</td>
				<td>
					<?= $this->html->link('Edit', ['action' => 'edit', $question['Group']['id']]) ?>
					<?= $this->html->link('View', ['action' => 'view', $question['Group']['id']]) ?>
					<?= $this->html->link('Delete', ['action' => 'delete', $question['Group']['id']]) ?>
				</td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>