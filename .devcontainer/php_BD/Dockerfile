# --- IMAGEN BASE ---
# Usamos la imagen de Dev Containers de Microsoft optimizada para PHP 8.2 en Debian Bookworm
FROM mcr.microsoft.com/devcontainers/php:1-8.2-bookworm

# WORKDIR /var/www/html
# --- EXTENSIONES DEL SISTEMA Y PHP ---
# Instalamos las dependencias necesarias y las extensiones de PHP en un solo paso
# para mantener la imagen ligera.
# RUN apt-get update && \
#   apt-get install -y \
#   libpng-dev \
#   libzip-dev && \
#   pecl install xdebug-3.1.6 && \
#   apt-get clean && \
#   rm -rf /var/lib/apt/lists/* && \
#   docker-php-ext-install gd && \
#   docker-php-ext-install zip && \
#   docker-php-ext-install mysqli && \
#   docker-php-ext-enable xdebug
RUN docker-php-ext-install pdo_mysql
# --- CONFIGURACIÓN DE DEPURACIÓN (Xdebug) ---
# Copiamos nuestra configuración personalizada de Xdebug al directorio de PHP.
# Nota: Se copian dos veces para asegurar la prioridad en diferentes entornos de carga.
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
# COPY xdebug_test.ini /usr/local/etc/php/conf.d/xdebug_test.ini

# --- NOTAS DE PUERTOS ---
# Los puertos (80, 9000, 9003) se gestionan preferiblemente desde el docker-compose.yml
# para evitar redundancia, pero se mantienen mapeados internamente por la imagen base
# EXPOSE 80
# EXPOSE 8080
# EXPOSE 9000
# EXPOSE 9003