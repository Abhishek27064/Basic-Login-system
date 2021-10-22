<!DOCTYPE html>
<html>
    <head>
        <title>Signup Page</title>
        <link rel="stylesheet" href="style.css"> 
        <style>
            a{
                color: black;
            }
        </style>
        <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
    </head>
    <body>
        <form action="signup-check.php" method="POST" class="signup">
            <h2>Signup</h2>
            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>

            <?php if(isset($_GET['done'])){?>
            <p class="done"><?php echo $_GET['done'];?></p>
            <?php } ?>
            <label>Name</label>
            <?php if(isset($_GET['name'])){?>
            <input class="input1" name="name" placeholder="Name" type="text" value="<?php echo $_GET['name'];?>">
            <br>
            <?php }else{ ?>
            <input name="name" placeholder="Name" type="text" >
            <?php } ?>

            <label>User Name</label>
            <?php if(isset($_GET['uname'])) { ?>
            <input name="uname" placeholder="UserName" type="text" value="<?php echo $_GET['uname'];?>">
            <br>
            <?php }else{ ?>
            <input  name="uname" placeholder="UserName" type="text" >
            <?php } ?>

            <label>Password</label>
            <input name="password" placeholder="Password" type="password" >
            <br>
            <p id="message">Password is <span id="strength"></span></p>
            <label>Confirm Password</label>
            <input name="password1" placeholder="Confirm Password" type="password">
            <br>
            
            <a href="login.php">Already have an account</a>
            <button type="submit" class="button na">Signup</button>
        </form>
        
    </body>
</html>



