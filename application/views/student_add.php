<script>
	$("#alert alert-warning").fadeIn('slow').delay(5000).fadeOut('slow');
	</script>
 
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  
 
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
            echo form_open("Student/registerStudent")?>
   
     <div class="form-group">
				<label>Register Number</label>      
     <?php $data = array(
          'name'        => 'registernumber',
         // 'value'          => $this->input->post('registernumber'),
		  'value'          => $registernumber,
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
          'value'          => $this->input->post('name'),
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
          'name'        => 'namewithinitial',
          'value'          => $this->input->post('namewithinitial'),
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
          'value'          => $this->input->post('address'),
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
          'value'          => $this->input->post('nicnumber'),
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
                      <input type="text" class="form-control" name="dateofbirth" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
     </div><!-- /.form group -->
	
	
	<div class="form-group">
                    <label>Age</label>
                    <select class="form-control select2" name="age" data-placeholder="Select a State" style="width: 100%;">
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
					  <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>20</option>
                      <option>31</option>
					   <option>32</option>
                      <option>33</option>
                      <option>34</option>
                      <option>35</option>
                      <option>36</option>
                      <option>37</option>
					  <option>28</option>
                      <option>39</option>
                      <option>40</option>
                      <option>41</option>
                      <option>42</option>
                      <option>43</option>
                      
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
				   <label>Civil Status</label>
					<select class="form-control select2" name="civilstatus" style="width: 100%;">
                      <option selected="selected">Single</option>
                      <option>Married</option>
                      
                    </select><!-- /.form-group -->
	                </div>
	
	 <div class="form-group">
				<label>Phone Number Number</label>      
     <?php $data = array(
          'name'        => 'phonenumber',
          'value'          => $this->input->post('phonenumber'),
		  //'value'          => $registernumber,
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
							<option value=<?php echo $des->id;  ?> > <?php echo $des->dgname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      
      	<div class="form-group">
			<label>Select Services</label>
							<select class="form-control" name="service" id="serviceId" required >
	                        <option > <?php echo 'Select Service'; ?></option>
							<?php foreach($Services as $Service): ?>
							<option value=<?php echo $Service->id;  ?> > <?php echo $Service->sname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      <div class="form-group">
			<label>Select District</label>
							<select class="form-control" name="district" id="districtId" required >
	                        <option > <?php echo 'Select District'; ?></option>
							<?php foreach($Districts as $district): ?>
							<option value=<?php echo $district->id;  ?> > <?php echo $district->dname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
	  
      <div class="form-group">
			<label>Select Branch</label>
							<select class="form-control" name="branch" id="branchId" required >
	                        <option > <?php echo 'Select Branch'; ?></option>
							<?php foreach($Branches as $branch): ?>
							<option value=<?php echo $branch->id;  ?> > <?php echo $branch->bname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
      
	  
	  
	  <div class="form-group">
	            <label>
						
                      Academic Qualification
                    </label>     
				   
				    <label>
                      <input type="button"  class="flat-red" id="addolevel" name="academicqualification" value="OL"> 
					 
					  
					  <input type="button"  class="flat-red" id="addalevel" name="academicqualification" value="AL"> 
					  
					   <input type="button"  class="flat-red" id="adddegree" name="academicqualification" value="Degree">
					   
					    <input type="button"  class="flat-red" id="addpgde" name="academicqualification" value="Post Garaduate">
					 
                    </label>
				   
                   
                   
                  
        </div>
	
	<div class="form-group" id="olelevel">
		
		 <div class="box-body pad">
                  <form>
                    <textarea class="textarea" placeholder="Place some text here ol " style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>
	
     </div> 
	 
	 
	 
	 <div class="form-group" id="alelevel">
		
		 <div class="box-body pad">
                  <form>
                    <textarea class="textarea" placeholder="Place some text here al " style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>
	
     </div> 
	 
	  <div class="form-group" id="degree">
		
		 <div class="box-body pad">
                  <form>
                    <textarea class="textarea" placeholder="Place some text here degree " style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>
	
     </div> 
	 
	   <div class="form-group" id="pgde">
		
		 <div class="box-body pad">
                  <form>
                    <textarea class="textarea" placeholder="Place some text here pgde" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>
	
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

		
		
<script type="text/javascript">
	



 $(document).ready(function() {
             $("#alelevel").hide();
             $("#olelevel").hide();
			  $("#degree").hide();
			   $("#pgde").hide();
			 
            $("#addolevel").click(function(){
              
                $("#olelevel").show(); 
				$("#alelevel").hide();
			    $("#degree").hide();
			   $("#pgde").hide();
				  

            });
			
			 $("#addalevel").click(function(){
                
             $("#olelevel").hide();
                $("#alelevel").show(); 
				 
				 $("#degree").hide();
			   $("#pgde").hide();

            });
			
			 $("#adddegree").click(function(){
                
               
				 $("#alelevel").hide(); 
				 $("#olelevel").hide(); 
				 $("#degree").show(); 
				  $("#pgde").hide();
                
				

            });
			
			
			 $("#addpgde").click(function(){
                
               
				 $("#alelevel").hide(); 
				 $("#olelevel").hide(); 
                 $("#degree").hide(); 
				 $("#pgde").show(); 
				

            });
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

           
        });




 </script>	
		
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
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
		
