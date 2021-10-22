<?php
session_start();

include "conn.php";

if(isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['password1'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['name']);
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $password1=validate($_POST['password1']);
    $user_data= '&uname='. $uname. '&name='. $name;
    if(empty($uname)){
        header("Location:signup.php?error=Username is required$user_data");
        exit();
    }else if(empty($name)){
        header("Location:signup.php?error=Name is Required$user_data");
        exit();
    }else if(empty($password)){
        header("Location:signup.php?error=Password is Required$user_data");
        exit();
    }
    else if(empty($password1)){
        header("Location:signup.php?error=Confirm Password is Required$user_data");
        exit();
    }else if($password != $password1){
            header("Location:signup.php?error=Confirm password is not equal to Password$user_data");
    }else{
        $password = md5($password);
        $sql = "SELECT * FROM  user_table WHERE user_name='$uname'";
        $results = mysqli_query($conn,$sql);
        if(mysqli_num_rows($results)>1){
            header("Location:signup.php?errror=This Username is taken$user_data");
            exit();
        }else{
            $sql2= "INSERT INTO user_table(user_name,password,name) VALUES('$uname','$password','$name')";
            $results2 = mysqli_query($conn,$sql2);
            if($results2){
                header("Location:signup.php?done=Account created successfully.");
                exit();
            }else{
                header("Location:signup.php?error=Unknown error occurred$user_data.");
            }
        }
    }
}else{
    header("Location:signup.php");
    exit();
}
?>