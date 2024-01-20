<?php
$servername="localhost";
$username="server1";
$password="Server1@121";
$database="crud_app";

$conn= new mysqli($servername, $username, $password, $database);

if($conn->connect_error)
{
    die("Connection Failed : ".$conn->connect_error);
}




?>