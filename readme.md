## installation du projet

installer les dépendances :
```bash
composer install
```

## Création de la base de donnée et de l'utilisateur

Se connecter à la base de données mariadb :
```bash
mariadb -P 3306 -u root -p < ./sql/dump-pompiers.sql
```

entrer le mot de passe root.

## Scidation de la base de données

Executer le script php :
```bash
php ./sql/scider.php 
```
