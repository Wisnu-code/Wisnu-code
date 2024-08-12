<?php
include ("auth.php");
include ("db.php");
check_login();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($description)) {
        $query = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
        mysqli_query($conn, $query);

        header("Location: index.php");
        die;
    } else {
        echo "Please enter valid information!";
    }
} else {
    $query = "SELECT * FROM items WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Edit Items</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                Edit
            </a>
        </div>
    </nav>
    <form method="post">
        <div>Edit Item</div>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">
        <textarea name="description"><?php echo $row['description']; ?></textarea>
        <input type="submit" value="Save">
        <div class="container">
            <a href="index.php">
                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
        </div>
    </form>
</body>
</html>