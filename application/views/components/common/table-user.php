<table width="60%" class="table custom">
	<thead>
		<tr>
			<td>NO</td>
			<td>USERNAME</td>
			<td>EMAIL</td>
			<td>ACTION</td>
		</tr>
	</thead>
	<?php $counter = 1 ?>
	<?php foreach ($unique as $row): ?>
		<tr>
			<td><?php echo $counter; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
        
        		<a href="<?php echo site_url('dashboard/edituser/'. $row['id']); ?>">         			
        			<button  class="btn btn-success excel">
        				<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
        			</button>
        		</a>

               	<a href="<?php echo site_url('dashboard/deleteuser/'.$row['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">                  
                    <button  class="btn btn-danger pdf">
                    	<i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </button>
               	</a>
                
            </td>
		</tr>
		<?php $counter++ ?>
	<?php endforeach ?>

</table>

