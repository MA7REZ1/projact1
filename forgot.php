<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اعادة تعين كلمة المرور</title>
</head>

<body>
    <form method="POST">
        <div>بريد الكتروني</div>
        <input type="email" name="email" required />
        <button type="submit" name="resetPassword">
            ارسال البريد الكتروني
        </button>


        <?php

        if (isset($_POST['resetPassword'])) {
            $username = "root";
            $password = "";
            $database = new PDO("mysql:host=localhost; dbname=ma7rez;", $username, $password);
            $checkEmail = $database->prepare("SELECT email FROM users WHERE EMAIL = :email ");
            $checkEmail->bindParam("email", $_POST['email']);
            $checkEmail->execute();
            if ($checkEmail->rowCount() > 0) {

                echo 'بريدك مسجل';
            } else {
                echo 'هذا البريد الكتروني غير مسجل لدينا';
            }
        }


        ?>
        <a id='login' href="Register.php">Register</a>

    </form>

</body>

</html>