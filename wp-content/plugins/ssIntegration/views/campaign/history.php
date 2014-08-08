<?php

$balances = get_balances();
if (count($balances) > 0) {
	?>
	<!-- Latest compiled and minified CSS & JS -->
		<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<div class="panel panel-info">

			  <div class="panel-body">
					To see the history of every campaign just click on its title
			  </div>
		</div>
	<h3>Campaigns</h3>
	<?php
	$i=0;
	foreach ($balances as $balance) {
		if(count($balance['transactions'])>0){ 
		?>
		<div class="collapse-group"> 
			<div class="page-header" data-toggle="collapse" data-target=".span<?php echo $i; ?>" style="cursor: pointer">
			<h3><small><?php echo $balance['campaign'];?></small></h3></div>
			<div class="span<?php echo $i; ?> accordion-body collapse">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Amount</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach ($balance['transactions'] as $transaction) {
				if ($transaction->amount >= 0) {
					$class = "success";
				} else {
					$class = "danger";
				}
				?>
					<tr>
						<td><?php echo $transaction->date;?></td>
						<td class="<?php echo $class?>"><?php echo $transaction->amount;?></td>
						<td><?php echo $transaction->authorization;?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			</div>
		</div>
		<?php
		$i++;
		}
	}
}