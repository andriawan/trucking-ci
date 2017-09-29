<html>
<head>
  <title></title>
  <!-- meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>"/>

</head>
<body>
    <div class="gradient-cover"></div>
    <div class="header-login">
      <h1>Trucking System</h1>
    </div>
    <div class="login-box">
        <div class="element">

            <?php if (isset($message)): ?>
              <div id="infoMessage" class="error-report"><?php echo $message;?></div>  
            <?php endif ?>

            <h2><?php echo lang('login_heading');?></h2>
            <h6><?php echo lang('login_subheading');?></h6>

            <?php echo form_open("auth/login");?>

            <div class="input1">
                <p><?php echo form_error('identity'); ?></p>
                <?php echo form_input($identity);?>
            </div>

            <div class="input2">
                <p><?php echo form_error('password'); ?></p>
                <?php echo form_input($password);?>
            </div>

            <div class="add-action">
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> 
                <span><?php echo lang('login_remember_label', 'remember');?></span>
                <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
            </div>

            <div class="clear"></div>


            <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

          <?php echo form_close();?>
          
        </div>
  </div>

</body>
</html>