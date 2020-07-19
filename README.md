## :notebook_with_decorative_cover: Projet CRM - Une application web pour répertorier des contacts.

Dans le cadre d'un projet de groupe avec tests unitaires.

Sujet : https://gist.github.com/capywebformation/942cd9def117dd9f7165051efab4114f

Projet proposé par **Hiren PATEL**.

Réalisé par :
- RUFFINEL Josué
- LEGAUD Inès

### Installation 
- Copier le fichier **.env-example** dans un nouveau fichier **.env** 
- Configurer le fichier **.env**
- Lancer la commande pour installer les services  
    `make build`
- Mettre a jour Composer  
    `composer update`
- Lancer la commande permettant de se connecter au container  
    `make connect`
- Mettre a jour la base de donnée  
    `php bin/console make:migration`  
    `php bin/console doctrine:migration:migrate`

### Outils & Technologies
Le projet a été réalisé avec les outils & Technologies suivantes :

- PHP/Symfony 5
- MySQL
- Docker
- Git

### Commandes Docker
Des commandes ont été enregistrer dans le Makefile.

- Installer et Lancer les services  
    `make build`
      
- Lancer les services  
    `make run`

- Arrêter les services  
    `make down`
    
- Se connecter au container  
    `make connect`
    
### Gestion GIT
Voici quelque regles pour la gestion du GIT pour les développeurs.
- Toutes les branches doivent partir de la branche **dev**.
- Les noms de branches doit correspondre au nom de la fonctionnalité qui sera developpé.
- Les noms de branches devront commencer par **dev/**.
- Les merges requests seront destinée vers la branche **dev** 
