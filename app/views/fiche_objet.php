<!-- Page Title -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item"><a href="/objets">Objets</a></li>
                <li class="breadcrumb-item active"><?= htmlspecialchars($objet['nom'] ?? 'Détail') ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Product Detail -->
<div class="container py-5">
    <?php if (empty($objet)): ?>
        <div class="alert alert-warning text-center">
            <i class="fas fa-exclamation-triangle me-2"></i>Objet non trouvé.
        </div>
    <?php else: ?>
        <div class="row g-5">
            <!-- Images -->
            <div class="col-lg-6">
                <div class="border rounded p-3">
                    <?php if (!empty($photos) && count($photos) > 0): ?>
                        <div class="single-carousel owl-carousel">
                            <?php foreach ($photos as $photo): ?>
                                <div class="single-carousel-item">
                                    <img src="<?= htmlspecialchars($photo['chemin_photo']) ?>" class="img-fluid w-100 rounded" alt="Photo" style="max-height: 400px; object-fit: contain;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                            <i class="fas fa-image fa-5x text-muted"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Details -->
            <div class="col-lg-6">
                <span class="badge bg-secondary mb-3"><?= htmlspecialchars($objet['categorie'] ?? 'Sans catégorie') ?></span>
                <h2 class="display-6 mb-3"><?= htmlspecialchars($objet['nom']) ?></h2>
                
                <?php if (!empty($objet['prix_estime'])): ?>
                    <h3 class="text-primary mb-4"><?= number_format($objet['prix_estime'], 0, ',', ' ') ?> Ar</h3>
                <?php endif; ?>
                
                <p class="text-muted mb-4"><?= nl2br(htmlspecialchars($objet['description'] ?? 'Pas de description')) ?></p>
                
                <div class="bg-light rounded p-4 mb-4">
                    <h5><i class="fas fa-user me-2 text-primary"></i>Propriétaire</h5>
                    <p class="mb-0 fs-5"><?= htmlspecialchars($objet['nom_utilisateur'] ?? 'Inconnu') ?></p>
                </div>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="/echanges/proposer" method="POST">
                        <input type="hidden" name="objet_demande_id" value="<?= $objet['id'] ?>">
                        <input type="hidden" name="utilisateur_receveur_id" value="<?= $objet['proprietaire_id'] ?? '' ?>">
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">
                            <i class="fas fa-exchange-alt me-2"></i>Proposer un échange
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/login" class="btn btn-secondary rounded-pill py-3 px-5">
                        <i class="fas fa-sign-in-alt me-2"></i>Connectez-vous pour échanger
                    </a>
                <?php endif; ?>
                
                <hr class="my-4">
                
                <a href="/historique/<?= $objet['id'] ?>" class="btn btn-outline-primary rounded-pill">
                    <i class="fas fa-history me-2"></i>Voir l'historique des propriétaires
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>
