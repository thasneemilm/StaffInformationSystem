 

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
                      <td>Bacon </td>
                    </tr>
                    <?php endforeach; ?>
					<?php } else { ?>
					<p id="message"></p>
					<?php } ?>
			
			
		
        </table>