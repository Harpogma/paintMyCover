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
  - gestion utilisateur et gestion commande tableaux ,simplement 2 tables dans la DB
  - stocker les mots de passe dans la DB de manière sécurisée (bonne pratique)
  - chargement des classes automatique
- Fonctionnalité optionnelle de l'application
  - gestion de commandes (table intermédiaire) +1 relation
- Nom de domaine : paintmycover.ch

Pour l’instant on se concentre sur les utilisateurs et les admins. (commande envoie par mail)

Un utilisateur peut :

- Se créer un compte et s'y connecter
- Commander une cover
- Consulter la liste de ses commandes

Un admin peut :

- Se connecter en tant qu'admin à son espace
- Voir toutes les commandes de tous les utilisateurs
- Recevoir un mail à chaque fois qu'un utilisateur fait une commande avec les détails

## Notes fin de projet

Les fonctionnalités suivantes n'ont pas été mises en place :
- un utilisateur peut commander des covers
- un admin ne peut pas voir les commandes des autres utilisateurs (cf. point du dessus)
- un admin reçoit un mail lorsqu'un user commande une cover (cf. points du dessus)

### Retour d'expérience

Nous avons pu nous répartir les tâches de manière équilibrée afin que chacun puisse mettre 
en pratique les concepts vus en cours. L'IA (ChatGPT et Claude) a parfois été utilisé pour du débugging.

Difficultés rencontrées : 
- L'implémentation de l'authentification demande de bien comprendre le fonctionnement des sessions ainsi que des requêtes SQL pour interroger la DB. 
- La gestion du cookie de session PHPSESSID pas très facile au début
- Dans le dashboard admin, la gestion des covers et des users avec les requêtes vers la DB a demandé plusieurs essais
- Comprendre le fonctionnement d'un site web sur un serveur distant. Bien comprendre la différence entre son environnement local, les fichiers déposés sur le serveur et git.