<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test SQL injection</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <h1>Test SQL injection</h1>
    </div>
    <div class="content">
        <form action="select_injection_2.php" method="get">
            <input class="textbox" type="text" placeholder="Enter Customer ID" id="" name="CustomerID">
            <input class="submit-btn" type="submit" value="Submit">
        </form>
    </div>
</body>

</html>