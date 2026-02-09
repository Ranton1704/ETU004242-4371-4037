<!-- Page Title -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <h1 class="display-5 text-primary mb-0">Inscription</h1>
        <p class="text-muted">Créez votre compte pour commencer à échanger</p>
    </div>
</div>

<!-- Register Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-4x text-primary"></i>
                    </div>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="/register" method="POST">
                        <div class="mb-4">
                            <label for="nom_utilisateur" class="form-label">Nom d'utilisateur</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" placeholder="Votre pseudo" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Adresse email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="mot_de_passe" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="********" required>
                            </div>
                        </div>
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary rounded-pill py-3">
                                <i class="fas fa-user-plus me-2"></i>Créer mon compte
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center">
                        <p class="text-muted mb-0">Déjà inscrit ?</p>
                        <a href="/login" class="text-primary fw-bold">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
