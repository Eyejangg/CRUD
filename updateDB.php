<?php
require 'connect.php';
if (isset($_POST['CustomerID']) && isset($_POST['Name'])) {
    $strCustomerID = $_POST['CustomerID'];
}

$sql = "UPDATE customer 
SET name = :name, birthdate = :birthdate, email = :email, countrycode = :countrycode, outstandingdebt = :outstandingdebt
WHERE CustomerID = :CustomerID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID', $_POST['CustomerID']);
$stmt->bindParam(':name', $_POST['Name']);
$stmt->bindParam(':birthdate', $_POST['Birthdate']);
$stmt->bindParam(':email', $_POST['Email']);
$stmt->bindParam(':countrycode', $_POST['CountryCode']);
$stmt->bindParam(':outstandingdebt', $_POST['OutstandingDebt']);

if ($stmt->execute()) :
    $message = 'Suscessfully Update customer';
else :
    $message = 'Fail to Update customer';
endif;
echo $message;
