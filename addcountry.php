<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Add Country</h1>
    </div>
    <form action="addcountry.php" method="POST">

        <label for="countrycode">Country Code</label>
        <input type="text" id="countrycode" name="countrycode" required>
        <br><br>

        <label for="countryname">Country Name</label>
        <input type="text" id="countryname" name="countryname" required>
        <br><br>

        <input type="submit" value="Submit">
        <br><br>
    </form>
</body>

</html>

<?php
if (isset($_POST["countrycode"]) && isset($_POST["countryname"])) {
    require "connect.php";

    $strCountryCode = $_POST["countrycode"];
    $strCountryName = $_POST["countryname"];

    $sql = "INSERT INTO country (CountryCode, CountryName) VALUES (:countrycode, :countryname)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":countrycode", $strCountryCode);
    $stmt->bindParam(":countryname", $strCountryName);

    if ($stmt->execute()) {
        echo "Added successfully";
        exit();
    } else {
        echo "AddError: " . $sql . "<br>" . $conn->errorInfo();
    }

    $conn = null;
}
?>