<?php
require "Database.php";
$message="";
    if(isset($_POST["isbn"])){
        $isbn=htmlspecialchars(addslashes($_POST["isbn"]));
        $first_name=htmlspecialchars(addslashes($_POST["first_name"]));
        $second_name=htmlspecialchars(addslashes($_POST["second_name"]));    
        $book_name=htmlspecialchars(addslashes($_POST["book_name"]));    
        $book_describe=htmlspecialchars(addslashes($_POST["book_describe"]));    
        // echo htmlspecialchars(addslashes($_POST["isbn"]));
        // echo htmlspecialchars(addslashes($_POST["first_name"]));
        // echo htmlspecialchars(addslashes($_POST["second_name"]));    
        // echo htmlspecialchars(addslashes($_POST["book_name"]));    
        // echo htmlspecialchars(addslashes($_POST["book_describe"]));    
        $db=new Database();
        $connection = $db->connectDB();

        $db=new Database();
        $connection = $db->connectDB();
        if($db->addDataToDb($connection, $isbn, $first_name, $second_name,$book_name,$book_describe)){
            $message = "Kniha byla úspěšně vložena";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <?php require "header.php"?>
            <h1><?=$message?></h1>
        </div>
    </body>
</html>