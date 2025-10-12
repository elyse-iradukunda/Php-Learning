<!-- <!DOCTYPE html>
<html>
<head>
    <title>Parking Slot Check</title>
</head>
<body>
    <h2>Parking Slot Free Parking Checker</h2>

    <form method="POST">
        Total Amount Spent ($): <br>
        <input type="number" name="num4" required> <br>
        <input type="number" name = "num1"> <br>
        <input type="number" name = "num2"><br>
        <input type="number" name = "num3"><br>
        <button type="submit">sum</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
        $num4 = $_POST['num4'];
        $sum = $num1+$num2+$num3+$num4; 
        echo $sum;
        

    }
    ?>
</body>
</html> -->






<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
</head>
<body>
    <h2>Login</h2>

    <form method="POST">
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <?php
    // Set a predefined password
    $correctPassword = "secret123";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the entered password
        $enteredPassword = $_POST['password'];

        // Display the attempt first
        echo "<p>You entered: <strong>$enteredPassword</strong></p>";

        // Now check the password
        if ($enteredPassword === $correctPassword) {
            echo "<p style='color:green;'>Login successful!</p>";
        } else {
            echo "<p style='color:red;'>Wrong password. Try again.</p>";
        }
    }
    ?>
</body>
</html>

