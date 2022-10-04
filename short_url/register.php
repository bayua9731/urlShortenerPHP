<?php
$cek = "";
if (isset($_GET['error_id_register'])) {
    if ($_GET['error_id_register'] == "1") {
        $cek = "Username Sudah Digunakan";
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
        .input1,
        .input2,
        .input3,
        .input4 {
            padding-top: 10px;
        }

        .input1>label {
            padding-right: 10px;
        }

        .input2>label {
            padding-right: 13px;
            ;
        }


        .input3>label {
            padding-right: 37px;
            ;
        }

        .input4 {
            padding-left: 180px;
        }

        a {
            padding-right: 90px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="register_process.php" method="POST">
            <div class="input3">
                <label for="">Nama</label>
                <input type="text" name="nama">
            </div>
            <div class="input1">
                <label for="">Username</label>
                <input type="text" name="username">
                <label for=""><?php echo $cek; ?></label>
            </div>
            <div class="input2">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <div class="input4">
                <input type="submit" name="submit" value="SUBMIT">
            </div>
        </form>
    </div>
</body>

</html>