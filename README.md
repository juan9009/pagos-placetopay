# pagos-placetopay
Prueba con web service para PlacetoPay

<b>Requisitos para la instalación</b>

1- Composer
2- PHP 5.6+

<b>Pasos para la instalación:</b>

1- Descargar el proyecto <br>
2- Ubicarte en la carpeta principal del proyecto y ejecutar:<br>
  <code>composer install</code><br>
3- Crear la BD llamada <b>pagos</b> y ejecutar el archivo pagos.sql que se encuentra en la carpeta principal<br>
4- Crear una copia del archivo <code>.env.example</code> como <code>.env</code><br> que se encuentra en la carpeta raíz<br>
5- Modificar los parámetros de conexión en el archivo nuevo que se creó <code>.env</code><br>
<b>Ejemplo</b><br>
<code>DB_CONNECTION=mysql</code><br>
<code>DB_HOST=127.0.0.1</code><br>
  <code>DB_PORT=3306</code><br>
  <code>DB_DATABASE=pagos</code><br>
  <code>DB_USERNAME=root</code><br>
  <code>DB_PASSWORD=12345</code><br>
6- Correr las migraciones de la BD, ejecutando <code>php artisan migrate</code> desde la terminal en la ruta del proyecto<br>
7- Ejecutar desde la terminal en la carpeta del proyecto<code>php artisan key:generate</code><br>
8- Ejecutar desde la terminal en la carpeta del proyecto<code>php artisan serve</code><br>
9- Abrir el link que generó
