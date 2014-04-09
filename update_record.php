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

            $sql_OI  = "INSERT INTO `officier` (`idOfficier`, `name`, `rank`, `contact`) VALUES(";
            $sql_OI .= "NULL,'" . $_POST["officer_name"] . "','" . $_POST["rank"] . "','" . $_POST["officer_contact"] . "'";
            $sql_OI .= ")";   
            
            $retval = mysql_query($sql_OI);
            if(! $retval )
            {
              die('Could not enter data in Officer Info: ' . mysql_error());
            }
           
            $sql_CHI  = "INSERT INTO `health` (`idHealth`, `description`, `weight`, `Criminal Info_criminal id`) VALUES(";
            $sql_CHI .= "NULL,'" . $_POST["health_des"] . "','" . $_POST["weight"] ."'";
            $sql_CHI .= ")";   
            
            $retval = mysql_query($sql_CHI);
            if(! $retval )
            {
              die('Could not enter data in Health Info: ' . mysql_error());
            }
            
            $sql_JI  = "INSERT INTO `jail` (`idJail`, `jail name`, `address`, `head of incharge`, `contact`, `Cell_idCell`, `Criminal Info_criminal id`) VALUES(";
            $sql_JI .= "NULL,'" . $_POST["jail_name"] . "','" . $_POST["jail_add"] . "','" . $_POST["charge"] . "','" . $_POST["jail_contact"] . "','" . $_POST["cell_id"] . "',NULL";
            $sql_JI .= ")";   
            
            $retval = mysql_query($sql_JI);
            if(! $retval )
            {
              die('Could not enter data in Jail Info: ' . mysql_error());
            }
          /*   
            mysql_query($sql_Cel);

            $sql_CWI="INSERT INTO students (`no`, `f_name`, `l_name`, `student_id`, `email`, `date`, `gr`) VALUES(NULL,'" . $_POST["f_name"] . "','" . $_POST["l_name"] . "'," . $_POST["student_id"] . ",'" . $_POST["email"] . "','" . $date."'," . $_POST["gr"] . ")";   /*  construct the query */
          /*   
            mysql_query($sql_CWI);

            $sql_COI="INSERT INTO students (`no`, `f_name`, `l_name`, `student_id`, `email`, `date`, `gr`) VALUES(NULL,'" . $_POST["f_name"] . "','" . $_POST["l_name"] . "'," . $_POST["student_id"] . ",'" . $_POST["email"] . "','" . $date."'," . $_POST["gr"] . ")";   /*  construct the query */
          /*   
            mysql_query($sql_COI); 
          */
            echo "Entered data successfully\n <a href='dashboard.php'>Go back to Dashboard</a>";
            mysql_close();
        } else {
        ?>
                      
                    <form class="form-horizontal" action="update_record.php" method="POST">
                        
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Officer Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="officer_name">Officer Name</label>  
                          <div class="col-md-4">
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
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Criminal Health Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="weight">Weight</label>  
                          <div class="col-md-4">
                          <input id="weight" name="weight" type="text" placeholder="75 kg." class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="health_des">Description</label>
                          <div class="col-md-4">                     
                            <textarea class="form-control" id="health_des" name="health_des"></textarea>
                          </div>
                        </div>

                        </fieldset>

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Jail Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="jail_name">Jail Name</label>  
                          <div class="col-md-4">
                          <input id="jail_name" name="jail_name" type="text" placeholder="Dhaka Jail" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="jail_add">Address</label>  
                          <div class="col-md-4">
                          <input id="jail_add" name="jail_add" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="charge">Head In-Charge</label>  
                          <div class="col-md-4">
                          <input id="charge" name="charge" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="jail_contact">Contact</label>  
                          <div class="col-md-4">
                          <input id="jail_contact" name="jail_contact" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cell_id">Cell No</label>  
                          <div class="col-md-4">
                          <input id="cell_id" name="cell_id" type="text" placeholder="criminal's cell no" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Cell Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cell_id">Cell ID</label>  
                          <div class="col-md-4">
                          <input id="cell_id" name="cell_id" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="capacity">Capacity</label>  
                          <div class="col-md-4">
                          <input id="capacity" name="capacity" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Criminal Work Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="des">Description</label>  
                          <div class="col-md-4">
                          <input id="des" name="des" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="salary">Salary</label>  
                          <div class="col-md-4">
                          <input id="salary" name="salary" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Outsider Info</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name_out">Name</label>  
                          <div class="col-md-4">
                          <input id="name_out" name="name_out" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="add_out">Address</label>  
                          <div class="col-md-4">
                          <input id="add_out" name="add_out" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="ssn_out">SSN</label>  
                          <div class="col-md-4">
                          <input id="ssn_out" name="ssn_out" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="contact_out">Contact</label>  
                          <div class="col-md-4">
                          <input id="contact_out" name="contact_out" type="text" placeholder="" class="form-control input-md">
                            
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