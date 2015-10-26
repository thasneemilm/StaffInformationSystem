<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Studnet management</title>
   
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
   
   
  
   
   
   
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/startbootstrap-simple-sidebar/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/startbootstrap-simple-sidebar/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Student Management
                    </a>
                </li>
                <li>
                    <?php echo anchor("auth/logout/", 'Logout') ;?>
                </li>
                <li>
                  <?php echo anchor("auth/change_password/", 'change password') ;?>
                </li>
                <li>
                    <?php echo anchor("auth/create_user/", 'Create User') ;?>
                </li>
                <li>
                    <?php echo anchor("auth/listusers/", 'View User') ;?>
                </li>
                <li>
                    <?php echo anchor("Student/", 'Register Student') ;?>
                </li>
                <li>
                    <?php echo anchor("Student/showDataTable", 'Search Student') ;?>
                </li>
                <li>
                    <?php echo anchor("Course/", 'Register New Course') ;?>
                </li>
                <li>
                    <?php echo anchor("Student/registerForCourseView", 'Register For Course') ;?>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                 <?php $this->load->view($content); ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
   <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/startbootstrap-simple-sidebar/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url() ?>assets/startbootstrap-simple-sidebar/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
