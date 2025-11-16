<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$connect = mysqli_connect('localhost', 'root', '', 'studio_db');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$cname = $email = $phone = $membership = $join_date = "";
$edit_name = null;

if (isset($_POST['add'])) {
    $cname = mysqli_real_escape_string($connect, $_POST['cname']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $membership = mysqli_real_escape_string($connect, $_POST['membership']);
    $join_date = mysqli_real_escape_string($connect, $_POST['join_date']);

    $query = "INSERT INTO customers (cname, email, phone, membership, join_date)
              VALUES ('$cname', '$email', '$phone', '$membership', '$join_date')";
    mysqli_query($connect, $query);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['update'])) {
    $edit_name = mysqli_real_escape_string($connect, $_POST['edit_name']);
    $cname = mysqli_real_escape_string($connect, $_POST['cname']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $membership = mysqli_real_escape_string($connect, $_POST['membership']);
    $join_date = mysqli_real_escape_string($connect, $_POST['join_date']);

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
    $name = mysqli_real_escape_string($connect, $_POST['cname']);
    $query = "DELETE FROM customers WHERE cname='$name'";
    mysqli_query($connect, $query);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['edit'])) {
    $edit_name = mysqli_real_escape_string($connect, $_GET['edit']);
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
            margin: 0;
            padding: 0;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-name {
            font-weight: 500;
        }
        .logout-btn {
            padding: 8px 20px;
            background-color: rgba(255,255,255,0.2);
            border: 2px solid white;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: rgba(255,255,255,0.3);
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
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }
        button {
            padding: 12px 25px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 5px;
            background-color: #667eea;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5568d3;
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
            background-color: #667eea;
            color: white;
            border: 1px solid #667eea;
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
        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin: 30px 0 10px 0;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>🎬 Studio Customers Management</h1>
    <div class="user-info">
        <span class="user-name">👤 <?php echo htmlspecialchars($_SESSION['full_name']); ?></span>
        <a href="?logout=true" class="logout-btn">Logout</a>
    </div>
</div>

<h2>Customer Form</h2>

<form action="#" method="POST">
    <input type="hidden" name="edit_name" value="<?php echo htmlspecialchars($edit_name); ?>">

    <label for="customer_name">Customer Name:</label>
    <input type="text" id="customer_name" name="cname" required value="<?php echo htmlspecialchars($cname); ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required value="<?php echo htmlspecialchars($phone); ?>">

    <label for="membership">Membership:</label>
    <select id="membership" name="membership">
        <option value="Basic" <?php if($membership=="Basic") echo "selected";?>>Basic</option>
        <option value="Standard" <?php if($membership=="Standard") echo "selected";?>>Standard</option>
        <option value="Premium" <?php if($membership=="Premium") echo "selected";?>>Premium</option>
        <option value="VIP" <?php if($membership=="VIP") echo "selected";?>>VIP</option>
    </select>

    <label for="join_date">Join Date:</label>
    <input type="date" id="join_date" name="join_date" required value="<?php echo htmlspecialchars($join_date); ?>">

    <?php if($edit_name): ?>
        <button type="submit" name="update">Update Customer</button>
    <?php else: ?>
        <button type="submit" name="add">Add Customer</button>
    <?php endif; ?>
</form>

<h2>Customer List</h2>

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
                <td><?php echo htmlspecialchars($row['cname']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['membership']); ?></td>
                <td><?php echo htmlspecialchars($row['join_date']); ?></td>
                <td>
                    <a href="?edit=<?php echo urlencode($row['cname']);?>"><button type="button">Update</button></a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="cname" value="<?php echo htmlspecialchars($row['cname']); ?>">
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