<h1>All Facts</h1>
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
		"sAjaxSource": "Facts/table/Fact"
	});
</script>
<?= $this->end() ?>