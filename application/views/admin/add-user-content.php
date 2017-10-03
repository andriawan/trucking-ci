<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<span>ADD USER</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		<?php echo form_open('dashboard/submitUser','class="form-horizontal"'); ?>

			  <!-- EMAIL -->
			  	<div class="form-group">
			  	<div class="col-sm-10 col-md-offset-2">
			  		<?php echo form_error('email','<p class="text-danger control-label pull-left" for="email">','</p>'); ?>
			  	</div>
			    <label for="car-number" class="col-sm-2 control-label">EMAIL</label>
			    <div class="col-sm-10">
			      <input type="text" name="email" class="form-control" required="true" id="email" placeholder="user@email.com"
			      value="<?php echo isset($data['email']['value']) ? $data['email']['value'] : '' ?>" 
			      >
			    </div>
			  </div>

			  <!-- USERNAME -->
			  <div class="form-group">
			  	<div class="col-sm-10 col-md-offset-2">
			  		<?php echo form_error('username','<p class="text-danger control-label pull-left" for="username">','</p>'); ?>
			  	</div>
			    <label for="stnk-date" class="col-sm-2 control-label">USERNAME</label>
			    <div class="col-sm-10">
			      <input type="text" name="username" class="form-control" required="true" id="username" placeholder="username"
			      value="<?php echo isset($data['username']['value']) ? $data['username']['value'] : '' ?>" 
			      >
			    </div>
			  </div>

			  <!-- EMAIL -->
			  <div class="form-group">
			  	<div class="col-sm-10 col-md-offset-2">
			  		<?php echo form_error('password','<p class="text-danger control-label pull-left" for="password">','</p>'); ?>
			  	</div>
			    <label for="pkb-date" class="col-sm-2 control-label">PASSWORD</label>
			    <div class="col-sm-10">
			      <input type="password" name="password" class="form-control" required="true" id="password" placeholder="******">
			      	<div class="checkbox user-button pull-left">
						<label>
						<input type="checkbox" id="enable-show"> Show Password
						</label>
					</div>
					<div class="clearfix"></div>
					<!-- Button trigger modal -->
					<button type="button" class="btn user-button btn-primary pull-left" data-toggle="modal" data-target="#myModal">
					  Generate Password
					</button>

					<div class="form-group">
				  		<div class="col-sm-10 user-button">
				  				<button type="submit" class="btn btn-default pull-left">
						  			<i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
				  				</button>		  	
				  		</div>
				  	</div>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Generate Password</h4>
					      </div>
					      <div class="modal-body">
					        <div class="container-fluid">
							  <div class="row">
							    <div class="col-sm-12">
							      
							      <div class="form-group">
							        <div class="input-group">
							          <input type="text" class="form-control input-lg" rel="gp" data-size="32" data-character-set="a-z,A-Z,0-9,#">
							          <span class="input-group-btn"><button type="button" class="btn btn-default btn-lg getNewPass"><span class="fa fa-refresh"></span></button></span>
							        </div>
							      </div>
							      
							    </div>
							  </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" onclick="copyGeneratedPassword()" class="btn btn-primary">Choose Password</button>
					      </div>
					    </div>
					  </div>
					</div>

			    </div>
			  </div>

		</form>
	</div>

</div>