<?php
require "connect.php";
$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<html>

<head>
    <title> Select to See Detail 651 </title>
</head>

<body>

    <table width="800" border="1">
        <tr>
            <th>รหัสผู้ใช้งาน</th>
            <th>ชื่อ</th>
            <th>วันเกิด</th>
            <th>อีเมล</th>
            <th>ประเทศ</th>
            <th>ยอดหนี้</th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $result["CustomerID"]; ?></td>
                <td><?php echo $result["Name"]; ?></td>
                <td><?php echo $result["Birthdate"]; ?></td>
                <td><?php echo $result["Email"]; ?></td>
                <td><?php echo $result["CountryCode"]; ?></td>
                <td><?php echo $result["OutstandingDebt"]; ?></td>
            </tr>
        <?php
        }
        $conn = null;
        ?>

    </table>

</body>

</html>