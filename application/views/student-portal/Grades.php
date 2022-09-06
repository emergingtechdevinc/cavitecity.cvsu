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
                        <a href="<?php echo base_url();?>schedule" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                               Schedule
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>grades" class="nav-link  active">
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 style="font-weight:600" class="card-title">
                                    GRADES MANAGEMENT
                                </h3>
                            </div>

                            <div class="card-body pt-1">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <form method="post" id="frm_validation" action="<?php echo base_url();?>student/view_grades" data-toggle="validator" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label >Schoolyear </label>
                                                            <select id="schoolyear" name="schoolyear" class="form-control" onchange="myFunction(this)">
                                                                <option hidden>--------------</option>
                                                                <?php foreach ($syData as $syRow) { ?>
                                                                    <option><?php echo $syRow->schoolyear; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label >Semester</label>
                                                            <select id="semester" name="semester" class="form-control">
                                                                <option hidden>--------------</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <button style="margin-top: 30px;" type="submit" class="btn btn-success col-md-12">DISPLAY GRADES</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <a style="margin-top: 30px;" href="<?php echo base_url();?>student/checklist/<?php echo $this->session->student_id; ?>" class="btn btn-success col-md-12" target="_blank" >VIEW STUDENT CHECKLIST</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
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
                                                            <th>Student Number</th>
                                                            <th>Student Name</th>
                                                            <th>School Year</th>
                                                            <th>Semester</th>
                                                            <th>Course</th>
                                                            <th>Year Level</th>
                                                            <th>Section</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $this->session->student_id;?></td>
                                                            <td><?php echo strtoupper($this->session->student_fn);?> <?php if($this->session->student_mn!='N/A'){ echo strtoupper($this->session->student_mn);}?> <?php echo strtoupper($this->session->student_ln);?></td>
                                                            <td><?php echo $schoolyear;?></td>
                                                            <td><?php echo $semester;?> SEMESTER</td>
                                                            <td>
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
                                                                <?php echo $courseTitle; ?>  <?php echo $Major; ?>
                                                            </td>
                                                            <td><?php echo $YL;?></td>
                                                            <td><?php echo $Section;?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

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
                                    Student Grades
                                </h3>
                            </div>

                            <div class="card-body pt-0">
                                  
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="gradetable" class="table table-bordered table-striped">
                                            <thead class="text-center">
                                            <tr>
                                                <th>Schedule Code</th>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Units</th>
                                                <th>Grade</th>
                                                <th>Makeup Grade</th>
                                                <th>Credit Units</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody id="gradetablebody">
                                            <?php
                                            $row=0;
                                            if($gradesData){
                                            
                                                foreach ($gradesData as $rs) {
                                                    $row+=1;
                                                    
                                                    $totalUnit = 0;

                                                    if(intval($rs->units==0)){
                                                        //$totalUnit = intval($rs->lectunits) + intval($rs->labunits);
                                                    } else {
                                                        $totalUnit = intval($rs->units);
                                                    } 
                                                    
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $rs->schedcode;?></td>
                                                        <td class="text-center"><?php echo $rs->subjectcode;?></td>
                                                        <td><?php echo $rs->subjectTitle;?></td>
                                                        <td class="text-center"><?php echo $rs->units;?></td>
                                                        <td class="text-center"><?php if ($rs->mygrade=='S') {echo "SATISFACTORY";} elseif($rs->mygrade=='NG') {echo "NO GRADE";} elseif($rs->mygrade=='DRP') {echo "DROPPED";} else { if($rs->mygrade == "") {echo "----";} else {echo $rs->mygrade;} } ?></td>                   
                                                        <td class="text-center"><?php if($rs->makeupgrade=="-"){ echo "---------";} else {echo $rs->makeupgrade;}  ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $unit = '';
                                                            $failinggrade = array('4.00','5.00','6.00','8.00','DRP','NG','INC');
                                                            
                                                            if(!in_array($rs->mygrade,$failinggrade)){
                                                                    $unit = number_format(intval($totalUnit), 2);
                                                            }
                                                            else{
                                                                $unit = '0.00';
                                                            }  
                                                            
                                                           
                                                            
                                                            if($rs->units&&$rs->makeupgrade !='-'){
                                                                if(!in_array($rs->makeupgrade,$failinggrade)){
                                                                    $unit = number_format(intval($rs->unit), 2);
                                                                
                                                                }
                                                                else{
                                                                    $unit = '0.00';
                                                                }
                                                            }

                                                            echo $unit;
                                                            
                                                            ?>
                                                        </td>
                                                    
                                                        <td class="text-center">
                                                            <?php
                                                            $remark = '';
                                                            
                                                            switch($rs->mygrade){
                                                                case '1.00':{$remark =  'PASSED';}break;
                                                                case '1.25':{$remark =  'PASSED';}break;
                                                                case '1.50':{$remark =  'PASSED';}break;
                                                                case '1.75':{$remark =  'PASSED';}break;
                                                                case '2.00':{$remark =  'PASSED';}break;
                                                                case '2.25':{$remark =  'PASSED';}break;
                                                                case '2.50':{$remark =  'PASSED';}break;
                                                                case '2.75':{$remark =  'PASSED';}break;
                                                                case '3.00':{$remark =  'PASSED';}break;
                                                                case 'S':{$remark =  'PASSED';}break;
                                                                case '4.00':{$remark =  'INCOMPLETE';}break;
                                                                case '5.00':{$remark =  'FAILED';}break;
                                                                case '6.00':{$remark =  'DROPPED';}break;
                                                                case '8.00':{$remark =  'WITHHELD';}break;
                                                                case 'DRP':{$remark =  'DROPPED';}break;
                                                                case 'NG':{$remark =  'NO GRADE';}break;
                                                                case 'INC':{$remark =  'INCOMPLETE';}break;
                                                                
                                                            }
                                                            

                                                            if($rs->makeupgrade != "-"){
                                                                switch($rs->makeupgrade){
                                                                    case '1.00':{$remark =  'PASSED';}break;
                                                                    case '1.25':{$remark =  'PASSED';}break;
                                                                    case '1.50':{$remark =  'PASSED';}break;
                                                                    case '1.75':{$remark =  'PASSED';}break;
                                                                    case '2.00':{$remark =  'PASSED';}break;
                                                                    case '2.25':{$remark =  'PASSED';}break;
                                                                    case '2.50':{$remark =  'PASSED';}break;
                                                                    case '2.75':{$remark =  'PASSED';}break;
                                                                    case '3.00':{$remark =  'PASSED';}break;
                                                                    case 'S':{$remark =  'PASSED';}break;
                                                                    case '4.00':{$remark =  'INCOMPLETE';}break;
                                                                    case '5.00':{$remark =  'FAILED';}break;
                                                                    case '6.00':{$remark =  'DROPPED';}break;
                                                                    case '8.00':{$remark =  'WITHHELD';}break;
                                                                    case 'DRP':{$remark =  'DROPPED';}break;
                                                                    case 'NG':{$remark =  'NO GRADE';}break;
                                                                    case 'INC':{$remark =  'INCOMPLETE';}break;
                                                                }
                                                                }
                                                                echo $remark;
                                                            
                                                            
                                                            ?>
                                                        </td>
                                                    
                                                    </tr>
                                                <?php }}?>
                                            </tbody>

                                        </table>

                                        <?php if($gradesData){ ?>
                                            <a href="http://203.177.216.246/cvsuccc.com/certofgrades/<?php echo $this->session->student_id; ?>/<?php echo $semester;?>/<?php echo $schoolyear;?>" style="margin-top: 15px" class="btn btn-success col-md-12">DOWNLOAD CERTIFICATE OF GRADES</a>
                                        <?php } ?>


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

<script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/fullcalendar/main.js"></script>


<script src='<?php echo base_url();?>/assets/plugins/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.min.js'></script>

<script src='<?php echo base_url();?>assets/js/initCalendar.js'></script>


<script type="text/javascript">


    function myFunction(obj)
    {
        $('#semester').empty()

        var dropDown = document.getElementById("schoolyear");
        var schoolyear = dropDown.options[dropDown.selectedIndex].value;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Student/getSemester",
            data: { 'schoolyear': schoolyear  },

            success: function(data){
                console.log(data);
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                    $('#semester').append('<option value='+ d.semester +'>' + d.semester + '</option>');
                });
            }
        });


    }


</script>



</body>
</html>
