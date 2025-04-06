<?php
$conn = mysqli_connect('localhost', 'ps', 'ps', 'social');
if (mysqli_connect_errno()) {
    echo 'Failed to connect-------------: ' . mysqli_connect_errno();
}

$query = mysqli_query($conn, "INSERT INTO test  VALUES(NULL,'kaka')");
?>

<!DOCTYPE html>
<html>

<head>
    <title>facebook clone</title>
</head>

<body>
    Hello
</body>

</html>