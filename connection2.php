<?php

$db = mysql_connect('localhost','root','asdlkj');

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
}

$dbname = 'cdms';

$btest = mysql_select_db($dbname);

if (!$btest)
{
	print "<h1>Unable to Select the Database</h1>";
}
 ?>