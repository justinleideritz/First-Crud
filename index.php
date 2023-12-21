<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te laat meldingen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        thead {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e2e2e2;
        }
        #verwijder {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            background-color: red;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        #verwijder:hover {
            background-color: #C72704;
        }
        #update, #form{
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        #update:hover, #form:hover {
            background-color: #2980b9;
        }
        .statistieken {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        require("database-con.php");

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th> <th>Naam student</th> <th>Klas</th> <th>Minuten te laat</th> <th>Reden te laat</th> <th>Verwijder</th> <th>Update</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($sqlTable as $rij) {
            echo "<tr>";
            echo "<td>" .$rij["id"]. "</td>";
            echo "<td>" .$rij["naam_student"]. "</td>";
            echo "<td>" .$rij["klas"]. "</td>";
            echo "<td>" .$rij["minuten_te_laat"]. "</td>";
            echo "<td>" .$rij["reden_te_laat"]. "</td>";
            echo "<td><a id='verwijder' href='verwijder.php?id=".$rij['id']."'</a>Verwijder</td>";
            echo "<td><a id='update' href='update.php?id=".$rij['id']."'</a>Update</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<br>";
        echo '<a id="form" href="form.php">Weer eentje te laat</a>';
        echo "<br>";
        echo "<br>";
        echo "<br>";
    ?>
    <hr>
    <div class="statistieken">
    <?php
        echo "<h2>Statistieken</h2>";
        $sql = "SELECT MAX(minuten_te_laat) AS highest_value FROM crud";
        
        try {
            $stmt = $conn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result['highest_value'])) {
                echo "Hoogste aantal minuten te laat: " . $result['highest_value'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        echo "<br>";

        $sql = "SELECT round(AVG(minuten_te_laat)) AS average_value FROM crud";
        try {
            $stmt = $conn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result['average_value'])) {
                echo "Gemiddelde minuten te laat: " . $result['average_value'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        echo "<br>";

        $sql = "SELECT SUM(minuten_te_laat) AS sum_value FROM crud";
        try {
            $stmt = $conn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result['sum_value'])) {
                echo "Totaal minuten te laat: " . $result['sum_value'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    ?>
    </div>
    <br>
    <hr>
    <script>
    function confirmDelete() {
        return confirm("Weet je zeker dat je deze regel wilt verwijderen?");
    }
</script>
</body>
</html>