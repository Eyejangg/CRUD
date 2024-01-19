<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    
    <h1>Add Customer</h1>
    
    <form action="addCustomer.php" method="POST">
        <input type="text" placeholder="กรุณากรอกรหัสลูกค้า"     name="CustomerID">
        <br><br/>
        <input type="text" placeholder="โปรดใส่ชื่อ" name="Name"> 
         <br><br/>
         <input type="date" placeholder="วว/ดด/ปปปป" name="Birthdate">
         <br><br/>
         <input type="email" placeholder="Email" name="Email">
         <br><br/>
         <input type="text" placeholder="CountryCode" name="CountryCode">
         <br><br/>
         <input type="number" placeholder="OutstandingDebt" name="OutstandingDebt">
         <input type="submit">
         


    </form>

</body>
</html>

<?php
try {
if (isset($_POST['CustomerID']) && isset($_POST['Name'])):

require 'connect.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email,:CountryCode, :OutstandingDebt)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID', $_POST['CustomerID']);
$stmt->bindParam(':Name', $_POST['Name']);
$stmt->bindParam(':Birthdate', $_POST['Birthdate']);
$stmt->bindParam(':Email', $_POST['Email']);
$stmt->bindParam(':CountryCode', $_POST['CountryCode']);
$stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

if ($stmt->execute()): 
    $message ='Suscessfully add new customer';
else :

    $message = 'Fail to add new customer';
endif;
echo $message;

$conn = null;
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}



?>