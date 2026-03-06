<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Add Customer</h1>
    </div>
    <form action="addcustomer.php" method="POST">

        <label for="customerId">CustomerID</label>
        <input type="text" id="customerId" name="customerId" required>
        <br><br>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="birthday">Birth Day</label>
        <input type="date" id="birthday" name="birthday" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="countrycode">Country Code</label>
        <select name="countrycode" id="countrycode" required>
            <option value="">Select a country</option>
            <?php
            require "connect.php";
            $sql_select = "SELECT CountryCode, CountryName FROM country";
            $stmt = $conn->prepare($sql_select);
            $stmt->execute();
            while ($cc = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $cc['CountryCode'] . "'>" . $cc['CountryName'] . "</option>";
            }
            $conn = null;
            ?>
        </select>
        <br><br>

        <label for="outstandingdebt">Outstanding Debt</label>
        <input type="number" id="outstandingdebt" name="outstandingdebt" step="0.01" required>
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php
if (isset($_POST["customerId"]) && isset($_POST["name"]) && isset($_POST["birthday"]) && isset($_POST["email"]) && isset($_POST["countrycode"]) && isset($_POST["outstandingdebt"])) {
    require "connect.php";

    $strCustomerID = $_POST["customerId"];
    $strName = $_POST["name"];
    $strBirthday = $_POST["birthday"];
    $strEmail = $_POST["email"];
    $strCountryCode = $_POST["countrycode"];
    $strOutstandingDebt = $_POST["outstandingdebt"];

    $sql = "INSERT INTO customer (CustomerID, Name, Birthdate, Email, CountryCode, OutstandingDebt) VALUES (:customerId, :name, :birthday, :email, :countrycode, :outstandingdebt)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":customerId", $strCustomerID);
    $stmt->bindParam(":name", $strName);
    $stmt->bindParam(":birthday", $strBirthday);
    $stmt->bindParam(":email", $strEmail);
    $stmt->bindParam(":countrycode", $strCountryCode);
    $stmt->bindParam(":outstandingdebt", $strOutstandingDebt);

    if ($stmt->execute()) {
        echo "New record created successfully";
        exit();
    } else {
        echo "CreateError: " . $sql . "<br>" . $conn->errorInfo();
    }

    $conn = null;
}

?>