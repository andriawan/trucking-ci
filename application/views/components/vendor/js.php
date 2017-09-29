<?php if (ENVIRONMENT === "production" ): ?>
		
		<!-- jquery the first -->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php else: ?>

		<script src="<?php echo base_url('assets/js/jquery.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>

	
<?php endif ?>