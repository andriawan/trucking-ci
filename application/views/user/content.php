<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<a href="<?php echo base_url('dashboard/input'); ?>">Dashboard</a>
			<i class="fa fa-angle-right"></i>
			<span>INPUT DATA</span>
		</h2>
	</div>

</div>

<div class="col-md-9 main-content list">
	<form class="form-horizontal">
		  
		  <!-- CAR NUMBER -->
		  <div class="form-group">
		    <label for="car-number" class="col-sm-2 control-label">CAR NUMBER</label>
		    <div class="col-sm-10">
		      <input type="text" name="car-number" class="form-control" id="car" placeholder="Input Car Number Here">
		    </div>
		  </div>

		  <!-- STNK DATE -->
		  <div class="form-group">
		    <label for="stnk-date" class="col-sm-2 control-label">STNK DATE</label>
		    <div class="col-sm-10">
		      <input type="text" name="stnk-date" class="form-control date" id="stnk" placeholder="Input STNK Date Here">
		    </div>
		  </div>

		  <!-- PKB DATE -->
		  <div class="form-group">
		    <label for="pkb-date" class="col-sm-2 control-label">PKB DATE</label>
		    <div class="col-sm-10">
		      <input type="text" name="pkb-date" class="form-control date" id="pkb" placeholder="Input PKB Date Here">
		    </div>
		  </div>

		  <!-- SERVICE DATE -->
		  <div class="form-group">
		    <label for="service-date" class="col-sm-2 control-label">SERVICE DATE</label>
		    <div class="col-sm-10">
		      <input type="text" name="service-date" class="form-control date" id="date-service" placeholder="Input Service Date Here">
		    </div>
		  </div>

		  <!-- DETAIL ITEM SERVICE -->
		  <div class="form-group">
			    <label for="item-service" class="col-sm-2 control-label">DETAIL ITEM SERVICE</label>
			    <div class="col-sm-5">
			      <input type="text" name="item-service" class="form-control" id="service" placeholder="Service Category">
			    </div>
			    <div class="col-sm-5">
			      <input type="text" name="price" class="form-control" id="price" placeholder="Price">
			    </div>
		  </div>

		  <!-- TO DO: ajax jquery -->
		  <div class="form-group">
		  		<button class="btn btn-success pull-right custom">
		  		<i class="fa fa-plus-circle" aria-hidden="true"></i>
		  		Add More Item Service
		  		</button>		  
		  </div>

		  <!-- TOTAL PRICE -->
		  <div class="form-group">
		  		<label for="total-price" class="col-sm-2 control-label">TOTAL PRICE</label>
			    <div class="col-sm-10">
			      <input type="text" name="total-price" class="form-control" id="total-price" placeholder="Total">
			    </div>
		  </div>

		   <!-- KIR DATE -->
		  <div class="form-group">
		    <label for="kir-date" class="col-sm-2 control-label">KIR DATE</label>
		    <div class="col-sm-10">
		      <input type="text" name="kir-date" class="form-control date" id="kir" placeholder="Input KIR Date Here">
		    </div>
		  </div>

		   <!-- SIPA DATE -->
		  <div class="form-group">
		    <label for="sipa-date" class="col-sm-2 control-label">SIPA DATE</label>
		    <div class="col-sm-10">
		      <input type="text" name="sipa-date" class="form-control date" id="sipa" placeholder="Input SIPA Date Here">
		    </div>
		  </div>

		   <!-- IBM DATE -->
		  <div class="form-group">
			    <label for="ibm-date" class="col-sm-2 control-label date">IBM DATE</label>
		    	<div class="col-sm-10">
		    		  <input type="text" name="ibm-date" class="form-control date" id="ibm" placeholder="Input IBM Date Here">
			    </div>
		  </div>

		  <div class="form-group">
		  		<label for="ibm-date" class="col-sm-2 control-label"></label>
		  		<div class="col-sm-10">
		  				<button type="submit" class="btn btn-default pull-left">
				  			<i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
		  				</button>		  	
		  		</div>
		  </div>

	</form>
</div>