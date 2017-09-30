<nav class="navbar-default navbar-static-top" role="navigation">
	<div class="container-fluid custom">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand custom" href="#">Trucking System</a>
    	</div>
    	<!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right custom">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
	          <ul class="dropdown-menu top">
	            <li>
	            	<span><i class="fa fa-cog" aria-hidden="true"></i></span>
	            	<span><a href="#">Edit Profile</a></span>
	            <li>
	            	<span><i class="fa fa-cog" aria-hidden="true"></i></span>
	            	<span><a href="#">Add User</a></span>
	            <li>
	            	<span><i class="fa fa-cog" aria-hidden="true"></i></span>
	            	<span><a href="#">View Report</a></span>
	            </li>
	            <li role="separator" class="divider"></li>
	            <li>
	            	<span><i class="fa fa-cog" aria-hidden="true"></i></span>
	            	<span><a href="<?php echo base_url('auth/logout') ?>">Logout</a></span>
	            </li>
	          </ul>
	        </li>
	        <a href="" title="avatar" class="avatar">
	        	<img src="<?php echo base_url('assets/img/wo.jpg') ?>" alt="avatar">
	        </a>	
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
</nav>