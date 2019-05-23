<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameerror = $nimerror = "";
$name = $nim = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameerror = "Name is required";
  }else{
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["nim"])) {
    $nimerror = "nim is required";
  }else if(!is_numeric($_POST["nim"])){
    $nimerror = "nim harus angka";
  }else if(strlen($_POST["nim"])!=10){
    $nimerror = "nim harus 10";
  }
  else{
    $nim = test_input($_POST["nim"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<table>
  <th colspan="3"><h2>PHP Form Validation Example</h2>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name"></td>
    <td><span class="error">* <?php echo $nameerror;?></span></td>
  </tr>
  <tr>
    <td>NIM</td>
    <td><input type="text" name="nim"></td>
    <td><span class="error">* <?php echo $nimerror ;?></span></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value="Submit"> </td> 
  </tr>
</table>
</form>

<table>
  <th colspan="3" align="center"><h2>Your Data</h2>
  <tr>
    <td>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><?php echo $name;?></td>
  </tr>
  <tr>
    <td>NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><?php echo $nim;?></td>
  </tr>
</table>
</center>
</body>
</html>