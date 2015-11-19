 

 <table class="table table-striped" id="postList" class="list">
                    <tr>
                      <th>Register Number</th>
                      <th>Name</th>
                      <th>Parent Name</th>
                      <th>Phone</th>
					  <th>Address</th>
					   <th>Actions</th>
                    </tr>
				
					<?php if ($students) { ?>
					<?php foreach($students as $student): ?>
                    <tr>
                      <td><?php echo $student->id; ?></td>
                      <td><?php echo $student->name; ?></td>
                       <td><?php echo $student->parentname; ?></td>
                      <td><?php echo $student->phonenumber; ?></td>
					   <td><?php echo $student->address; ?></td>
                       <td > <div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('Student/edit') . '/' . $student -> id; ?>">Edit</a></li>
                        <li><a href="<?php echo site_url('Student/delete') . '/' . $student -> id; ?>">Delete</a></li>
                        <li><a  href="<?php echo site_url('Payments'); ?>">Do Payment</a></li>
                      </ul>
                    </div> </td>
                    </tr>
                    <?php endforeach; ?>
					<?php } else { ?>
					<p id="message"></p>
					<?php } ?>
			
			
		
        </table>