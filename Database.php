<?php
class Database{

    function connectDB(){
        require "databaseLogin.php";

        $db="mysql:host=".$db_host.
            ";dbname=".$db_name.
            ";charset=utf8";
        try {
            $connection=new PDO($db,$db_user,$db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $th) {
            echo "Typ chyby: ". $th->getMessage();
        }

        
    }

    function showAllDbData($connection){
        $sql="SELECT * FROM books";
        $stmt=$connection->prepare($sql);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    function addDataToDb($connection,$isbn,$first_name,$second_name,$book_name,$book_describe){
        $sql="INSERT 
                INTO books(isbn,first_name,second_name,book_name,book_describe) 
                VALUES (
                     :isbn, 
                     :first_name, 
                     :second_name,
                     :book_name,
                     :book_describe)";
            

        $stmt=$connection->prepare($sql);
        if($stmt){
            $stmt->bindValue(":isbn",$isbn,PDO::PARAM_STR);
            $stmt->bindValue(":first_name",$first_name,PDO::PARAM_STR);
            $stmt->bindValue(":second_name",$second_name,PDO::PARAM_STR);
            $stmt->bindValue(":book_name",$book_name,PDO::PARAM_STR);
            $stmt->bindValue(":book_describe",$book_describe,PDO::PARAM_STR);
             
        }else{
            echo mysqli_error($connection);
        }
        if($stmt->execute()){
            return true;
        }
    }

    function searchDataFromDb($connection,$isbn,$first_name,$second_name,$book_name){
        $sql="SELECT * FROM books WHERE"
        . ($isbn?" isbn=:isbn AND":" 1=1 AND")
        . ($first_name?" first_name=:first_name AND":" 1=1 AND")
        . ($second_name?" second_name=:second_name AND":" 1=1 AND")
        . ($book_name?" book_name=:book_name":" 1=1");

       
        $stmt=$connection->prepare($sql);
        if($stmt){
            if($isbn)$stmt->bindValue(":isbn",$isbn,PDO::PARAM_STR);
            if($first_name)$stmt->bindValue(":first_name",$first_name,PDO::PARAM_STR);
            if($second_name)$stmt->bindValue(":second_name",$second_name,PDO::PARAM_STR);
            if($book_name)$stmt->bindValue(":book_name",$book_name,PDO::PARAM_STR);
         
        }else{
            echo mysqli_error($connection);
        }
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
}