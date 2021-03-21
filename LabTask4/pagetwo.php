<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$chkbox1 = $chkbox2 = $chkbox3 = "";
$firstname=$email="";
$password="";
$dob="";
$address="";
$profession="";
$interests="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);
					
					
if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $password=$row["password"];
      $dob=$row["dob"];
      $address=$row["address"];
      $interests = $row["interests"];
      
      if(  $row["profession"]=="Academia" )
      { $option="selected"; }
      else if($row["profession"]=="Clerk")
      { $option="selected"; }
      else if($row["profession"]=="Manager")
      { $option="selected";}

			

     
      else if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      if ($row["interests"] == "coding") {
        $chkbox1 = "checked";
      }
      if ($row["interests"] == "music") {
        $chkbox2 = "checked";
      }
      if ($row["interests"] == "gaming") {
        $chkbox3 = "checked";
      }
   
  } 
}
  else {
    echo "0 results";
  }



?>
<form action='' method='post'>
firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" >

password : <input type='text' name='password' value="<?php echo $password; ?>" >

address : <input type='text' name='address' value="<?php echo $address; ?>" >

<label for="profession">profession: </label>
  <select name="profession" id="profession">
 <optgroup>
   <option selected hidden>Select Profession</option>
    <option value="Academia">Academia <selected></option1>
      <option value="Clerk">Clerk</option2>
      <option value="Manager">Manager</option3>
    </optgroup>
 </select>



 <label for="dob"> 
        Enter the Date: 
    </label> 
  
    <input type="date" name="dob" 
        placeholder="dd-mm-yyyy" value=""
        min="2010-01-01" max="2050-12-31">

email : <input type='text' name='email' value="<?php echo $email; ?>" >
 Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other<br>

    
Interests:
    <br>
    <input type="checkbox"  name="interests" value="coding" <?php echo $chkbox1; ?>>
    <label for="interests">Coding</label><br>
    <input type="checkbox" name="interests" value="music" <?php echo $chkbox2; ?>>
    <label for="interests">Music</label><br>
    <input type="checkbox" name="interests" value="gaming" <?php echo $chkbox3; ?>>
    <label for="interests">Gaming</label><br>

     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back </a>

<a href="../control/logout.php"> logout</a>

</body>
</html>