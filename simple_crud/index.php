<?php
include ("auth.php");
include ("db.php");
check_login();

$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>CRUD</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Item List
            </a>
            <a href="logout.php" type="button" class="btn btn-danger">
                <i class="fa fa-plus"></i>
                Logout
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <a href="add.php" type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Add Item
        </a>
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>ID</center>
                        </th>
                        <th>
                            <center>NAME</center>
                        </th>
                        <th>
                            <center>DESCRIPTION</center>
                        </th>
                        <th>
                            <center>ACTION</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $no=$no+2; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-primary ">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger ">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>