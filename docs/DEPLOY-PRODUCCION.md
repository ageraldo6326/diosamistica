# Actualizar producción

Ejecutar en el servidor:

```bash
cd /var/www/html/diosamistica

php artisan down --render="errors::503"

git fetch origin
git checkout main
git pull --ff-only origin main

composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

npm ci
npm run build

php artisan migrate --force
php artisan optimize:clear
php artisan optimize
php artisan queue:restart

php artisan up
```

Comprobar que la aplicación responde:

```bash
curl -I https://TU-DOMINIO.com/up
```

Si algún comando falla y la aplicación permanece en mantenimiento:

```bash
cd /var/www/html/diosamistica
php artisan up
```
