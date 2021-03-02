<?php
class db{
 
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "mydb";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

return $conn;
}
function InsertUser($conn,$table,$firstname,$email,$username,$password,$gender,$dob)
{
$result = $conn->query("INSERT INTO $table(firstname, email, username,password,gender,dob)
VALUES ($firstname, $email, $username,$password,$gender,$dob)");
}
}
function CloseCon($conn)
 {
 $conn -> close();
 }
?>