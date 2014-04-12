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
        <a class="navbar-brand" href="dashboard.php">CDMS</a>
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

            $lastId = $_POST["criminalid"];

            $insertData = array(
            'idCrime' => NULL,
            'type' => $_POST["crime_type"],
            'description' => $_POST["crime_des"],
            'status' => $_POST["court_status"],
            'Criminal_Info_criminal_id' => $lastId
            );
            if ( $db->insert('crime', $insertData) ) echo "crime updated\n";

            $insertData = array(
            'idHealth' => NULL,
            'description' => $_POST["health_des"],
            'weight' => $_POST["weight"],
            'Criminal_Info_criminal_id' => $lastId
            );
            if ( $db->insert('health', $insertData) ) echo "health updated\n";

            $insertData = array(
            'idJail' => NULL,
            'jail_name' => $_POST["jail_name"],
            'address' => $_POST["jail_add"],
            'head_of_incharge' => $_POST["charge"],
            'contact' => $_POST["jail_contact"],
            'cell_id' => $_POST["cell_id"],
            'capacity' => $_POST["capacity"],
            'Criminal_Info_criminal_id' => $lastId
            );
            if ( $db->insert('jail', $insertData) ) echo "jail updated\n";

            $insertData = array(
            'idOutsider' => NULL,
            'name' => $_POST["name_out"],
            'address' => $_POST["add_out"],
            'ssn' => $_POST["ssn_out"],
            'contact' => $_POST["contact_out"],
            'Criminal_Info_criminal_id' => $lastId
            );
            if ( $db->insert('outsider', $insertData) ) echo "outsider updated\n";
            $outsider = $db->getInsertId();
            
            $insertData = array(
            'idWork' => NULL,
            'description' => $_POST["des"],
            'salary' => $_POST["salary"],
            'Outsider_idOutsider' => $outsider,
            'Criminal_Info_criminal_id' => $lastId
            );
            if ( $db->insert('work', $insertData) ) echo "work updated\n";

        } else {
        ?>
                      
                    <form class="form-horizontal" action="update_criminal.php" method="POST">

                        <fieldset>
                        <legend>Update Criminal Record by Criminal</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Criminal ID</label>  
                          <div class="col-md-4">
                          <input id="textinput" name="criminalid" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        </fieldset>
                        
                        <fieldset>
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
                            <textarea class="form-control" id="crime_des" placeholder="e.g On investigation" name="crime_des"></textarea>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="court_status">Status</label>  
                          <div class="col-md-4">
                          <input id="court_status" name="court_status" type="text" placeholder="" class="form-control input-md">
                            
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