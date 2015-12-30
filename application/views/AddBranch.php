
 <script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
            	
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Course
            
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
	
	

	<?php $attributes = array("name" => "registerstudentform");
            echo form_open("Settings/addBranch")?>
     
	  <div class="form-group">
				<label>Branch Name</label>      
				<?php $data = array(
			'id' => 'branchname',
          'name'        => 'branchname',
          //'value'          => $course->coursename,
          'class'       => 'form-control',
          'placeholder' => 'Eg Training'
           
          );
     echo form_input($data);   ?> 
      </div> 
	 
	 
	  <div class="form-group">
				<label>Description</label>      
				<?php $data = array(
				'id'=>'description',
          'name'        => 'description',
          //'value'          => $course->coursename,
          'class'       => 'form-control',
          'placeholder' => 'Eg Test'
           
          );
     echo form_input($data);   ?> 
      </div> 
      
     
     
      
      
       <div class="form-group">
                
      <?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
             
    <?php echo form_close(); ?>

            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
 <section class="content" id="viewlistofbranch" >	
 
</section>


</div>
</div>


<script type="text/javascript">
	
	



// Ajax post
$(document).ready(function() {

$(".submit").click(function(event) {
event.preventDefault();

var branchname = $("input#branchname").val();
var description = $("input#description").val();


jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Settings/addBranch",
dataType: 'json',
data: {branchname: branchname, description: description },
success: function(data){
	
	
}
});

jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Settings/getBranch",


success: function(response) {

	
	$('#viewlistofbranch').html(response);

}
});

$('#branchname').val('');
$('#description').val('');



});
});




</script>


<script type="text/javascript">
	




$(document).ready(function() {
	
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Settings/getBranch",


success: function(response) {

	
	$('#viewlistofbranch').html(response);

}
});

  
   
});

 </script>


