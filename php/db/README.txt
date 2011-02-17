To backup your own database:
mysqldump --databases gusphp -u [root username] -p [password] > gusphp.sql--<your name>

To restore/import the database to your mysql:
mysql -u [root username] -p [password] gusphp < gusphp.sql
