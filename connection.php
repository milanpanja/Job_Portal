<?php
error_reporting(0);
session_start();
$servername="localhost";
$username="root";
$password="";
$db_name="job_portal_db";

$conn= mysqli_connect($servername,$username,$password,$db_name);
if($conn){
    //echo "Connection Done";

}
else
{
 echo "Connection Failed".mysqli_connect_error();
}
?>
