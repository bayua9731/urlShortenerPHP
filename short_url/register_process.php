<?php 
    require_once("config.php");
    if (isset($_POST['submit'])){
        $nama=$_POST['nama'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        $mysqli=new mysqli(SERVER,USERNAME,PASSWORD,DB_NAME);

        if ($mysqli->errno){
            echo "KONEKSI ERROR";
        }

        $stmt=$mysqli->query("SELECT * FROM akun where username='".$username."'");
        $data=$stmt->fetch_assoc();
        $idAkun=$data["id"];
        if($idAkun){
            header("location:register.php?error_id_register=1");
        }
        else{
            $url="INSERT INTO akun(nama_akun,username,pass) VALUES ('".$nama."','".$username."','".$password."')";
            $stmt2=$mysqli->query($url);
            header("location:index.php");
        }
    }
    else{
        header("location:register.php");
    }

?>