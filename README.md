
<h3>Guía de despliegue - GameBox</h3>

1. `composer install`, para instalar las dependencias de Laravel y otros paquetes.
2. Copiar .env.example dentro del proyecto como .env
3. Desde la ruta del proyecto, **`php artisan key:generate`
4. `npm install`, para instalar todas las dependencias de frontend necesarias.
    1. Si lanza un error: `Set-ExecutionPolicy RemoteSigned -Scope CurrentUser`
5. Ejecutar XAMPP → MySQL y Apache
6. `php artisan migrate --seed`
7. `php artisan serve`, en una terminal
8. `php artisan queue:listen`, en otra terminal
9. `npm run dev`, en otra terminal
10. Abrir el gestor de emails → [Mailtrap](https://mailtrap.io/signin)

<strong>Datos para env.mail:</strong>

`MAIL_MAILER=smtp`
`MAIL_SCHEME=null`
`MAIL_HOST=sandbox.smtp.mailtrap.io`
`MAIL_PORT=2525`
`MAIL_USERNAME=676a1cefa38a45`
`MAIL_PASSWORD=fc52fb92d95fab`
`MAIL_FROM_ADDRESS="gamebox@email.com"`
`MAIL_FROM_NAME="GameBox"`
