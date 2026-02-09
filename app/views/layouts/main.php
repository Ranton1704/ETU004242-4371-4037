<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Takalo-Takalo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Takalo-Takalo</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="/register">Inscription</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <?= $content ?>  <!-- Ici s'affichent les pages -->
</div>

<footer class="text-center mt-4 p-3 bg-light">
    <small>Projet Takalo-Takalo - ETU004242 & ETU004437</small>
</footer>
</body>
</html>
