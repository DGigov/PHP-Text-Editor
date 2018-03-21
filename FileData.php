<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Обработване на файла</title>
    </head>
    <body><div id="ex3_container"><br><br><br><div id='message'>
<?php
    $dir = "/home/gigovuch/public_html/project/files/";
        $text = $_POST['notes'];
    
       if(isset($_POST['del'])){
            unlink($_SESSION['fname']);
            echo 'Файлът беше изтрит! | ';
            $_SESSION['fname']=null;
            echo '<a href="index.php"> back</a>';
        }
        elseif(isset($_POST['new'])&& !empty($_POST['newf'])){
        				
                                if(file_exists($dir.$_POST['newf'])){
                                    echo 'Съществува файл с такова име!';
                                }
                                else{
                                   
                                    fopen($dir.$_POST['newf'], "w");
                                    echo 'Беше създаден нов файл с име:';
                                    echo $_POST['newf'];
                                    
                                    }
                                    echo '<a href="index.php"> back</a>';
        }
        else{
            
        file_put_contents($_SESSION['fname'], $text);
        echo 'Успешно записахте файла! | ';
        echo '<a href="index.php"> back</a>';
        }
        
        
        

?>
        </div>
            </div>
  </body>
</html>