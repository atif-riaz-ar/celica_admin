<div class="intro-y box mt-5">
	<div class="flex flex-col sm:flex-row items-center p-5 border-b">
		<h2 class="font-medium text-base mr-auto">
			[[LABEL_ADMINS_LIST]]
		</h2>
	</div>
	<div class="p-10">
		<table class="table" id="dataTable" style="width: 100% !important;">
			<thead>
			<tr>
				<th>#</th>
<!--				<th>[[STATUS]]</th>-->
				<th>[[ACTION]]</th>
				<th>[[ACTION_DATES]]</th>
				<th>[[ORDER_BY]]</th>
				<th>[[ORDER_NUMBER]]</th>
				<th>[[TYPE]]</th>
				<th>[[AMOUNT]]</th>
				<th>[[PAYMENT]]</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($orders as $key => $order) { ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
<!--					<td>--><?php //echo $order['status']; ?><!--</td>-->
					<td class="text-center" style="line-height: 28px">
						<?php
						if ($order['status'] == 'PENDING') {
							echo "<a class='rounded-md p-1 text-white bg-primary' href='" . base_url('orders/approve/' . $order['id']) . "'>[[APPROVE]]</a>";
							echo "<br><a class='rounded-md p-1 text-white bg-danger mt-5' href='" . base_url('orders/reject/' . $order['id']) . "'>[[REJECT]]</a>";
						}
						if ($order['status'] == 'CANCELLED') {
							echo "REJECTED";
						}
						if ($order['status'] == 'PAID') {
							echo "<a class='rounded-md p-1 text-white bg-primary' href='" . base_url('orders/deliver/' . $order['id']) . "'>[[DELIVER]]</a>";
						}
						if ($order['status'] == 'COMPLETED') {
							echo "COMPLETED";
						}
						?>
					</td>
					<td>
						<?php
						echo "[[ORDER_DATE]]:<br> " . ($order['order_date'] == null? "N/A" : formatDate($order['order_date'])) . "<hr class='mt-1 mb-1'>";
						if ($order['status'] == 'CANCELLED') {
							echo "[[REJECTION_DATE]]: <br>" . ($order['rejected_date'] == null? "N/A" : formatDate($order['rejected_date'])) . "<br>";
						} else {
							echo "[[APPROVAL_DATE]]:<br> " . ($order['approved_date'] == null? "N/A" : formatDate($order['approved_date'])) . "<hr class='mt-1 mb-1'>";
							echo "[[DELIVERY_DATE]]:<br> " . ($order['received_date'] == null? "N/A" : formatDate($order['received_date'])) . "<br>";
						}
						?>
					</td>
					<td>
						<span onclick="getUserDetails(<?php echo $order['userid'] ?>)"
							  class="clickable text-xs px-1 rounded-md bg-primary text-white mr-1">
							<?php echo $order['userid']; ?>
						</span>
						<br>
						<small>(<?php echo $order['f_name']; ?> <?php echo $order['l_name']; ?>)</small>
					</td>
					<td><a class="underline"
						   href="<?php echo base_url("orders/details/" . $order['id']); ?>"><?php echo $order['order_num']; ?></a>
					</td>
					<td><?php echo $order['order_type']; ?></td>
					<td><?php echo $order['total_amount']; ?></td>
					<td><?php echo $order['payment_type']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
