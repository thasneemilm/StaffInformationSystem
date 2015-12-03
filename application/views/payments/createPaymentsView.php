  
     

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
							echo form_open("Payments/createPayments")?>
   
     
	 
	 
							<div class="form-group">
								<label>Payment Name</label>      
								<?php $data = array(
							    'id' =>'id',
								'name'        => 'paymentname',
								//'value'          => $this->input->post('studentname'),
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
								'id' =>'id',
								'name'        => 'paymentfrequancy',
								//'value'          => $this->input->post('studentname'),
								'class'       => 'form-control',
								'style'       => 'height:30px',
								'placeholder' => 'Eg: 4 or 6 0r 12'
								// 'required' => 'required'
								);
								echo form_input($data);   ?> 
								<?php echo form_error('paymentname'); ?>
							</div>
	 
	  
	  
							<div class="form-group">
								<label>Description</label>      
								<?php $data = array(
								'id' =>'id',
								'name'        => 'description',
								//'value'          => $this->input->post('studentname'),
								'class'       => 'form-control',
								'style'       => 'height:30px',
								'placeholder' => ' test'
								);
								echo form_input($data);   ?> 
								<?php echo form_error('description'); ?>
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

			
		
		
		
		
		
		
	<section class="content">
		<div class="col-md-8">
          <!-- Default box -->
          <div class="box">
		  
				<div class="box-header with-border">
					<h3 class="box-title">Student Details</h3>
					<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
			
				<div class="box-body">
            
					    
      
					<div class="box">
						<div class="box-header">
                 
						</div><!-- /.box-header -->
						<div class="box-body  no-padding">
						<table class="table table-striped"id="postList" class="list">
							<tr>
							<th>Payment Name</th>
							<th>frequency</th>
							<th>Description</th>
							<th>Actions</th>
							</tr>
							
							<?php if ($payments) { ?>
								
					      <?php foreach($payments as $payment): ?>
                    <tr>
                      
                      <td><?php echo $payment->paymentname; ?></td>
                       <td><?php echo $payment->paymentfrequancy; ?></td>
					   <td><?php echo $payment->description; ?></td>
					   
                       <td > <div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('Payments/edit') . '/' . $payment -> paymentcategoryid; ?>">Edit</a></li>
                        <li><a class='deleteUser' href="<?php echo site_url('Payments/delete') . '/' . $payment -> paymentcategoryid; ?>">Delete</a></li>
                        
                      </ul>
                    </div> </td>
                    </tr>
                    <?php endforeach; ?>
						  
					<?php } ?>	  
						  
						  
						  
						</table>
				  
							</div><!-- /.box-body -->
				
					</div>
				</div><!-- /.box-body -->
            </div><!-- /.box -->
		</div><!-- /.box -->
		</section>
		
		
		
	<script>
	 
	 $(document).ready(function(){
	$("#submit").click(function(){
	$("#form").submit();  // jQuey's submit function applied on form.
	});
	});
	</script>   	
		
		
		
		

