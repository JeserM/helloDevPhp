![Docker](https://img.shields.io/badge/Docker-Ready-blue)
![DevContainer](https://img.shields.io/badge/DevContainer-Supported-green)
![PHP](https://img.shields.io/badge/PHP-8.2-purple)
![Status](https://img.shields.io/badge/Status-Active-success)

# PHP Dev Container (Docker + VS Code + Xdebug)

Entorno de desarrollo PHP reproducible basado en Docker y DevContainers. Orientado a entornos de desarrollo educativos, profesionales y DevOps.
Permite crear un entorno completo listo para desarrollo y depuración profesional
en segundos, eliminando problemas de configuración y diferencias entre máquinas.

El proyecto incluye dos configuraciones:

- Un entorno PHP con Apache y Xdebug.
- Un entorno PHP ampliado con MariaDB y phpMyAdmin.

Está pensado tanto para desarrollo local como para entornos en la nube (GitHub Codespaces).

<p align="center">
  <img src="./images/portadaok.png" width="85%" />
</p>

## Quick start

1. Abre el repo en VS Code.
2. `Reopen in Container`.
3. Inicia la configuración **Listen for Xdebug**.
4. Accede a http://localhost/web_test/test_debug.php
5. Listo para desarrollar y depurar.

## Descripción

Este repositorio contiene configuraciones para un entorno de desarrollo PHP utilizando Docker y VSCode, con soporte para depuración mediante Xdebug. Incluye dos configuraciones de devcontainer: una básica para PHP y otra que añade servicios de base de datos (MariaDB y phpMyAdmin).

Hago uso de <a href="https://code.visualstudio.com/docs/remote/containers" target="_blank">devcontainers</a>. Son entornos de desarrollo definidos por
código que permiten a los desarrolladores crear y configurar entornos de desarrollo consistentes y portátiles, utilizando contenedores Docker. Los devcontainers
facilitan la configuración del entorno de desarrollo al proporcionar un archivo de configuración `devcontainer.json` que define las dependencias, herramientas y configuraciones necesarias para el proyecto.
Esto permite a los desarrolladores trabajar en un entorno aislado y reproducible, lo que mejora la colaboración y reduce los problemas relacionados con las diferentes configuraciones de los entornos de desarrollo entre diferentes máquinas e incluso en la misma máquina.

Se pueden usar devcontainers para una variedad de propósitos, como:

- Configurar entornos de desarrollo para proyectos específicos.
- Probar aplicaciones en diferentes configuraciones de entorno.
- Facilitar la colaboración entre equipos de desarrollo al garantizar que todos trabajen en el mismo entorno.
- Automatizar la configuración del entorno de desarrollo para nuevos miembros del equipo.
- Aislar dependencias y herramientas específicas del proyecto para evitar conflictos con otras aplicaciones en la máquina del desarrollador.

Pueden usar devcontainers para proyectos en una amplia gama de lenguajes de programación y marcos de trabajo, incluyendo Node.js, Python, Java, .NET, PHP, Ruby, entre otros.

También se puede usar con GitHub Codespaces, que permite crear entornos de desarrollo
en la nube basados en Dev Containers directamente desde repositorios de GitHub.

De forma adicional, Google Project IDX ofrece soporte experimental para `devcontainer.json`.
Otros IDEs como los de JetBrains pueden interactuar con el entorno mediante Docker,
aunque no ofrecen soporte nativo para Dev Containers.

En mi caso, he creado dos devcontainers para proyectos de desarrollo en PHP, uno básico y otro con base de datos.

# Índice

- [Descripción](#descripción)
- [Problema que resuelve](#problema-que-resuelve)
- [Tecnologías utilizadas](#tecnologías-utilizadas)
- [Arquitectura](#arquitectura)
- [Tipos de entorno](#tipos-de-entorno)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Cambios recientes](#cambios-recientes)
- [Cómo se abre paso a paso para lanzar el contenedor en VSCode](#cómo-se-abre-paso-a-paso-para-lanzar-el-contenedor-en-vscode)
- [Cómo probar localmente](#cómo-probar-localmente)
- [Imágenes utilizadas](#imágenes-utilizadas)
- [Estado del proyecto](#estado-del-proyecto)
- [Abrir puertos y tener en cuenta la seguridad](#abrir-puertos-y-tener-en-cuenta-la-seguridad)
- [Comprobar que Xdebug está instalado, los puertos y la IP del cliente](#comprobar-que-xdebug-está-instalado-los-puertos-y-la-ip-del-cliente)
- [Plantillas de ejemplo para los archivos de configuración](#plantillas-de-ejemplo-para-los-archivos-de-configuración)
  - [Devcontainer.json](#devcontainerjson)
  - [Docker-compose.yml](#docker-composeyml)
  - [Dockerfile](#dockerfile)
  - [Xdebug.ini](#xdebugini)
  - [launch.json de VSCode para debug](#launchjson-de-vscode-para-debug)
  - [Hosts](#hosts)
- [Conclusión](#conclusión)

## Problema que resuelve

En entornos de desarrollo tradicionales cada desarrollador configura su
propio entorno, lo que provoca:

- Diferencias de configuración
- Problemas de dependencias
- Dificultad para reproducir errores
- Tiempo perdido en setup

Este proyecto nace de mi necesidad para proporcionar un entorno **reproducible,
portable y listo para depuración profesional**, eliminando las barreras técnicas
y permitiendo a los desarrolladores centrarse en el código.

## Tecnologías utilizadas

<p align="center">
  <img src="./images/iconos.png" width="65%" />
</p>

- PHP 8.2
- Apache
- Docker / Docker Compose
- Dev Containers (VS Code)
- Xdebug 3
- MariaDB (opcional)
- phpMyAdmin (opcional)
- VS Code
- Git / GitHub

## Arquitectura

El proyecto ofrece dos entornos Dev Container:

**php**

- PHP + Apache + Xdebug
- Contenedor único para desarrollo ligero

**php_BD**

- PHP + Apache + Xdebug
- MariaDB
- phpMyAdmin opcional bajo demanda

Todos los servicios están aislados y conectados mediante Docker Network.

## Tipos de entorno

#### php

Entorno base con:

- PHP + Apache
- Xdebug
- Debug funcional

#### php_BD

Extiende el anterior añadiendo:

- MariaDB
- phpMyAdmin (opcional vía .env)
- Arquitectura multi-contenedor

## Estructura del proyecto

```
.
├── .devcontainer/
│ ├── php/
│ └── php_BD/
├── .vscode/
├── web_test/
├── images/
├── README.md
└── CHANGELOG.md
```

## Cambios recientes

Para ver el detalle de los cambios, consulta el archivo [CHANGELOG.md](CHANGELOG.md).

## Cómo se abre paso a paso para lanzar el contenedor en VSCode

1. Abre **VS Code**.
2. Asegúrate de tener instalada la extensión **Dev Containers**
   (`ms-vscode-remote.remote-containers`).
3. Clona el repositorio o abre la carpeta del proyecto:

   ```bash
   git clone https://github.com/JeserM/helloDevPhp
   cd helloDevPhp
   ```

   También puedes usar Clone Repository desde la paleta de comandos (Ctrl + Shift + P → Git: Clone).

4. Una vez abierto el proyecto, VS Code detectará automáticamente la
   configuración del Dev Container.

5. Haz clic en el icono verde de la esquina inferior izquierda de VS Code y selecciona: Ejecuta `Dev Containers: Reopen in Container`.

6. Si existen varias configuraciones disponibles, selecciona la que necesites:
   - php → PHP + Apache + Xdebug
   - php_BD → PHP + Apache + Xdebug + MariaDB + phpMyAdmin

7. VS Code construirá el contenedor y abrirá el entorno de desarrollo
   dentro de Docker.
   La primera vez puede tardar unos minutos.

8. Cuando el proceso finalice, el entorno estará listo para desarrollar
   dentro del contenedor.

## Cómo probar localmente:

1.  Abre el proyecto en VS Code y asegúrate de estar trabajando dentro del Dev Container seleccionado (php o php_BD).

2.  Verifica que el contenedor ha arrancado correctamente y que el workspace está montado en:
    - `/var/www/html`

3.  Abre en el navegador del host el archivo de comprobación:

    http://localhost:80/web_test/phpinfo.php

4.  Comprueba que PHP está funcionando y que **Xdebug aparece habilitado**
    en la salida de `phpinfo()`.

5.  En VS Code, abre el panel **Run and Debug** (`Ctrl + Shift + D`).

6.  Selecciona la configuración **Listen for Xdebug** y pulsa **Start Debugging**.

7.  Coloca un breakpoint en el archivo:
    `web_test/test_debug.php`

8.  Accede al archivo desde el navegador:

    http://localhost:80/web_test/test_debug.php

9.  La ejecución se detendrá en el breakpoint, permitiendo inspeccionar
    variables y depurar el código paso a paso.

> 💡 Consejo: inicia siempre la escucha de Xdebug antes de acceder a cualquier
> script PHP para asegurar que la conexión se establece correctamente.

## Imágenes utilizadas

Las imágenes base son orientativas. Deberías elegir aquellas que mejor se adapten a tus
necesidades, que estén estables y actualizadas. Las utilizadas en este proyecto sirven
como ejemplo y funcionan correctamente.

Para el contenedor de desarrollo PHP se utiliza la siguiente imagen base, que incluye
Apache y PHP 8.2 sobre Debian Bookworm. Es una imagen oficial de Microsoft para Dev Containers:

- mcr.microsoft.com/devcontainers/php:1-8.2-bookworm

Para la base de datos he utilizado MariaDB por facilidad de uso y configuración:

- mariadb:11.8-ubi9-rc

Para añadir un servicio más y mostrar que pueden escalarse los devcontainers, he añadido phpMyAdmin para gestionar la base de datos desde un navegador web:

- phpmyadmin:5.2.2-apache

## Estado del proyecto

La documentación se irá ampliando a medida que se incorporen nuevas funcionalidades
y se prueben distintos escenarios.

El repositorio incluye ejemplos, pruebas y pequeños parches que fueron surgiendo
durante la creación del dev container, así como recomendaciones de seguridad y
consideraciones adicionales (por ejemplo, el archivo `hosts`).

## Abrir puertos y tener en cuenta la seguridad:

Para evitar exponer servicios a toda la red, se recomienda bindear a localhost:

**ports (acceso desde el host):**

- `127.0.0.1:80:80`
- `127.0.0.1:8080:80`
- `127.0.0.1:9000:9000` (Xdebug antiguos)
- `127.0.0.1:9003:9003` (Xdebug 3)

**expose (acceso entre contenedores):**

- `80`
- `9000`
- `9003`

### Comprobar que Xdebug está instalado, los puertos y la IP del cliente

Abre el archivo `phpinfo.php` en el navegador para comprobar que Xdebug está instalado. Comprueba también que el puerto y el valor de `client_host` coinciden con los definidos en el archivo `xdebug.ini`. Esto te ayudará a evitar tener que cambiar la IP del cliente cada vez que cambies de red. Revisa bien estos datos y asegúrate de que la configuración de `xdebug.ini`, `launch.json` y el archivo `hosts` sea coherente.

```php
<?php
phpinfo();
?>
```

![alt text](./images/phpinfo.png)

# Plantillas de ejemplo para los archivos de configuración

Se muestran a continuación las plantillas de ejemplo para los archivos de configuración más importantes del proyecto, como `devcontainer.json`, `docker-compose.yml`, `Dockerfile`, `xdebug.ini` y `launch.json` de VS Code. Estos archivos son esenciales para configurar el entorno de desarrollo, los servicios y la depuración con Xdebug. En las plantillas se incluyen comentarios explicativos para facilitar su comprensión y personalización según las necesidades de cada proyecto. No deberian haber en los json comentarios, pero los he dejado para explicar cada sección. Puedes eliminarlos una vez que entiendas la configuración.

### Devcontainer.json

Es el archivo de configuración principal para el Dev Container. Define el entorno de desarrollo, los servicios, las extensiones de VS Code, se pueden definir las variables de entorno y otras personalizaciones. Es fundamental para configurar correctamente el contenedor y asegurar que el entorno de desarrollo sea consistente y reproducible.

> ⚠️ Las plantillas son orientativas. En un entorno real deben eliminarse comentarios y proteger credenciales.

```json
// For format details, see https://aka.ms/devcontainer.json. For config options, see the
// README at: https://github.com/devcontainers/templates/tree/main/src/dotnet-mssql
{
  "name": "Php Dev",
  "dockerComposeFile": "docker-compose.yml",
  "service": "phpdev",
  // --- DIRECTORIO DE TRABAJO ---
  // "workspaceFolder": "/workspaces", // Ruta por defecto de Dev Containers
  //workspaceFolder es el directorio de trabajo en el contenedor
  "workspaceFolder": "/var/www/html",
  // --- MONTAJES  ---
  // Sincroniza el directorio del proyecto con /var/www/html
  "mounts": [
    // Opción para mapear solo la carpeta de código fuente (src)
    // "source=${localWorkspaceFolder}/src,target=/var/www/html,type=bind"
    // Opción actual: Sincroniza la raíz del proyecto. Es mejor para tener acceso a .env y archivos de config
    "source=${localWorkspaceFolder},target=/var/www/html,type=bind"
  ],
  // --- PERSONALIZACIONES DE VSCODE Y SERVICIOS ---
  "customizations": {
    "vscode": {
      "settings": {
        "workbench.colorTheme": "Shades of Purple"
      },
      "extensions": [
        "bmewburn.vscode-intelephense-client",
        "xdebug.php-debug",
        "ms-vscode-remote.remote-containers",
        "GitHub.copilot",
        "GitHub.copilot-chat",
        "formulahendry.code-runner"
      ]
    }
  }
  // --- VARIABLES DE ENTORNO REMOTAS ---
  // Aqui podríamos configurar las variables de entorno de todo el contenedor, incluso para
  // el servidor apache, php, base de datos, etc.
  //¿Por qué mantenerlo? Es útil si necesitas forzar una configuración de Xdebug
  // o DB sin modificar el servidor o el archivo .env global.
  // "remoteEnv": {
  //   "XDEBUG_CONFIG": "remote_host=host.docker.internal remote_port=9003 idekey=VSCODE",
  //   "PHP_IDE_CONFIG": "serverName=phpdev",
  //   "MYSQL_ROOT_PASSWORD": "root",
  //   "MYSQL_DATABASE": "my_database",
  //   "MYSQL_USER": "user",
  //   "MYSQL_PASSWORD": "password"
  // },
  // --- FEATURES ---
  // Permite añadir herramientas adicionales (como Git, Docker-in-Docker, etc.) fácilmente.
  // Mas info: https://containers.dev/features.
  // "features": {},

  // --- REENVÍO DE PUERTOS (FORWARD PORTS) ---
  // ¿Por qué comentarlos? Porque ya los estás exponiendo en el docker-compose.yml.
  // Solo se deben activar aquí si necesitas que VS Code gestione el túnel de forma automática
  // cuando te conectas de forma remota (por ejemplo, a través de SSH o GitHub Codespaces).
  // "forwardPorts": [],
  // "forwardPorts": [80, 9000, 9003],
  // "portsAttributes": {
  //   "80": {
  //     "label": "App",
  //     "protocol": "http"
  //   },
  //   "9000": {
  //     "label": "X-Debug"
  //   },
  //   "9003": {
  //     "label": "X-Debug"
  //   }
  // }

  // --- COMANDOS POST-CREACIÓN ---
  // Ideal para instalar dependencias automáticamente (composer install, npm install)
  // "postCreateCommand": "echo 'Contenedor listo'",

  // Configuraciones especificas como por ejemplo un usuario remoto.
  // Mas info: https://aka.ms/dev-containers-non-root.
  // "remoteUser": "root"
}
```

En el caso de este proyecto y para mis propias necesidades en el caso de la version con base de datos, he optado por tener un archivo env a parte para configurar las variables de entorno de la base de datos, y no incluirlas en el `devcontainer.json` para evitar exponerlas innecesariamente. Sin embargo, si lo deseas, puedes incluirlas directamente en el `devcontainer.json` utilizando la sección `remoteEnv`, lo que puede ser útil para mantener toda la configuración centralizada.

alert

> [!WARNING]
> Recuerda que si decides incluir las variables de entorno en el `devcontainer.json`, asegúrate de no exponer información sensible, especialmente si el repositorio es público. En ese caso, es recomendable utilizar un archivo `.env` y asegurarse de que esté incluido en el `.gitignore` para evitar subirlo al repositorio. No lo he includio en el `.gitignore` porque es un proyecto de ejemplo, pero en un proyecto real deberías asegurarte de proteger esa información.

### Version con base de datos:

```json
// For format details, see https://aka.ms/devcontainer.json. For config options, see the
// README at: https://github.com/devcontainers/templates/tree/main/src/dotnet-mssql
{
  "name": "Php Dev BD ",
  "dockerComposeFile": "docker-compose.yml",
  "service": "phpdev",
  // --- DIRECTORIO DE TRABAJO ---
  // "workspaceFolder": "/workspaces", // Ruta por defecto de Dev Containers
  //workspaceFolder es el directorio de trabajo en el contenedor
  "workspaceFolder": "/var/www/html", // Usamos esta porque es la ruta estándar del servidor Apache en el contenedor
  // --- MONTAJES ---
  // Sincroniza el directorio del proyecto con /var/www/html
  "mounts": [
    // Opción para mapear solo la carpeta de código fuente (src)
    // "source=${localWorkspaceFolder}/src,target=/var/www/html,type=bind"
    // Opción actual: Sincroniza la raíz del proyecto. Es mejor para tener acceso a .env y archivos de config
    "source=${localWorkspaceFolder},target=/var/www/html,type=bind"
  ],
  // --- PERSONALIZACIONES DE VSCODE Y SERVICIOS ---
  "customizations": {
    "vscode": {
      "settings": {
        "workbench.colorTheme": "One Dark Pro Darker"
      },
      "extensions": [
        "bmewburn.vscode-intelephense-client",
        "xdebug.php-debug",
        "ms-vscode-remote.remote-containers",
        "GitHub.copilot",
        "GitHub.copilot-chat",
        "formulahendry.code-runner"
      ]
    }
  },
  // --- ORQUESTACIÓN DE SERVICIOS ---
  // Para elegir los servicios que se ejecutarán en el contenedor
  // con o sin phpmyadmin. Para que funcione tiene que estar
  // configurado en el archivo docker-compose.yml y configurado el profile
  // "runServices": ["db", "phpdev"] // Útil si no necesitas interfaz gráfica
  "runServices": ["db", "phpdev", "phpmyadmin"]
  // --- VARIABLES DE ENTORNO REMOTAS ---
  // Aqui podríamos configurar las variables de entorno de todo el contenedor, incluso para
  // el servidor apache, php, base de datos, etc.
  //¿Por qué mantenerlo? Es útil si necesitas forzar una configuración de Xdebug
  // o DB sin modificar el servidor o el archivo .env global.
  // "remoteEnv": {
  // "XDEBUG_CONFIG": "remote_host=host.docker.internal remote_port=9003 idekey=VSCODE",
  // "PHP_IDE_CONFIG": "serverName=phpdev",
  // "MYSQL_ROOT_PASSWORD": "root",
  // "MYSQL_DATABASE": "my_database",
  // "MYSQL_USER": "user",
  // "MYSQL_PASSWORD": "password"
  // },
  // --- FEATURES ---
  // Permite añadir herramientas adicionales (como Git, Docker-in-Docker, etc.) fácilmente.
  // Mas info: https://containers.dev/features.
  // "features": {},

  // --- REENVÍO DE PUERTOS (FORWARD PORTS) ---
  // ¿Por qué comentarlos? Porque ya los estás exponiendo en el docker-compose.yml.
  // Solo se deben activar aquí si necesitas que VS Code gestione el túnel de forma automática
  // cuando te conectas de forma remota (por ejemplo, a través de SSH o GitHub Codespaces).
  // "forwardPorts": [],
  // "forwardPorts": [80, 9000, 9003],
  // "portsAttributes": {
  // "80": {
  // "label": "App",
  // "protocol": "http"
  // },
  // "9000": {
  // "label": "X-Debug"
  // },
  // "9003": {
  // "label": "X-Debug"
  // }
  // }

  // --- COMANDOS POST-CREACIÓN ---
  // Ideal para instalar dependencias automáticamente (composer install, npm install)
  // "postCreateCommand": "echo 'Contenedor listo'",

  // Configuraciones especificas como por ejemplo un usuario remoto.
  // Mas info: https://aka.ms/dev-containers-non-root.
  // "remoteUser": "root"
}
```

### Docker-compose.yml

Es el archivo de configuración para definir y ejecutar los servicios del contenedor. Define los servicios, las imágenes, los volúmenes, las redes y otras configuraciones necesarias para ejecutar el contenedor. Es esencial para orquestar los diferentes servicios (PHP, base de datos, phpMyAdmin) y asegurar que se comuniquen correctamente entre sí.

Solo muestro la versión con base de datos, pero la versión sin base de datos es similar, solo que sin el servicio de base de datos y phpMyAdmin.

```yaml
# ==============================================================================
# ENTORNO DE DESARROLLO PHP + MARIADB + PHPMYADMIN
# ==============================================================================
# Este archivo levanta un stack completo de desarrollo.
# Las credenciales y configuración se gestionan mediante el archivo .env
# ==============================================================================
services:
  # --- MOTOR DE BASE DE DATOS ---
  db:
    image: mariadb:11.8-ubi9-rc
    restart: unless-stopped # Reinicia el contenedor si se detiene por fallo, pero no si se detiene manualmente
    environment: # Variables de entorno para la configuración de MariaDB
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD} # Contraseña del usuario root
      MYSQL_DATABASE: ${MYSQL_DATABASE} # Nombre de la base de datos a crear
      MYSQL_USER: ${MYSQL_USER} # Usuario adicional
      MYSQL_PASSWORD: ${MYSQL_PASSWORD} # Contraseña del usuario adicional
      # PMA_HOST y PMA_PORT se usan en el contenedor de phpmyadmin
    # env_file:
    #   - .env
    ports:
      - "127.0.0.1:3306:3306" # Mapeo local para herramientas externas
    labels: # Etiquetas para identificar los puertos en herramientas
      - "port.3306=MariaDB"
    volumes: # Montaje de volumen para persistencia de datos
      - db_data:/var/lib/mysql

  # --- ENTORNO DE DESARROLLO PHP ---

  phpdev:
    build:
      context: . # Ruta al Dockerfile
      dockerfile: Dockerfile
    restart: unless-stopped
    volumes: # Montajes de volúmenes
      - ../:/workspaces # Montaje del código fuente en el contenedor
    # - .:/var/www/html
    ports: # Mapeo de puertos
      - "127.0.0.1:80:80" # Puerto para la aplicación web
      - "127.0.0.1:9000:9000" # Puerto para Xdebug (versión anterior a Xdebug 3)
      - "127.0.0.1:9003:9003" # Puerto para Xdebug (Xdebug 3)
    labels:
      - "port.80=App Web"
      - "port.9000=Xdebug"
      - "port.9003=Xdebug3"
    depends_on: # Dependencias de servicio
      - db # Asegura que la base de datos esté disponible antes de iniciar PHP

  # --- ADMINISTRACIÓN DE BD (OPCIONAL) ---
  phpmyadmin:
    image: phpmyadmin:5.2.2-apache
    restart: unless-stopped
    profiles: ["phpmyadmin"] # se inicia solo si lo pides, o si lo tienes en runServices en devcontainer.json
    environment:
      PMA_HOST: ${PMA_HOST}
      PMA_PORT: ${PMA_PORT}
      # Aprovecho y uso las mismas variables de entorno que el contenedor de la BD
      # CUIDADO AQUI
      # Poner root para tener todos los privilegios, y que mariadb no ponga problemas con el nombre de user
      # si lo dejo del otro modo da problemas luego al abrir phpmyadmin, porque provoca
      # confusion con lo que tengo configurado en el .env
      # PMA_USER: root
      # si tienes claro que user va y lo tienes bien configurado en el .env puedes usarlo. Pero OJO
      PMA_USER: ${MYSQL_USER}
      PMA_PASSWORD: ${MYSQL_PASSWORD}
    ports:
      - "127.0.0.1:8080:80" # 80 del contenedor al puerto 8080 del host
    labels:
      - "port.8080=PhpMyAdmin"
    depends_on:
      - db
    # profiles: ["phpmyadmin"] #POr si quiero lanzar a mano
    # env_file:
    #   - .env
    # Esta línea la uso para habilitar o deshabilitar phpMyAdmin
    # 1 para habilitar, 0 para deshabilitar. POr defecto cero
    # Tengo que cambiarlo en el archivo .env
    deploy:
      replicas: ${ENABLE_PHPMYADMIN:-0}

volumes:
  db_data:
```

### .env

Es el archivo de configuración para las variables de entorno. Define las credenciales de la base de datos, los puertos y otras configuraciones necesarias para el contenedor. Es esencial para mantener la configuración centralizada y evitar exponer información sensible en los archivos de configuración del contenedor.

```ini
# ==============================================================================
# CONFIGURACIÓN DE VARIABLES GLOBALES
# ==============================================================================

# Configuración de la base de datos
# --- MARIADB / DATABASE ---
# Contraseña del superusuario (root) para administración total
MYSQL_ROOT_PASSWORD=1234
# Nombre de la base de datos inicial creada al arrancar el contenedor
MYSQL_DATABASE=db
# Usuario de aplicación (evitamos 'root' para prevenir conflictos de privilegios)
# MYSQL_USER=root ,mejor no poner root,
# ya que es el user por defectro en mariadb como admin si lo creo asi me dará mas errores
# MYSQL_USER=user
# MYSQL_PASSWORD=password
MYSQL_USER=admin
MYSQL_PASSWORD=1234

# --- PHPMYADMIN (ADMINISTRACIÓN WEB) ---
# Configuración de phpMyAdmin
PMA_HOST=db
PMA_PORT=3306
PMA_USER=${MYSQL_USER}
PMA_PASSWORD=${MYSQL_PASSWORD}

# --- CONTROL DE DESPLIEGUE ---
# Control de phpMyAdmin (1 para activarlo, 0 para desactivarlo)
ENABLE_PHPMYADMIN=1
```

### Dockerfile

Es el archivo de configuración para construir la imagen del contenedor. Define la imagen base, las dependencias, las extensiones de PHP, la configuración de Xdebug y los puertos expuestos. Es esencial para personalizar el entorno de desarrollo y asegurarse de que todas las herramientas necesarias estén disponibles en el contenedor.

```Dockerfile
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
```

### Xdebug.ini

Es el archivo de configuración para Xdebug. Define las opciones de depuración, como el modo, el puerto, la IP del cliente y otras configuraciones relacionadas con Xdebug. Es crucial para asegurar que la depuración funcione correctamente y que VS Code pueda conectarse al contenedor para depurar el código PHP.

```ini
# /usr/local/etc/php/conf.d/xdebug.ini o docker-php-ext-xdebug.ini Ademas abrir puertos 9000 y 9003
# Tambien se debe configurar el archivo launch.json de vscode. Apuntar en hosts a:
# 127.0.0.1 host.docker.internal
# 127.0.0.1 gateway.docker.internal
zend_extension=xdebug.so
xdebug.mode=debug,develop
xdebug.idekey=VSCODE
xdebug.start_with_request=yes
xdebug.discover_client_host =0
xdebug.client_port=9003
; xdebug.client_host=127.0.0.1
xdebug.client_host=host.docker.internal
xdebug.log=/var/log/apache2/xdebug.log
```

### launch.json de VSCode para debug

Es el archivo de configuración para la depuración en VS Code. Define las configuraciones de depuración, como el tipo de depuración, el puerto, la IP del cliente y las rutas de mapeo entre el contenedor y el host. Es esencial para configurar correctamente la depuración con Xdebug y asegurarse de que VS Code pueda conectarse al contenedor para depurar el código PHP.

> [!WARNING]
> Este archivo debe estar en la carpeta .vscode del proyecto. es con el que se configura VSCode para depurar con Xdebug.
> He tenido que hacer algunos ajustes para que funcione correctamente con el contenedor y Xdebug 3. Por ejemplo, he cambiado el puerto a 9003 que es el que usa Xdebug 3 por defecto. Así como que lance como localhost y no la IP del contenedor.
> Pueden hacerse mejores ajustes según las necesidades de cada uno. Para mi caso de uso funciona correctamente y no necesitaba mas. Es solo una idea de como configurarlo.

```json
{
  // Use IntelliSense para saber los atributos posibles.
  // Mantenga el puntero para ver las descripciones de los existentes atributos.
  // Para más información, visite: https://go.microsoft.com/fwlink/?linkid=830387
  "version": "0.2.0",
  "configurations": [
    {
      "name": "Listen for Xdebug",
      "type": "php",
      "request": "launch",
      "port": 9003,
      // hostname: para indicar que se va a usar el servidor interno de PHP
      // 0.0.0.0 porque es el valor por defecto. no HACE FALTA
      "hostname": "0.0.0.0",
      "pathMappings": {
        "/var/www/html": "${workspaceRoot}"
      }
    },
    {
      "name": "Launch currently open script",
      "type": "php",
      "request": "launch",
      "program": "${file}",
      "cwd": "${fileDirname}",
      "port": 0,
      "runtimeArgs": ["-dxdebug.start_with_request=yes"],
      "env": {
        "XDEBUG_MODE": "debug,develop",
        "XDEBUG_CONFIG": "client_port=${port}"
      }
    },
    {
      "name": "Launch Built-in web server",
      "type": "php",
      "request": "launch",
      "runtimeArgs": [
        "-dxdebug.mode=debug",
        "-dxdebug.start_with_request=yes",
        // "-S", para indicar que se va a usar el servidor interno de PHP
        // "localhost:80 u 8080. El puerto que se va a usar. Uno de los que tengas abierto
        "-S",
        "localhost:80"
      ],
      "program": "",
      // "cwd": "${workspaceFolder}", es la variable moderna y recomendada por VS Code.
      // ${workspaceRoot} se mantiene solo por compatibilidad.
      // En Dev Containers, ${workspaceFolder} garantiza rutas coherentes y depuración estable.
      "cwd": "${workspaceFolder}",
      // "cwd": "${workspaceRoot}",
      "port": 9003,
      "serverReadyAction": {
        "pattern": "Development Server \\(http://localhost:([0-9]+)\\) started",
        // ${relativeFile} para abrir el archivo actual
        "uriFormat": "http://localhost:%s/${relativeFile}",
        "action": "openExternally"
      }
    }
  ]
}
```

### Hosts

Es importante configurar el archivo `hosts` para asegurar que las conexiones de Xdebug desde el contenedor al host funcionen correctamente, especialmente cuando se trabaja con redes cambiantes o en entornos de desarrollo locales. Al mapear `host.docker.internal` a `127.0.0.1` en el archivo `hosts`, se garantiza que Xdebug pueda comunicarse correctamente con el host.
No siempre es necesario, pero puede ser útil para evitar tener que cambiar la IP del cliente cada vez que cambias de red o si estás trabajando en un entorno local donde `host.docker.internal` no se resuelve correctamente. En ese caso, mapearlo a `127.0.0.1`. Solo es necesario si estás trabajando en un entorno local y no en la nube (GitHub Codespaces, etc.) donde `host.docker.internal` ya está configurado correctamente.
Solo lo he indicado por si alguien tiene problemas con la IP del cliente y la conexión de Xdebug, para que pueda probar esta solución.

```powershell
# para registry de Docker
#44.208.254.194	registry-1.docker.io
#98.85.153.80	registry-1.docker.io
#3.94.224.37		registry-1.docker.io
# Added by Docker Desktop
#192.168.1.42 host.docker.internal
#192.168.1.42 gateway.docker.internal
#cambie de ip
#192.168.1.14 host.docker.internal
#192.168.1.14 gateway.docker.internal
127.0.0.1 host.docker.internal
127.0.0.1 gateway.docker.internal

# To allow the same kube context to work on the host and the container:
127.0.0.1 kubernetes.docker.internal
# End of section
```

## Casos de uso reales

- Equipos de desarrollo
- Entornos educativos
- Laboratorios DevOps
- Onboarding de desarrolladores
- Entornos reproducibles CI/CD

## Conclusión

Este proyecto surge de la necesidad real de disponer de un entorno reproducible durante el aprendizaje como futuro administrador de sistemas.

Desde los primeros meses del ciclo comenzó como una idea orientada a facilitar el estudio, evolucionando progresivamente hasta convertirse en una herramienta funcional, portable y reproducible.

El resultado es un entorno de desarrollo profesional que simplifica la configuración, mejora la comprensión del ecosistema Docker/Dev Containers y refuerza el aprendizaje práctico.

Este proyecto demuestra cómo un administrador de sistemas puede diseñar, automatizar y mantener entornos de desarrollo profesionales, reproducibles y escalables utilizando contenedores.
