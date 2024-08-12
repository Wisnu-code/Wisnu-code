<?php
include ("auth.php");
include ("db.php");
check_login();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($description)) {
        $query = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
        mysqli_query($conn, $query);

        header("Location: index.php");
        die;
    } else {
        echo "Please enter valid information!";
    }
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
    <title>Add Items</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                Add
            </a>
        </div>
    </nav>
    <form method="post">
        <div>Add Item</div>
        <input type="text" name="name" placeholder="Name">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="submit" value="Add">
        <div class="container">
            <a href="index.php">
                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
        </div>
    </form>
</body>
</html>