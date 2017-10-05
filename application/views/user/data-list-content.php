<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<a href="<?php echo base_url('dashboard/input'); ?>">Dashboard</a>
			<i class="fa fa-angle-right"></i>
			<span>REPORT TRUCKING SOLID LOGISTICS</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		<div class="alert alert-info alert-dismissible action" role="alert">
		  <p>Info! Untuk Edit atau Delete Data Silahkan klik Car Number</p>
		</div>

		<button type="button" onclick="exportExcel()" id="export-excel" class="btn btn-success custom pull-left excel">
	  		<i class="fa fa-file-excel-o" aria-hidden="true"></i>
	  		<span>Export to Excel</span>
		</button>

		<button type="button" id="export-pdf" onclick="exportPDF()" class="btn btn-success custom pull-left pdf">
	  		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
	  		<span>Export to PDF</span>
		</button>

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