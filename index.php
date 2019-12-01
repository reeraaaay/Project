<?php
session_start();
$br = "<br/>";
include_once ('config.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
// header ("location:login.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    
 
        
        
        var chat =  new Chat();
        $(function() {
        
             chat.getState(); 
             
             
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
                                                                                                                                                                                                            });
            
             $('#sendie').keyup(function(e) {   
                                 
                  if (e.keyCode == 13) { 
                  
                    var text = $(this).val();
                    var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    
                    if (length <= maxLength + 1) { 
                     
                        chat.send(text, name);  
                        $(this).val("");
                        
                    } else {
                    
                        $(this).val(text.substring(0, maxLength));
                        
                    }   
                    
                    
                  }
             });
            
        });
    </script>
<style>
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

<body onload="setInterval('chat.update()', 1000)" style="background-color: black;"> 
<a href="logout.php">
    <button class="first">Logout</button>
</a>;
<a href="adduser.php">
    <button class="first">Add User</button>
</a>;
 <a href="list.php">
     <button class="first">List of Users</button>
 </a>;


    <div id="page-wrap">
    
        <h2 style="color:white;text-align:center;">Random Chat</h2>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p style="color: white; float:"> Type message: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    
    </div>

</body>

</html>