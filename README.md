# Prueba-Tecnica-Monoma
Prueba Técnica Monoma para el cargo de Desarrollador Backend Laravel.

## Requisitos

- PHP >= 7.4
- Composer
- Laravel 9
- MySQL

## Instalación

1. Clona el repositorio:

    bash
    git clone https://github.com/tu-usuario/Prueba-Tecnica-Monoma.git
    

2. Entra al directorio del proyecto:

    bash
    cd Prueba-Tecnica-Monoma
    

3. Instala las dependencias:

    bash
    composer install
    

4. Copia el archivo `.env.example` a `.env` y configura la base de datos:

    bash
    cp .env.example .env
    

5. Genera la clave de aplicación y configura la base de datos en el archivo `.env`:

    bash
    php artisan key:generate
    

    Configura la conexión a la base de datos en el archivo `.env`:

    dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=monoma
    DB_USERNAME=monoma
    DB_PASSWORD=Monoma*07
    

6. Ejecuta las migraciones para crear las tablas de la base de datos:

    bash
    php artisan migrate
    

7. Ejecuta los seeders para llenar la base de datos con datos de prueba:

    bash
    php artisan db:seed --class=UserSeeder --verbose
    php artisan db:seed --class=LeadSeeder --verbose
    

8. Inicia el servidor de desarrollo:

    bash
    php artisan serve
    

    El servidor estará disponible en http://127.0.0.1:8000/.

## Uso

Puedes utilizar este proyecto como base para tu aplicación o para aprender sobre el desarrollo en Laravel 9. ¡Diviértete codificando!

# Prueba-Tecnica-Monoma
Prueba Técnica Monoma para el cargo de Desarrollador Backend Laravel.

## Requisitos

- PHP >= 7.4
- Composer
- Laravel 9
- MySQL

## Instalación

1. Clona el repositorio:

    bash
    git clone https://github.com/tu-usuario/Prueba-Tecnica-Monoma.git
    

2. Entra al directorio del proyecto:

    bash
    cd Prueba-Tecnica-Monoma
    

3. Instala las dependencias:

    bash
    composer install
    

4. Copia el archivo `.env.example` a `.env` y configura la base de datos:

    bash
    cp .env.example .env
    

5. Genera la clave de aplicación y configura la base de datos en el archivo `.env`:

    bash
    php artisan key:generate
    

    Configura la conexión a la base de datos en el archivo `.env`:

    dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=monoma
    DB_USERNAME=monoma
    DB_PASSWORD=Monoma*07
    

6. Ejecuta las migraciones para crear las tablas de la base de datos:

    bash
    php artisan migrate
    

7. Ejecuta los seeders para llenar la base de datos con datos de prueba:

    bash
    php artisan db:seed --class=UserSeeder --verbose
    php artisan db:seed --class=LeadSeeder --verbose
    

8. Inicia el servidor de desarrollo:

    bash
    php artisan serve
    

    El servidor estará disponible en http://127.0.0.1:8000/.

## Uso

Puedes utilizar este proyecto como base para tu aplicación o para aprender sobre el desarrollo en Laravel 9. ¡Diviértete codificando!
