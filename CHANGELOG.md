# Changelog

Todos los cambios relevantes de este proyecto se documentarán en este archivo.

El formato sigue una estructura clara para facilitar el seguimiento de la evolución
del entorno de desarrollo y sus configuraciones.

---

## [Unreleased]

### Añadido

- Añadidas dos configuraciones de Dev Container:
  - `php`: entorno básico para desarrollo PHP con Apache y Xdebug.
  - `php_BD`: entorno PHP ampliado con servicios de base de datos.
- Integración de **MariaDB** y **phpMyAdmin** en la configuración `php_BD`.
- Opción para **activar o desactivar phpMyAdmin** mediante variable de entorno en `.env`.
- Documentación ampliada en `README.md` con:
  - Explicación de configuraciones.
  - Pasos de prueba.
  - Recomendaciones de seguridad.
- Script `phpinfo()` para verificar instalación y configuración de Xdebug.

---

### Cambiado

- Ajustes en la configuración de **Xdebug 3**:
  - `xdebug.mode=debug,develop`
  - `xdebug.idekey=VSCODE`
  - `xdebug.start_with_request=yes`
  - Puerto configurado a **9003**
  - `xdebug.client_host=host.docker.internal` para mayor compatibilidad en redes cambiantes.
- Actualización de los **Dockerfile** para:
  - Instalar extensiones necesarias (por ejemplo `pdo_mysql`).
  - Copiar el archivo `xdebug.ini` a:
    - `/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini`
    - `/usr/local/etc/php/conf.d/xdebug.ini`
- Actualización de las configuraciones de **VS Code** en `.vscode/launch.json` para:
  - Escuchar Xdebug en el puerto 9003.
  - Ejecutar scripts PHP con depuración habilitada.
  - Lanzar el servidor web integrado y abrir automáticamente el navegador cuando esté listo.

---

### Seguridad

- Recomendación de **bindings locales (127.0.0.1)** para los puertos expuestos:
  - 80
  - 8080
  - 9000
  - 9003
- Verificación de la correcta instalación y configuración de Xdebug mediante `phpinfo()`.
- Recomendación de mapear `host.docker.internal` a `127.0.0.1` en el archivo `hosts` cuando:
  - Se use Docker Desktop.
  - No esté disponible `host-gateway`.
- Uso de `host.docker.internal` en `xdebug.client_host` para evitar cambios manuales de IP
  al cambiar de red.

---

### Archivos modificados

- `.devcontainer/php/devcontainer.json`
- `.devcontainer/php/docker-compose.yml`
- `.devcontainer/php/Dockerfile`
- `.devcontainer/php/xdebug.ini`
- `.devcontainer/php_BD/devcontainer.json`
- `.devcontainer/php_BD/docker-compose.yml`
- `.devcontainer/php_BD/Dockerfile`
- `.devcontainer/php_BD/xdebug.ini`
- `.vscode/launch.json`

---

## Notas

Este proyecto se encuentra en evolución continua.  
Los cambios futuros se documentarán siguiendo esta misma estructura.
