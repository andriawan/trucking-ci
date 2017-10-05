<?php $this->load->view('components/common/header.php'); ?>

<div class="gradient-cover"></div>
	
	<?php $this->load->view('admin/navbar'); ?>
	
	<div class="clearfix"></div>

	<div class="container-fluid">
		<div class="row">
			
			<?php $this->load->view('admin/sidebar'); ?>

	 		<?php $this->load->view('admin/contentadmin'); ?>

		</div>
	</div>	

<?php $this->load->view('components/common/footer.php'); ?>