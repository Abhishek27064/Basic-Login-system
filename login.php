<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
       
    </head>
    <body>
        <form action="login-check.php" method="POST" class="login">
            <h2>LOGIN</h2>
            <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ;?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="Username">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            
            <a href="signup.php">Create an Account</a>
            <button type="submit" class="button">Login</button>
        </form>

        

    </body>
</html>