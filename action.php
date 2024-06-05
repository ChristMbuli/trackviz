<?php require('./api.php'); ?>
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
                VizBoard pour optimiser l'expérience utilisateur. Découvrez TrackViz, la création de <a href="https://portfolio-frontend-three-kappa.vercel.app/">Christ
                    Mbuli</a>.</p>


            <p class="text-xs text-gray-600 text-center mt-8">&copy; 2024 Christ Mbuli, All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>
