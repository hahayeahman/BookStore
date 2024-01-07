<?php


try{

    $connection=new PDO('mysql:host=localhost;dbname=id21758671_bookstore','id21758671_bookstore1','BookStore1@');

   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}catch(PDOException $exc){
    echo $exc ->getMessage();
    die("could not connect");
}
?>