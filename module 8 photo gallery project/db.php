<?php 
$host = 'localhost';
$user = 'root'; //Replace with your DB user name
$pass = ''; // Replace with your DB password
$dbname = 'photo_gallery';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}
?>