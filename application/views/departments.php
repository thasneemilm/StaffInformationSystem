	
							<select class="form-control" name="department" id="department" required >
	                       
							<?php foreach($departments as $des): ?>
							<option value=<?php echo $des->id;  ?> > <?php echo $des->name; ?></option>
							<?php endforeach; ?>
                                              
							</select>
	