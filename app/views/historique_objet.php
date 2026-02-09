<!-- Page Title -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item"><a href="/objets">Objets</a></li>
                <li class="breadcrumb-item active">Historique</li>
            </ol>
        </nav>
        <h1 class="display-5 text-primary mt-3 mb-0">Historique des propriétaires</h1>
    </div>
</div>

<!-- Historique -->
<div class="container py-5">
    <?php if (empty($historique)): ?>
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Aucun historique disponible pour cet objet.
        </div>
    <?php else: ?>
        <div class="timeline">
            <?php foreach ($historique as $index => $item): ?>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-4" style="width: 50px; height: 50px;">
                            <?= $index + 1 ?>
                        </div>
                        <div>
                            <h5 class="mb-1"><?= htmlspecialchars($item['nom_utilisateur']) ?></h5>
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar me-1"></i>
                                <?= date('d/m/Y à H:i', strtotime($item['date_changement'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="text-center mt-4">
        <a href="/objets" class="btn btn-secondary rounded-pill py-2 px-4">
            <i class="fas fa-arrow-left me-2"></i>Retour aux objets
        </a>
    </div>
</div>
