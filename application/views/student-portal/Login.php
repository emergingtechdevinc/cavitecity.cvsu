
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CvSU Cavite City Campus - Student Portal</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page" style="background-image: url('<?php echo base_url();?>assets/images/background.png');background-origin: initial;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
    <div class="login-box">
        
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <img style="width:100px; padding-bottom: 10px" src="<?php echo base_url();?>assets/images/favicon.png">
                <p style="font-weight:600">Cavite State University<br>Cavite City Campus</p>
                
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>STUDENT PORTAL</b><br><br>Sign in to start your session</p>
                <form action="<?php echo base_url();?>verifystudentcredentials" method="post" data-toggle="validator" id="frm_validation" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Student Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="mb-3 btn btn-block btn-success">Sign in</button>
                    
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-5">
                            <p class="mt-1">
                                <a href="<?php echo base_url();?>forgot">Forgot Password?</a>
                            </p>
                        </div>
                    </div>

                    

                </form>
                
                

                
            </div>
        
        </div>

    </div>


    <script src="<?php echo base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
