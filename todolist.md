projet: Takalo-Takalo
framework: FlightPHP MVC


etapes:

  - etape: 1
    titre: Mise en place technique
    description: >
      Préparer l'environnement de travail, la base de données
      et vérifier que le projet FlightPHP fonctionne correctement.
    taches:
      - Creer la base de donnees Takalo
      - Creer les tables SQL (utilisateurs, categories, objets, photos, echanges, historique)
      - Inserer des donnees de test (admin, utilisateurs, objets, echanges)
      - Configurer la connexion a la base de donnees dans config.php

  - etape: 2
    titre: Authentification des utilisateurs
    description: >
      Permettre aux utilisateurs de creer un compte et de se connecter.
    taches:
      - Creer la page inscription utilisateur
      - Creer la page connexion utilisateur
      - Hasher les mots de passe avec password_hash
      - Verifier les identifiants avec password_verify
      - Gerer les sessions (login / logout)
      - Proteger les pages reservees aux utilisateurs connectes

  - etape: 3
    titre: Gestion des objets par l'utilisateur
    description: >
      Chaque utilisateur peut gerer ses propres objets a echanger.
    taches:
      - Afficher la liste de mes objets
      - Ajouter un objet (nom, description, prix estime, categorie)
      - Ajouter une ou plusieurs photos a un objet
      - Modifier un objet (seulement le proprietaire)
      - Supprimer un objet (seulement le proprietaire)

  - etape: 4
    titre: Consultation des objets
    description: >
      Permettre aux utilisateurs de consulter les objets des autres utilisateurs.
    taches:
      - Afficher la liste des objets disponibles
      - Exclure mes propres objets de la liste publique
      - Afficher la fiche detaillee d un objet
      - Afficher les photos de l objet
      - Afficher le proprietaire actuel
      - Afficher l historique des proprietaires de l objet

  - etape: 5
    titre: Recherche et filtrage
    description: >
      Offrir un systeme de recherche simple pour les objets.
    taches:
      - Recherche par mot cle (nom ou description)
      - Filtrer les objets par categorie
      - Combiner recherche et filtre par categorie

  - etape: 6
    titre: Propositions d echange
    description: >
      Permettre aux utilisateurs de proposer des echanges entre objets.
    taches:
      - Ajouter un bouton proposer un echange
      - Choisir un de mes objets a proposer
      - Selectionner l objet demande
      - Enregistrer une proposition d echange
      - Afficher la liste de mes echanges envoyes
      - Afficher la liste des echanges recus
      - Accepter une proposition d echange
      - Refuser une proposition d echange

  - etape: 7
    titre: Logique metier de l echange
    description: >
      Gerer correctement les consequences d un echange accepte.
    taches:
      - Changer le proprietaire des deux objets
      - Mettre a jour le statut de l echange
      - Enregistrer le changement dans l historique des objets
      - Verifier la coherence des donnees apres echange

  - etape: 8
    titre: Back-office administrateur
    description: >
      Permettre a l administrateur de gerer les categories et consulter les statistiques.
    taches:
      - Creer la page de connexion administrateur
      - Pre-remplir les identifiants admin dans le formulaire
      - Restreindre l acces aux pages admin
      - Gerer les categories (ajout, modification, suppression)
      - Afficher les statistiques globales
      - Compter le nombre d utilisateurs
      - Compter le nombre d echanges acceptes

  - etape: 9
    titre: Interface utilisateur et presentation
    description: >
      Rendre l application utilisable et presentable.
    taches:
      - Ajouter un menu de navigation clair
      - Afficher les messages d erreur et de succes
      - Appliquer un design simple (Bootstrap ou CSS)
      - Ajouter un footer obligatoire
      - Afficher les noms des membres du groupe
      - Afficher les numeros ETU

  - etape: 10
    titre: Tests et verification finale
    description: >
      S assurer que toutes les fonctionnalites fonctionnent correctement.
    taches:
      - Tester l inscription et la connexion
      - Tester la gestion des objets
      - Tester la recherche et le filtrage
      - Tester les echanges complets
      - Tester le back-office administrateur
      - Verifier l historique public
      - Verifier qu aucune erreur critique n est presente
