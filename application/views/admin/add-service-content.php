<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<span>ADD SERVICE</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		<?php echo form_open('dashboard/submitService','class="form-horizontal"'); ?>

			  <!-- EMAIL -->
			  	<div class="form-group">
			  	<div class="col-sm-10 col-md-offset-2">
			  		<?php echo form_error('name','<p class="text-danger control-label pull-left" for="name">','</p>'); ?>
			  	</div>
			    <label for="car-number" class="col-sm-2 control-label">SERVICE NAME</label>
			    <div class="col-sm-10">
			      <input type="text" name="name" class="form-control" required="true" id="name" placeholder="service name  here"
			      value="<?php echo isset($data['name']['value']) ? $data['name']['value'] : '' ?>" 
			      >
			    </div>
			  </div>

			  <!-- USERNAME -->
			  <div class="form-group">
			  	<div class="col-sm-10 col-md-offset-2">
			  		<?php echo form_error('price','<p class="text-danger control-label pull-left" for="price">','</p>'); ?>
			  	</div>
			    <label for="stnk-date" class="col-sm-2 control-label">SERVICE PRICE</label>
			    <div class="col-sm-10">
			      <input type="number" name="price" class="form-control" required="true" id="price" placeholder="service price here"
			      value="<?php echo isset($data['price']['value']) ? $data['price']['value'] : '' ?>" 
			      >
			    </div>
			  </div>

			  <!-- EMAIL -->
			  <div class="form-group">
			 
			    <div class="col-sm-10">
			     
					<div class="clearfix"></div>
					<!-- Button trigger modal -->
					<button type="submit" class="btn user-button btn-primary pull-left" data-toggle="modal">
					    	<i class="fa fa-paper-plane" aria-hidden="true"></i> 
					Submit
					</button>

					<div class="form-group">
				  		<div class="col-sm-10 user-button">
				  				<button type="reset" class="btn btn-default pull-left">
						  		Cancel
				  				</button>		  	
				  		</div>
				  	</div>

				
			    </div>
			  </div>

		</form>
	</div>

</div>