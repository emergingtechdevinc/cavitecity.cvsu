<?php
if (!isset($_SESSION['student_id'])) {
    redirect('student', 'refresh');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CvSU Cavite City Campus - Student Portal</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.min.css">
    <link rel="stylesheet" media='print' href="<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.print.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url();?>assets/images/favicon.png" alt="CvSUCCC" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    
                    <div class="dropdown-divider"></div>
                    
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            
        </ul>
    </nav>
    
    
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        
        <a href="index3.html" class="brand-link">
            <img src="<?php echo base_url();?>assets/images/favicon.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span style="font-size: .68em" class="brand-text font-weight-bold">CvSU CCC Student Portal</span>
        </a>
        
        <div class="sidebar">
            
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/images/users/<?php echo $this->session->student_image;?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" style="font-size: .80em; font-weight:600; margin-top:-5px; margin-left:5px" class="d-block"><?php echo $this->session->student_id;?><br><?php echo $this->session->student_fn;?> <?php echo $this->session->student_ln;?></a>
                </div>
                
                
            </div>
            
            <div class="form-inline">
                
            </div>
            
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>profile" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                               Profile
                            </p>
                        </a>
                    </li>

                   
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>schedule" class="nav-link active">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                               Schedule
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>grades" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                               Grades
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>enrollment" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                               Enrollment
                            </p>
                        </a>
                    </li>

                   

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Services
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Facuty Evaluation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Graduation Application</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Request of Credentials </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    
                
                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        

        <section class="content">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 style="font-weight:600" class="card-title">
                                    STUDENT INFORMATION
                                </h3>
                            </div>

                            <div class="card-body pt-1">

                                <div class="row">
                                    <div id ="studentinformation" class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="table-reponsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope='row'>Student Number</th>
                                                        <td id=""><?php echo $this->session->student_id;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>Student Name</th>
                                                        <td id=""><?php echo strtoupper($this->session->student_fn);?> <?php if($this->session->student_mn!='N/A'){ echo strtoupper($this->session->student_mn);}?> <?php echo strtoupper($this->session->student_ln);?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>School Year</th>
                                                        <td id=""><?php echo $schoolyear;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>Semester</th>
                                                        <td id=""><?php echo $semester;?> SEMESTER</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>Course</th>
                                                        <?php 
                                                        $sectioncount=0;
                                                        $Course = '';
                                                        $Major = '';
                                                        $Section = '';
                                                        $courseName = '';
                                                        $YL='';

                                                        foreach ($YLSData as $ylsData){
                                                            $sectioncount ++;
                                                        } 
                                                        
                                                        if($sectioncount==1){
                                                            
                                                            foreach ($YLSData as $ylsData){
                                                               $Course = substr($ylsData->section, 0, 2);
                                                               if($Course == "SE"){
                                                                    
                                                                    $YL = substr($ylsData->section, 2, 1);
                                                                    $Section = substr($ylsData->section, 3, 1);
                                
                                                                    $MI = $Course = substr($ylsData->section, 4, 1);
                                                                    if($MI == 'M'){
                                                                        $Major = " - MATHEMATICS";
                                                                    }else {
                                                                        $Major = " - ENGLISH";
                                                                    }

                                                               } elseif($Course == "EC"){
                                                                    $YL = substr($ylsData->section, 4, 1);
                                                                    $Section = substr($ylsData->section, 5, 1);  
                                                               } else {
                                                                    $YL = substr($ylsData->section, 2, 1);
                                                                    $Section = substr($ylsData->section, 3, 1);
                                                               }
                                                               
                                                            }

                                                        }else {
                                                            foreach ($YLSData as $ylsData){
                                                               $Course = substr($ylsData->section, 0, 2);
                                                               if($Course == "SE"){
                                                                    
                                                                    $YL = substr($ylsData->section, 2, 1);
                                                                    $Section = 'IRREGULAR';
                                
                                                                    $MI = $Course = substr($ylsData->section, 4, 1);
                                                                    if($MI == 'M'){
                                                                        $Major = " - MATHEMATICS";
                                                                    }else {
                                                                        $Major = " - ENGLISH";
                                                                    }

                                                               } elseif($Course == "EC"){
                                                                    $YL = substr($ylsData->section, 4, 1);
                                                                    $Section = 'IRREGULAR';  
                                                               } else {
                                                                    $YL = substr($ylsData->section, 2, 1);
                                                                    $Section = 'IRREGULAR';
                                                               }
                                                            }
                                                        }

                                                        $courseName = $this->session->student_course;

                                                        $courseTitle;
                                                        switch($courseName){
                                                            case "BSIT":
                                                                $courseTitle = "BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY";
                                                            break;
                                                            case "BSCS":
                                                                $courseTitle = "BACHELOR OF SCIENCE IN COMPUTER SCIENCE";
                                                            break;
                                                            case "BSHM":
                                                                $courseTitle = "BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT";
                                                            break;
                                                            case "BSBM":
                                                                $courseTitle = "BACHELOR OF SCIENCE IN BUSINESS MANAGEMENT";
                                                            break;
                                                            case "BECED":
                                                                $courseTitle = "BACHELOR OF EARLY CHILDHOOD EDUCATION";
                                                            break;
                                                            case "BSE":
                                                                $courseTitle = "BACHELOR OF SECONDARY EDUCATION";
                                                            break;
                                                        }
                                                        ?>

                                                        <td id=""><?php echo $courseTitle; ?>  <?php echo $Major; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>Year Level</th>
                                                        <td id=""><?php echo $YL;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope='row'>Section</th>
                                                        <td id=""><?php echo $Section;?> </td>
                                                    </tr>
                                                    </thead>
                                                </table>
                                                <button class="btn btn-success col-md-12" style="margin-top:2px;">DOWNLOAD STUDENT SCHEDULE</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h3 style="font-weight:600" class="card-title">
                                    CLASS SCHEDULE
                                </h3>
                            </div>

                            <div class="card-body pt-0">
                                    <div class="col-md-12">    
                                        <input type='hidden' name ="loadschedule" id = "loadschedule" value="<?php echo base_url();?>Student/loadSchedules">
                                        <input type='hidden' name ="schoolyear" id = "schoolyear" value="<?php echo $schoolyear;?>">
                                        <input type='hidden' name ="semester" id = "semester" value="<?php echo $semester;?>">
                                        <input type='hidden' name ="studentid" id = "studentid" value="<?php echo $studentid;?>">
                                        <div id='calendarsched'></div>
                                    </div>
                                
                                
                            </div>

                        </div>
                    </div>
                    

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h3 style="font-weight:600" class="card-title">
                                    ENROLLED SUBJECT
                                </h3>
                            </div>

                            <div class="card-body pt-0">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="gradetable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Schedule Code</th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Units</th>
                                                <th>Instructor</th>
                                            </tr>
                                            </thead>
                                            <tbody id="gradetablebody">
                                            <?php
                                            if($subjData){
                                                foreach ($subjData as $rs) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rs->schedcode;?></td>
                                                        <td><?php echo $rs->subjectCode;?></td>
                                                        <td><?php echo $rs->subjectTitle;?></td>
                                                        <td><?php echo number_format($rs->units, 2);?></td>
                                                        <td><?php foreach ($fData as $fRow){ if($fRow->employeecode == $rs->instructor){ echo $fRow->employeefirstname . ' ' .$fRow->employeelastname;} };?></td>
                                                    </tr>
                                                <?php }}?>
                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>

                

            </div>
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; Cavite State University Cavite City Campus 2022-2023 <a href="#"></a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.0.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Patient Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
         
                    
                
                </div>
            </div>
        
        </div>

    </div>

</div>


<script src="<?php echo base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="<?php echo base_url();?>assets/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?php echo base_url();?>assets/template/plugins/jquery-knob/jquery.knob.min.js"></script>


<script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.js?v=3.2.0"></script>



<script src='<?php echo base_url();?>/assets/plugins/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.min.js'></script>

<script src='<?php echo base_url();?>assets/js/initCalendar.js'></script>






</body>
</html>
