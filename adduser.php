<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $iusername = $_POST['username'];
    $ipassword = $_POST['password'];
    $inickname = $_POST['nickname'];
    $irole = $_POST['role'];

    $sql = "insert into kpop.tusers";
    $sql .= "(username, password, nickname, role) ";
    $sql .= "values (:pusername, :ppassword, :pnickname, :prole)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':pusername', $iusername);
    $query -> bindParam(':ppassword', $ipassword);
    $query -> bindParam(':pnickname', $inickname);
    $query -> bindParam(':prole', $irole);
    $query ->execute();
    header("Location:list.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <style>
    .text{
    float: right;
}
.container{
    height: 100%;
    background-color: black;
    width: 400px;
    padding: 20px;
    color: white;
    margin:auto;
}
body {
  background: rgb(15, 15, 15);
}

h1 {
  font-family: "Open Sans";
  font-weight: 300;
  font-size:2.9em;
  margin: 15px 0 0;
  color: rgba(120, 0, 50, .5);
}
.first {
  width: 170px;
  color: purple;
  text-transform: uppercase;
  font-weight: 600;
  cursor: pointer;
  background-color: transparent;
  border: 3px solid #00d7c3;
  border-radius: 50px;
  -webkit-transition: all .15s ease-in-out;
  transition: all .15s ease-in-out;
  color: #00d7c3;
}
.first:hover {
  box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
  border: 3px solid #00d7c3;
}

    </style>
</head>
    <a href="index.php">
    <button class="first">Home</button>
    </a>
    <div class="container">
    <form action="adduser.php" method="POST">
        <label>Username:</label><br/>
        <input type="text" name="username"><br/><br>
        <label>Password:</label><br/>
        <input type="password" name="password"><br/><br>
        <label>Nickname:</label><br>
        <input type="text" name="nickname"><br/><br>
        <label>Role:</label><br>
        <input type="text" name="role"><br/><br>
        <input type="submit" name="Register" value="Go">
    </form>
    </div>
        
</body>
</html>