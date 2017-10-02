<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<a href="<?php echo base_url('dashboard/input'); ?>">Dashboard</a>
			<i class="fa fa-angle-right"></i>
			<span>INPUT DATA</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		<?php echo form_open('dashboard/submitData','class="form-horizontal"'); ?>

			<!-- HIDDEN VALUE -->
				<input type="hidden" class="count-list" name="countItemServiceList" value="0" />
				<input type="hidden" class="sum" name="sum-total" value="0" />
			  
			  <!-- CAR NUMBER -->
			  <div class="form-group">
			    <label for="car-number" class="col-sm-2 control-label">CAR NUMBER</label>
			    <div class="col-sm-10">
			      <input type="text" name="car-number" class="form-control" required="true" id="car" placeholder="Input Car Number Here">
			    </div>
			  </div>

			  <!-- STNK DATE -->
			  <div class="form-group">
			    <label for="stnk-date" class="col-sm-2 control-label">STNK DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="stnk-date" class="form-control date" required="true" id="stnk" placeholder="Input STNK Date Here">
			    </div>
			  </div>

			  <!-- PKB DATE -->
			  <div class="form-group">
			    <label for="pkb-date" class="col-sm-2 control-label">PKB DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="pkb-date" class="form-control date" required="true" id="pkb" placeholder="Input PKB Date Here">
			    </div>
			  </div>

			  <!-- SERVICE DATE -->
			  <div class="form-group">
			    <label for="service-date" class="col-sm-2 control-label">SERVICE DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="service-date" class="form-control date" required="true" id="date-service" placeholder="Input Service Date Here">
			    </div>
			  </div>

			  <!-- DETAIL ITEM SERVICE -->
			  <div class="form-group item-service">
				    <label for="item-service" class="col-sm-2 control-label">DETAIL ITEM SERVICE</label>
				    <div class="col-sm-10 adder">
				    	<div class="items">
				    		<div class="col-sm-6 one">
				    			<select type="text" name="item-service0" class="form-control" id="service0" placeholder="Service Category">
				    			</select>
						      	<div class="dropdown-menu result">
			  					</div>
						    </div>
						    <div class="col-sm-6 two">
						      <input type="text" name="price0" class="form-control" required="true" disabled="true" id="price0" placeholder="Price">
						    </div>
				    	</div>
				    </div>
			  </div>

			  <!-- TO DO: ajax jquery -->
			  <div class="form-group button-item-add">
			  		<button type="button" onclick="appendItemService()" id="add" class="btn btn-success pull-right custom">
			  		<i class="fa fa-plus-circle" aria-hidden="true"></i>
			  		Add More Item Service
			  		</button>

			  		<button type="button" onclick="removeLastItem()" class="btn btn-danger pull-right custom">
			  		<i class="fa fa-plus-circle" aria-hidden="true"></i>
			  		Remove Item Service
			  		</button>

			  		<button type="button" onclick="resetItem()" class="btn btn-danger pull-right custom">
			  		<i class="fa fa-plus-circle" aria-hidden="true"></i>
			  		Reset All Items
			  		</button>
			  </div>

			  <!-- TOTAL PRICE -->
			  <div class="form-group">
			  		<label for="total-price" class="col-sm-2 control-label">TOTAL PRICE</label>
				    <div class="col-sm-10">
				      <input type="text" disabled="true" disabled="true" required="true" name="total-price" class="form-control" id="total-price" placeholder="Total">
				    </div>
			  </div>

			   <!-- KIR DATE -->
			  <div class="form-group">
			    <label for="kir-date" class="col-sm-2 control-label">KIR DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="kir-date" class="form-control date" required="true" id="kir" placeholder="Input KIR Date Here">
			    </div>
			  </div>

			   <!-- SIPA DATE -->
			  <div class="form-group">
			    <label for="sipa-date" class="col-sm-2 control-label">SIPA DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="sipa-date" class="form-control date" required="true" id="sipa" placeholder="Input SIPA Date Here">
			    </div>
			  </div>

			   <!-- IBM DATE -->
			  <div class="form-group">
				    <label for="ibm-date" class="col-sm-2 control-label date">IBM DATE</label>
			    	<div class="col-sm-10">
			    		  <input type="text" name="ibm-date" class="form-control date" required="true" id="ibm" placeholder="Input IBM Date Here">
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

</div>

