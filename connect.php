<?php



 
$conn = new mysqli('localhost', 'root', '', 'pizzashop');

if($conn -> errno > 0){
    die("Adatbázis nem elérhető");
}
