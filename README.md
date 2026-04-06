# RRHH Web

Aplicación web para la gestión de recursos humanos desarrollada con **Laravel**.  
Permite gestionar información relacionada con empleados, roles y procesos básicos de RRHH.

---

# Requisitos

Antes de instalar el proyecto asegúrate de tener instalado:

- PHP = 8.4
- Composer
- Node.js >= 18
- NPM
- MySQL / MariaDB o SQLite
- Git

---

# Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/Feliandres41/rrhhWeb.git
cd rrhhWeb
```

---

## 2. Instalar dependencias de PHP

```bash
composer install
```

---

## 3. Configurar variables de entorno

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

Generar la clave de la aplicación:

```bash
php artisan key:generate
```

---

## 4. Configurar la base de datos

Editar el archivo `.env` con los datos de tu base de datos.

Ejemplo usando MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rrhh
DB_USERNAME=root
DB_PASSWORD=
```

---

## 5. Ejecutar migraciones

Crear las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

'''seeders
```bash
php artisan db:seed
```

---


## 6. Ejecutar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://localhost:8000
```

---

# Ejecutar los tests

Para ejecutar los tests:

```bash
php artisan test
```

