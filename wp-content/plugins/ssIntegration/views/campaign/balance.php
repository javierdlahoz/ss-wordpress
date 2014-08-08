<?php

$balances = get_balances();
if (count($balances) > 0) {
	?>
	<!-- Latest compiled and minified CSS & JS -->
		<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<?php if(!empty($balances[0]['balance'])) { ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Campaign</th>
						<th>Type</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
		<?php foreach ($balances as $balance) {?>
			<tr>
				<td><?php echo $balance['campaign'];?></td>
				<td><?php echo $balance['type'];?></td>
				<td><?php echo $balance['balance'];?></td>
			</tr>
			<?php }?>
		</tbody>
			</table>
	<?php

	}
}
