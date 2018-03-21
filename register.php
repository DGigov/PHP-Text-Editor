<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Регистрация</title>
    </head>
    <body><div id="ex3_container"><div id="ex3_content">
<?php 

    $connect = new mysqli ("localhost", "gigovuch_root","gigovuch_root!","gigovuch_myusers");
   // $connect = mysql_connect("localhost", "gigovuch_root","gigovuch_root!","gigovuch_myusers"); 
    if(!$connect)
        { 
            die(mysqli_error($connect)); 
        } 

     
    //$select_db = mysql_select_db("gigovuch_myusers"); 
   // if(!$select_db)
   //     { 
    //        die(mysql_error()); 
    //    } 

     
    $username = $connect->real_escape_string(htmlspecialchars($_REQUEST['username']));
    $password = $connect->real_escape_string(htmlspecialchars($_REQUEST['password']));
    $pass_conf = $connect->real_escape_string(htmlspecialchars($_REQUEST['password_conf'])); 
    $email = $connect->real_escape_string(htmlspecialchars($_REQUEST['email'])); 
     

     
    if(empty($username)){ 
    die("Please enter your username!<br>"); 
    } 
    if(empty($password)){ 
    die("Please enter your password!<br>"); 
    } 
    if(empty($pass_conf)){ 
    die("Please confirm your password!<br>"); 
    } 
    if(empty($email)){ 
    die("Please enter your email!"); 
    } 

    
    $user_check = $connect->query("SELECT username FROM users WHERE username='$username'"); 
    $do_user_check = mysqli_num_rows($user_check); 

     
    $email_check = $connect->query("SELECT email FROM users WHERE email='$email'"); 
    $do_email_check = mysqli_num_rows($email_check); 

     
    if($do_user_check > 0){ 
    die("Username is already in use!<br>"); 
    } 
    if($do_email_check > 0){ 
    die("Email is already in use!"); 
    } 

     
    if($password != $pass_conf){ 
    die("Passwords don't match!"); 
    }  
    
    $insert = $connect->query("INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')"); 
    if(!$insert){ 
        
    die("There's little problem: ".mysqli_error($connect));    
    } 
    echo $username.", you are now registered. Thank you!<br><br>"
            . "<center><a href=login_form.php>Login</a> | <a href=index.php>Index</a></center>"; 
   
?> 
                </div>
            </div>
    </body>
</html>