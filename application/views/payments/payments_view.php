  
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
        <meta charset="UTF-8">  
           
        <style>  
            /* Autocomplete 
            ----------------------------------*/  
            .ui-autocomplete { position: absolute; cursor: default; }     
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') 
			right center no-repeat; }*/  
   
            /* workarounds */  
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */  
   
            /* Menu 
            ----------------------------------*/  
            .ui-menu {  
                list-style:none;  
                padding: 2px;  
                margin: 0;  
                display:block;  
            }  
            .ui-menu .ui-menu {  
                margin-top: -3px;  
            }  
            .ui-menu .ui-menu-item {  
                margin:0;  
                padding: 0;  
                zoom: 1;  
                float: left;  
                clear: left;  
                width: 100%;  
                font-size:80%;  
            }  
            .ui-menu .ui-menu-item a {  
                text-decoration:none;  
                display:block;  
                padding:.2em .4em;  
                line-height:1.5;  
                zoom:1;  
            }  
            .ui-menu .ui-menu-item a.ui-state-hover,  
            .ui-menu .ui-menu-item a.ui-state-active {  
                font-weight: normal;  
                margin: -1px;  
            }  
        </style>  
        
		<script type="text/javascript">  
        $(this).ready( function() {  
            $("#id2").autocomplete({  
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "<?php echo base_url(); ?>index.php/autocomplete/lookup",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                            }  
                        },  
                    });  
                },  
            select:   
                function(event, ui) {  
                    $("#name").append(  
                        "<li>"+ ui.item.value + "</li>"  
                    );                    
                },        
            });  
        });  
        </script>  
           
    </head>
            	
 <!-- Content Header (Page header) -->
	<section class="content-header">
          <h1>
            Payments
            
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url() ?>index.php/Payments">Payments</a></li>
            <li class="active">Do Payments</li>
          </ol>
    </section>

        <!-- Main content -->
               <!-- Main content -->
    <section class="content">
		
	 <div id="container"></div>
	 
		<div class="col-md-6">
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
						<div id='alert alert-warning'  class="alert alert-info"> 
							<?= $this->session->flashdata('flashSuccess') ?> </div>
						<?php } ?>	
      
					<?php if ($this->session->flashdata('flashFail')) { ?>
					<div id='alert alert-warning'  class="alert-alert-warning">
						<?= $this->session->flashdata('flashFail') ?> </div>
					<?php } ?>	
      
      
						<?php $attributes = array("name" => "registerstudentform", "id" => "doPayments");
		
		
		
		echo form_open('', $attributes)?>
   
					<div class="form-group">
					<label>Student Name</label>      
					<?php $data = array(
					'id' =>'sssssssssssssstudentname',
					'name'        => 'sssssssstudentname',
					'value'          => $this->input->post('studentname'),
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					//'readonly'=>'true'
					);
				//	echo form_input($data);   ?> 
					</div>
	                
					
					<div class="form-group">
							<label>Student Name</label>
							<select class="form-control" name="studentname" id="studentId" >
	
							<?php foreach($students as $student): ?>
							<option value=<?php echo $student->id;  ?> > <?php echo $student->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
					</div>  
	 
					<div class="form-group">
							<label>Selects Payment Catagory</label>
							<select class="form-control" name="paymentCatagory" id="paymentCatagoryId" >
	
							<?php foreach($paymentsCategories as $paymentsCategory): ?>
							<option value=<?php echo $paymentsCategory->id;?>><?php echo $paymentsCategory->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
					</div>  
	 
	 
					<div class="form-group">
						<label>Amount</label>      
						<?php $data = array(
						'id' =>'amount',
						'name'        => 'amount',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000',
						 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
					
					<div class="form-group">
						<label>Special notes on Payments</label>      
						<?php $data = array(
						'id' =>'notes',
						'name'        => 'notes',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'any notes'
						// 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
	 
					<div class="form-group" >
                
				    <?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
					
					<button type="reset" class="btn btn-primary">Reset</button>
					
					
           
					</div>
	  			
      	<?php echo form_close(); ?>	
            	
				
				
				
				
				
				
				
           </div> 
            </div><!-- /.box-body -->
			
		</div><!-- /.box -->
			
			
			
			
		<div class="row">
            <div class="col-md-6">
              <div class="box">
					<div class="box-header with-border">
					<h3 class="box-title">Student Payments Details</h3>
					<div class="box-tools pull-right">
					<button class="btn btn-box-tool" title="Collapse"></button>
					<button class="btn btn-box-tool" title="Remove"></button>
					</div>
					</div>
				<div class="box-body">
            
					<?php if ($this->session->flashdata('flashSuccess')) { ?>
						<div id='alert alert-warning'  class="alert alert-info">
							<?= $this->session->flashdata('flashSuccess') ?> </div>
						<?php } ?>	
      
					<?php if ($this->session->flashdata('flashFail')) { ?>
					<div id='alert alert-warning'  class="alert-alert-warning"> 
						<?= $this->session->flashdata('flashFail') ?> </div>
					<?php } ?>	
      
      
						<?php $attributes = array("name" => "registerstudentform"); ?>
						
   
     
	 
	 
					<div class="form-group">
					<label>Student Name</label>      
					<?php $data = array(
					'id' =>'studentnameP',
					'name'        => 'studentnameP',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM'
					 
					);
					echo form_input($data);   ?> 
					</div>
	               
				   
				    <div class="form-group">
					<label>Register Number</label>      
					<?php $data = array(
					'id' =>'registernumberP',
					'name'        => 'registernumberP',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					 'readonly' => 'true'
					);
					echo form_input($data);   ?> 
					</div>
	 
	                 <div class="form-group">
					<label>Parent Name</label>      
					<?php $data = array(
						'id' =>'parentnameP',
					'name'        => 'parentnameP',
					'value'          => 'test',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					 'readonly' => 'true'
					);
					echo form_input($data);   ?> 
					</div>
					
					
					
					 <div class="form-group">
					<label>Payment Category</label>      
					<?php $data = array(
						'id' =>'paymentcategoryP',
					'name'        => 'paymentcategoryP',
					'value'          => 'test',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					 'readonly' => 'true'
					);
					echo form_input($data);   ?> 
					</div> 
	 
	 
					<div class="form-group">
						<label>Balance To Date</label>      
						<?php $data = array(
						'id' =>'balanceP',
						'name'        => 'balanceP',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000'
						// 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
					
					
	 
				</div> 
      
      
   
      
       
      
      
	  
       
	   
					
	   
					
            	
           
            </div><!-- /.box-body -->
             
            </div><!-- /.col -->
            
        </div><!-- /.row -->	
			
			
			
	
           
        		<!-- /.row --> 
 
    </section><!-- /.content -->


	
 <section class="content">
  <div class="col-md-12">
          <!-- Default box -->
          <div class="box">
		<div class="box-header with-border">
              <h3 class="box-title">Payment Details </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            
             <?php if ($this->session->flashdata('flashSuccess')) { ?>
        <div id='alert alert-warning'  class="alert alert-info"> <?= $this->session->flashdata('flashSuccess') ?> </div>
    <?php } ?>	
      
      <?php if ($this->session->flashdata('flashFail')) { ?>
        <div id='alert alert-warning'  class="alert-alert-warning"> <?= $this->session->flashdata('flashFail') ?> </div>
    <?php } ?>	
      
      
          <div class="box">
                <div class="box-header">
                  
					 <?php 
						 echo $this->ajax_pagination->create_links()
						 ; ?>
				
                  <div class="box-tools">
				  
                    <div class="input-group" style="width: 300px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" name="search" id="search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body  no-padding">
                  <table class="table table-striped"id="postList" class="list">
                    <tr>
                      <th>Payment Reference</th>
                      <th>Student Register</th>
                      <th>Student Name</th>
                      <th>Payment Category</th>
					  <th>Amount</th>
					  <th>Date</th>
					  <th>Officer</th>
                    </tr>
					<div >  
					
					
					
					
					<!--?php foreach($this->data['students'] as $student): ?-->
					<?php foreach($payments as $payment): ?>
                    <tr>
                      <td><?php echo $payment->name; ?></td>
                      <td><?php echo $payment->studentid; ?></td>
                     
                      
                    </tr>
                    <?php endforeach; ?>
				
					
					
					
					</div>
                  </table>
				  
                </div><!-- /.box-body -->
				
				
				
              </div>
            	
            	
            	
            	
            	
            	
            	
            	
            	
            	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->		
		

<table border='1' id="display"></table>		
		
<script type="text/javascript">
	
	



// Ajax post
$(document).ready(function() {

$(".submit").click(function(event) {
event.preventDefault();

var studentId = $("select#studentId").val();
var amount = $("input#amount").val();
var paymentCatagoryId = $("select#paymentCatagoryId").val();
var paymentCatagoryId = $("select#paymentCatagoryId").val();
var notes = $("input#notes").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Payments/doPayments",
dataType: 'json',
data: {amount: amount, studentId: studentId, paymentCatagoryId:paymentCatagoryId, notes:notes },
success: function(res) {
 
}
});
});
});
</script>
		


<script type="text/javascript">		

$( "#studentId" ).keyup(function() {
	$('#registernumberP').val('');
});	
	
$( "#studentId" ).change(function() {
	$('#registernumberP').val('');
    studentId = $('#studentId').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>" + "index.php/Payments/GetStudentPaymentDetails",
        data: {studentId: studentId},
        success: function(data) {
		     
			$('#registernumberP').val(data.studentId);
			
			},
        error : function(){
           alert('Some error occurred!');
        },
		
    });
});	

</script>
		
 	
		
		
		
		
		
		
		
		
		
		
	 








