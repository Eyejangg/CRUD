<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbname = "business";

//โปรแกรมนี้ไว้ใช้สำหรับการเชื่อมต่อระหว่าง web server กับ database server

try {
    $conn = new PDO(
        "mysql:host=$serverName;dbname=$dbname;charset=UTF8",
        $userName,$userPassword);


    if ($conn) 
    {
        echo "You are now connecting to database!!!";
    }
} catch (PDOException $e) {
    echo "Sorry! You cannot connect to database";
}
?>