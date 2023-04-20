<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'revision';
                
    //On établit la connexion
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $sql = "SELECT * FROM `article`";
    $res = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <style>
        @font-face {
            font-family: shanghai;
            src: url(../font/shanghai.ttf);
        }
        body {
            background: linear-gradient(0.90turn, red, blue);
            min-height: 100vh;
        }
        h1{
            font-family: shanghai;
            color: white;
            text-align: center;
            font-size: 50px;
        }
        .test {
            color: white;
            font-size: 15px;
        }
    </style> 
</head>
<body>
    <h1>Page article</h1>

    <div class="test">
        <?php 
            foreach( $res as $row ) {
                echo $row['title'] . "<br />";
                echo $row['description']. "<br /><br />";
            }
        ?>
    </div>
    

</body>
</html>