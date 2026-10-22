# Gestor de tareas

Aplicación web desarrollada con Laravel para gestionar una lista de tareas.

## Funcionalidades

- Listar las tareas almacenadas en la base de datos.
- Crear tareas con título obligatorio y descripción opcional.
- Validar los datos introducidos y mostrar mensajes de error.
- Cambiar el estado de una tarea entre pendiente y completada.
- Mostrar mensajes de confirmación tras realizar acciones.

## Tecnologías utilizadas

- PHP
- Laravel
- Blade
- HTML y CSS
- Base de datos SQLite

## Instalación y ejecución

1. Clonar o descargar el proyecto.
2. Instalar las dependencias:

   ```bash
   composer install
   ```

3. Configurar el archivo `.env` y la conexión a la base de datos SQLite.
4. Crear el archivo de base de datos `database/database.sqlite`, si no existe.
5. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

6. Iniciar el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

7. Abrir `http://127.0.0.1:8000` en el navegador.

## Notas

Proyecto desarrollado como ejercicio práctico de Laravel.
