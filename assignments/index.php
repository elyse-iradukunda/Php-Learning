<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studio Customers Management</title>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }
        form, table {
            background-color: #4a90e2;
            padding: 20px;
            border-radius: 15px;
            margin: 20px auto;
            width: 350px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 90%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 9px;
            border: 1px solid #2c5aa0;
        }
        button {
            padding: 8px 17px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 8px;
            background-color: #2c5aa0;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1a3a6b;
        }
        table {
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #2c5aa0;
            padding: 8px;
            text-align: center;
        }
        h1 {
            text-align: center;
            color: #2c5aa0;
        }
    </style>
</head>
<body>

<?php
$connect = mysqli_connect('localhost', 'root', '', 'studio_db');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


$cname = $email = $phone = $membership = $join_date = "";
$edit_id = null;


if (isset($_POST['add'])) {
    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership = $_POST['membership'];
    $join_date = $_POST['join_date'];

    $query = "INSERT INTO customers (cname, email, phone, membership, join_date)
              VALUES ('$cname', '$email', '$phone', '$membership', '$join_date')";
    mysqli_query($connect, $query);

 
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}


if (isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership = $_POST['membership'];
    $join_date = $_POST['join_date'];

    $query = "UPDATE customers SET 
                cname='$cname', 
                email='$email', 
                phone='$phone', 
                membership='$membership', 
                join_date='$join_date' 
              WHERE cid=$edit_id";
    mysqli_query($connect, $query);

   
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}


if (isset($_POST['delete'])) {
    $id = $_POST['cid'];
    $query = "DELETE FROM customers WHERE cid=$id";
    mysqli_query($connect, $query);

 
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $result = mysqli_query($connect, "SELECT * FROM customers WHERE cid=$edit_id");
    if ($row = mysqli_fetch_assoc($result)) {
        $cname = $row['cname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $membership = $row['membership'];
        $join_date = $row['join_date'];
    }
}


$result = mysqli_query($connect, "SELECT * FROM customers");
?>

<h1>Studio Customers Management</h1>


<form action="#" method="POST">
    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">

    <label for="customer_name">Customer Name:</label>
    <input type="text" id="customer_name" name="cname" required value="<?php echo $cname; ?>"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?php echo $email; ?>"><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required value="<?php echo $phone; ?>"><br><br>

    <label for="membership">Membership:</label>
    <select id="membership" name="membership">
        <option value="Basic" <?php if($membership=="Basic") echo "selected";?>>Basic</option>
        <option value="Standard" <?php if($membership=="Standard") echo "selected";?>>Standard</option>
        <option value="Premium" <?php if($membership=="Premium") echo "selected";?>>Premium</option>
        <option value="VIP" <?php if($membership=="VIP") echo "selected";?>>VIP</option>
    </select><br><br>

    <label for="join_date">Join Date:</label>
    <input type="date" id="join_date" name="join_date" required value="<?php echo $join_date; ?>"><br><br>

    <?php if($edit_id): ?>
        <button type="submit" name="update">Update Customer</button>
    <?php else: ?>
        <button type="submit" name="add">Add Customer</button>
    <?php endif; ?>
</form>


<?php if(mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership</th>
            <th>Join Date</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['cid']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['membership']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['cid'];?>"><button type="button">Update</button></a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                        <button type="submit" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p style="text-align:center;">No customers found.</p>
<?php endif; ?>
</body>
</html>