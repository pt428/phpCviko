<?php
require "Database.php";

    if(isset($_POST["isbn"]) or isset($_POST["first_name"]) or isset($_POST["second_name"]) or isset($_POST["book_name"]) ){
        $isbn=$_POST["isbn"];
        $first_name=$_POST["first_name"];
        $second_name=$_POST["second_name"];
        $book_name=$_POST["book_name"];

        // echo $_POST["isbn"];
        // echo $_POST["first_name"];
        // echo $_POST["second_name"];
        // echo $_POST["book_name"];
        // $value=$_POST["first_name"];
        
        $db=new Database();
        $connection = $db->connectDB();
        $books = $db->searchDataFromDb($connection,$isbn,$first_name,$second_name,$book_name );
        // $books="";
        // //  hledat ve sloupci hodnotu
        // $produkt1 =array_filter($db->searchDataFromDb($connection,"isbn",$isbn));
        // if($produkt1)$produkt=$produkt1;
        // $produkt1 =array_filter($db->searchDataFromDb($connection,"first_name",$value));
        // if($produkt1)$produkt=$produkt1;

        // $produkt1 =array_filter($db->searchDataFromDb($connection,"book_name",$value));
        // if($produkt1)$produkt=$produkt1;
        
        // $produkt1 =array_filter($db->searchDataFromDb($connection,"cena",$value));
        // if($produkt1)$produkt=$produkt1;

        // echo "<pre>";
        // var_dump($produkt);
        // echo "</pre>";
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
        <?php if($books){?>
            <ul class="list-group list-group-flush">
                <h1>Výsledky hledání: </h1>
                <?php foreach( $books as $book):
                    if($book){?>
                        <hr class="border border-emphasis border-2 opacity-50">
                        <li class="list-group-item  list-group-item-primary">Název knihy: <?=$book["book_name"]?></li>
                        <li class="list-group-item">ISBN: <?=$book["isbn"]?></li>
                        <li class="list-group-item">Křestní jméno autora: <?=$book["first_name"]?></li>
                        <li class="list-group-item">Příjmení autora: <?=$book["second_name"]?></li>
                    <?php  } 
                endforeach ?>
            </ul>
        <?php }else{ ?>
            <h1>Nenalezan žádná kniha</h1>
        <?php } ?>
    </div>
</body>
</html>