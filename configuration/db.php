<?php 

$servername = "localhost";
$username = "root";
$password = "Admin1234#@";
$db_name = "calendar";

$conn = mysqli_connect("$servername","$username","$password","$db_name");

if(!$conn)
{
    die('Database Connection is not Available'.mysqli_connect_error());
}

else
{
	echo "";
}


?>