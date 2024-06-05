<?php
// Connexion à la base de données MySQL
$mysqli = new mysqli("bg5zs2ozur1yedyhjewm-mysql.services.clever-cloud.com", "uk9nk1j4dbvbyild", "bg5zs2ozur1yedyhjewm", "bg5zs2ozur1yedyhjewm");

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
