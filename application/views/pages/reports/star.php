<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">
		[[LABEL_STAR_REPORT]]
	</h2>
</div>
<div class="intro-y box mt-5">
	<div class="section mt-2 p-5">
		<div class="card">
			<div class="card-body">
				<form class="search-form" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="txtSearch" id="txtSearch"
							   value="<?php echo $fl_user; ?>" placeholder="[[ADM_SEARCH_MEMBER_TEXTFIELD]]">
					</div>
					<div class="form-group">
						<select name="period" id="period" class="form-control">
							<?php
							$the_month = '2019-08';
							$this_month = date('Y-m');
							$next_month = date("Y-m", strtotime("+1 month", strtotime(date("Y-m-d"))));
							while ($the_month <= $this_month) {
								$selected = $the_month == $period ? ' selected="selected"' : '';
								?>
								<option value="<?php echo $the_month ?>" <?php echo $selected; ?>><?php echo date('M Y', strtotime($the_month . "-01")); ?></option>
								<?php $the_month = date("Y-m", strtotime("+1 month", strtotime($the_month)));
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="fl_rank" id="fl_rank" class="form-control">
							<option <?php echo $fl_rank == 'any' ? 'selected' : '' ?> value="any">Star Members
								Only
							</option>
							<option <?php echo $fl_rank == 'all' ? 'selected' : '' ?> value="all">All Members
							</option>
						</select>
					</div>
					<div class="form-group basic mt-2">
						<div class="w-full flex mt-4">
							<button type="submit" class="w-full btn btn-primary shadow-md mr-2">[[GET_REPORT]]
							</button>
						</div>
					</div>
				</form>
				<div class="widget-body">
					<div>
						<table id="dataTable" class="table" >
							<thead>
							<tr>
								<th>#</th>
								<th>[[MEMBER]]</th>
								<th>[[PERIOD]]</th>
								<th>[[LEFT_BV]]</th>
								<th>[[RIGHT_BV]]</th>
								<th>[[RANK]]</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$n = 0;
							foreach ($reports as $result) {
								$prd = "";
								$lbv = "";
								$rbv = "";
								$rnk = "";

								for ($i = 1; $i <= 6; $i++) {
									$mnth = explode("__", $result['month' . $i]);
									$prd .= $i == 1 ? $mnth[0] : "<br>" . $mnth[0];
									$lbv .= $i == 1 ? $mnth[1] : "<br>" . $mnth[1];
									$rbv .= $i == 1 ? $mnth[2] : "<br>" . $mnth[2];
									$rnk .= $i == 1 ? $result['rank' . $i] : "<br>" . $result['rank' . $i];
								}
								?>
									<tr>
										<td><?php echo $n++; ?></td>
										<td><?php echo $result['userid'] . "<br>" . $result['f_name'] . " " . $result['l_name']; ?></td>
										<td><?php echo $prd; ?></td>
										<td><?php echo $lbv; ?></td>
										<td><?php echo $rbv; ?></td>
										<td><?php echo $rnk; ?></td>
									</tr>
								<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
