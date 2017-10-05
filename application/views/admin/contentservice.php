<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
			<i class="fa fa-angle-right"></i>
			<span>REPORT SERVICE SOLID LOGISTICS</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">
	   
	   	 <a href="<?php echo site_url('dashboard/addservice/'); ?>">
                  
                <button type="button" id="export-excel" class="btn btn-success custom pull-left excel">
		    
		    
		         
	  		<i class="fa fa-server" aria-hidden="true"></i>
	  		
	  		<span>Add Server</span>
	  		
	  		
		</button>

               </a>
		
		
	
		<div class="clearfix"></div>

		<?php if (empty($unique) || empty($query)): ?>
			<div>Nothing data to show</div>
		<?php else: ?>

			<div class="table-responsive">
				<?php $this->load->view('components/common/table-service'); ?>
			</div>

		<?php endif ?>

	</div>

</div>