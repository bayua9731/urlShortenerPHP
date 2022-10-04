<?php 
    require_once("config.php");
    if (isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $mysqli=new mysqli(SERVER,USERNAME,PASSWORD,DB_NAME);

        if ($mysqli->errno){
            echo "KONEKSI ERROR";
        }

        $stmt=$mysqli->query("SELECT * FROM akun where username='".$username."' and pass='".$password."'");
        $data=$stmt->fetch_assoc();
        $idAkun=$data["id"];
        if($idAkun){
            header("location:short.php");
        }
        else{
            header("location:index.php?error_id=1");
        }
    }
    else{
        header("location:index.php");
    }

?>