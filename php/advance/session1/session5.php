<?php
    session_start();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("sessionmenu.php");
        if(isset($_SESSION["uname"])){
            echo "<hr>Welcome ".$_SESSION["uname"];
        }else{
            echo "<hr>Welcome Guest<hr>";
        }
    ?>
</body>
</html>