 
  <?php if ($this->session->flashdata('flashSuccess')) { ?>
        <div id='alert alert-warning'  class="alert alert-info"> <?= $this->session->flashdata('flashSuccess') ?> </div>
    <?php } ?>	
      
      <?php if ($this->session->flashdata('flashFail')) { ?>
        <div id='alert alert-warning'  class="alert-alert-warning"> <?= $this->session->flashdata('flashFail') ?> </div>
    <?php } ?>	
 <table class="table table-striped" id="postList" class="list">
                    <tr>
                      <th>Register Number</th>
                      <th>Name</th>
                      
                      <th>Phone</th>
					  <th>Address</th>
					   
					    <th>Branch</th>
					  <th>District</th>
					   <th>Designation</th>
					    <th>Service</th>
						 <th>Action</th>
                    </tr>
				
				
					<?php foreach($students as $student): ?>
                    <tr>
                      <td><?php echo $student->id; ?></td>
                      <td><?php echo $student->name; ?></td>
                       
                      <td><?php echo $student->phonenumber; ?></td>
					   <td><?php echo $student->address; ?></td>
					   
					     <td><?php echo $student->bname; ?></td>
                       
                      <td><?php echo $student->dname; ?></td>
					   <td><?php echo $student->dgname; ?></td>
					   <td><?php echo $student->sname; ?></td>
                       <td > <div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('Student/edit') . '/' . $student -> id; ?>">Edit</a></li>
                        <li><a href="<?php echo site_url('Student/remove') . '/' . $student -> id; ?>">Delete</a></li>
                        <li><a  href="<?php echo site_url('Payments'); ?>">Do Payment</a></li>
                      </ul>
                    </div> </td>
                    </tr>
                    <?php endforeach; ?>
					
			       
			
		
        </table>