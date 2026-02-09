<?php
namespace app\controllers;

use Flight;

class AdminController {

    // Dashboard admin
    public static function dashboard() {
        Flight::render('admin/dashboard', []);
    }

    // Liste des catégories
    public static function listeCategories() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM categories");
        $categories = $stmt->fetchAll();
        Flight::render('admin/categories', ['categories' => $categories]);
    }

    // Ajouter une catégorie
    public static function ajouterCategorie() {
        $data = Flight::request()->data;
        $db = Flight::db();
        $stmt = $db->prepare("INSERT INTO categories (nom) VALUES (?)");
        $stmt->execute([$data['nom']]);
        Flight::redirect('/admin/categories');
    }

    // Statistiques : nombre utilisateurs / échanges
    public static function statistiques() {
        $db = Flight::db();

        $stmt = $db->query("SELECT COUNT(*) AS total_utilisateurs FROM utilisateurs");
        $total_utilisateurs = $stmt->fetch();

        $stmt = $db->query("SELECT COUNT(*) AS total_echanges FROM echanges WHERE statut = 'accepte'");
        $total_echanges = $stmt->fetch();

        Flight::render('admin/statistiques', [
            'total_utilisateurs' => $total_utilisateurs['total_utilisateurs'],
            'total_echanges' => $total_echanges['total_echanges']
        ]);
    }
}
