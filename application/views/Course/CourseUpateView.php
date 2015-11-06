
  
            	
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
            echo form_open("Course/updateCourse")?>
     
	  <div class="form-group">
				<label>Name</label>      
				<?php $data = array(
          'name'        => 'name',
          'value'          => $course->name,
          'class'       => 'form-control',
          'placeholder' => 'Eg English'
           
          );
     echo form_input($data);   ?> 
      </div> 
	 
	 
	  <div class="form-group">
				<label>Name</label>      
				<?php $data = array(
          'name'        => 'description',
          'value'          => $course->description,
          'class'       => 'form-control',
          'placeholder' => 'Eg Test'
           
          );
     echo form_input($data);   ?> 
      </div> 
      
     
     
      
      
       <div class="form-group">
                
      <input name="submit" type="submit" class="btn btn-primary" value="Send" />
      <button type="reset" class="btn btn-primary">Reset</button>
           
      </div>
             
    <?php echo form_close(); ?>

            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
  </div><!-- /.box -->
        </section><!-- /.content -->


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	 <section class="content">	
  <div class="col-md-8">		
 <div class="box">
<div class="box-body  no-padding">
  <table class="table table-striped"id="postList" class="list">
	<tr>
		
		<th><?php echo 'Course name';?></th>
		<th><?php echo 'Course Description';?></th>
		<th><?php echo 'Actions';?></th>

	</tr>
	
	<?php if($courses!=null):?>
	<?php foreach ($courses as $course):?>
		<tr>
            
            <td><?php echo $course->name;?></td>
            <td><?php echo $course->description;?></td>
			
			
			<td>
			<div class="btn-group">
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
</section>


</div>
</div>






