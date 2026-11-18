# Despliegue de Diosa Mística en producción

Esta guía describe un despliegue manual desde GitHub hacia un servidor Ubuntu con Nginx, PHP-FPM y MySQL. El repositorio de origen es:

```text
https://github.com/ageraldo6326/diosamistica.git
```

El ejemplo asume:

- Ubuntu 24.04.
- PHP 8.3, compatible con el requisito `^8.2` del proyecto.
- Rama de producción `main`.
- Aplicación instalada en `/var/www/diosa-mistica`.
- Usuario de despliegue `deploy`.
- Nginx ejecutándose como `www-data`.

Reemplaza `tudominio.com`, `DB_PASSWORD_SEGURO` y cualquier otro valor de ejemplo antes de ejecutar los comandos.

## 1. Publicar la versión en GitHub

Desde el equipo de desarrollo, confirma que solo se subirán archivos correctos. Nunca agregues `.env`, credenciales, llaves privadas ni copias de la base de datos.

```bash
git checkout main
git status
git add app config docs resources routes tests
git commit -m "feat: add reading services catalog"
git push origin main
```

Comprueba en GitHub que el commit aparece en `main` antes de continuar.

## 2. Preparar el servidor

Actualiza los paquetes e instala Nginx, MySQL, Git, PHP y las extensiones requeridas por Laravel:

```bash
sudo apt update
sudo apt upgrade -y
sudo apt install -y nginx mysql-server git unzip curl supervisor \
    php8.3-fpm php8.3-cli php8.3-mysql php8.3-mbstring \
    php8.3-xml php8.3-curl php8.3-zip php8.3-bcmath
```

Instala Composer desde los repositorios de Ubuntu:

```bash
sudo apt install -y composer
```

Instala Node.js 22 para compilar los recursos de Vite:

```bash
curl -fsSL https://deb.nodesource.com/setup_22.x -o /tmp/nodesource_setup.sh
sudo -E bash /tmp/nodesource_setup.sh
sudo apt install -y nodejs
rm /tmp/nodesource_setup.sh
```

Verifica las versiones:

```bash
php -v
composer --version
node --version
npm --version
nginx -v
mysql --version
```

## 3. Crear la base de datos

Abre MySQL:

```bash
sudo mysql
```

Ejecuta lo siguiente dentro de la consola de MySQL:

```sql
CREATE DATABASE diosa_mistica
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

CREATE USER 'diosa_mistica'@'localhost'
    IDENTIFIED BY 'DB_PASSWORD_SEGURO';

GRANT ALL PRIVILEGES ON diosa_mistica.*
    TO 'diosa_mistica'@'localhost';

FLUSH PRIVILEGES;
EXIT;
```

Usa una contraseña larga y única. No la guardes en Git.

## 4. Clonar el proyecto desde GitHub

```bash
sudo mkdir -p /var/www
sudo chown deploy:www-data /var/www

cd /var/www
git clone --branch main --single-branch \
    https://github.com/ageraldo6326/diosamistica.git \
    diosa-mistica

cd /var/www/diosa-mistica
```

Si el repositorio se vuelve privado, configura una llave de despliegue de solo lectura en GitHub y utiliza la URL SSH:

```bash
git@github.com:ageraldo6326/diosamistica.git
```

## 5. Instalar dependencias y crear `.env`

Instala únicamente las dependencias PHP de producción:

```bash
cd /var/www/diosa-mistica
composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader
```

Crea el archivo de entorno:

```bash
cp .env.example .env
nano .env
```

Configura como mínimo estos valores:

```dotenv
APP_NAME="Diosa Mística"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://tudominio.com

APP_LOCALE=es
APP_FALLBACK_LOCALE=es

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diosa_mistica
DB_USERNAME=diosa_mistica
DB_PASSWORD=DB_PASSWORD_SEGURO

SESSION_DRIVER=database
SESSION_SECURE_COOKIE=true
SESSION_DOMAIN=tudominio.com

CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=SMTP_DEL_PROVEEDOR
MAIL_PORT=587
MAIL_USERNAME=USUARIO_SMTP
MAIL_PASSWORD=PASSWORD_SMTP
MAIL_SCHEME=null
MAIL_FROM_ADDRESS="hola@tudominio.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Genera la llave de la aplicación:

```bash
php artisan key:generate
```

El correo debe configurarse con credenciales reales antes de habilitar recuperación de contraseña o verificación por email. Mantener `MAIL_MAILER=log` no envía correos al usuario.

## 6. Compilar los recursos frontend

```bash
cd /var/www/diosa-mistica
npm ci
npm run build
```

El resultado debe crear `public/build/manifest.json`. En producción no se ejecuta `npm run dev`.

## 7. Migraciones, almacenamiento y optimización

```bash
cd /var/www/diosa-mistica
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Las migraciones crean, entre otras, las tablas de sesiones, caché y trabajos requeridas por la configuración anterior.

## 8. Permisos

El código debe pertenecer al usuario de despliegue y Laravel debe poder escribir únicamente en `storage` y `bootstrap/cache`:

```bash
sudo chown -R deploy:www-data /var/www/diosa-mistica
sudo find /var/www/diosa-mistica/storage \
    /var/www/diosa-mistica/bootstrap/cache \
    -type d -exec chmod 775 {} \;
sudo find /var/www/diosa-mistica/storage \
    /var/www/diosa-mistica/bootstrap/cache \
    -type f -exec chmod 664 {} \;

sudo chmod 640 /var/www/diosa-mistica/.env
```

