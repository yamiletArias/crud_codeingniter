# Crud Basico - CodeIngiter4

Aplicación simple para gestionar clientes, proveedores, productos y ventas, utilizando CodeIgniter 4 y una base de datos MySQL.

## 📦 Contenido

- Gestión de Clientes.
- Gestión de Proveedores.
- Gestión de Productos.
- Gestión de Ventas.
- Detalle de venta.

## 📌 Requisitos

- Servidor local como XAMPP, MAMP o similar
- Composer
- PHP 8.1 o superior
- MySQL

## 🚀 Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/yamiletArias/crud_codeingniter.git
cd crud_codeingniter
```
2. Instala dependencias con Composer:
```bash
composer install
```
3. Configurar el entorno

Copia el archivo de ejemplo del entorno:

cp .env.example a `.env`

4. Edita el archivo `.env` y configura los datos de conexión a tu base de datos:
```bash
database.default.hostname = localhost
database.default.database = entrenaci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

5. Crea la base de datos y la tablas:

- Importa el script:
app/Database/scripts/base.sql
```
app/Database/scripts/Database.sql
```

## 🚀 Ejecución
En caso de estar usando Laragon, Abre tu navegador y accede a:
```
http://crud_codeingniter.test
```

Asi terminamos muxaxos <3