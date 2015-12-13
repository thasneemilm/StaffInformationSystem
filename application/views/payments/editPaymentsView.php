  
   <script>
	 
	 $(document).ready(function(){
	$("#submit").click(function(){
	$("#form").submit();  // jQuey's submit function applied on form.
	});
	});
	</script>     

 <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            Payments
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url() ?>index.php/Payments">Payments</a></li>
            <li class="active">create Payments</li>
          </ol>
    </section>

<!-- Main content -->
               <!-- Main content -->
	<section class="content">
			<div class="col-md-8">
				<!-- Default box -->
				<div class="box">
						<div class="box-header with-border">
						<h3 class="box-title">Hi !</h3>
						<div class="box-tools pull-right">
						<button class="btn btn-box-tool" title="Collapse"></button>
							<button class="btn btn-box-tool" title="Remove"></button>
							</div>
						</div>
					<div class="box-body">
            
						<?php if ($this->session->flashdata('flashSuccess')) { ?>
						<div id='alert alert-warning'  class="alert alert-info"> <?= $this->session->flashdata('flashSuccess') ?> </div>
						<?php } ?>	
      
						<?php if ($this->session->flashdata('flashFail')) { ?>
						<div id='alert alert-warning'  class="alert-alert-warning"> <?= $this->session->flashdata('flashFail') ?> </div>
						<?php } ?>	
      
      
							<?php $attributes = array("name" => "registerstudentform");
							echo form_open("Payments/updatePayments")?>
   
                            <div class="form-group">
								<label>Description</label>      
								<?php $data = array(
								
								'name'        => 'id',
								'value'       => $payment->paymentcategoryid,
								'class'       => 'form-control',
								'required'       => 'true',
								'readonly'    => 'true'
								);
								echo form_input($data);   ?> 
							</div>
	 
	 
							<div class="form-group">
								<label>Payment Name</label>      
								<?php $data = array(
							    
								'name'        => 'paymentname',
								'value'          => $payment->paymentname,
								'class'       => 'form-control',
								'style'       => 'height:30px',
								'placeholder' => 'Eg: Month'
								// 'required' => 'required'
								);
								echo form_input($data);   ?> 
								<?php echo form_error('paymentname'); ?>
							</div>
	 
							<div class="form-group">
								<label>Frequancy per Year</label>      
								<?php $data = array(
								
								'name'        => 'paymentfrequancy',
								'value'          => $payment->paymentfrequancy,
								'class'       => 'form-control',
								'style'       => 'height:30px',
								'placeholder' => 'Eg: 4 or 6 0r 12'
								// 'required' => 'required'
								);
								echo form_input($data);   ?> 
							</div>
	 
	  
	  
							<div class="form-group">
								<label>Description</label>      
								<?php $data = array(
								'id' =>'id',
								'name'        => 'description',
								'value'          => $payment->description,
								'class'       => 'form-control',
								'style'       => 'height:30px',
								'placeholder' => ' test'
								);
								echo form_input($data);   ?> 
							</div>
	 
	 
							<div class="form-group" >
                
								<input name="submit" type="submit" class="btn btn-primary" value="Send" />
								<button type="reset" class="btn btn-primary">Reset</button>
           
							</div>
	 
	 
					</div> 
     
					<?php echo form_close(); ?>	
				</div><!-- /.box-body -->
	
	
				
			</div><!-- /.box -->
		
	</section><!-- /.content -->

	
