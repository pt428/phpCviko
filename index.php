 

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
        <h1>Vložit novou knihu</h1>
        <form action="add-db.php" method="post">

            <label for="isbn" class="form-label">ISBN</label>
            <input 
            type="text" 
            name="isbn"  
            class="form-control" 
            required><br>

            <label for="first_name" class="form-label">Křestní jméno autora</label>
            <input 
            type="text" 
            name="first_name"   
            class="form-control" 
            required><br>
            
            <label for="second_name" class="form-label">Příjmení autora</label>
            <input 
            type="text" 
            name="second_name"  
            class="form-control" 
            required><br>

            <label for="book_name" class="form-label">Název knihy</label>
            <input 
            type="text" 
            name="book_name"  
            class="form-control" 
            required><br>

            <label for="book_describe" class="form-label">Popis</label>
            <textarea name="book_describe" id="" cols="30" rows="10" class="form-control"></textarea><br>
            
            <input type="submit" value="Vložit" class="btn btn-secondary mb-3">
        </form>
 </div>
</body>
</html>