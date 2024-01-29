<?php
include('inc/connections.php');
if(isset($_POST['submit'])){
     $username = stripcslashes(strtolower( $_POST['username']));
     $email = stripcslashes ($_POST['email']);


    if (isset($_POST['email'])) {
        $username = "root";
        $password = "";
        $database = new PDO("mysql:host=localhost; dbname=ma7rez;", $username, $password);
        $checkEmail = $database->prepare("SELECT email FROM users WHERE EMAIL = :email ");
        $checkEmail->bindParam("email", $_POST['email']);
        $checkEmail->execute();
        if ($checkEmail->rowCount() > 0) {
            $usr_error
            = '<p id="error">لديك حساب بالفعل<p>';
            $err_s = 1;
        }}
     $password = stripcslashes ($_POST['password']);
     if(isset($_POST['birthday_month'])&& isset($_POST['birthday_day'])&& isset($_POST['birthday_year']))
             {
            $birthday_month=(int)$_POST['birthday_month'];
    
            $birthday_day=(int)$_POST['birthday_day'];
    
             $birthday_year=(int)$_POST['birthday_year'];
     
             $birthday = htmlentities(mysqli_real_escape_string($conn,$birthday_month.'-'.$birthday_day.'-'.$birthday_year));
            }
     $username = htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
     $email = htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
     $password = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
     $md5_pass = md5($password);
                         if(isset($_POST['gender'])){
    $gender =($_POST['gender']);
    $gender = htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
    if(!in_array($gender,['male','female'])){
        $gender_error='<p id="error">please choose gender not atext !<p> <br>';
        $err_s=1;

         }
       }

                $check_user = "SELECT * FROM`users`WHERE username='$username'" ;
            $check_result =mysqli_query($conn,$check_user);
        $num_rows =mysqli_num_rows($check_result);
if($num_rows!=0){
    $usr_error ='<p id="error">sorry username already ,chnge another one<p>';
        $err_s=1;
}

if(empty($username)){
    $usr_error='<p id="error">please enter username<p>';
        $err_s=1;


}elseif(strlen($username)<6){
    $usr_error = '<p id="error">your username needs to have aminimum of 6 letter <p>';
        $err_s=1;

}elseif(filter_var($username,FILTER_VALIDATE_INT)){
    $usr_error='<p id="error">please enter a valid username<p> ';
        $err_s=1;

}

if(empty($email)){
    $email_error='<p id="error">plese insert email<p>';
        $err_s=1;
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $email_error='<p id="error">plese insert email<p>';
        $err_s=1;
}
if(empty($gender)){
    $gender_error='<p id="error">plese choose gender<p>';
         $err_s=1;

}

if(empty($birthday)){
    $birthday_error='<p id="error">plese insert date of birthday<p> ';
        $err_s=1;
}
   

if(empty($password)){
    $pass_error='<p id="error">plese insert password <p>';
        $err_s=1;
    include('Register.php');
}elseif(strlen($password)<6){
    $pass_error = '<p id="error">your password needs to have aminimum of 6 letter<p>';
        $err_s=1;
    include('Register.php');
 }else{
    if(($err_s==0)&&($num_rows==0)){
        if($gender=='male'){
         $picture='images.jpeg';
        }
        elseif($gender=='female'){
            $picture='female.jpeg';
        }

        $sql="INSERT INTO users(username,email,password,birthday,gender,md5_pass,profile_picture)
        VALUES('$username','$email','$password','$birthday','$gender','$md5_pass','$picture')";
        mysqli_query($conn,$sql);
        header('location:index.php');

    }else{
        include('Register.php');

    }

}

}





















