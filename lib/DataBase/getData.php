<?php


require("connection.php");

$makeQuery="SELECT * FROM myBookStore ";
$stamement=$connection->prepare($makeQuery);

$stamement-> execute();
$array=array();

while($resultsFrom=$stamement->fetch()){
    array_push(
        $myarray,array(
            "id"=>$resultsFrom['id'],
            "bookname"=>$resultsFrom['bookname'],
            "price"=>$resultsFrom['price']
            )
        );
}

echo json_decode($myarray);
?>
