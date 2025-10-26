# Usa una imagen de PHP con Apache
FROM php:8.2-apache

# Instala las extensiones necesarias (pdo y pdo_mysql son cruciales)
RUN docker-php-ext-install pdo pdo_mysql

# Habilita el módulo rewrite de Apache, si lo necesitas para URLs amigables
# Si tu aplicación no usa URLs amigables o .htaccess, puedes omitir esta línea.
RUN a2enmod rewrite

# Copia los archivos de tu aplicación (desde el subdirectorio 'src' de tu repo)
# Esto es clave, ya que tu código está en 'src/'.
# Render espera el Dockerfile en la raíz, pero el código de la app está en 'src'.
COPY src/ /var/www/html/

# Por defecto, Apache escucha en el puerto 80 dentro del contenedor
EXPOSE 80
