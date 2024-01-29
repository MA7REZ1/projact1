<?php
session_start();
include('inc/connections.php');
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $user = $_SESSION['username'];
}
    $info = mysqli_query($conn,"select * from users where username='$user'");
    while ($data = mysqli_fetch_array($info)) {




?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
        </head>

        <body>
            <a href="logout.php">Logout</a>

            <div class="photo">
                <?php echo "<img src='pic/" . $data['profile_picture'] . "' alt='imge not found !'>";  ?>
                <?php } ?>
            </div>
            <?php if(isset($error_img)){echo $error_img;} ?>

            <form action="upload_img.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <input type="submit" name="submit" value="UPLOAD">
            </form>
        </body>

        </html>
