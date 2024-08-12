<?php
include ("auth.php");
include ("db.php");
check_login();

$id = $_GET['id'];

$query = "DELETE FROM items WHERE id=$id";
mysqli_query($conn, $query);

header("Location: index.php");
die;
?>