<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Register for Course</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php echo validation_errors(); ?>
<div class="col-lg-8">
	     <div class="panel panel-default">
	     	
	     	
	     	
	     	<?php $attributes = array("name" => "registerstudentform");
            echo form_open("RegisterForCourseController/registerForCourse")?>
	     	
	     	<div class="form-group">
              <label>Search Student</label>   
             </div>
	     	
		   <div class="form-group input-group">
          		<input type="text" class="form-control" placeholder="Type Student Name To Search" id="searchStudent">
          		<span class="input-group-btn">
         		 <button class="btn btn-default" type="button"><i class="fa fa-search"></i>                                                </button>
                  </span>
           </div>
           
            <div class="form-group input-group">
          		<div  class="form-control"  id="students"><select id="students" name="student" value="student"></select></div>
            </div>
           
	   <div class="form-group">
			 <?php
                    if(isset($courses)){
                    $wh[''] = '';
					foreach ($courses as $course) {
						$wh[$course -> id] = $course -> name;
					}
					echo form_dropdown('course', $wh, (isset($_POST['$course']) ? $_POST['$course'] : ''), 'id="course" class="form-control input-tip select" data-placeholder="' . $this -> lang -> line("select") . ' ' . $this -> lang -> line("Purchase") . '"  style="width:100%;" ');
                    	
                    }
					?>
		</div>

     
     
     
      
	  <div class="form-group">
                
      <input id="registerbutton"   name="submit" type="submit" class="btn btn-primary" value="Register" />
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
            
    <?php echo form_close(); ?>

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function(){
	
	var minlength = 3;
	 $("input#searchStudent").keyup(function(){
        $("input#searchStudent").css("background-color", "white");
        
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: "RegisterStudentController/getStudentByName",
                data: {
                    'search_keyword' : value
                },
                dataType: "json",
                success: function(data){
                //	alert(data);
        var options = '';
		var results= '';
	//	options += '<option value="' + "" + '">' + "" + '</option>';
		$.each(data, function(i, value) {
			//alert(value[0]);
		options += '<option value="' + value.id + '">' + value.name + '</option>';
		//alert(data);
		});
		$("select#students").html(options);
		 
		 }
            });
        }
        
    });
    
    
    
    
    $("input#searchStudent").keydown(function(){
        $("input#searchStudent").css("background-color", "lightblue");
    });
    
    
   
    
});
</script>


</head>
<body>






