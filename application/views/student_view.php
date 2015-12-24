<script>
	$("#alert alert-warning").fadeIn('slow').delay(5000).fadeOut('slow');
	</script>
 

 
  
  
 
 <style>

</style>
            	
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Students
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

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
            echo form_open("Student/update")?>
   
     <div class="form-group">
				<label>Register Number</label>      
     <?php $data = array(
          'name'        => 'id',
         // 'value'          => $this->input->post('registernumber'),
		  'value'          => $student->id,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: 12345678',
		  'readonly'=>'readonly'
         // 'required' => 'required'         
          
        );
     echo form_input($data); ?> 
	 
      </div>
   
       <div class="form-group">
				<label>Employee Name</label>      
     <?php $data = array(
          'name'        => 'name',
         // 'value'          => $this->input->post('name'),
		  'value'          => $student->name,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: Thasneem ILM',
          'required' => 'required'
        );
     echo form_input($data);   ?> 
	 <?php echo form_error('namewithinitial'); ?>
      </div>
	  
	   <div class="form-group">
				<label>Name with Initial</label>      
     <?php $data = array(
          'name'        => 'name_with_initial',
          //'value'          => $this->input->post('namewithinitial'),
		  'value'          => $student->name_with_initial,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: Thasneem ILM',
          'required' => 'required'
        );
     echo form_input($data);   ?> 
	 <?php echo form_error('studentname'); ?>
      </div>
     
	 
	   <div class="form-group">
				<label>Address</label>      
     <?php $data = array(
          'name'        => 'address',
         // 'value'          => $this->input->post('address'),
		 'value'          => $student->address,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: Kekunagolla',
          'required' => 'required'
        );
     echo form_input($data);   ?> 
	 <?php echo form_error('studentname'); ?>
	 </div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
      <div class="form-group">
				<label>NIC Number</label>      
     <?php $data = array(
          'name'        => 'nicnumber',
         // 'value'          => $this->input->post('nicnumber'),
		   'value'          => $student->nicnumber,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => '890329556',
          'required' => 'required'
        );
     echo form_input($data);   ?> 
	 <?php echo form_error('parentname'); ?>
      </div> 
		
		
		
	
	 <div class="form-group">
                    <label>Date of birth</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" name="dateofbirth" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
     </div><!-- /.form group -->
	
	
	<div class="form-group">
                    <label>Age</label>
                    <select class="form-control select2"  name="age" data-placeholder="Select a State" style="width: 100%;">
                      <?php
		foreach ( range(10, 80) as $age ) {
	
			if($student->age==$age){
				echo "<option value='$age' selected=selected=>$age</option>";
				}
		
				else {
				echo "<option value='$age'>$age</option>";
				}
	
  
		};
?>
                      
                    </select>
					
                  </div><!-- /.form-group -->
				  
				  
				  
				  
				 <div class="form-group">
				 <label>Gender</label>   
                      <div class="radio">
                        <label>
                          <input type="radio" name="gender" id="optionsRadios1" value="Male" <?php if($student->gender=='Male'){echo "checked";}  ?>>
                          Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="gender" id="optionsRadios2" value="Female" <?php if($student->gender=='Female'){echo "checked";}  ?>>
                         Female
						 </label>
                      </div>
                      
                    </div>
					
					
					
					
					 <div class="form-group">
				 <label>Civil Status</label>   
				<div class="radio">
                        <label>
                          <input type="radio" name="civilstatus" id="optionsRadios1" value="Married" <?php if($student->civilstatus=='Married'){echo "checked";}  ?>> 
                          Married
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="civilstatus" id="optionsRadios2" value="Single" <?php if($student->civilstatus=='Single'){echo "checked";}  ?>>
                         Single
						 </label>
                      </div>
                      
                    </div>
					
					
					
					
					
	
	 <div class="form-group">
				<label>Phone Number Number</label>      
     <?php $data = array(
          'name'        => 'phonenumber',
          //'value'          => $this->input->post('phonenumber'),
		  'value'          => $student->phonenumber,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: 12345678'
		 
         // 'required' => 'required'         
          
        );
     echo form_input($data); ?> 
	 
      </div>
	 
			
		<div class="form-group">
			<label>Select Designation</label>
							<select class="form-control" name="designation" id="designationId" required >
	                        <option > <?php echo 'Select Designation'; ?></option>
							<?php foreach($designation as $des): ?>
							<option value=<?php echo $des->id;  ?> <?php if($student->designation==$des->id){echo "selected=selected";}  ?> > <?php echo $des->dgname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      
      	<div class="form-group">
			<label>Select Services</label>
							<select class="form-control" name="service" id="serviceId" required >
	                        <option > <?php echo 'Select Service'; ?></option>
							<?php foreach($Services as $Service): ?>
							<option value=<?php echo $Service->id;  ?>  <?php if($student->Service==$Service->id){echo "selected=selected";}  ?> > <?php echo $Service->sname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      <div class="form-group">
			<label>Select District</label>
							<select class="form-control" name="district" id="districtId" required >
	                       
							<?php foreach($Districts as $district): ?>
							<option value=<?php echo $district->id;  ?> <?php if($student->District==$district->id){echo "selected=selected";}  ?> > <?php echo $district->dname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
	  
      <div class="form-group">
			<label>Select Branch</label>
							<select class="form-control" name="branch" id="branchId" required value=<?php echo $student->Branch;?> >
	                       
							<?php foreach($Branches as $branch): ?>
							<option value=<?php echo $branch->id;  ?>  <?php if($student->Branch==$branch->id){echo "selected=selected";}  ?>  > <?php echo $branch->bname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      
      
      
      
      
	  <div class="form-group">
                
      <input name="submit" type="submit" class="btn btn-primary" value="Send" />
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
            
    <?php echo form_close(); ?>	
            	
            	
            	
            	
            	
            	
            	
           	
            	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->
		
		
 <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>		
		
<script>
	$(function() {
	$('#upload_file').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'./upload/upload_file/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});
});
</script>