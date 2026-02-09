<!-- Page Title -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <h1 class="display-5 text-primary mb-0">Objets disponibles</h1>
        <p class="text-muted">Parcourez les objets et proposez un échange</p>
    </div>
</div>

<!-- Products Section -->
<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="row g-4">
            <?php if (empty($objets)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>Aucun objet disponible pour le moment.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($objets as $objet): ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item-inner border rounded">
                                <div class="product-item-inner-item">
                                    <?php if (!empty($objet['photo'])): ?>
                                        <img src="<?= htmlspecialchars($objet['photo']) ?>" class="img-fluid w-100 rounded-top" alt="<?= htmlspecialchars($objet['nom']) ?>" style="height: 200px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded-top" style="height: 200px;">
                                            <i class="fas fa-image fa-4x text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="product-details">
                                        <a href="/objets/<?= $objet['id'] ?>"><i class="fa fa-eye fa-1x"></i></a>
                                    </div>
                                </div>
                                <div class="text-center rounded-bottom p-4">
                                    <span class="badge bg-secondary mb-2"><?= htmlspecialchars($objet['categorie'] ?? 'Sans catégorie') ?></span>
                                    <a href="/objets/<?= $objet['id'] ?>" class="d-block h5"><?= htmlspecialchars($objet['nom']) ?></a>
                                    <p class="text-muted small"><?= htmlspecialchars(substr($objet['description'] ?? '', 0, 80)) ?>...</p>
                                    <?php if (!empty($objet['prix_estime'])): ?>
                                        <span class="text-primary fs-5"><?= number_format($objet['prix_estime'], 0, ',', ' ') ?> Ar</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                <a href="/objets/<?= $objet['id'] ?>" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-2">
                                    <i class="fas fa-eye me-2"></i>Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
