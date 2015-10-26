<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Register Students</h2>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php echo validation_errors(); ?>



<div class="container">
	
	<div class="col-lg-8">
	     <div class="panel panel-default">
	<?php $attributes = array("name" => "registerstudentform");
            echo form_open("Student/registerStudent")?>
   
     <div class="form-group">
				<label>Register Number</label>      
     <?php $data = array(
          'name'        => 'registernumber',
          'value'          => $registernumber,
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: 12345678',
          'required' => 'required',
           'readonly' => 'true'
          
        );
     echo form_input($data);   ?> 
      </div>
      
 <div class="form-group">  
 	<label>Class</label>   
  <?php
					$wh[''] = '';
					foreach ($allclassesTypes as $classeType) {
						$wh[$classeType -> id] = $classeType -> name;
					}
					echo form_dropdown('$classeType', $wh, (isset($_POST['$classeType']) ? $_POST['$classeType'] : ''), 'id="$classeType" class="form-control input-tip select" data-placeholder="Seletc class Type"');
                    ?>
 </div>     
      
      
      
      
      
      
    
      
       <div class="form-group">
				<label>Student Name</label>      
     <?php $data = array(
          'name'        => 'studentname',
          'value'          => $this->input->post('studentname'),
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: Thasneem ILM',
          'required' => 'required'
        );
     echo form_input($data);   ?> 
      </div>
     
      <div class="form-group">
				<label>Parent Name</label>      
     <?php $data = array(
          'name'        => 'parentname',
          'value'          => $this->input->post('parentname'),
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: Ibura Lebbe',
           'required' => 'required'
        );
     echo form_input($data);   ?> 
      </div> 
			
	
	 <div class="form-group">
				<label>Address</label>      
     <?php $data = array(
          'name'        => 'address',
          'value'          => $this->input->post('address'),
          'class'       => 'form-control',
          'placeholder' => 'Eg: No 350, Hijra mawatha, kekunagolla',
           'required' => 'required'
          );
     echo form_input($data);   ?> 
      </div> 
			
	 <div class="form-group">
				<label>Phone Number</label>      
     <?php $data = array(
          'name'        => 'phonenumber',
          'value'          => $this->input->post('phonenumber'),
          'class'       => 'form-control',
          'style'       => 'height:30px',
          'placeholder' => 'Eg: 0711585515',
           'required' => 'required'
        );
     echo form_input($data);   ?> 
      </div> 
      
      
      	
      
      
      
      
      
      
      
      
      
	  <div class="form-group">
                
      <input name="submit" type="submit" class="btn btn-primary" value="Send" />
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
            
    <?php echo form_close(); ?>
    
    

	</div>
</div>
</div>
<script>
 $(document).ready(function() {
// Datepicker Popups calender to Choose date.
$(function() {
$("#datepicker").datepicker();
// Pass the user selected date format.
$("#format").change(function() {
$("#datepicker").datepicker("option", "dateFormat", $(this).val());
});
});
});
</script>