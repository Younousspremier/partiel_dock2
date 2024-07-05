<!DOCTYPE html>
<html>
<head>
    <title>News Display</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>News</h1>
    <div class="news-container">
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

    // Spécifier l'encodage UTF-8
    $conn->set_charset("utf8");

    $sql = "SELECT content, created_at FROM news ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='news-item'><p>" . htmlspecialchars($row["content"]) . "</p><span>" . $row["created_at"] . "</span></div>";
        }
    } else {
        echo "No news found";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
