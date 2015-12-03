
            	
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
            
			
      
    <form action="do_upload" method="POST" enctype="multipart/form-data" >
	
	       <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center">Nina Mcintire</h3>
                  

                 

                  
                </div><!-- /.box-body -->
	
	
	        
	<div class="form-group">
							<label>Student Name</label>
							<select class="form-control" name="studentname" id="studentId" >
	
							<?php foreach($students as $student): ?>
							<option value=<?php echo $student->id;  ?> > <?php echo $student->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
					</div>  	   
		   
    Select File To Upload:<br />
    <input type="file" name="userfile"  />
    <br /><br />
    <input type="submit" name="submit" value="Upload" class="btn btn-info" />
</form>
            	
            	
            	
            	
            	
            	
            	
            	
    	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->
		
		
		
		
<script type="text/javascript">		

$(document).ready(function() {
	alert('kkkkkkkkkkkkkkk');
});		
$( '#studentId' ).change(function() {
	alert('kkkkkkkkkkkkkkk');
    studentId = $('#studentId').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>" + "index.php/Student/GetStudentPaymentDetails",
        data: {studentId: studentId},
        success: function(data) {
		     
			$('#studentnameP').val(data.name);
			$('#registernumberP').val(data.studentId);
			$('#parentnameP').val(data.parentname);
			
			$('#registernumberP').val(data.studentId);
			
			},
        error : function(){
           alert('Some error occurred!');
        },
		
    });
	});	

</script>




