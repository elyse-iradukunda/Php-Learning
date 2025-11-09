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
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            margin: 20px auto;
            width: 350px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
        }
        label {
            color: #555;
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
        }
        button {
            padding: 12px 25px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 5px;
            background-color: #4a90e2;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #357abd;
        }
        button[name="delete"] {
            background-color: #e74c3c;
        }
        button[name="delete"]:hover {
            background-color: #c0392b;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            background-color: white;
        }
        th {
            background-color: #1e88e5;
            color: white;
            border: 1px solid #1e88e5;
            padding: 12px;
            text-align: left;
            font-weight: 500;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            background-color: white;
            color: #424242;
        }
        tr:hover td {
            background-color: #f0f7ff;
        }
        h1 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin-bottom: 30px;
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
$edit_name = null;


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
    $edit_name = $_POST['edit_name'];
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
              WHERE cname='$edit_name'";
    mysqli_query($connect, $query);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['delete'])) {
    $name = $_POST['cname'];
    $query = "DELETE FROM customers WHERE cname='$name'";
    mysqli_query($connect, $query);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['edit'])) {
    $edit_name = $_GET['edit'];
    $result = mysqli_query($connect, "SELECT * FROM customers WHERE cname='$edit_name'");
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
    <input type="hidden" name="edit_name" value="<?php echo $edit_name; ?>">

    <label for="customer_name">Customer Name:</label>
    <input type="text" id="customer_name" name="cname" required value="<?php echo $cname; ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?php echo $email; ?>">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required value="<?php echo $phone; ?>">

    <label for="membership">Membership:</label>
    <select id="membership" name="membership">
        <option value="Basic" <?php if($membership=="Basic") echo "selected";?>>Basic</option>
        <option value="Standard" <?php if($membership=="Standard") echo "selected";?>>Standard</option>
        <option value="Premium" <?php if($membership=="Premium") echo "selected";?>>Premium</option>
        <option value="VIP" <?php if($membership=="VIP") echo "selected";?>>VIP</option>
    </select>

    <label for="join_date">Join Date:</label>
    <input type="date" id="join_date" name="join_date" required value="<?php echo $join_date; ?>">

    <?php if($edit_name): ?>
        <button type="submit" name="update">Update Customer</button>
    <?php else: ?>
        <button type="submit" name="add">Add Customer</button>
    <?php endif; ?>
</form>

<?php if(mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership</th>
            <th>Join Date</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['membership']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['cname'];?>"><button type="button">Update</button></a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="cname" value="<?php echo $row['cname']; ?>">
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