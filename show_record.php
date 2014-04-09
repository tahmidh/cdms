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
                        <p class="lead">This simple sidebar template has a hint of JavaScript to make the template responsive. It also includes Font Awesome icon fonts.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="well">The template still uses the default Bootstrap rows and columns.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="well">But the full-width layout means that you wont be using containers.</p>
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