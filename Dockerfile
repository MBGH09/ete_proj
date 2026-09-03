# ============================================================
# Stage 1 – dépendances Composer (build)
# ============================================================
FROM composer:2.7 AS composer_build

WORKDIR /app

# Copier uniquement les fichiers nécessaires à Composer pour profiter
# du cache des couches Docker lors des rechargements sans changement de code.
COPY composer.json composer.lock ./

# Installer les dépendances de production uniquement (sans autoloader de dev)
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# ============================================================
# Stage 2 – image finale
# ============================================================
FROM php:8.2-apache

# --------------- Extensions PHP requises par CakePHP 4 ----------------
RUN apt-get update && apt-get install -y \
        libicu-dev \
        libonig-dev \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        intl \
        mbstring \
        pdo \
        pdo_mysql \
        zip \
        gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# --------------- Configuration Apache --------------------------------
# Activer mod_rewrite (requis par CakePHP)
RUN a2enmod rewrite

# Le document root pointe vers /webroot (convention CakePHP)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/webroot

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf

# Autoriser .htaccess (AllowOverride All)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' \
        /etc/apache2/apache2.conf

# --------------- Copie de l'application -------------------------------
WORKDIR /var/www/html

# Copier le vendor installé depuis le stage build
COPY --from=composer_build /app/vendor ./vendor

# Copier le reste du projet
COPY . .

# --------------- Permissions -----------------------------------------
# tmp/ et logs/ doivent être accessibles en écriture par www-data
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/tmp \
    && chmod -R 775 /var/www/html/logs

# --------------- Variables d'environnement par défaut -----------------
ENV APP_NAME="louer_chalets" \
    DEBUG="false" \
    APP_ENCODING="UTF-8" \
    APP_DEFAULT_LOCALE="fr_FR" \
    APP_DEFAULT_TIMEZONE="UTC" \
    SECURITY_SALT="changeme_generate_a_real_64char_salt_in_production_00000000000000"

# Port exposé par Apache
EXPOSE 80

CMD ["apache2-foreground"]
