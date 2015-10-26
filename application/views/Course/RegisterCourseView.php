<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Register New Course</h2>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php echo validation_errors(); ?>

<h4><?php echo $this->session->flashdata('message'); ?></h4>

<div class="container">
	
	<div class="col-lg-8">
	     <div class="panel panel-default">
	<?php $attributes = array("name" => "registerstudentform");
            echo form_open("Course/registerNewCourse")?>
     
      <label >Name :</label>
      <div class="form-group">
				<input type="text" name="coursename" class="form-control" placeholder="Eg English" >    
       </div>
      
      
      
      <label >Description :</label>
      <div class="form-group">
				<input type="text" name="description" class="form-control" placeholder="Eg Some thing" ">    
     
      </div>
      </div>
      
      
       <div class="form-group">
                
      <input name="submit" type="submit" class="btn btn-primary" value="Send" />
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
             
    <?php echo form_close(); ?>

	</div>
</div>



<div class="col-lg-12">
	<div class="col-lg-8">
<table cellpadding=0 cellspacing=10  border="1"  class="table table-striped">
	<tr>
		<th><?php echo 'Course ID';?></th>
		<th><?php echo 'Course name';?></th>
		<th><?php echo 'Course Description';?></th>
		<th><?php echo 'Actions';?></th>

	</tr>
	
	<?php if($courses!=null):?>
	<?php foreach ($courses as $course):?>
		<tr>
            <td><?php echo $course->id;?></td>
            <td><?php echo $course->name;?></td>
            <td><?php echo $course->description;?></td>
			<td><?php echo anchor("Course/editCourse/".$course->id, 'Edit') ; echo " ";
				echo anchor("Course/deleteCourse/".$course->id, 'Delete') ;?>
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






