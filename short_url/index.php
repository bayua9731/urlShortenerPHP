<?php 
    if (isset($_GET['error_id'])){
        if ($_GET['error_id']=="1"){
            echo "Password Salah";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortener</title>
    <style>
        
        .input1,.input2,.input3{
            padding-top: 10px;
        }

        .input1>label{
            padding-right: 10px;
        }

        .input2>label{
            padding-right: 13px;;
        }
        a{
            padding-right: 90px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="login_process.php" method="POST">
        <div class="input1">
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input2">
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input3">
            <a href="register.php">Create Account</a>
            <input type="submit" name="login" value="LOGIN">
        </div>
        </form>
    </div>
</body>

</html>