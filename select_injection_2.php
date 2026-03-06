<?php
require "connect.php";

$strCustomerID = $_GET["CustomerID"];
$sql = "SELECT*FROM customer WHERE CustomerID = :customerID";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":customerID", $strCustomerID);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row["CustomerID"] . " - " . $row["Name"] . "<br>";
}

$conn = null;
?>