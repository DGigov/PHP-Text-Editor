<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Влизане в системата</title>
    </head>
    <body><div id="ex3_container"><h1>Вписване</h1><br><br><br>
        <?php

        echo "<form action='login.php' method='post' class='form-style-9'><ul><li>" 
        ."<li>Username: <input type='text' name='username' size='30' required='required' class='field-style field-full align-none' placeholder='Username'></li><br>" 
        ."<li>Password: <input type='password' name='password' size='30' required='required' class='field-style field-full align-none' placeholder='Password'></li><br>" 
        ."<li><center><input type='submit' value='Login'></center>" 
        ."</li></ul></form>"; 

        ?> 
                
            </div>
   </body>
</html>

