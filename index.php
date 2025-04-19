<?php
include 'includes/header.php';

echo "************index.php <br>";
echo "$_SESSION[username] . '<br>'" ;
//reset and destroy all sessions
//after this $_Session[username] in header.php will be empty
session_destroy();
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