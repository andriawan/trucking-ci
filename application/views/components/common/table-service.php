<table width="60%" class="table custom">
	<thead>
		<tr>
			<td>NO</td>
			<td>SERVICE NAME</td>
			<td>SERVICE PRICE</td>
			<td>ACTION</td>
		</tr>
	</thead>
	<?php $counter = 1 ?>
	<?php foreach ($unique as $row): ?>
		<tr>
			<td><?php echo $counter; ?></td>
			<td><?php echo $row['category']; ?></td>
			<td><?php echo $row['price']; ?></td>
		<td>
			<a href="<?php echo site_url('dashboard/serviceedit/'.$row['id_service']); ?>">         			
        			<button  class="btn btn-success edit">
        				<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
        			</button>
        	</a>

        	<a href="<?php echo site_url('dashboard/servicedelet/'.$row['id_service']); ?>" onClick="return confirm('Are you sure you want to delete?')">                  
                    <button  class="btn btn-danger hapus">
                    	<i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </button>
            </a>

         </td>
		</tr>
		<?php $counter++ ?>
	<?php endforeach ?>
	
</table>
