## Création de la base de donnée et de l'utilisateur

Se connecter à la base de données mariadb :
```bash
mariadb -P 3306 -u root -p < script.sql
```

Quitter mariadb :
```sql
exit
```

## Scidation de la base de données

Executer le script php :
```bash
php sidage.php 
```