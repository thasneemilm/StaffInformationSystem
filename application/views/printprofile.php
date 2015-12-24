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
                          <input type="checkbox" name="nicnumber">
                          Nic Number
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
                          Date Of Birth
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
					  
					  
         </div>
		   
	   
		   
 
  
					
					<input type="submit" name="submit" value="Submit" class="btn btn-info" />
 
<?php echo "</form>"?>
            	
            	
            	
    
   	
            	
            	
            	
            	
    	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->
		
		
		
		







<script type="text/javascript">

$(document).ready(function (e) {


// Function to preview image after validation
$(function() {
	
$("#studentIdw").change(function() {
var studentId = $('#studentId').val();

$("#message").empty();
$('#loading').show();
$.ajax({
 type: "Post",
 url: "<?php echo base_url(); ?>" + "index.php/Student/getProfileImage",
 data: {studentId: studentId},        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
}
});
});	
	

$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});








$("#uploadimagem").on('submit',(function(e) {
	
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "<?php echo base_url(); ?>" + "index.php/Student/do_upload", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
}
});
}));







});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});
</script>