<?php
session_start();
include_once('inc/connections.php');
if(isset($_POST['username'])&& isset($_POST['password'])){
        $username = stripcslashes(htmlspecialchars(strtolower($_POST['username'])));
        $password = stripcslashes(htmlspecialchars($_POST['password']));
        $md5_pass = md5($password);

    if(isset($_POST['keep'])){
        $keep= stripcslashes(htmlspecialchars($_POST['keep']));
        if($keep==1){
            setcookie('username',$username,time()+3600,"/");
            setcookie('password',$password,time()+3600,"/");
        }
    }
    if(empty($username)){
        $usr_error='<p id="error">Please insert username</p>';
        $err_s=1;
        include_once('index.php');
    }

    if(empty($password)){
        $pass_error='<p id="error"> Please insert password </p>';
        $err_s=1;
        include_once('index.php');
    }
        if(!isset($err_s)){
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'AND md5_pass='$md5_pass'limit 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $num_rows = mysqli_num_rows($result);
        if($num_rows != 0){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header('location: home.php');
            exit();
            }else {
            $usr_error='<p id="error">Worng username or password !<p>';
            include_once('index.php');
            exit();
        }
    }
}
?>