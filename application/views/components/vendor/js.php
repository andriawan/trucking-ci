<?php if (ENVIRONMENT === "production" ): ?>
		
		<!-- jquery the first -->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

		<!-- select2 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

<?php else: ?>

		<script src="<?php echo base_url('assets/js/jquery.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
		<script src="<?php echo base_url('assets/js/select2.full.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
	
<?php endif ?>