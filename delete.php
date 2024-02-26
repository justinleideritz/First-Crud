<?php
require("database-con.php");

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    try {
        $query = "DELETE FROM crud WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $studentId);
        $sqlExec = $stmt->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
