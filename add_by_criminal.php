<?php
    require_once('auth.php');
    require_once('MysqliDb.php');
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
          <li class="active"><a href="#">Home</a></li>
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
                <li><a href="add_record.php">Add Record</a>
                </li>
                <li><a href="search_record.php">Search Record</a>
                </li>
                <li><a href="show_record.php">Show Record</a>
                </li>
                <li><a href="update_front.php">Update Record</a>
                </li>
                <li><a href="#"></a>
                </li>
                <li><a href="#"></a>
                </li>
                <li><a href="#"></a>
                </li>
            </ul>
        </div>
         <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                <h1>
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12">
                        <?php
        include "connection3.php";
        
        if(isset($_POST["submit"]))  {
          $insertData = array(
            'criminal_id' => NULL,
            'name' => $_POST["name_criminal"],
            'address' => $_POST["address_criminal"],
            'age' => $_POST["age"],
            'ssn' => $_POST["ssn"],
            'gender' => $_POST["gender"],
            'eye_color' => $_POST["eye"],
            'height' => $_POST["height"],
            'contact' => $_POST["contact_criminal"]
          );
          if ( $db->insert('Criminal_info', $insertData) ) echo "Entered data successfully! Criminal ID of last inserted record is: " .$db->getInsertId()." \n <a href='update_criminal.php'>Now update criminal health etc.</a>";
        } else {
        ?>
                      
                    <form class="form-horizontal" action="add_by_criminal.php" method="POST">
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Add New Criminal Record</legend>


                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name_criminal">Name</label>  
                          <div class="col-md-4">
                          <input id="name_criminal" name="name_criminal" type="text" placeholder="Enter Criminal Name" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="address_criminal">Address</label>  
                          <div class="col-md-4">
                          <input id="address_criminal" name="address_criminal" type="text" placeholder="Enter Address of Criminal" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="age">Age</label>  
                          <div class="col-md-4">
                          <input id="age" name="age" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="ssn">SSN</label>  
                          <div class="col-md-4">
                          <input id="ssn" name="ssn" type="text" placeholder="Social Security Number" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="gender">Gender</label>  
                          <div class="col-md-4">
                          <input id="gender" name="gender" type="text" placeholder="Male or Female" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="eye">Eye Color</label>  
                          <div class="col-md-4">
                          <input id="eye" name="eye" type="text" placeholder="e.g Black, Blue, Grey, Brown etc" class="form-control input-md">
                            
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
                          <label class="col-md-4 control-label" for="contact_criminal">Contact No.</label>  
                          <div class="col-md-4">
                          <input id="contact_criminal" name="contact_criminal" type="text" placeholder="" class="form-control input-md">

                          </div>
                        </div>

                        </fieldset>
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="button1id"></label>
                          <div class="col-md-8">
                            <button id="submit" name="submit" type="submit" class="btn btn-success">Submit</button>
                            <button id="button2id" name="button2id" class="btn btn-danger">Reset</button>
                          </div>
                        </div>

                        
                        </form>

                <?php
                  }
                ?>
                    </div>
                    <div class="col-md-6">
                                            </div>
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        
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