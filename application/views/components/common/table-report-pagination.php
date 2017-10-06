<?php //debug($unique[0][0]) ?>
<table width="60%" class="table custom">
	<thead>
		<tr>
			<td>CAR NUMBER</td>
			<td>NAMA DRIVER</td>
			<td>INVOICE NUMBER</td>
			<td>KILOMETER TOTAL</td>
			<td>SERVICE PLACE</td>
			<td>STNK DATE</td>
			<td>PKB</td>
			<td>SERVICE</td>	
			<td>DETAIL ITEM SERVICE</td>
			<td>TOTAL PRICE</td>	
			<td>KIR</td>
			<td>SIPA</td>
			<td>IBM</td>
			<td>ACTION</td>
		</tr>
	</thead>
	<?php $counter = 0 ?>
	<?php foreach ($query as $row): ?>
		<tr>
			<td><a href="#" class="table-link car<?php echo $counter; ?>"><?php echo $row['car_number']; ?></a></td>
			<td><?php echo $row['nama_driver']; ?></td>
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['kilometer_total']; ?></td>
			<td><?php echo $row['tempat_service']; ?></td>
			<td class="td-stnk<?php echo $counter; ?>">
				<?php echo sql_to_date($row['stnk_date']); ?>
				<span style="display: none"><?php echo $row['stnk_date']; ?></span>
			</td>
			<td><?php echo sql_to_date($row['pkb_date']); ?></td>
			<td><?php echo sql_to_date($row['service_date']); ?></td>	
			<td>
				<ul>
					<?php 

						for ($i=0; $i < sizeof($unique); $i++) { 
							for ($j=0; $j< sizeof($unique[$i]); $j++) { 
								if ($row['id_transaction'] == $unique[$i][$j]['id_transaction']){

								echo '<li>'. $unique[$i][$j]['category'] . '<span> '.setRupiahFormat($unique[$i][$j]['price']) . '</span>
								</li>';

						 		}
							}
						} 
					?>
				</ul>
			</td>
			<td><?php echo setRupiahFormat($row['total_price']); ?></td>	
			<td><?php echo sql_to_date($row['kir_date']); ?></td>
			<td><?php echo sql_to_date($row['sipa_date']); ?></td>
			<td><?php echo sql_to_date($row['ibm_date']); ?></td>
			<td>
				<a href="<?php echo site_url('dashboard/editmaster/'.$row['id_transaction']); ?>">         			
        			<button  class="btn btn-success edit report">
        				<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
        			</button>
	        	</a>
	        	<div class="clearfix"></div>

	        	<a href="<?php echo site_url('dashboard/deletemaster/'.$row['id_transaction']); ?>" onClick="return confirm('Are you sure you want to delete?')">                  
	                    <button  class="btn btn-danger hapus report">
	                    	<i class="fa fa-trash-o" aria-hidden="true"></i> Delete
	                    </button>
	            </a>
              
            </td>
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