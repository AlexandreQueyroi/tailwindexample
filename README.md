# tailwindexample

Site de Présentation de Tailwind CSS pour le Projet Annuel de 1ère année à l'ESGI

## Démarrage


---

Une fois le projet cloné, préparez l’installation en suivant les prérequis

### Prérequis

* Une base de donnée nommé \`\`tailwind_example\`\` (créé dans [Commandes MySQL](CommandesMySQL)
* PHP
* MySQL ou MariaDB

### Commandes MySQL

```sql
CREATE DATABASE tailwind_example;
USE tailwind_example;
CREATE TABLE tasks (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(150) NOT NULL,
  complete int NOT NULL,
  id_user int NOT NULL,
  PRIMARY KEY id
);
CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  pseudo varchar(25) NOT NULL,
  password text NOT NULL,
  PRIMARY KEY id
);
exit
```

### Lancement du projet

Aller dans action/bdd.php et modifiez au besoin vos identifiants de connexions.

Lancez votre serveur web (WAMP, Apache2, …) et rendez vous l’URL localhost:8000 !