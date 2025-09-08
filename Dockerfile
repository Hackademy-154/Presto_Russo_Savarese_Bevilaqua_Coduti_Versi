# Debian 12 (Bookworm) stabile e più aggiornata
FROM php:8.2-fpm-bookworm

ARG UID=1000
ARG GID=1000
RUN test "$UID" -ne 0 -a "$GID" -ne 0 || (echo "ERROR: UID/GID must not be 0" && exit 1)
ARG TZ=Europe/Rome

# Pacchetti essenziali (no raccomandati → meno superficie)
RUN apt-get update && apt-get install -y --no-install-recommends \
    git curl zip unzip \
    libzip-dev zlib1g-dev \
    libicu-dev libonig-dev \
    libjpeg62-turbo-dev libpng-dev libfreetype6-dev libwebp-dev \
    libxml2-dev \
  && rm -rf /var/lib/apt/lists/*

# Timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Estensioni PHP (GD con jpeg+freetype+webp)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j"$(nproc)" \
    pdo_mysql mbstring bcmath intl exif gd zip opcache

# ➜ Estensione Redis (phpredis)
RUN pecl install -o -f redis \
 && docker-php-ext-enable redis \
 && rm -rf /tmp/pear


# Opcache (tuning base)
RUN { \
  echo 'opcache.enable=1'; \
  echo 'opcache.enable_cli=1'; \
  echo 'opcache.jit=tracing'; \
  echo 'opcache.jit_buffer_size=128M'; \
  echo 'opcache.memory_consumption=256'; \
  echo 'opcache.max_accelerated_files=20000'; \
} > /usr/local/etc/php/conf.d/opcache.ini

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Utente non-root + socket PHP-FPM
RUN groupadd -g ${GID} laravel && useradd -u ${UID} -g ${GID} -m -s /bin/bash laravel \
 && mkdir -p /run/php && chown -R laravel:laravel /run/php \
 && { \
      echo "listen = /run/php/php-fpm.sock"; \
      echo "listen.owner = laravel"; \
      echo "listen.group = laravel"; \
      echo "listen.mode = 0666"; \
    } > /usr/local/etc/php-fpm.d/zz-listen.conf

# Esegui PHP-FPM come 'laravel' (coerente con i permessi delle cartelle)
RUN sed -i 's/^user = .*/user = laravel/; s/^group = .*/group = laravel/' /usr/local/etc/php-fpm.d/www.conf


WORKDIR /var/www/html

# Permessi Laravel
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
 && chown -R laravel:laravel storage bootstrap/cache

USER laravel
# (opzionale) warm cache composer
# COPY --chown=laravel:laravel composer.json composer.lock ./
# RUN composer install --no-autoloader --no-scripts

USER root
CMD ["php-fpm", "-F"]
