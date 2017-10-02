<head>
		<title></title>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <?php if (ENVIRONMENT === "production" ): ?>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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