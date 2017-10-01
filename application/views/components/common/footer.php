</body>
<!-- js here -->
<?php $this->load->view('components/vendor/js.php'); ?>
<?php $this->load->view('components/custom/js.php'); ?>
<!-- global js var -->

<script type="text/javascript">

	var categoryAllUrl = "<?php echo base_url('dashboard/getCategory') ?>";
	var categoryByUrl = "<?php echo base_url('dashboard/getby') ?>";
	
</script>
</html>