<?php
    require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Criminal Database Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CDMS</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Logout</a></li>
      </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#"></a>
                </li>
                <li><a href="dashboard.php">Dashboard</a>
                </li>
                <li><a href="#">Update Record</a>
                </li>
                <li><a href="#">Show Record</a>
                </li>
                <li><a href="#">Delete Record</a>
                </li>
                <li><a href="#">Search Record</a>
                </li>
                <li><a href="#">Services</a>
                </li>
                <li><a href="#">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                    Simple Sidebar
                </h1>

            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12">
                    <form class="form-horizontal">
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Add New Criminal Record</legend>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="criminal_id">Criminal ID</label>  
                          <div class="col-md-5">
                          <input id="criminal_id" name="criminal_id" type="text" placeholder="123456" class="form-control input-md" required="">
    
                         </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Name">Name</label>  
                          <div class="col-md-5">
                          <input id="name" name="Name" type="text" placeholder="Enter Criminal Name" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="address">Address</label>  
                          <div class="col-md-6">
                          <input id="address" name="address" type="text" placeholder="Enter Address of Criminal" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="age">Age</label>  
                          <div class="col-md-2">
                          <input id="age" name="age" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="ssn">SSN</label>  
                          <div class="col-md-5">
                          <input id="ssn" name="ssn" type="text" placeholder="Social Security Number" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Multiple Radios -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="gender">Gender</label>
                          <div class="col-md-4">
                          <div class="radio">
                            <label for="gender-0">
                              <input type="radio" name="gender" id="gender-0" value="1" checked="checked">
                              Male
                            </label>
                            </div>
                          <div class="radio">
                            <label for="gender-1">
                              <input type="radio" name="gender" id="gender-1" value="2">
                              Female
                            </label>
                            </div>
                          </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="eye">Eye Color</label>
                          <div class="col-md-4"> 
                            <label class="radio-inline" for="eye-0">
                              <input type="radio" name="eye" id="eye-0" value="1" checked="checked">
                              Black
                            </label> 
                            <label class="radio-inline" for="eye-1">
                              <input type="radio" name="eye" id="eye-1" value="2">
                              Grey
                            </label> 
                            <label class="radio-inline" for="eye-2">
                              <input type="radio" name="eye" id="eye-2" value="3">
                              Brown
                            </label> 
                            <label class="radio-inline" for="eye-3">
                              <input type="radio" name="eye" id="eye-3" value="4">
                              Blue
                            </label>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="height">Height</label>  
                          <div class="col-md-4">
                          <input id="height" name="height" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="contact">Contact No.</label>  
                          <div class="col-md-4">
                          <input id="contact" name="contact" type="text" placeholder="" class="form-control input-md">

                          </div>
                        </div>

                        </fieldset>
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Crime Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="crime_type">Crime Type</label>  
                          <div class="col-md-6">
                          <input id="crime_type" name="crime_type" type="text" placeholder="e.g Murder, Robbery etc" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="crime_des">Crime Description</label>
                          <div class="col-md-4">                     
                            <textarea class="form-control" id="crime_des" name="crime_des"></textarea>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="court_status">Court Status</label>  
                          <div class="col-md-6">
                          <input id="court_status" name="court_status" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Officer Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="officer_name">Officer Name</label>  
                          <div class="col-md-5">
                          <input id="officer_name" name="officer_name" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="rank">Rank</label>  
                          <div class="col-md-4">
                          <input id="rank" name="rank" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="officer_contact">Officer Contact</label>  
                          <div class="col-md-4">
                          <input id="officer_contact" name="officer_contact" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>

                        </form>
                    </div>

                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-4">
                        <p class="well">Three Column Example</p>
                    </div>
                    <div class="col-md-4">
                        <p class="well">Three Column Example</p>
                    </div>
                    <div class="col-md-4">
                        <p class="well">You get the idea! Do whatever you want in the page content area!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
</body>

</html>
