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
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">Enter Query to Search the database.</p>
                      
                        <form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<?php
include "connection2.php";

if (isset($_POST['action']))
{
  $action = $_POST['action'];
} else {
  $action = 'dummy';
}

$err_cntr = 0;
$myMsg = '';
$myDebug = '';

if ($action == 'update')
{

    $SQLStatement = $_POST['SQLStatement'];

  $contents = trim($SQLStatement);

  if ($contents == '')
  {
    $contents = '';
  }

    $mySQLArray = explode(';', $SQLStatement);  //Break up into individual SQL statements

    foreach ($mySQLArray as $element)
    {
      $sqlstatement = trim($element);


      $sqlstatement = stripslashes($sqlstatement);

      if (trim($SQLStatement) == '')
      {

      } else {

      $select_statement_flag = 'false';

      $pos1 = stripos($sqlstatement, "select ");

      if ($pos1 === false)
      {
        //skip
      } else {
          $posu = stripos($sqlstatement, "update ");

        if ($posu === false)
        {
          $posi = stripos($sqlstatement, "insert ");

          if ($posi === false)
          {
            $posd = stripos($sqlstatement, "delete ");

            if ($posd === false)
            {
              $select_statement_flag = "true";
            }
          }
        }
      }

      if (trim($sqlstatement) != '')
      {

        $status_results = doSQLStatement($sqlstatement, $select_statement_flag);


        if ($status_results == 'error')
        {
          $myDebug .= "<br><span style='color: red;'>Error: '".$sqlstatement."'</span>";
          $err_cntr++;
        } else {
          if ($status_results == 'ok')
          {
            $myMsg .= "<br><span style='color: blue;'>OK: '".$sqlstatement."'</span>";
          } else {
            $myMsg .= "<br><br>SELECT Statement: ".$sqlstatement.'<br>'.$status_results;
          }
        }
      }

      }
    }

  if ($err_cntr > 0)
  {
    $myMsg .= "<h3><font color=red>There were errors in at least one of your statements!</font></h3>";
    $myMsg .= "<br><b>Try running this program one more time by clicking Reload/Refresh</b>";
  } else {
    if ($contents != '')
    {
      $myMsg .= "<br>SQL Statements were Sucessful.";
    }
  }
} else {
  $contents = '';
}

print "SQL Statement:  <span style='color: maroon; font-size: smaller;'>(end each SQL statement with a <b>;</b> (semi-colon)</span>";
print "<br><textarea placeholder= \"e.g select * from `criminal info`; or select * from `crime`;\" cols=\"80\" rows=\"9\" name=\"SQLStatement\" id=\"SQLStatement\">";
print stripslashes($contents);
print "</textarea>";

?>

<br><br><input type="submit" value="Submit SQL Statements">

<input type=hidden name=action value=update>

<hr>

<?php
  print "$myMsg";
  print "<br>$myDebug";



function doSQLStatement($a_sql_string, $select_statement_flag)
{
    global $myMsg;

  $b_sql_string = stripslashes($a_sql_string);

  $result = mysql_query($b_sql_string);


  if ($result) {

      if ($select_statement_flag == "true")
      {
         $selectResultsTable = formatSelectResults($result, $select_statement_flag);

         return $selectResultsTable;
      } else {
        $aff_rows = mysql_affected_rows();

        $myMsg .= "<br><b>Rows Afffected: ".$aff_rows.'</b>';

        if ($aff_rows < 1)
        {
          $myMsg .= "<br>SQL Statement: ".$a_sql_string."<br>";
        }

        return 'ok';
      }

  } else {
    $myMsg .= "<br><font color=red>MySQL No: ".mysql_errno();
    $myMsg .= "<br>MySQL Error: ".mysql_error();
    $myMsg .= "<br>SQL: ".$b_sql_string;
    $myMsg .= "<br>MySQL Affected Rows: ".mysql_affected_rows()."</font><br>";

    return 'error';
  }
}


function formatSelectResults($result, $select_statement_flag)
{

  $errors_found = false;

  if (!empty($result))
  {
    if ($select_statement_flag == "true")
    {
      $numresults = mysql_num_rows($result);
      $numfields = mysql_num_fields($result);

       $selectResults  = '<table border=1 style="width:90%; color: black;">';

       $selectResults .= "<tr>";

      for ($k = 0; $k < $numfields; $k++)
      {
         $selectResults .= "<th style=\"background-color: #DFF0D8;\">";
         $selectResults .= mysql_field_name($result, $k);
         $selectResults .= "</th>";
      }

      $selectResults .= "</tr>";

      $myrowcount = 0;

      for ($i = 0; $i < $numresults; $i++)
      {
        $myrowcount++;

        $row = mysql_fetch_array($result);

        if (!($i % 2) == 0)
        {
           $selectResults .= "<tr style=\"background-color: #DFF0D8;\">";
        } else {
           $selectResults .= "<tr style=\"background-color: white;\">";
        }

        for ($j = 0; $j < $numfields; $j++)
        {
           $selectResults .= "<td>";

           $celldata = stripslashes($row[$j]);

           if (empty($celldata))
           {
            $celldata = "<span style='color: maroon; font-size: 10px;'>(null)</span>";  //new
           }

           $selectResults .= $celldata;

           $selectResults .= "</td>";
        }

         $selectResults .= "</tr>";

      }

      $selectResults .= "</table>";

    } else  {
       $selectResults .= '<br>ERROR: Not a SELECT/SHOW statement';
    }

  } else {
     $selectResults .= '<br>ERROR: Empty Results';
  }


  $selectResults .= "<br><br><b>Number of Rows in Results: $myrowcount </b><br><br>";   //new new



  return  $selectResults;

}
?>
                    </form>

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