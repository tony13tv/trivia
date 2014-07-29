<table>
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('content') ?></th>
			<th><?= $this->Paginator->sort('question_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($answers as $question) : ?>
			<tr data-clickable>
				<td>
					<?= $question['Answer']['id'] ?>
				</td>
				<td>
					<?= $question['Answer']['content'] ?>
				</td>
				<td>
					<?= $question['Answer']['question_id'] ?>
				</td>
				<td>
					<?= $question['Answer']['created'] ?>
				</td>
				<td>
					<?= $question['Answer']['modified'] ?>
				</td>
				<td>
					<?= $this->html->link('Edit', ['action' => 'edit', $question['Answer']['id']]) ?>
					<?= $this->html->link('View', ['action' => 'view', $question['Answer']['id']]) ?>
					<?= $this->html->link('Delete', ['action' => 'delete', $question['Answer']['id']]) ?>
				</td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>