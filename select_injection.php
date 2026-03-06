<?php
require "connect.php";

if (isset($_GET["CustomerID"])) {
    $strCustomerID = $_GET["CustomerID"];
    echo "<br>" . "CustomerID = " . $strCustomerID;
    $sql = "SELECT*FROM customer WHERE CustomerID = '" . $strCustomerID . "'";
    echo "<br>" . "SQL = " . $sql . "<br>";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();

    print_r($result);
}
