<?php if (ENVIRONMENT === "production" ): ?>
	
		<script src="<?php echo base_url('assets/js/custom.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>

<?php else: ?>

		<script src="<?php echo base_url('assets/js/custom.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
	
<?php endif ?>