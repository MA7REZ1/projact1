<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel='stylesheet' href="CSS/main.css">
</head>
        <!-- //page the login -->
<body>
    <div class="main">
        <h1>Log in<h1>
                <i>let's go</i><br>
                <form action="login.php" method="POST">
                
                    <?php
                    if (isset($usr_error)) {
                        echo $usr_error;
                    } 
                    
                    
                    
                    ?>
                    <input type="text" name="username" id="username" placeholder="username"value="<?php if(isset($_COOKIE['username']))echo$_COOKIE['username'];?>"><br>
                    <?php
                    if (isset($pass_error)) {
                        echo $pass_error;
                    }
                    ?>
                    <input type="password" name="password" id="password" placeholder="password"value="<?php if(isset($_COOKIE['password']))echo$_COOKIE['password'];?>"><br>
                    <label><input type="checkbox" name="keep" id="keep"value="1">keep me signed in</label>
                    <br>
                
                    <input type="submit" name="submit" id="submit" value="Log in"><br>
                </form>
                <a class="Forget" href="forgot.php">Forget password?</a>

                <h1>OR</h1>
                <br>

                <a id='login' href="Register.php">Register</a>
    </div>
</body>

</html>