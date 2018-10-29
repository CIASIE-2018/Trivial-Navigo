# Trivial-Navigo

Membres de la Team Navigo :
- Camille Schwarz ( S-Camille )
- Maeva Butaye    ( Lilychaan )
- Quentin Rimet   ( QuentinRimet )
- Léo Galassi     ( ElGitariste )

Jeu à développer : 
--> Trivial Poursuite

Règles du Jeu :

  Nombre de joueurs : de 2 à 4 joueurs.
  
  Chaque joueur est représenté par un camembert sur le plateau.
  Un camembert contient un emplacement de 6 portions de camembert.
  
  Démarage de la partie : 
  Chaque joueur lance le dé. Celui qui a le plus grand nombre débute. En cas d'égalité les joueurs concernés relancent le dé pour se
  départager.
  
  Déroulement de la partie :
  Tous les joueurs sont situés au centre du plateau.
  Le joueur lance le dé et avance sur le plateau en fonction du résultat. Il doit ensuite répondre à une question correspondant
  au thème de la case où il est arrivé. Si il répond juste, il gagne un camembert, sinon il passe son tour.
    
  Fin de partie :
  Quand un joueur à compléter son camembert, il doit venir se positionner sur une case 'spéciale' et remonter au centre du plateau en       répondant correctement à tous les thèmes du jeu.
  
  Sens de déplacement :
  Le joueur peut:
  - Se déplacer dans le sens horraire et anti-horraire.
    
  Options :
  
  Administration des questions ( création de questions et de thèmes )
  
  
  Difficulté : 
  
 Système permettant de repérer la bonne réponse par rapport à celle donné par le joueur.

### Instalation via Docker

prérequis: 

* Docker
* Docker Compose

Pour installer et lancer en production :
```
	docker-compose -f ./docker-compose.yml build
  docker-compose -f ./docker-compose.yml up -d
```
Un makefile est aussi mit à disposition afin d'aider : lancer "make help" pour connaitre les commandes utilisables.

Ouvrez alors votre navigateur sur http://localhost:8080 pour jouer sur votre trivial navigo.(Le chargement de la bdd peut prendre un certain temps et faire apparaitre une erreur pdo si l'on charge la page web avant la fin de ce chargement, il suffit juste d'attendre un peu avant de recharger la page);