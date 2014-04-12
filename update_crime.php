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

            $lastId = $_POST["crimeid"];

            $updateData = array(
            'Criminal_Info_criminal_id' => $_POST["criminal_id"]
            );
            $db->where('idCrime', $lastId);
            if ( $db->update('crime', $updateData) ) echo "crime updated\n";

            $insertData = array(
            'idOfficier' => NULL,
            'name' => $_POST["officer_name"],
            'rank' => $_POST["rank"],
            'contact' => $_POST["officer_contact"],
            'Crime_idCrime' => $lastId
            );
            if ( $db->insert('officier', $insertData) ) echo "officier updated\n";

            $insertData = array(
            'idWitness' => NULL,
            'Name' => $_POST["name"],
            'age' => $_POST["age"],
            'Resident_Address' => $_POST["resident"],
            'Work_Address' => $_POST["work"],
            'Contact' => $_POST["contact"],
            'Note' => $_POST["note"],
            'Crime_idCrime' => $lastId
            );
            if ( $db->insert('witness', $insertData) ) echo "witness updated\n";

        } else {
        ?>
                      
                    <form class="form-horizontal" action="update_crime.php" method="POST">

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Update Criminal Record by Crime</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="crime">Crime ID</label>  
                          <div class="col-md-4">
                          <input id="crime" name="crimeid" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        </fieldset>

                        <fieldset>

                        <!-- Form Name -->
                        <legend>Associate Criminal with crime</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="criminal_id">Criminial ID</label>  
                          <div class="col-md-4">
                          <input id="criminal_id" name="criminal_id" type="text" placeholder="enter criminal id" class="form-control input-md">
                            
                          </div>
                        </div>

                        </fieldset>
                        
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
                        <legend>Witness</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name">Name</label>  
                          <div class="col-md-4">
                          <input id="name" name="name" type="text" placeholder="" class="form-control input-md">
                            
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
                          <label class="col-md-4 control-label" for="resident">Resident Address</label>  
                          <div class="col-md-4">
                          <input id="resident" name="resident" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="work">Work Address</label>  
                          <div class="col-md-4">
                          <input id="work" name="work" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="contact">Contact</label>  
                          <div class="col-md-4">
                          <input id="contact" name="contact" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="note">Note</label>
                          <div class="col-md-4">                     
                            <textarea class="form-control" id="note" name="note"></textarea>
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