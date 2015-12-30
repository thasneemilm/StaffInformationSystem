<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            	
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
            
             <?php if ($this->session->flashdata('message')) { ?>
        <div> <?= $this->session->flashdata('message') ?> </div>
    <?php } ?>	
      
      <?php if ($this->session->flashdata('flashFail')) { ?>
        <div id='alert alert-warning'  class="alert-alert-warning"> <?= $this->session->flashdata('flashFail') ?> </div>
    <?php } ?>	
            
		
      
 <?php echo form_open_multipart('Student/printprofile');?>
	
	     
	
	<div class="form-group">
			<label>Student Name</label>
							<select class="form-control" name="studentname" id="studentId" required >
	                        <option > <?php echo 'Select Student'; ?></option>
							<?php foreach($students as $student): ?>
							<option value=<?php echo $student->id;  ?> > <?php echo $student->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
</div>
	        
	
	  <div class="form-group">
	  <label>Select the Fields</label>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="name" checked>
                          Name
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="namewithinitial">
                          Name with Initial
                        </label>
                      </div>

					   <div class="checkbox">
                        <label>
                          <input type="checkbox"name="address">
                          Address
                        </label>
                      </div>
					  
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="nicnumber">
                          Nic Number
                        </label>
                      </div>
					  
					   <div class="checkbox">
						  <label>
                          <input type="checkbox">
                          Date Of Birth
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox"name="age">
                          Age
                        </label>
                      </div>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Cinvil status
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Phone Number
                        </label>
                      </div>
					   <div class="checkbox">
                        <label>
                          <input type="checkbox"name="age">
                          Designation
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="service">
                          Service
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="district">
                          District
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox" name="branch">
                          Branch
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox"name="dateoffirstappoinment">
                          Firts Appointment Date
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="previousworingexperience">
                          Previous Working Experience
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="totalservice">
                          Total Service
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox" name="basicsalary">
                          Basic Salary
                        </label>
                      </div>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox"name="educationalqualifications">
                          Educational qualification
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="professionalqualification">
                          Professional Qualification
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"name="trainingprogrames">
                          Training Programes
                        </label>
                      </div>
					  
					  <div class="checkbox">
                        <label>
                          <input type="checkbox" name="basicsalary">
                          Basic Salary
                        </label>
                      </div>
					  
					  
				
			
			<div class="form-group">
			<label>University</label>
							<select class="form-control" name="designation" id="designationId" required >
	                        <option > <?php echo 'Select University'; ?></option>
							<?php foreach($uni as $des): ?>
							<option value=<?php echo $des->id;  ?> > <?php echo $des->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
		</div>
      
	 
	  
      <div class="form-group">
	   
	  <select class="form-control" name="department" id="departments" required >
	   <option value=''> <?php echo 'Select Department'; ?></option>
	  </select>
	 
	  </div>
	  
		  
      	
      <div class="form-group">
     
	  <select class="form-control" name="lectures" id="lectures" required >
	  <option > <?php echo 'Select lectures'; ?></option>
	  </select>
	  
	  </div>
	  			  
					  
		 	  
					  
					  
					  
					  
					  
					  
					  
         </div>
		   
	   
		   
 
  
					
					<input type="submit" name="submit" value="Submit" class="btn btn-info" />
 
<?php echo "</form>"?>
            	
            	
            	
    
   	
            	
            	
            	
            	
    	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->
		
		
		
		







<script type="text/javascript">

$(document).ready(function (e) {
	
	
$('select#designationId').on('change', function (e) {
   $("#postList").empty();
   var designationId = $("select#designationId").val();
   
 jQuery.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo base_url(); ?>" + "index.php/Student/getdepa",
data: {designationId:designationId },
success: function(datas) {
	$.each(datas,function(i, uni) {
    var opt = $('<option />'); // here we're creating a new select option for each group
    opt.val(uni.id);
    opt.text(uni.name);
    $('#departments').append(opt); 
});
}
});
});

 $('#departments').change(function() {
      
        var $changedElement = $(this);

        if($changedElement.val() != '') {
          
		 // alert($changedElement.val());
		  DoAction($changedElement.val());
		  
        } else {
		 alert('Cannot be Null');
		}
    });





function DoAction(id)
{
	
jQuery.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo base_url(); ?>" + "index.php/Student/getlect",
data: {id:id },
success: function(datas) {
 	$.each(datas,function(i, u) {
    var opt = $('<option />'); // here we're creating a new select option for each group
    opt.val(u.id);
    opt.text(u.name);
    $('#lectures').append(opt); 
});
}
});	
	
	
}


});






</script>