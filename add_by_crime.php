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
                <li><a href="update_record.php">Update Record</a>
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
        include "connection2.php";
        
        if(isset($_POST["submit"]))  {
            
            $sql_CI  = "INSERT INTO `crime` (`idCrime`, `type`, `description`, `court status`) VALUES(";
            $sql_CI .= "NULL,'" . $_POST["crime_type"] . "','" . $_POST["crime_des"] . "','" . $_POST["court_status"] . "'";
            $sql_CI .= ")";   
            
            $retval = mysql_query($sql_CI);
            if(! $retval )
            {
              die('Could not enter data in Crime Info: ' . mysql_error());
            }
            echo "Entered data successfully\n <a href='dashboard.php'>Go back to Dashboard</a>";
            mysql_close();
        } else {
        ?>
                    <form class="form-horizontal" action="add_by_crime.php" method="POST">

                        <!-- Form Name -->
                        <legend>Crime Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="crime_type">Crime Type</label>  
                          <div class="col-md-4">
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
                          <div class="col-md-4">
                          <input id="court_status" name="court_status" type="text" placeholder="" class="form-control input-md">
                            
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