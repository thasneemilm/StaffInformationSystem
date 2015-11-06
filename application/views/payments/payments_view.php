  
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
        <meta charset="UTF-8">  
           
        <style>  
            /* Autocomplete 
            ----------------------------------*/  
            .ui-autocomplete { position: absolute; cursor: default; }     
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/  
   
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
            $("#id").autocomplete({  
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
                    $("#result").append(  
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
						<div id='alert alert-warning'  class="alert alert-info"> <?= $this->session->flashdata('flashSuccess') ?> </div>
						<?php } ?>	
      
					<?php if ($this->session->flashdata('flashFail')) { ?>
					<div id='alert alert-warning'  class="alert-alert-warning"> <?= $this->session->flashdata('flashFail') ?> </div>
					<?php } ?>	
      
      
						<?php $attributes = array("name" => "registerstudentform");
						echo form_open("Student/registerStudent")?>
   
     
	 
	 
					<div class="form-group">
					<label>Student Name</label>      
					<?php $data = array(
					'id' =>'id',
					'name'        => 'name',
					'value'          => $this->input->post('studentname'),
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					'readonly'=>'true'
					);
					echo form_input($data);   ?> 
					</div>
	 
	 
	 
					<div class="form-group">
							<label>Selects Payment Catagory</label>
							<select class="form-control">
	
							<?php foreach($payments as $payment): ?>
							<option value=<?php echo $payment->id;?>><?php echo $payment->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
					</div>  
	 
	 
					<div class="form-group">
						<label>Amount</label>      
						<?php $data = array(
						'id' =>'id',
						'name'        => 'name',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000'
						// 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
					
					<div class="form-group">
						<label>Special notes on Payments</label>      
						<?php $data = array(
						'id' =>'id',
						'name'        => 'name',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000'
						// 'required' => 'required'
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
			
			
			
			
		<div class="row">
            <div class="col-md-6">
              <div class="box">
					<div class="box-header with-border">
					<h3 class="box-title">Student Details</h3>
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
						echo form_open("Student/registerStudent")?>
   
     
	 
	 
					<div class="form-group">
					<label>Student Name</label>      
					<?php $data = array(
					'id' =>'id',
					'name'        => 'name',
					'value'          => 'test',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					 'readonly' => 'true'
					);
					echo form_input($data);   ?> 
					</div>
	               
				   
				     <div class="form-group">
					<label>Register Number</label>      
					<?php $data = array(
					'id' =>'id',
					'name'        => 'name',
					'value'          => 'test',
					'class'       => 'form-control',
					'style'       => 'height:30px',
					'placeholder' => 'Eg: Thasneem ILM',
					 'readonly' => 'true'
					);
					echo form_input($data);   ?> 
					</div>
	 
	                 <div class="form-group">
					<label>Parent Name</label>      
					<?php $data = array(
						'id' =>'id',
					'name'        => 'name',
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
						'id' =>'id',
					'name'        => 'name',
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
						'id' =>'id',
						'name'        => 'name',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000'
						// 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
					
					
					<div class="form-group">
						<label>Special notes on Payments</label>      
						<?php $data = array(
						'id' =>'id',
						'name'        => 'name',
						//'value'          => $this->input->post('studentname'),
						'class'       => 'form-control',
						'style'       => 'height:30px',
						'placeholder' => 'Eg: 1000'
						// 'required' => 'required'
						);
						echo form_input($data);   ?> 
					</div>
	 
					
	 
	 
				</div> 
      
      
   
      
       
      
      
	  
       
	   
					
	   
					<?php echo form_close(); ?>	
            	
           
            </div><!-- /.box-body -->
             
            </div><!-- /.col -->
            
        </div><!-- /.row -->	
			
			
			
			
           
         
 
    </section><!-- /.content -->


	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
 	
		
		
		
		
		
		
		
		
		
		
	 








