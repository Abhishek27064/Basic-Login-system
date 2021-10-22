<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    include "conn.php";
    if(isset($_POST['op']) && isset($_POST['np']) && isset($_POST['cnp'])){
            function validate($data){
                $data = trim($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }
            $op = validate($_POST['op']);
            $np = validate($_POST['np']);
            $cnp = validate($_POST['cnp']);

            if(empty($op)){
                header("Location: changepassword.php?error=Old password is required");
                exit();
            }else if(empty($np)){
                header("Location: changepassword.php?error=New password is required");
                exit();
            }else if(empty($cnp)){
                header("Location: changepassword.php?error=Confirm password is required");
                exit();
            }else if($np != $cnp){
                header("Location: changepassword.php?error=New password doesnt match confirm password");
                exit();
            }else{
                $op = md5($op);
                $np = md5($np);
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM user_table WHERE id='$id' AND password='$op'";
                $results = mysqli_query($conn,$sql);
                if(mysqli_num_rows($results)===1){
                    $sql2="UPDATE user_table SET password='$np' WHERE id='$id'";
                    $results2 = mysqli_query($conn,$sql2);
                    header("Location: changepassword.php?done=New Password Updated.");
                    exit();
                }else{
                    header("Location: changepassword.php?error=Incorrect Old password");
                    exit();
                }
            }
    }else{
        header("Location: changepassword.php");
        exit();
    }


}else{
    header("Location: home.php");
    exit();
} ?>