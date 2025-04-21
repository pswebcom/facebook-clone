<?php
include 'includes/header.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>facebook clone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

<div class="user-details column">
    <div class="left">
        <a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic']; ?>" alt=""></a>
    </div>

    <div class="right">
        <a class="user-info name" href="<?php echo $userLoggedIn; ?>"><?php echo $user['first_name'] . " " . $user['last_name'] ?></a>
        <i class="user-info">Posts:<?php echo $user['num_posts'] ?></i>
        <i class="user-info">Likes:<?php echo $user['num_likes'] ?></i>
    </div>

</div>

<div class="main-column column">
    <form action="index.php" class="post_form" method="POST">
        <textarea name="post_text" id="post_texts" rows="4" cols="50"></textarea>
        <input type="submit" name="post" id="post_button" value="Post"/>
    </form>
</div>


</div>
<!--wrapper class ends here-->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>