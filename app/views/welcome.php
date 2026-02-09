<!-- Carousel Start -->
<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="header-carousel owl-carousel bg-light py-5">
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="/img/carousel-1.png" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">Bienvenue sur Takalo-Takalo</h4>
                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Échangez vos objets facilement</h1>
                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Trouvez des objets qui vous intéressent et proposez un échange !</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="/objets">Voir les objets</a>
                    </div>
                </div>
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="/img/carousel-2.png" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">Plateforme d'échanges</h4>
                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Donnez une seconde vie à vos objets</h1>
                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Inscrivez-vous et commencez à échanger dès maintenant.</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="/register">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Services Start -->
<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-3 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-exchange-alt fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Échanges Faciles</h6>
                        <p class="mb-0">Proposez et acceptez des échanges simplement</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-users fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Communauté</h6>
                        <p class="mb-0">Rejoignez notre communauté d'échangeurs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-lock fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Sécurisé</h6>
                        <p class="mb-0">Échangez en toute confiance</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.4s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-recycle fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Écologique</h6>
                        <p class="mb-0">Donnez une seconde vie aux objets</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Info Section -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                    <div>
                        <p class="text-muted mb-3">Vous avez des objets à échanger ?</p>
                        <h3 class="text-primary">Publiez vos objets</h3>
                        <a href="/login" class="btn btn-primary rounded-pill py-2 px-4 mt-3">Commencer</a>
                    </div>
                    <i class="fas fa-box fa-5x text-secondary"></i>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <div class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                    <div>
                        <p class="text-muted mb-3">Trouvez ce dont vous avez besoin</p>
                        <h3 class="text-primary">Parcourez les objets</h3>
                        <a href="/objets" class="btn btn-secondary rounded-pill py-2 px-4 mt-3">Voir tout</a>
                    </div>
                    <i class="fas fa-search fa-5x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(!empty($message)) { ?>
    <div class="container mt-3"><div class="alert alert-info"><?php echo $message; ?></div></div>
<?php } ?>