<?php
    require "Database.php";
    $db = new Database();
    $connection = $db->connectDB();
    $books=$db->showAllDbData($connection);

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
        <h1>Seznam knih</h1>
        <?php if($books){?>
            <ul class="list-group list-group-flush">
                <?php foreach($books as $book):?>
                    <hr class="border border-emphasis border-2 opacity-50">
                    <li class="list-group-item  list-group-item-primary">Název knihy: <?=$book["book_name"]?></li>
                    <li class="list-group-item">ISBN: <?=$book["isbn"]?></li>
                    <li class="list-group-item">Křestní jméno autora: <?=$book["first_name"]?></li>
                    <li class="list-group-item">Příjmení autora: <?=$book["second_name"]?></li>
                    <li class="list-group-item">Popis knihy: <?=$book["book_describe"]?></li>
                    <div class="d-inline-flex p-2 gap-2 ">
                  
                    </div>                
                <?php endforeach ?>  
            </ul>
        <?php }else{ ?>
            <p>zadna data k zobrazeni</p>
        <?php } ?>
    </div>
</body>
</html>