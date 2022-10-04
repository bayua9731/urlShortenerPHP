<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortener</title>
    <style>
        .form-input {
            text-align: center;
        }

        .tabel {
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-input">
                <textarea name="link" id="textArea" cols="50" rows="10" placeholder="Masukkan URL "></textarea>
            </div>
            <div class="form-input">
                <input type="submit" name="button" value="GO">
            </div>
        </form>
    </div>

    <?php
    require_once("config.php");
    if (isset($_POST['button'])) {
        $urlLong = $_POST["link"];

        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DB_NAME);

        $delete=$mysqli->query("DELETE FROM url");
        $arr = explode("\n", $urlLong);
        $result = array();
        if (count($arr) != 0) {
            for ($j = 0; $j < count($arr); $j++) {
                if ($arr[$j] == "") continue;
                $character = "abcdefghijklmnopqrstuvwxyz1234567890";
                $panjang = 5;
                $jumlahData = 1;
                $code = "";
                while ($jumlahData != 0) {
                    for ($i = 0; $i <= $panjang; $i++) {
                        $random = rand() % strlen($character);
                        $temp = substr($character, $random, 1);
                        $code .= $temp;
                    }
                    $url = 'SELECT * FROM url WHERE url_short ="' . $code . '"';
                    $query = $mysqli->query($url);
                    $jumlahData = $query->num_rows;
                }

                $stmt = $mysqli->query('INSERT INTO url (url_long,url_short) VALUES ("' . ($arr[$j]) . '","' . $code . '")');

                $check = $mysqli->query('SELECT * FROM url WHERE url_short="' . $code . '"');
                $numrows = $check->num_rows;
                if ($numrows == 1) {
                    $site = "http://localhost/short_url/" . $code;
                    array_push($result, $site);
                } else {
                    echo "CODE TIDAK ADA";
                }
            }
            echo "<div class='tabel'>";
            echo "<table border='1'><tr><th>URL</th><th>SHORT URL</th></tr>";
            for ($k = 0; $k < count($result); $k++) {
                echo "<tr><td>" . $arr[$k] . "</td><td>" . $result[$k] . "</td></tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "Maaf URL Kosong";
        }
    }

    ?>
</body>

</html>