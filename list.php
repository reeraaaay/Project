<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM kpop.tusers ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of users</title>
    <style>
body {
  background: black;
  color:white;
  text-align:center;
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
  float: left;
}
.first:hover {
  box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
  border: 3px solid #00d7c3;
}
    </style>
</head>
<body>
<a href="index.php">
<button class="first">Home</button>
</a>

    
<table width='80%'>

<tr bgcolor='gray'>
    <td>ID</td>
    <td>Nickname</td>
    <td>Role</td>
    <td>Update</td>
</tr>
</body>
</html>
<?php   
while($row = $result->fetch(PDO::FETCH_ASSOC)) {        
    echo "<tr>";
    echo "<td>".$row['ID']."</td>";
    echo "<td>".$row['nickname']."</td>";
    echo "<td>".$row['role']."</td>";   
    echo "<td><a href=\"edit.php?id=$row[ID]\">Edit</a> | <a href=\"delete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></br>";  
}
?>