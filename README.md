Proyecto desarrollado en Laravel 12 para la gestión de estudiantes (CRUD completo):
- Crear, listar, editar y eliminar registros de estudiantes.
- Conexión a base de datos MySQL (usando XAMPP).
- Validación de formularios y diseño con TailwindCSS.

Alumno: Emanuel Alejandro Romo Vargas

 Tecnologías utilizadas
- PHP 8.2
- Laravel 12
- MySQL (XAMPP)
- TailwindCSS
- Node.js / Vite
Para ejecutar este proyecto necesitas tener instalados:

- [XAMPP](https://www.apachefriends.org/es/index.html)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- Git

También deberá estar corriendo **Apache** y **MySQL** desde XAMPP.


##  Instalación

Entrar al proyecto:
cd crud-estudiantes-laravel

Instalar dependencias de Laravel:
composer install


Instalar dependencias de Node/Tailwind:
npm install


Crear el archivo .env a partir del ejemplo:
cp .env.example .env


Configurar la base de datos en el archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_estudiantes
DB_USERNAME=root
DB_PASSWORD=


Generar la clave de aplicación:
php artisan key:generate


Ejecutar las migraciones y seeders:
php artisan migrate --seed


Iniciar el servidor:
php artisan serve


Abrir en el navegador:
http://127.0.0.1:8000

Características

CRUD completo de estudiantes.
Validaciones de campos (nombre, número de control, semestre)
Campo No. Control solo numérico y único.
Buscador por nombre o número de control.
Mensajes de éxito y error.

Estilo con TailwindCSS.

