<?php 
session_start();
if(isset($_SESSION['user'])){
    header("location:index.php");
}
$err_msg = "";
include_once ('config.php');

if(isset($_POST['login'])){
#echo "You clicked the button";
$uusername = $_POST['username'];
$upassword = $_POST['password'];
$sql = "select * from kpop.tusers where username = :pusername AND password = :ppassword";
$query = $conn -> prepare($sql);
$query -> bindParam(':pusername', $uusername);
$query -> bindParam(':ppassword', $upassword);
$query -> execute();

$result = $query->rowCount();
if ($result > 0){
    $_SESSION['user'] = "ok";
    header("location:index.php");
}
else{
    $err_msg = "*ERROR";
}   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>LOGIN</title>
<style type="text/css">
   


.text{
    float: right;
}
.container{
    height: 100%;
    background-color: black;
    width: 400px;
    padding: 20px;
    color: white;
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
.glow {
  text-align: center;
}
.glow .major {
  color: red;
  font-size:50px;
}
.glow .minor {
  color: blue;
  font-size: 30px;
}




</style>
</head>
<body>

    <form action="login.php" method="POST">
        <div class="container">
        <div class="glow">
            <span class="major">Random</span>
            <span class="minor">Chat</span>
        </div><br><br><br>
            <div class="row">
             <div class="col-sm-3"></div>
             <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3">
                         <label class="text">Username</label>
                    </div>
                    <div class="col-sm-9">
                        <input placeholder="Username" type="text" name="username">
                    </div>
                    </div>      
                </div>
             <div class="col-sm-3"></div>
            </div>
            <br>

             <div class="row">
             <div class="col-sm-3"></div>
             <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3">
                          <label class="text">Password</label>
                    </div>
                    <div class="col-sm-9">
                       <input placeholder="Password" type="password" name="password">
                    </div>
                    </div>      
                </div>
             <div class="col-sm-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12" align="center">



                    <input class='first' type="submit" name="login" value="LOGIN">
                </div>
            </div>
        </div>
        <p style="color:red"><?php echo "$err_msg" ?></p>
    </form>

    </div>
</body>
</html>