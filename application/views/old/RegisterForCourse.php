<style>
#seaerch {
	background-color: lightyellow;
	outline: medium none;
	padding: 8px;
	width: 300px;
	border-radius: 2px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	border: 2px solid orange;
}


</style>

<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>

<script>
	
	$(document).ready(function () {
    $("#search").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/CodeIgniter3Tests/index.php/Student/searchStudent",
            data: {
                keyword: $("#search").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#search').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });
});
	
	
</script>


 <script>
$(document).ready(function(){
	  $("#search").keyup(function(){
		if($("#search").val().length>0){
		$.ajax({
			dataType: "json",
			type: "post",
			url: "http://localhost/CodeIgniter3Tests/index.php/Student/searchStudent",
			//cache: false,				
			data:'search='+$("#search").val(),
			success: function(response){
			var options = '';
		    var results= '';
			//alert('dfhdvrgf');
           $.each(response, function(i, value) {
			//alert('innnnnnnnnnn');
		options += '<option value="' + value.id + '">' + value.name + '</option>';
		//alert(i);
		});
		$("select#student").html(options);
		
				
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

<script>
	$(document).ready(function(){
	  $("#course").keyup(function(){
		if($("#course").val().length>0){
		$.ajax({
			dataType: "json",
			type: "post",
			url: "http://localhost/CodeIgniter3Tests/index.php/Course/searchCourse",
			//cache: false,				
			data:'course='+$("#course").val(),
			success: function(response){
			var options = '';
		    var results= '';
			//alert('dfhdvrgf');
           $.each(response, function(i, value) {
			//alert('innnnnnnnnnn');
		options += '<option value="' + value.id + '">' + value.name + '</option>';
		//alert(i);
		});
		$("select#course").html(options);
		
				
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

<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Register For Course</h2>
	</div>
	<!-- /.col-lg-12 -->
</div>




<?php $attributes = array("name" => "registerstudentform",
                           "id"  => "form");
            echo form_open("Student/registerForCourse")?>



<div id="container">
	<div class="col-lg-12">
		
	<div class="col-lg-4">
			
           <p><strong>Search Student by Name</strong></p>
<input type="text" name="search" id="search" class="form-control input-tip select"/>

</div></div>


<div class="col-lg-12">
             <div class="col-md-4">
                    <div class="form-group">
                    	<?= lang("student", "student"); ?>
                       <select id="student" name="student" class="form-control input-tip select">
                       	<option></option>
                       	</select>
                    </div>
        </div>
 </div>
          
          
          
 <div id="container">
	<div class="col-lg-12">
             <div class="col-md-4">
<p><strong>Search Course by Name</strong></p>
<input type="text" name="course" id="course" class="form-control input-tip select"/>
</div>
</div></div>

<div class="col-lg-12">
             <div class="col-md-4">
                    <div class="form-group">
                    	<?= lang("course", "course"); ?>
                       <select id="course" name="course" class="form-control input-tip select">
                       	<option></option>
                       	</select>
                    </div>
        </div>
 </div>
          
    <div class="form-group">
     <input name="submit" type="submit" class="btn btn-primary" value="Send" />
      <button type="reset" class="btn btn-primary">Reset</button>
    
      </div>

 <?php echo form_close(); ?>