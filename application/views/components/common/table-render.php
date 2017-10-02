<head>
		<title></title>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <?php if (ENVIRONMENT === "production" ): ?>

				<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>"/>


		<?php else: ?>

				<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>"/>
				

		<?php endif ?>

  

		<style>
			@page{
				padding: 30px;
			}

			html{
				padding: 100px;
				margin: 40px;
			}

			.table.custom td, .table.custom td a, .table.custom td span{
				font-size: 10px;
			}

		</style>
			
</head>