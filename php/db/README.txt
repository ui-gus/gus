To backup your own database:
mysqldump -u [root username] -p [password] gusphp > gusphp.sql

To restore/import the database to your mysql:
mysql -u [root username] -p [password] gusphp < gusphp.sql
