<!DOCTYPE html <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Update</title>

</head>

<body>
    <?php
    require 'connect.php';
    $sql_select = "SELECT * FROM country ORDER BY CountryCode";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->execute();

    echo "CustomerID = " . $_GET['CustomerID'];
    if (isset($_GET['CustomerID'])) {
        $strCustomerID = $_GET['CustomerID'];
    }
    $sql_select_customer = 'SELECT * FROM customer WHERE CustomerID=?';
    $params = array($strCustomerID);
    $stmt = $conn->prepare($sql_select_customer);
    $stmt->execute($params);
    echo "get = " . $_GET['CustomerID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result['Name'];
    echo $result['Birthdate'];
    $BD = new DateTime($result['Birthdate']);
    $Birthdate = $BD->format('Y-m-d');
    ?>
    <div class="container">
        <div class=:"row"></div>
        <h3>Update Customer</h3>
        <form action="updateDB.php" method="POST">
            <input type="hidden" name="CustomerID" value="<?= $result['CustomerID']; ?> ">
            <label> ชื่อ: </label>
            <input type="text" name="Name" class="form-control" required value="<?= $result['Name']; ?> ">
            <br>
            <br>
            <label> อีเมล์: </label>
            <input type="email" name="Email" class="form-control" required value="<?= $result['Email']; ?> ">
            <br>
            <br>
            <label> วันเกิด: </label>
            <input type="date" name="Birthdate" class="form-control" required value="<?= $Birthdate; ?> ">
            <br>
            <br>
            <label> เลือกประเทศ: </label>
            <select name="CountryCode">
                <?php
                while ($cc = $stmt_select->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <option value="<?php echo $cc['CountryCode'] ?>">
                        <?php echo $cc['CountryName'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br>
            <br>
            <label> ยอดเงินที่กู้: </label>
            <input type="number" name="OutstandingDebt" class="form-control" required value="<?= $result['OutstandingDebt']; ?>">
            <br><br>
            <td><a href="Update.php?CustomerID=<?php echo $r['CustomerID']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('ยืนยันแก้ไขข้อมูล !!');"><button type="submit" class="btn btn-outline-danger">ยืนยันการแก้ไขข้อมูล</button></a></td>
        </form>
    </div>
    </div>
</body>

</html>