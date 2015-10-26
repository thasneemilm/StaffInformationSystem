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
            	


          
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
          <?php     $data = array(
          'name'        => 'group_name',
          'value'          => $this->input->post('group_name'),
          'class'       => 'form-control'
          );
             echo form_input($data);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
             <?php     $data = array(
          'name'        => 'description',
          'value'          => $this->input->post('description'),
          'class'       => 'form-control'
          );
             echo form_input($data);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

<?php echo form_close();?>








         </div><!-- /.box-body -->
           
          </div><!-- /.box -->
          
        </div>   
          

        </section><!-- /.content -->