<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Регистрация</title>
    </head>
    <body><div id="ex3_container"><h1>Нова Регистрация</h1><br><br><br>
        <?php

        
                echo "<form action='register.php' method='post' class='form-style-9'><ul><li>" 
                ."Username: <input type='text' name='username' size='30' align='right' class='field-style field-full align-none' placeholder='Username'></li><br>" 
                ."<li>Password: <input type='password' name='password' size='30' class='field-style field-full align-none' placeholder='Password'></li><br>" 
                ."<li>Confirm your password: <input type='password' name='password_conf' size='30' class='field-style field-full align-none' placeholder='Re Password'></li><br>" 
                ."<li>Email: <input type='text' name='email' size='30' class='field-style field-full align-none' placeholder='Email'></li><br><br>" 
                 
                ."<li><center><input type='submit' value='Register'></center>" 
                ."</li></ul></form>"; 
        ?> 
               
            </div>
    </body>
</html>
