<?php

    require ('connect.php');
    if (isset($_GET['CustomerID'])) {
        $strCustomerID = $_GET['CustomerID'];
    }

    $sql = "DELETE FROM customer where CustomerID = :CustomerID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_GET['CustomerID']);
    
    
if ($stmt->execute()) : 
    $message =' Suscessfully Delete customer';
else :
    $message = ' Fail to Delete customer';
endif;
echo $message;

?>
