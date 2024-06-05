<?php
// Connexion à la base de données MySQL
$mysqli = new mysqli("big9zr6gztwcr6rs0ryr-mysql.services.clever-cloud.com", "ueoaj9ywgtalblbi", "geeNq3qH4E3DyOzzl6As", "big9zr6gztwcr6rs0ryr");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Récupérer l'adresse IP du visiteur
$ip_address = $_SERVER['REMOTE_ADDR'];

// Insérer la visite dans la table visitors
$insert_visitor_query = "INSERT INTO visitors (ip_address, visit_time) VALUES ('$ip_address', NOW())";
$mysqli->query($insert_visitor_query);

// Mettre à jour le nombre de visites pour la journée actuelle
$today_date = date("Y-m-d");
$update_daily_visits_query = "INSERT INTO daily_visits (visit_date, visit_count) VALUES ('$today_date', 1)
                              ON DUPLICATE KEY UPDATE visit_count = visit_count + 1";
$mysqli->query($update_daily_visits_query);

// Récupérer le nombre de visites pour la journée actuelle
$get_daily_visits_query = "SELECT visit_count FROM daily_visits WHERE visit_date = '$today_date'";
$result = $mysqli->query($get_daily_visits_query);
$row = $result->fetch_assoc();
$daily_visits = $row['visit_count'];


// Fermer la connexion à la base de données
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackViz</title>
    <link rel="shortcut icon" href="./TrackViz.png" class="rounded" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-8">
                <img src="./logo.png" alt="Logo" class="w-40 h-30">
            </div>
            <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Nombre Visiteurs :
                <?= $daily_visits ?>
            </h1>
            <p class="text-sm text-gray-600 text-justify mt-8 mb-6">Plongez dans TrackViz : la solution de suivi des
                visiteurs par excellence. Suivez les activités de vos visiteurs en temps réel, explorez les données avec
                VizBoard pour optimiser l'expérience utilisateur. Découvrez TrackViz, la création de <a href="#">Christ
                    Mbuli</a>.</p>


            <p class="text-xs text-gray-600 text-center mt-8">&copy; 2024 Christ Mbuli, All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>
