<?php

include_once('inc/connections.php');
if(empty($_POST['file'])){
        $error_img='please choose photo to upload';
        include_once('home.php');


}else{
    session_start();
}


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];



if(isset($_POST['submit'])){
       $file = $_FILES['file'];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];
        $file_tmp = $_FILES['file']['tmp_name'];
      
        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));
        $allowed = array('jpg', 'jpeg', 'png','svg' );
        if(in_array($file_actual_ext, $allowed)){
            if($file_error === 0){
                if($file_size < 2000000){
                    $file_name = uniqid('', true). '.'. $file_actual_ext;
                    $file_path = 'pic/'. $file_name;
                    
                    $sql = "UPDATE users SET profile_picture = '$file_name' WHERE username = '$username'";
                    $result = mysqli_query($conn,$sql);
                    move_uploaded_file($file_tmp, $file_path);
                    header('location: home.php');
                    

                
                }else{
                $error_img ='your photo is too big!';
               include_once('home.php');
                }
            }else{
                $error_img ='Error in upload photo!';
                include_once('home.php');
            }
            }else{
                $error_img ='Your cannot upload photo of this type!';
                include_once('home.php');
            }
        }

    


































}
