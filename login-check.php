<?php
session_start();

include "conn.php";
if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if(empty($uname)){
        header("Location:login.php?error=Username is Required.");
        exit();
    }else if(empty($password)){
        header("Location:login.php?error=Password is Required.");
        exit();
    }else{
        $password = md5($password);
        $sql = " SELECT * FROM user_table WHERE user_name = '$uname' AND password = '$password'"; 
        $results = mysqli_query($conn,$sql);
        if(mysqli_num_rows($results) === 1){
            $rows = mysqli_fetch_assoc($results);
            if($rows['user_name'] === $uname && $rows['password'] === $password){
                $_SESSION['user_name'] = $rows['user_name'];
                $_SESSION['name'] = $rows['name'];
                $_SESSION['id'] = $rows['id'];
                header("Location:home.php");
            }else{
                header("Location:login.php?error=Incorrect Username or Password");
                exit();
            }
        }else{
            header("Location:login.php?error=Incorrect Username or Password. ");
            exit();
        }
    }
    

}else{
    header("Location:login.php");
    exit();
}

?>