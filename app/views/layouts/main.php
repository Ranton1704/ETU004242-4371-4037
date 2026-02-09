<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Takalo-Takalo - Plateforme d'échanges</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="échange, troc, objets" name="keywords">
    <meta content="Plateforme d'échange d'objets entre utilisateurs" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="/" class="text-muted me-2">Accueil</a><small> / </small>
                    <a href="/objets" class="text-muted mx-2">Objets</a><small> / </small>
                    <a href="/echanges" class="text-muted ms-2">Échanges</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Plateforme d'échanges d'objets</small>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="/logout" class="text-muted ms-2"><small><i class="fa fa-sign-out-alt me-2"></i>Déconnexion</small></a>
                    <?php else: ?>
                        <a href="/login" class="text-muted me-2"><small><i class="fa fa-user me-2"></i>Connexion</small></a>
                        <a href="/register" class="text-muted ms-2"><small><i class="fa fa-user-plus me-2"></i>Inscription</small></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo & Search -->
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="display-5 text-primary m-0"><i class="fas fa-exchange-alt text-secondary me-2"></i>Takalo</h1>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center">
                <form action="/objets" method="get" class="position-relative ps-4">
                    <div class="d-flex border rounded-pill">
                        <input class="form-control border-0 rounded-pill w-100 py-3" type="text" name="search" placeholder="Rechercher un objet...">
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="/objets" class="text-muted d-flex align-items-center justify-content-center me-3">
                        <span class="rounded-circle btn-md-square border"><i class="fas fa-th-list"></i></span>
                    </a>
                    <a href="/echanges" class="text-muted d-flex align-items-center justify-content-center">
                        <span class="rounded-circle btn-md-square border"><i class="fas fa-handshake"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>Catégories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <li><div class="categories-bars-item"><a href="/objets?cat=1">Électronique</a></div></li>
                                <li><div class="categories-bars-item"><a href="/objets?cat=2">Vêtements</a></div></li>
                                <li><div class="categories-bars-item"><a href="/objets?cat=3">Maison</a></div></li>
                                <li><div class="categories-bars-item"><a href="/objets?cat=4">Sports</a></div></li>
                                <li><div class="categories-bars-item"><a href="/objets?cat=5">Livres</a></div></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                    <a href="/" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i class="fas fa-exchange-alt text-white me-2"></i>Takalo</h1>
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="/" class="nav-item nav-link">Accueil</a>
                            <a href="/objets" class="nav-item nav-link">Objets</a>
                            <a href="/echanges" class="nav-item nav-link">Mes Échanges</a>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <a href="/admin" class="nav-item nav-link">Admin</a>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="/logout" class="nav-item nav-link">Déconnexion</a>
                            <?php else: ?>
                                <a href="/login" class="nav-item nav-link">Connexion</a>
                                <a href="/register" class="nav-item nav-link">Inscription</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Content Start -->
    <?= $content ?? '' ?>
    <!-- Content End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Takalo-Takalo</h4>
                        <p class="mb-3">Plateforme d'échange d'objets entre utilisateurs. Échangez vos objets facilement et en toute confiance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Navigation</h4>
                        <a href="/"><i class="fas fa-angle-right me-2"></i>Accueil</a>
                        <a href="/objets"><i class="fas fa-angle-right me-2"></i>Objets disponibles</a>
                        <a href="/echanges"><i class="fas fa-angle-right me-2"></i>Mes échanges</a>
                        <a href="/login"><i class="fas fa-angle-right me-2"></i>Connexion</a>
                        <a href="/register"><i class="fas fa-angle-right me-2"></i>Inscription</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Équipe</h4>
                        <p>ETU004242</p>
                        <p>ETU004371</p>
                        <p>ETU004037</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><i class="fas fa-copyright text-light me-2"></i>Takalo-Takalo - Projet L2</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    FlightPHP MVC - Examen S3
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
</body>

</html>
