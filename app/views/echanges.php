<!-- Page Title -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <h1 class="display-5 text-primary mb-0">Mes Échanges</h1>
        <p class="text-muted">Gérez vos propositions d'échange</p>
    </div>
</div>

<!-- Echanges List -->
<div class="container py-5">
    <?php if (empty($echanges)): ?>
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Vous n'avez aucun échange en cours.
            <br><br>
            <a href="/objets" class="btn btn-primary rounded-pill">Parcourir les objets</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($echanges as $echange): ?>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Échange #<?= $echange['id'] ?></span>
                            <?php
                            $statusClass = 'bg-warning';
                            $statusText = 'En attente';
                            if ($echange['statut'] === 'accepte') {
                                $statusClass = 'bg-success';
                                $statusText = 'Accepté';
                            } elseif ($echange['statut'] === 'refuse') {
                                $statusClass = 'bg-danger';
                                $statusText = 'Refusé';
                            }
                            ?>
                            <span class="badge <?= $statusClass ?>"><?= $statusText ?></span>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-5">
                                    <div class="bg-light rounded p-3">
                                        <i class="fas fa-gift fa-2x text-primary mb-2"></i>
                                        <p class="mb-0 small text-muted">Objet proposé</p>
                                        <p class="fw-bold mb-0"><?= htmlspecialchars($echange['objet_propose'] ?? 'N/A') ?></p>
                                    </div>
                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-exchange-alt fa-2x text-secondary"></i>
                                </div>
                                <div class="col-5">
                                    <div class="bg-light rounded p-3">
                                        <i class="fas fa-box fa-2x text-secondary mb-2"></i>
                                        <p class="mb-0 small text-muted">Objet demandé</p>
                                        <p class="fw-bold mb-0"><?= htmlspecialchars($echange['objet_demande'] ?? 'N/A') ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <p class="small text-muted mb-2">
                                <i class="fas fa-user me-1"></i>Avec: <?= htmlspecialchars($echange['receveur'] ?? 'N/A') ?>
                            </p>
                            <p class="small text-muted mb-0">
                                <i class="fas fa-calendar me-1"></i>Créé le: <?= date('d/m/Y H:i', strtotime($echange['date_creation'] ?? 'now')) ?>
                            </p>
                        </div>
                        
                        <?php if ($echange['statut'] === 'en_attente' && isset($_SESSION['user_id']) && $echange['utilisateur_receveur_id'] == $_SESSION['user_id']): ?>
                            <div class="card-footer bg-white">
                                <form action="/echanges/<?= $echange['id'] ?>/repondre" method="POST" class="d-flex gap-2">
                                    <button type="submit" name="statut" value="accepte" class="btn btn-success rounded-pill flex-fill">
                                        <i class="fas fa-check me-1"></i>Accepter
                                    </button>
                                    <button type="submit" name="statut" value="refuse" class="btn btn-danger rounded-pill flex-fill">
                                        <i class="fas fa-times me-1"></i>Refuser
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
