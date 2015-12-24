     
<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
<script type="text/javascript">
	



// Ajax post
$(document).ready(function() {
	
$('select#branchId').on('change', function (e) {
   $("#postList").empty();

  
   
});


$('select#districtId').on('change', function (e) {
   $("#postList").empty();
   
});

$('select#serviceId').on('change', function (e) {
   $("#postList").empty();
   
});


$('select#designationId').on('change', function (e) {
   $("#postList").empty();
   
});

$("#submit").click(function(event) {
	
event.preventDefault();

		var branchId = $("select#branchId").val();
		var districtId = $("select#districtId").val();
		var serviceId = $("select#serviceId").val();
		var designationId = $("select#designationId").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Student/getSearchResults",

data: {branchId: branchId, districtId: districtId, serviceId:serviceId, designationId:designationId },
success: function(response) {

	
	$('#postList').html(response);

}
});
});
});

function DoSearch( branch, district, service, designation )
{
    $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>" + "index.php/Student/getSearchResults",
         data: {branchId: branchId, districtId: districtId, serviceId:serviceId, designationId:designationId },
         success: function(response){
                    $('#postList').html(response);
                  }
    });
}



</script>

<script>
	$(document).ready(function(){
		$("#search").keyup(function(){
		
		 $("#postList").empty();
		
		
		if($("#search").val().length>0){
		$.ajax({
			type: "post",
			url: "http://localhost/SIS/index.php/Student/ajaxGetStudentSearch3",
			cache: false,				
			data:'search='+$("#search").val(),
			success: function(response){
				$('#postList').html(response);
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						
					}catch(e) {		
						alert('Exception while request..');
						}		
				}else{
					$('#finalResult').html($('<li/>').text("No Data Found"));		
				}		
				
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		}
		return false;
	  });
	});
</script>

<script type='text/javascript'>
    $(document).ready(function(){
	
        $(".deleteUse").click(function(e){
		alert('Are you Sure to deliver this? ');
		 $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
			alert(url);
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
</script>
	 
	 
	 
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blank page
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <div class="col-md-12">
          <!-- Default box -->
          <div class="box">
		<div class="box-header with-border">
              <h3 class="box-title">Employee Details</h3>
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
                
                <div class="box-body  no-padding">
                
				
				
				
				
				 <div class="box-body">
                  <div class="row">
				  
				  <?php $attributes = array("name" => "registerstudentform", "id" => "doPayments");?>
			 <?php	echo form_open('Student/doPayments', $attributes)?>
			 
			 
                    <div class="col-xs-2">
                      <select class="form-control" name="branch" id="branchId" required >
	                        <option  value="0"> <?php echo 'Select Branch'; ?></option>
							<?php foreach($Branches as $branch): ?>
							<option value=<?php echo $branch->id;  ?> > <?php echo $branch->bname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
					 </div>
					 
					 
                    <div class="col-xs-2">
                     <select class="form-control" name="district" id="districtId" required >
	                        <option value="0"> <?php echo 'Select District'; ?></option>
							<?php foreach($Districts as $district): ?>
							<option value=<?php echo $district->id;  ?> > <?php echo $district->dname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
                    </div>
					
					
					
					
                    <div class="col-xs-2">
                      <select class="form-control" name="service" id="serviceId" required >
	                        <option value="0" > <?php echo 'Select Service'; ?></option>
							<?php foreach($Services as $Service): ?>
							<option value=<?php echo $Service->id;  ?> > <?php echo $Service->sname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
                    </div>
					
					
					
					<div class="col-xs-2">
                     <select class="form-control" name="designation" id="designationId" required >
	                        <option value="0"> <?php echo 'Select Designation'; ?></option>
							<?php foreach($designation as $des): ?>
							<option value=<?php echo $des->id;  ?> > <?php echo $des->dgname; ?></option>
							<?php endforeach; ?>
                                              
							</select>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					<div class="col-xs-2">
                      <input name="submit" id="submit" type="submit" class="btn btn-primary" value="Search" />
                    </div>
					
					
					
					
					<?php echo form_close(); ?>
					
					
					
					<div class="col-xs-2">
                     <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" name="search" id="search">
                     
                    </div>
					
					<div class="col-xs-2">
                     
					<div class="input-group-btn">
						  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
						</div>
                    </div>
					
					
					
					
                  </div>
                </div><!-- /.box-body -->
            
				 
					 
				
               
               
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				  
				  </div><!-- /.box-body -->
				
				
				
              </div>
            	
            	
            	
            	
            	
             <div class="box-body  no-padding">
                  <table class="table table-striped"id="postList" class="list">
                   
                  </table>
				  
				  </div><!-- /.box-body -->	
            	
            	
            	
            	
            	
            	
            	
           
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->
