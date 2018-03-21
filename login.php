<?php 
  session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Влизане в системата</title>
    </head>
    <body><div id="ex3_container">
<?php 
    
    $connect = new mysqli ("localhost", "gigovuch_root","gigovuch_root!","gigovuch_myusers");
    if(!$connect)
        { 
            die(mysqli_error($connect)); 
        } 
 
 
	$username = $connect->real_escape_string(htmlspecialchars($_REQUEST['username'])); 
    $password = $connect->real_escape_string(htmlspecialchars($_REQUEST['password'])); 

     
    $result = $connect->query("SELECT * FROM users WHERE username='$username'"); 
    $row = mysqli_fetch_array($result); 
    $id = $row['id']; 

    $select_user = $connect->query("SELECT * FROM users WHERE id='$id'"); 
    $row2 = mysqli_fetch_array($select_user);
    $user = $row2['username']; 

    if($username != $user){ 
    die("<br><br><br><div id='message'>Username is wrong!</div>"); 
    } 

    $pass_check = $connect->query("SELECT * FROM users WHERE username='$username' AND id='$id'"); 
    $row3 = mysqli_fetch_array($pass_check); 
    $email = $row3['email']; 
    $select_pass = $connect->query("SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'"); 
    $row4 = mysqli_fetch_array($select_pass); 
    $real_password = $row4['password']; 

    if($password != $real_password){ 
    die("<br><br><br><div id='message'>Your password is wrong!</div>"); 
    } 

    
    $_SESSION['username'] = $username; 
    $_SESSION['password'] = $password; 

    echo "<br><br><br><div id='message'>Welcome, ".$username." продължете към <a href=index.php>File Manager</a></div>"; 

?> 
                
            </div>
   </body>
</html>
