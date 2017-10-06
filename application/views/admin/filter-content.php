<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<a href="<?php echo base_url('dashboard'); ?>">INVOICE</a>
			<i class="fa fa-angle-right"></i>
			<span>FILTER AND TRACK INVOICE</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		
		 
			<?php echo form_open('dashboard/submitInvoiceData','class="form-horizontal"'); ?>

			<div class="form-group">
			    <label for="car-number" class="col-sm-2 control-label">INVOICE NUMBER</label>
			    <div class="col-sm-10">
			      <input type="text" name="invoice-number" class="form-control" required="true" id="invoice" placeholder="Input Invoice Number Here">
			    </div>
			  </div>

			  <div class="col-sm-10 col-md-offset-2 custom-search">
		    	 <button type="submit" id="filter-act" class="btn btn-success custom pull-left search">
		  			<i class="fa fa-search" aria-hidden="true"></i>
		  			<span>Search</span>
				</button>
			  </div>
				
			</form>

		<div class="clearfix"></div>

		<nav aria-label="...">
		  <?php // echo $pagination; ?>
		</nav>


		<div class="clearfix"></div>

		<?php if (empty($unique) || empty($query)): ?>
			<div>Nothing data to show</div>
		<?php else: ?>

			<div class="table-responsive">
				<?php $this->load->view('components/common/table-report'); ?>
			</div>

		<?php endif ?>

	</div>

</div>