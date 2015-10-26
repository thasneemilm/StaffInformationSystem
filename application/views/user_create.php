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
        <div class="col-md-6">
          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Hi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	
            	


<p>Please Enter Your Information</p>

<div id="infoMessage" class="text-red"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
      <?php     $data = array(
          'name'        => 'first_name',
          'value'          => $this->input->post('firstname'),
          'class'       => 'form-control'
                  );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
             <?php     $data = array(
          'name'        => 'last_name',
          'value'          => $this->input->post('lastname'),
          'class'       => 'form-control'
                  );
             echo form_input($data);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php     $data = array(
          'name'        => 'company',
          'value'          => $this->input->post('company'),
          'class'       => 'form-control'
                  );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
          <?php  $data = array(
          'name'        => 'email',
          'value'          => $this->input->post('email'),
          'class'       => 'form-control'
                  );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
             <?php     $data = array(
          'name'        => 'phone',
          'value'          => $this->input->post('phone'),
          'class'       => 'form-control'
                  );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php     $data = array(
          'name'        => 'password',
          'value'          => $this->input->post('password'),
          'class'       => 'form-control',
           'type'       => 'password'
                  );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php     $data = array(
          'name'        => 'password_confirm',
          'value'          => $this->input->post('password_confirm'),
          'class'       => 'form-control',
          'type'       => 'password'
                  );
             echo form_input($data);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>



 </div><!-- /.box-body -->
           
          </div><!-- /.box -->
          
        </div>   
          

        </section><!-- /.content -->