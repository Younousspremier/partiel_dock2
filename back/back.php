<?php
$servername = "db"; // Utilisation du nom de service Docker pour la base de données
$username = "root";
$password = "root";
$dbname = "bdd_docker";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];

    $sql = "INSERT INTO news (content) VALUES (?)";
    $stmt = $conn->prepare($sql);

    // Vérifier si la préparation de la requête a réussi
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $content);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert news</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="back.php" method="post">
        <textarea name="content" rows="4" cols="50" placeholder="Enter your news here..."></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