No uses permisos `777`.

## 9. Configurar Nginx

Crea el sitio:

```bash
sudo nano /etc/nginx/sites-available/diosa-mistica
```

Contenido inicial:

```nginx
server {
    listen 80;
    listen [::]:80;

    server_name tudominio.com www.tudominio.com;
    root /var/www/diosa-mistica/public;

    index index.php;
    charset utf-8;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico {
        access_log off;
        log_not_found off;
    }

    location = /robots.txt {
        access_log off;
        log_not_found off;
    }

    error_page 404 /index.php;

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Activa y valida la configuración:

```bash
sudo ln -s /etc/nginx/sites-available/diosa-mistica \
    /etc/nginx/sites-enabled/diosa-mistica
sudo nginx -t
sudo systemctl reload nginx
sudo systemctl enable --now php8.3-fpm nginx mysql
```

Si el sitio predeterminado de Nginx interfiere con el dominio, desactívalo y vuelve a validar:

```bash
sudo unlink /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx
```

## 10. Activar HTTPS

El DNS del dominio debe apuntar al servidor antes de ejecutar Certbot.

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx \
    -d tudominio.com \
    -d www.tudominio.com
sudo certbot renew --dry-run
```

Después de activar HTTPS, confirma que `APP_URL` utiliza `https://` y vuelve a generar la caché:

```bash
cd /var/www/diosa-mistica
php artisan optimize:clear
php artisan optimize
```

## 11. Worker de colas con Supervisor

La aplicación usa `QUEUE_CONNECTION=database`. Si se despachan trabajos en segundo plano, crea:

```bash
sudo nano /etc/supervisor/conf.d/diosa-mistica-worker.conf
```

Contenido:

```ini
[program:diosa-mistica-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/diosa-mistica/artisan queue:work --sleep=3 --tries=3 --timeout=90
directory=/var/www/diosa-mistica
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=deploy
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/diosa-mistica/storage/logs/worker.log
stopwaitsecs=3600
```

Activa el proceso:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start diosa-mistica-worker:*
sudo supervisorctl status
```

## 12. Verificar el primer despliegue

```bash
cd /var/www/diosa-mistica
php artisan about --only=environment
php artisan migrate:status
php artisan route:list --except-vendor
curl -I https://tudominio.com/up
curl -I https://tudominio.com/
```

Verifica manualmente:

- La página principal carga estilos y JavaScript.
- `/servicios/general` responde correctamente.
- `/servicios/emergencia` responde correctamente.
- `/servicios/una-pregunta` responde correctamente.
- No se muestran errores detallados de Laravel.
- El certificado HTTPS es válido.

Si algo falla, revisa los registros:

```bash
tail -n 100 /var/www/diosa-mistica/storage/logs/laravel.log
sudo tail -n 100 /var/log/nginx/error.log
sudo journalctl -u php8.3-fpm -n 100 --no-pager
```

## 13. Actualizaciones posteriores desde GitHub

Primero crea un respaldo de la base de datos:

```bash
mkdir -p /var/backups/diosa-mistica
mysqldump -u diosa_mistica -p diosa_mistica \
    > /var/backups/diosa-mistica/db-$(date +%Y%m%d-%H%M%S).sql
```

Después despliega la nueva versión:

```bash
cd /var/www/diosa-mistica

php artisan down --render="errors::503"

git fetch origin
git checkout main
git pull --ff-only origin main

composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

npm ci
npm run build

php artisan migrate --force
php artisan optimize
php artisan queue:restart
php artisan up
```

Comprueba el despliegue:

```bash
curl -I https://tudominio.com/up
sudo supervisorctl status
git log -1 --oneline
```

Si un comando falla mientras la aplicación está en mantenimiento, corrige el problema y ejecuta:

```bash
php artisan up
```

## 14. Recuperación básica

No reviertas migraciones automáticamente: primero confirma que la versión anterior del código es compatible con el esquema actual y que existe un respaldo válido.

Para deshacer un cambio de código, la opción recomendada es crear un `git revert` desde desarrollo, subirlo a `main` y repetir el procedimiento de actualización. Esto mantiene el historial de Git y evita sobrescribir cambios.

Para restaurar una base de datos confirmada:

```bash
mysql -u diosa_mistica -p diosa_mistica \
    < /var/backups/diosa-mistica/ARCHIVO_CONFIRMADO.sql
```

Después limpia y reconstruye las cachés:

```bash
cd /var/www/diosa-mistica
php artisan optimize:clear
php artisan optimize
php artisan queue:restart
```

## Lista final de producción

- [ ] El último commit está publicado en `origin/main`.
- [ ] `.env` no está versionado y contiene valores de producción.
- [ ] `APP_DEBUG=false`.
- [ ] `APP_URL` usa HTTPS.
- [ ] La base de datos tiene contraseña única y respaldo.
- [ ] `php artisan migrate --force` terminó sin errores.
- [ ] `npm run build` generó `public/build/manifest.json`.
- [ ] Nginx apunta solamente a `/var/www/diosa-mistica/public`.
- [ ] `storage` y `bootstrap/cache` tienen permisos de escritura.
- [ ] `/up` responde correctamente.
- [ ] Certbot completó la prueba de renovación.
- [ ] El worker está activo si la aplicación usa colas.
