<?php // show flash alert ?>
<?php if ($this->session->flashdata('sukses') != null): ?>
	<div class="alert alert-success alert-dismissible custom" role="alert">
		<button type="button" class="close custom" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $this->session->userdata('sukses')?>
	</div>
<?php elseif ($this->session->flashdata('error') != null): ?>
	<div class="alert alert-danger alert-dismissible custom" role="alert">
		<button type="button" class="close custom" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $this->session->userdata('error')?>
	</div>
<?php endif ?>