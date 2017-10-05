<?php $this->load->view('components/common/header.php'); ?>
	
	<?php $this->load->view('user/navbar'); ?>
	
	<div class="clearfix"></div>

	<div class="container-fluid">
		<div class="row">
			
			<?php $this->load->view('user/sidebar'); ?>

	  		<?php $this->load->view('admin/showprofile'); ?>

		</div>
	</div>	

<?php $this->load->view('components/common/footer.php'); ?>