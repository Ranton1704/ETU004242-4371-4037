projet: Takalo-Takalo
framework: FlightPHP MVC

https://www.creative-tim.com/bootstrap-themes/free

equipes:

  - responsable: Base_de_donnees
    description: Gestion complete de la base de donnees
    taches:
      - Creer la base de donnees Takalo
      - Creer les tables SQL (utilisateurs, categories, objets, photos_objets, echanges, historique_objets)
      - Verifier les cles etrangeres
      - Inserer les donnees de test
      - Tester les requetes principales
    livrables:
      - base.sql
      

  - responsable: Authentification
    description: Gestion des comptes utilisateurs
    taches:
      - Creer la page inscription
      - Creer la page connexion
      - Hasher les mots de passe
      - Verifier les mots de passe
      - Mettre en place les sessions
      - Creer la deconnexion
      - Proteger les pages reservees
    livrables:
      - AuthController.php
      - vues_login_register

  - responsable: Gestion_objets
    description: Gestion des objets par les utilisateurs
    taches:
      - Afficher la liste de mes objets
      - Ajouter un objet
      - Modifier un objet
      - Supprimer un objet
      - Associer un objet a une categorie
      - Gerer les photos des objets
      - Verifier les droits du proprietaire
    livrables:
      - ObjetController.php
      - vues_objets

  - responsable: Consultation_et_recherche
    description: Consultation publique des objets
    taches:
      - Afficher les objets disponibles
      - Exclure les objets de l utilisateur connecte
      - Afficher le detail d un objet
      - Afficher les photos
      - Afficher le proprietaire actuel
      - Afficher l historique des proprietaires
      - Recherche par mot cle
      - Filtre par categorie
    livrables:
      - vues_public
      - methodes_recherche

  - responsable: Echanges
    description: Gestion des propositions d echange
    taches:
      - Ajouter le bouton proposer un echange
      - Choisir un objet a proposer
      - Selectionner l objet demande
      - Creer une proposition d echange
      - Afficher les echanges envoyes
      - Afficher les echanges recus
      - Accepter un echange
      - Refuser un echange
    livrables:
      - EchangeController.php
      - vues_echanges

  - responsable: Logique_metier
    description: Regles critiques des echanges
    taches:
      - Changer les proprietaires lors d un echange accepte
      - Mettre a jour le statut de l echange
      - Enregistrer l historique des objets
      - Verifier la coherence des donnees
      - Bloquer les echanges invalides
    livrables:
      - fonctions_metier
      - tests_logique

  - responsable: Administration
    description: Gestion du back office
    taches:
      - Creer la page connexion admin
      - Pre remplir les identifiants admin
      - Restreindre l acces admin
      - Gerer les categories
      - Afficher les statistiques
      - Compter les utilisateurs
      - Compter les echanges acceptes
    livrables:
      - AdminController.php
      - vues_admin

  - responsable: Interface_et_finition
    description: Presentation et experience utilisateur
    taches:
      - Creer le menu de navigation
      - Afficher les messages d erreur et de succes
      - Appliquer un design simple
      - Ajouter le footer obligatoire
      - Afficher les noms des membres
      - Afficher les numeros ETU
    livrables:
      - layout
      - footer

  - responsable: Tests_et_validation
    description: Verification finale du projet
    taches:
      - Tester l authentification
      - Tester la gestion des objets
      - Tester la recherche
      - Tester les echanges complets
      - Tester le back office
      - Verifier l historique public
      - Verifier l absence d erreurs critiques
    livrables:
      - rapport_tests
