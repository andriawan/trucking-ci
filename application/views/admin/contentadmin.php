<?php isset($data) ? debug($data) : ""; ?>

<div class="col-md-9 main-content">

	<div class="banner">
		<h2>
			<span>UPDATE DATA</span>
		</h2>
	</div>

	<div class="col-md-12 main-content list">

		<?php echo form_open('dashboard/updateData','class="form-horizontal"'); ?>
		
		<?php $counter = 1 ?>
	<?php foreach ($unique as $row): ?>
	

				 <!-- ID NUMBER -->
				  <div class="form-group">
				      
				    <div class="col-sm-10">
				        
				      <input type="hidden" name="id" class="form-control" required="true" id="id" placeholder="Input Car Number
				      Here"
				      value="<?php echo  $row['id_transaction']; ?>">
				      
				    </div>
				  </div>
			  
			  <!-- CAR NUMBER -->
			  <div class="form-group">
			      
			    <label for="car_number" class="col-sm-2 control-label">CAR NUMBER</label>
			    
			    <div class="col-sm-10">
			        
			      <input type="text" name="car-number" class="form-control" required="true" id="car_number" placeholder="Input Car Number"
			      
			      value="<?php echo  $row['car_number']; ?>">
			      
			    </div>
			  </div>

			  <!-- NAMA DRIVER -->
			  <div class="form-group">
			    <label for="nama_driver" class="col-sm-2 control-label">NAMA DRIVER</label>
			    <div class="col-sm-10">
			      <input type="text" name="nama-driver" class="form-control" required="true" id="nama_driver" placeholder="Input Nama Driver Here" value="<?php echo $row['nama_driver'];?>">
			    </div>
			  </div>

			  <!-- TEMPAT SERVICE -->
			  <div class="form-group">
			    <label for="tempat_service" class="col-sm-2 control-label">TEMPAT SERVICE</label>
			    
			    <div class="col-sm-10">
			      <input type="text" name="tempat-service" class="form-control" required="true" id="tempat_service" placeholder="Input TEMPAT SERVICE Here"  value="<?php echo $row['tempat_service'];?>">
			    </div>
			  </div>

			  <!-- STNK DATE -->
			  <div class="form-group">
			    <label for="stnk-date" class="col-sm-2 control-label">STNK DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="stnk-date" class="form-control date" required="true" id="stnk" placeholder="Input STNK Date Here" value="<?php echo sql_to_date($row['stnk_date']);?>" >
			    </div>
			  </div>

			  <!-- PKB DATE -->
			  <div class="form-group">
			    <label for="pkb_date" class="col-sm-2 control-label">PKB DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="pkb-date" class="form-control date" required="true" id="pkb" placeholder="Input PKB Date Here" value="<?php echo sql_to_date($row['pkb_date']);?>" >
			    </div>
			  </div>

			  <!-- SERVICE DATE -->
			  <div class="form-group">
			    <label for="service-date" class="col-sm-2 control-label">SERVICE DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="service-date" class="form-control date" required="true" id="date-service" placeholder="Input Service Date Here"
			      value="<?php echo sql_to_date($row['service_date']);?>">
			    </div>
			  </div>


			   <!-- KIR DATE -->
			  <div class="form-group">
			    <label for="kir-date" class="col-sm-2 control-label">KIR DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="kir-date" class="form-control date" required="true" id="kir" placeholder="Input KIR Date Here"
			        value="<?php echo sql_to_date($row['kir_date']);?>">
			    </div>
			  </div>

			   <!-- SIPA DATE -->
			  <div class="form-group">
			    <label for="sipa-date" class="col-sm-2 control-label">SIPA DATE</label>
			    <div class="col-sm-10">
			      <input type="text" name="sipa-date" class="form-control date" required="true" id="sipa" placeholder="Input SIPA Date Here"
			       value="<?php echo sql_to_date($row['sipa_date']);?>">
			    </div>
			  </div>

			   <!-- IBM DATE -->
			  <div class="form-group">
				    <label for="ibm-date" class="col-sm-2 control-label date">IBM DATE</label>
			    	<div class="col-sm-10">
			    		  <input type="text" name="ibm-date" class="form-control date" required="true" id="ibm" placeholder="Input IBM Date Here"
			    		   value="<?php echo sql_to_date($row['ibm_date']);?>">
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
			<?php $counter++ ?>
	<?php endforeach ?>
	</div>

</div>

