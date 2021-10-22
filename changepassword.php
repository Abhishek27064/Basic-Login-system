<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Change password</title>
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            a{
                color: black;
            }

            
        </style>
    </head>
    <body>
        <form action="changepass-check.php" method="POST" class="signup">
            <h2>Change Password</h2>
            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>

            <?php if(isset($_GET['done'])){?>
            <p class="done"><?php echo $_GET['done'];?></p>
            <?php } ?>
            <label>Old Password</label>
            <input  name="op" placeholder="Old Password" type="password">
            <br>

            <label>New Password</label>
            <input name="np" placeholder="New Password" type="password" >
            <br>
            <p id="message">Password is <span id="strength"></span></p>


            <label>Confirm Password</label>
            <input name="cnp" placeholder="Confirm Password" type="password">
            <br>
            
            <button type="submit" class="button na">Change </button>
            <a href="home.php">HOME</a>
        </form>
     
    </body>
</html>


<?php }else{
    header("Location:login.php");
    exit();
} ?>