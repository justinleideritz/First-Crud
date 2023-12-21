<?php
    require("database-con.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $naamStudent = $_GET["naamStudent"];
            $klas = $_GET["klas"];
            $minutenTeLaat = $_GET["minutenTeLaat"];
            $redenTeLaat = $_GET["redenTeLaat"];
                $sql = "INSERT INTO crud (naam_student, klas, minuten_te_laat, reden_te_laat) 
                VALUES ('$naamStudent', '$klas', $minutenTeLaat, '$redenTeLaat')";
            
                $conn->exec($sql);
            
                header("location: index.php");
    }
?>
