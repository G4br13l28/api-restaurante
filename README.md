# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

> **Note:** In the years since releasing Lumen, PHP has made a variety of wonderful performance improvements. For this reason, along with the availability of [Laravel Octane](https://laravel.com/docs/octane), we no longer recommend that you begin new projects with Lumen. Instead, we recommend always beginning new projects with [Laravel](https://laravel.com).

# Proyecto de Lumen - Restaurante API

Este repositorio contiene un proyecto de API construido con el framework Lumen de Laravel. La API proporciona endpoints para manejar las entidades de usuarios, restaurantes, pedidos, detalle de pedidos y platos. Además, cuenta con documentación Swagger accesible en la ruta `/api/documentation`.




## Instrucciones para abrir el proyecto
Para ejecutar el proyecto en tu entorno local, sigue los siguientes pasos:

### Clonar el repositorio:

Abre tu terminal y ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
```
Reemplaza tu-usuario y tu-repositorio con tus credenciales de GitHub y el nombre del repositorio, respectivamente.

### Instalar las dependencias:

Navega a la carpeta del proyecto y ejecuta el siguiente comando para instalar las dependencias necesarias:

```bash
cd tu-repositorio
composer install
```
### Configurar el archivo .env:

El proyecto utiliza PostgreSQL como base de datos. Debes configurar las credenciales de la base de datos en el archivo .env. Copia el archivo .env.example y renómbralo a .env. Luego, actualiza las siguientes variables con los detalles de tu base de datos:

```
makefile
Copy code
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_de_postgres
DB_PASSWORD=tu_contraseña_de_postgres
```
### Ejecutar las migraciones:

Antes de ejecutar la API, necesitas ejecutar las migraciones para crear las tablas en la base de datos. Utiliza el siguiente comando para realizar las migraciones:

```bash
php artisan migrate
```
Esto creará las tablas necesarias en la base de datos configurada.


## Ejecutar Localmente

Finalmente, inicia el servidor local para ejecutar la API. Utiliza el siguiente comando:

```bash
php -S localhost:8000 -t public
```
La API ahora estará accesible en http://localhost:8000.



## API Reference
Ejemplo de request para las diferentes endpoints

#### Obtener todos los restaurantes

```http
  GET /restaurantes
```


#### Obtener restaurante por id

```http
  GET /restaurantes/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del restaurante |


#### Crear un nuevo restaurante
```http
  POST /restaurantes
```
Body request en formato json

```json
{
  "ruc": "<string>",
  "nombre": "<string>",
  "direccion": "<string>",
  "telefono": "<string>",
  "email": "<string>",
  "categoria": "<string>"
}
```
#### Actualizar un restaurante

```http
  PUT /restaurantes/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del restaurante |

Body request en formato json

```json
{    
  "ruc": "<string>",
  "nombre": "<string>",
  "direccion": "<string>",
  "telefono": "<string>",
  "email": "<string>",
  "categoria": "<string>"
}
```
#### Eliminar un restaurante

```http
  DELETE /restaurantes/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id del restaurante |





## Documentación Swagger

La documentación Swagger de la API está disponible en la ruta `/api/documentation`. Puedes acceder a la documentación utilizando tu navegador web y navegando a esa ruta una vez que hayas iniciado el servidor local.
## Authors

- [@yo para mi deber](https://www.github.com/nobuscar)

