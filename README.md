# PruebaCaol

Indicaciones para el despliegue de la aplicación.

1- Obligatorio, se debe tener instalado composer de no ser es el caso debe instalarse, las intrucciones para su instalación, se pueden ver
   siguiendo el siguiente link: https://getcomposer.org/

2- Clonar el repositorio.

   $git clone https://github.com/manueltelleria/PruebaCaol.git

3- Hacer la instalación con composer

  $cd PruebaCaol
  $composer install

4- Crear y poblar la base de datos

  $mysql -uroot

  mysql>create database caol;

  mysql>\. PruebaCaol/caol.sql

5- Ejecutar los siguientes comandos para generar el archivo .env


  $cd PruebaCaol
  $chmod -R 777 storage
  $cp -p .env_example .env
  $php artisan key:generate

5-Modificar el archivo .env para agregar los parámetros de conexión a la base de datos

  $vi .env

donde dice 

CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=password

debe cambiarse por 

ONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=caol
DB_USERNAME=root
DB_PASSWORD=

guardar el archivo ":x"

6- Desplegar la aplicación en apache

$sudo cd /var/www/
$sudo ln -s directorio_donde_se_clono_el_proyecto 
$sudo /etc/ini.d/apache2 restart

por último se debe acceder a la aplicación, tipeando la siguiente dirección en cualquier browser

http://localhost/PruebaCaol/public/consultor

