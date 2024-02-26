<?php
require("database-con.php");

if (isset($_GET['updateStudent'])) {
    $studentId = $_GET['studentId'];
    $studentName = $_GET['naamStudent'];
    $klas = $_GET['klas'];
    $minutenTeLaat = $_GET['minutenTeLaat'];
    $redenTeLaat = $_GET['redenTeLaat'];

    try {
        $sqlUpdate = "UPDATE crud SET naam_student=:studentNaam, klas=:klas, minuten_te_laat=:minutenTeLaat, reden_te_laat=:redenTeLaat WHERE id=:studentId";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bindParam(':studentId', $studentId);
        $stmt->bindParam(':studentNaam', $studentName);
        $stmt->bindParam(':klas', $klas);
        $stmt->bindParam(':minutenTeLaat', $minutenTeLaat);
        $stmt->bindParam(':redenTeLaat', $redenTeLaat);
        $updateExec = $stmt->execute();
        header("Location: index.php");
    } catch (PDOexception $e) {
        echo $e->getMessage();
    }
}
