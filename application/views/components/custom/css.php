<?php if (ENVIRONMENT === "production" ): ?>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.min.css') ?>"/>

<?php else: ?>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>"/>
			
<?php endif ?>