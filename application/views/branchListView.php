 <div class="col-md-8">		
 <div class="box">
<div class="box-body  no-padding">
  <table class="table table-striped"id="postList" class="list">
	<tr>
		
		<th><?php echo 'Course name';?></th>
		<th><?php echo 'Course Description';?></th>
		<th><?php echo 'Actions';?></th>

	</tr>
	
	<?php if($branches!=null):?>
	<?php foreach ($branches as $course):?>
		<tr>
            
            <td><?php echo $course->bname;?></td>
            <td><?php echo $course->description;?></td>
			<td><div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
						  <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('Course/editCourse') . '/' . $course -> id; ?>">Edit</a></li>
                        <li><a class='deleteUser' href="<?php echo site_url('Course/deleteCourse') . '/' . $course -> id; ?>">Delete</a></li>
                       
                      </ul>
                    </div>
			</td>
		</tr>
	<?php endforeach;?>
	<?php  else: ?>
	 No Courses Available
	 <?php  endif; ?>
</table>
</div>
</div>
</div>



<script type="text/javascript">
	
	$("a").click(function(e){
    e.preventDefault();
    var bname = $(this).parent().parent().parent().find("td:eq(0)").text();
    //YOUR AJAX CODE AND PASS bname TO IT
});








</script>