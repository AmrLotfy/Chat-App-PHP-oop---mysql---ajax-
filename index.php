<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome to ChatApp</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h2 style="text-align:center;font-family:Intro;">Login Form</h2>
        <div class="login" id="loginDiv">
        <form method="post" action="pages/UserLogin.php" >
            <table> 
                <tr>
                    <td>Email:</td><td><input type="email" name="UserMailLogin" autocomplete="new"></td>
                </tr> 
                <tr>
                    <td>Password</td><td><input type="password" name="UserPasswordLogin" autocomplete="new-password"></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" value="Log In"></td>
                </tr> 
                <?php
                if(isset($_GET['error'])){
                ?>
                <tr>
                    <td></td><td><span style="color:red">ERROR LOGIN</span></td>
                </tr> 
                <?php
                }
                ?>
            </table>
         </form>
        </div>
        <br><br>
        <h2 style="text-align:center;font-family:Intro;">SignUp Form</h2>
        <div class="login" id="signupDiv">
            <form method="post" action="pages/InsertUser.php" >
            <table>
                <tr>
                    <td>Your Name:</td><td><input type="text" name="UserName" autocomplete="new"></td>
                </tr> 
                <tr>
                    <td>Your Email:</td><td><input type="email" name="UserMail" autocomplete="new"></td>
                </tr>
                <tr>
                    <td>Your PassWord:</td><td><input type="password" name="UserPassword" autocomplete="new-password"></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit" value="Sign Up"></td>
                </tr> 
                 <?php
                if(isset($_GET['success'])){
                ?>
                <tr>
                    <td></td><td><span style="color:green;font-family:Intro;">User Inserted</span></td>
                </tr>
                <?php
                }
                ?> 
         </table>
         </form>
        </div>


        <script src="../js/jquery-3.1.1.min.js"></script>
    </body>
</html>