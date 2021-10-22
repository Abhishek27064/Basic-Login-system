<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link href="/project/style.css" rel="stylesheet"> 
        <style>
            .hello{
                text-decoration: solid;
                color: black;
                margin-top: 250px;
            }

            p{
                font-size: 15px;
                margin: 15px;
            }

           a{
               font-size: 18px;
               margin: 15px;
               
           }

         a:hover{
             font-size: 22px;
             transition: 1s;
             background: black;
             color: white;
             border: 1px solid black;
             border-radius: 5px;
             padding: 5px;
         }
           
        </style>

    </head>

    <body>
        <h2 class="hello">Hello <?php echo $_SESSION['name'] ; ?>!</h2>
        <p>Thank you for visting my page I hope you like it!</p>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </body>
</html>

<?php }else{
    header("Location:login.php");
    exit();
}
?>

