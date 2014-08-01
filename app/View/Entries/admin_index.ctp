<div class="container">
	<table data-table>
		<thead>
			<tr>
				<? foreach ($fields as $field) : ?>
					<th><?= $field ?></th>
				<? endforeach; ?>
				<th><?= __('Actions') ?></th>
			</tr>
		</thead>
	</table>
</div>

<?= $this->start('script') ?>
<script>
	$('[data-table]').dataTable({
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "Entries/table/Entry"
	});
</script>
<?= $this->end() ?>