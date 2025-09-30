# paintMyCover

## Cahier des charges

- Membres de l’équipe: Léa Pires, Grégory Daguerre
- Description du projet: Gestionnaire de commande de tableaux (cover d’albums)
  - Nom de l’album
  - Nom de l’artiste
  - Taille de la toile
  - Photo
  - Tranche de prix
- Fonctionnalités principales de l'application
  - 2 langues - FR/ENG
  - formulaire création de compte
    - envoi d’un mail de confirmation
    - maintenir la connexion
    - se déconnecter
  - 2 rôles (utilisateur et admin)
  - (12)   gestion utilisateur et gestion commande tableaux ,simplement 2 tables dans la DB
  - stocker les mots de passe dans la DB de manière sécurisée (bonne pratique)
  - chargement des classes automatique
- Fonctionnalité optionnelle de l'application
  - gestion de commandes (table intermédiaire) +1 relation
- Nom de domaine : paintmycover.ch

Pour l’instant on se concentre sur les utilisateurs et les as. (commande envoie par mail)

Un utilisateur peut :

- Se créer un compte et s'y connecter
- Commander une cover
- Consulter la liste de ses commandes

Un admin peut :

- Se connecter en tant qu'admin à son espace
- Voir toutes les commandes de tous les utilisateurs
- Recevoir un mail à chaque fois qu'un utilisateur fait une commande avec les détails
