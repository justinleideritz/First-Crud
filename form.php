<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student toevoegen</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 6px;
}

input[type="text"],
input[type="number"] {
    width: 95%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #3498db;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}
    </style>
</head>
<body>
    <form action="formExec.php" method="GET">
    <h2>Student toevoegen</h2>
    <br>
    <label for="naamStudent">Naam student:</label>
    <input type="text" name="naamStudent" id="naamStudent" required maxlength="20">
    <label for="klas">Klas:</label>
    <input type="text" name="klas" id="klas" required maxlength="5">
    <label for="minutenTeLaat">Minuten te laat:</label>
    <input type="number" name="minutenTeLaat" id="minutenTelaat" min="0" required>
    <label for="redenTelaat">Reden te laat:</label>
    <input type="text" name="redenTeLaat" id="redenTeLaat" required maxlength="40">
    <input type="submit" value="Opslaan">
    </form>
</body>
</html>