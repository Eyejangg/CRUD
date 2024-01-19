<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail of customer</title>
</head>

<body>
    <?php
    if (isset($_GET["CustomerID"])) // 
    {
        $strCustomerID = $_GET["CustomerID"]; // ชื่อตัวแปร

    }
    echo $strCustomerID;

    require "connect.php";
    $sql = "SELECT * 
FROM customer,country 
WHERE  customer.CountryCode = country.CountryCode
AND customerID = ?";
    $params = array($strCustomerID); // เอา strCustomerID มาใส่ ใน array / array $strCustomerID
    $stmt = $conn->prepare($sql);
    $stmt->execute($params); // ใส่ Params 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $strCustomerID;
    ?>
    <table border="1">
        <tr>
            <th> รหัสลูกค้า </th>
            <td> <?php echo $result["CustomerID"] ?></td>
        </tr>
        <tr>
            <th> ชื่อ </th>
            <td> <?php echo $result["Name"] ?></td>
        </tr>
        <tr>
            <th> วันเกิด </th>
            <td> <?php echo $result["Birthdate"] ?></td>
        </tr>
        <tr>
            <th> อีเมลล์ </th>
            <td> <?php echo $result["Email"] ?></td>
        </tr>
        <tr>
            <th> ประเทศ </th>
            <td> <?php echo $result["CountryName"] ?></td>
        </tr>
        <tr>
            <th> ยอดหนี้ </th>
            <td> <?php echo $result["OutstandingDebt"] ?></td>
        </tr>

    </table>


</body>

</html>