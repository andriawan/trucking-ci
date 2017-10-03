<table width="60%" class="table custom">
	<thead>
		<tr>
			<td>CAR NUMBER</td>
			<td>STNK DATE</td>
			<td>PKB</td>
			<td>SERVICE</td>	
			<td>DETAIL ITEM SERVICE</td>
			<td>TOTAL PRICE</td>	
			<td>KIR</td>
			<td>SIPA</td>
			<td>IBM</td>
		</tr>
	</thead>
	<?php $counter = 0 ?>
	<?php foreach ($unique as $row): ?>
		<tr>
			<td><a href="#" class="table-link car<?php echo $counter; ?>"><?php echo $row['car_number']; ?></a></td>
			<td class="td-stnk<?php echo $counter; ?>"><?php echo sql_to_date($row['stnk_date']); ?></td>
			<td><?php echo sql_to_date($row['pkb_date']); ?></td>
			<td><?php echo sql_to_date($row['service_date']); ?></td>	
			<td>
				<ul>
					<?php foreach ($query as $value): ?>
						
						<?php if ($row['id_transaction'] == $value['id_transaction']): ?>
								
								<li>
								<?php echo $value['category'] ?><span>  <?php echo setRupiahFormat($value['price']) ?></span>
								</li>
							
						<?php else: ?>
							
						<?php endif ?>
												
					<?php endforeach ?>						
				</ul>
			</td>
			<td><?php echo setRupiahFormat($row['total_price']); ?></td>	
			<td><?php echo sql_to_date($row['kir_date']); ?></td>
			<td><?php echo sql_to_date($row['sipa_date']); ?></td>
			<td><?php echo sql_to_date($row['ibm_date']); ?></td>
		</tr>
		<?php $counter++ ?>
	<?php endforeach ?>
	
</table>
<div class="notif-me">
	<div>
		<h3>Bapak Yang terhormat</h3>
		<ul class="car-name"></ul>
		<button type="button" onclick="closeNotif()" id="close-notif" class="btn btn-success pull-left">
	  		Close Notifications
		</button>
	</div>
</div>