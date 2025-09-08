## Presto Shop, avviabile tramite docker:
git clone <repo-url>
 <br>
cd <repo-folder>
<br>
cp .env.example .env        # poi apri .env e compila i valori necessari
 <br>

Requisiti <br>

Docker + Docker Compose<br>

Porte libere: 8080 (web), 5173 (Vite), 9999 (phpMyAdmin), 8025 (Mailpit)<br>
# 2 Build & up
docker compose up -d --build
<br>

# 3 Setup Laravel
docker compose exec laravel bash -lc "composer install"
<br>
docker compose exec laravel php artisan key:generate
<br>
docker compose exec laravel php artisan migrate --seed
<br>
docker compose exec laravel php artisan storage:link || true
<br>

App: http://localhost:8080
<br>

phpMyAdmin: http://localhost:9999
<br>
 (login = DB_USERNAME / DB_PASSWORD)
 <br>

Mailpit (email dev): http://localhost:8025
<br>

Vite (dev, parte in automatico): http://localhost:5173
<br>

## Comandi Utili
# Stato / log
docker compose ps
<br>
docker compose logs -f laravel
<br>
docker compose logs -f nginx
<br>

# Shell
docker compose exec laravel bash
<br>
docker compose exec mysql mysql -uroot -p"$DB_PASSWORD"
<br>

# Stop/clean
docker compose down            # ferma tutto (mantiene i dati)<br>
docker compose down -v         # ⚠️ resetta anche i volumi (perde il DB)<br>

# Permessi
docker compose exec laravel bash -lc \
<br>
"chown -R laravel:laravel storage bootstrap/cache && \
<br>
 find storage bootstrap/cache -type d -exec chmod 775 {} \; && \
 <br>
 find storage bootstrap/cache -type f -exec chmod 664 {} \; && \
 <br>
 php artisan optimize:clear"
 <br>

# Note

.env non va committato; usa .env.example come modello.<br>

In produzione: non esporre MySQL, usa secrets per le password, disattiva phpMyAdmin se non necessario.<br>
