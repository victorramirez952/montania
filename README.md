# Montania
## Instalación de repositorio

### 1. Instalar Visual Studio Code
[Visual Studio Code](https://code.visualstudio.com/download)



### 2. Instalar Xampp
[Xampp](https://www.apachefriends.org/es/download.html)

### 3. Instalar NodeJS
[NodeJS](https://nodejs.org/en/download/current)

### 4. Instalar Git bash
[Git Bash](https://git-scm.com/downloads)

### 5. Configurar git bash
Abrir git bash y ejecutar los siguientes comandos
```bash
git config --global user.name "username_cuenta_github"
git config --global user.email correo_cuenta_github@example.com
```

[Configurando Git por primera vez](https://git-scm.com/book/es/v2/Inicio---Sobre-el-Control-de-Versiones-Configurando-Git-por-primera-vez)

### 6. Instalar Composer
[Composer](https://getcomposer.org/download/)

*Descargar el instalador para windows y ejecutarlo*

### 7. Clonar (descargar) repositorio de github
- Abrir el explorador de archivos
- Ir al directorio C:\xampp\htdocs\
- Crear una carpeta llamada "montania"
- Ingresar dentro de la carpeta "montania"
- Dar clic derecho en cualquier parte de la ventana del explorador de archivos
- Seleccionar la opción "Open Git Bash here" para abrir Git bash
- Ingresar el siguiente comando:
```bash
git clone https://github.com/victorramirez952/Glearning.git
````
- Ingresar el siguiente comando para abrir Visual Studio Code en el directorio actual:
```bash
code .
```

### 8. Instalar dependencias npm
Ejecutar el siguiente comando en Git Bash o en una terminal del Visual Studio Code abierto en el paso anterior:
```bash
npm install
```

### 9. Instalar dependencias composer
Ejecutar el siguiente comando en Git Bash o en una terminal del Visual Studio Code:
```bash
composer install
```

### 8. Generar app key
Ejecutar el siguiente comando en Git Bash o en una terminal del Visual Studio Code:
```bash
php artisan key:generate
```

### 9. Restaurar base de datos montania
- Descargar el archivo llamado "montania.sql"
- Abrir Xampp
- Dar clic en Start para iniciar Apache
- Dar clic en Start para iniciar MySQL
- Dar clic en Admin para MySQL
- Crear nueva base de datos llamada "montania"
- Dar clic a la sección de "import" en el phpmyadmin
- Seleccionar el archivo "montania.sql" y dar clic en el boton inferior "Import"

### 10. Configurar .env para conectar a la base de datos

En el directorio de "montania", cambiar el nombre del archivo ".env.example" a ".env"

Editar el documento ".env" de tal forma que tenga lo siguiente (Dejar las otras opciones por defecto):
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=montania
DB_USERNAME=root
DB_PASSWORD=
```

*Ajustar el DB_HOST y/o el DB_PORT si es necesario*

### 11. Cambiar la ruta de APP_URL
En el archivo ".env", modificar el APP_URL con la ruta en la cual se encuentra el directorio "montania/public" dentro de htdocs. Por ejemplo:
```
APP_URL=http://localhost/montania/public
```

### 12. Levantar proyecto
Ejecutar el siguiente comando en Git Bash o en una terminal del Visual Studio Code:
```bash
npm run dev
```

En el navegador, ir a la ruta de APP_URL
[http://localhost/montania/public](https://youtu.be/dQw4w9WgXcQ?si=zqZeX9w1nFcJ9zYC)

