<?php 
session_start(); 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Излизане от системата</title>
    </head>
    <body><div id="ex3_container">
<?php 

session_destroy(); 
echo "<br><br><br><div id='message'>Вие излязохте успешно! <a href=index.php>Index</a> or <a href=login_form.php>Login</a><div>"; 

?> 
                
            </div>
    </body>
</html>