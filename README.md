# Trivial-Navigo

Membres de la Team Navigo :
- Camille Schwarz ( S-Camille )
- Maeva Butaye    ( Lilychaan )
- Quentin Rimet   ( QuentinRimet )
- Léo Galassi     ( ElGitariste )

Jeu à développer --> Trivial Poursuit

# Règles du Jeu :

  Nombre de joueurs : de 2 à 4 joueurs.
  
  Chaque joueur est représenté par un bandeau situé à côté du plateau de jeu.
  Un bandeau contient un emplacement de 6 portions de camembert, qui elles correspondent à 6 thèmes différents :
  - camembert bleu : Géographie
  - camembert rose : Divertissements
  - camembert jaune : Histoire
  - camembert orange : Sport & Loisirs
  - camembert vert : Informatique
  - camembert violet : Personnalités
  Ce bandeau possède la même couleur que celui du pion du joueur.  
  
  Démarrage de la partie :
  - Les joueurs sont disposés sur la même case de départ. Elle se situe au milieu de la première ligne du plateau de jeu.
  - La partie démarre avec l'un des joueurs choisi au hasard. Ce joueur lance le dé et choisit un sens de déplacement.
  
  Déroulement de la partie :
  - Le joueur lance le dé et avance sur le plateau en fonction du résultat. Il doit ensuite répondre à une question correspondant au thème de la case où il est arrivé. S'il répond juste, il gagne le camembert correspondant à la case sur laquelle il est situé.
    
  Fin de partie :
  - Quand un joueur a complété son bandeau, il doit venir se positionner sur une case menant au centre du plateau et remonter jusqu'au milieu du plateau en répondant correctement à tous les thèmes du jeu. S'il répond juste à tout, alors le joueur a remporté la partie.
  
  Sens de déplacement :
  - Le joueur peut se déplacer dans le sens horaire et anti-horaire.
    
  Le joueur peut depuis son espace personnel :
  - Créer de questions
  - Voir à combien de questions il a répondu juste
  
### Instalation via Docker

Prérequis: 

* Docker
* Docker Compose

Pour installer et lancer en production :
```
  docker-compose -f ./docker-compose.yml build
  docker-compose -f ./docker-compose.yml up -d
```
Un makefile est aussi mit à disposition afin d'aider : lancer "make help" pour connaitre les commandes utilisables.

Ouvrez alors votre navigateur sur http://localhost:8080 pour jouer sur votre trivial navigo.

Attention : Le chargement de la bdd peut prendre un certain temps et faire apparaitre une erreur pdo si l'on charge la page web avant la fin de ce chargement, il suffit juste d'attendre un peu avant de recharger la page.
