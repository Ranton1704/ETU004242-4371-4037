<?php
namespace app\controllers;

use Flight;

class FrontController {

    // Page d'accueil
    public static function welcome() {
        Flight::render('welcome', []);
    }

    // Formulaire login
    public static function loginForm() {
        Flight::render('login', []);
    }

    // Action login
    public static function login() {
        $data = Flight::request()->data;
        $email = $data['email'];
        $password = $data['mot_de_passe'];

        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['mot_de_passe'] === $password) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            Flight::redirect('/objets');
        } else {
            Flight::render('login', ['error' => 'Email ou mot de passe incorrect']);
        }
    }

    // Formulaire inscription
    public static function registerForm() {
        Flight::render('register', []);
    }

    // Action inscription
    public static function register() {
        $data = Flight::request()->data;
        $db = Flight::db();

        // Insérer l'utilisateur
        $stmt = $db->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([
            $data['nom_utilisateur'],
            $data['email'],
            $data['mot_de_passe']
        ]);

        Flight::redirect('/login');
    }

    // Liste de tous les objets
    public static function listeObjets() {
        $db = Flight::db();
        $stmt = $db->query("
            SELECT o.id, o.nom, o.description, o.prix_estime, c.nom AS categorie, 
                   (SELECT chemin_photo FROM photos_objets WHERE objet_id = o.id LIMIT 1) AS photo
            FROM objets o
            LEFT JOIN categories c ON o.categorie_id = c.id
        ");
        $objets = $stmt->fetchAll();
        Flight::render('objets', ['objets' => $objets]);
    }

    // Fiche objet
    public static function ficheObjet($id) {
        $db = Flight::db();
        $stmt = $db->prepare("
            SELECT o.id, o.nom, o.description, o.prix_estime, c.nom AS categorie, u.nom_utilisateur
            FROM objets o
            LEFT JOIN categories c ON o.categorie_id = c.id
            LEFT JOIN utilisateurs u ON o.proprietaire_id = u.id
            WHERE o.id = ?
        ");
        $stmt->execute([$id]);
        $objet = $stmt->fetch();

        // Photos
        $stmt = $db->prepare("SELECT chemin_photo FROM photos_objets WHERE objet_id = ?");
        $stmt->execute([$id]);
        $photos = $stmt->fetchAll();

        Flight::render('fiche_objet', ['objet' => $objet, 'photos' => $photos]);
    }

    // Historique d’un objet
    public static function historiqueObjet($objet_id) {
        $db = Flight::db();
        $stmt = $db->prepare("
            SELECT h.date_changement, u.nom_utilisateur
            FROM historique_objets h
            JOIN utilisateurs u ON h.utilisateur_id = u.id
            WHERE h.objet_id = ?
            ORDER BY h.date_changement ASC
        ");
        $stmt->execute([$objet_id]);
        $historique = $stmt->fetchAll();
        Flight::render('historique_objet', ['historique' => $historique]);
    }

    // Liste des échanges pour l'utilisateur connecté
    public static function listeEchanges() {
        session_start();
        $user_id = $_SESSION['user_id'];
        $db = Flight::db();

        $stmt = $db->prepare("
            SELECT e.*, o1.nom AS objet_propose, o2.nom AS objet_demande, u.nom_utilisateur AS receveur
            FROM echanges e
            JOIN objets o1 ON e.objet_propose_id = o1.id
            JOIN objets o2 ON e.objet_demande_id = o2.id
            JOIN utilisateurs u ON e.utilisateur_receveur_id = u.id
            WHERE e.utilisateur_proposeur_id = ? OR e.utilisateur_receveur_id = ?
            ORDER BY e.date_creation DESC
        ");
        $stmt->execute([$user_id, $user_id]);
        $echanges = $stmt->fetchAll();

        Flight::render('echanges', ['echanges' => $echanges]);
    }

    // Proposer un échange
    public static function proposerEchange() {
        session_start();
        $user_id = $_SESSION['user_id'];
        $data = Flight::request()->data;

        $db = Flight::db();
        $stmt = $db->prepare("
            INSERT INTO echanges (utilisateur_proposeur_id, utilisateur_receveur_id, objet_propose_id, objet_demande_id)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $user_id,
            $data['utilisateur_receveur_id'],
            $data['objet_propose_id'],
            $data['objet_demande_id']
        ]);

        Flight::redirect('/echanges');
    }

    // Répondre à un échange (accepter/refuser)
    public static function repondreEchange($id) {
        session_start();
        $data = Flight::request()->data;
        $statut = $data['statut']; // 'accepte' ou 'refuse'
        $db = Flight::db();

        // Mettre à jour le statut
        $stmt = $db->prepare("UPDATE echanges SET statut = ?, date_reponse = NOW() WHERE id = ?");
        $stmt->execute([$statut, $id]);

        // Si accepté, échanger les propriétaires et mettre dans l'historique
        if ($statut === 'accepte') {
            $stmt = $db->prepare("SELECT objet_propose_id, objet_demande_id, utilisateur_proposeur_id, utilisateur_receveur_id FROM echanges WHERE id = ?");
            $stmt->execute([$id]);
            $echange = $stmt->fetch();

            // Mettre à jour les propriétaires
            $stmt = $db->prepare("UPDATE objets SET proprietaire_id = ? WHERE id = ?");
            $stmt->execute([$echange['utilisateur_receveur_id'], $echange['objet_propose_id']]);
            $stmt->execute([$echange['utilisateur_proposeur_id'], $echange['objet_demande_id']]);

            // Ajouter dans l'historique
            $stmt = $db->prepare("INSERT INTO historique_objets (objet_id, utilisateur_id, echange_id) VALUES (?, ?, ?)");
            $stmt->execute([$echange['objet_propose_id'], $echange['utilisateur_receveur_id'], $id]);
            $stmt->execute([$echange['objet_demande_id'], $echange['utilisateur_proposeur_id'], $id]);
        }

        Flight::redirect('/echanges');
    }

}
