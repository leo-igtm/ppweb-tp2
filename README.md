# Sistema de Gestión Inmobiliaria

Proyecto web desarrollado con Laravel 11, Livewire 3 y Tailwind CSS para la gestión de propiedades inmobiliarias.

## 🎯 Descripción

Sistema completo de gestión inmobiliaria que permite a diferentes tipos de usuarios (Administradores, Agentes y Clientes) interactuar con un catálogo de propiedades. Implementa CRUD completo, sistema de roles, validaciones, paginación y restricciones de acceso.

## ✨ Características Principales

- ✅ **Sistema de Roles**: Admin, Agente Inmobiliario, Cliente
- ✅ **CRUD Completo**: Gestión de propiedades (Crear, Leer, Actualizar, Eliminar)
- ✅ **Autenticación**: Login, registro y recuperación de contraseña
- ✅ **Validación y Sanitización**: Todos los inputs validados y protegidos
- ✅ **Paginación**: Listados paginados de 10 elementos
- ✅ **Filtros y Búsqueda**: Por tipo, operación, disponibilidad y texto
- ✅ **Carga de Imágenes**: Subida y gestión de imágenes de propiedades
- ✅ **Restricciones de Acceso**: Middleware y políticas por rol
- ✅ **Diseño Responsive**: Adaptado a móviles, tablets y desktop
- ✅ **Dark Mode**: Soporte para modo oscuro

## 🛠️ Tecnologías

- **Backend**: Laravel 11
- **Frontend**: Livewire 3, Tailwind CSS, Flux UI
- **Base de Datos**: SQLite/MySQL
- **PHP**: 8.2+

## 👥 Roles del Sistema

### Administrador
- Acceso completo a todas las funcionalidades
- Puede gestionar propiedades de todos los agentes
- Asignar propiedades a agentes

### Agente Inmobiliario
- Gestiona solo sus propias propiedades
- Crear, editar y eliminar propiedades
- Ver todas las propiedades del sistema

### Cliente
- Ver catálogo de propiedades
- Buscar y filtrar propiedades
- Ver detalles de propiedades

## 📦 Instalación

Ver archivo [INSTALACION.md](INSTALACION.md) para instrucciones detalladas.

### Instalación Rápida

```bash
cd pp-web
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan storage:link
npm install && npm run build
php artisan serve
```

## 🔑 Usuarios de Prueba

El sistema incluye usuarios precargados con la contraseña `password`:

- **Admin**: admin@inmobiliaria.com
- **Agentes**: maria@inmobiliaria.com, juan@inmobiliaria.com, ana@inmobiliaria.com
- **Clientes**: carlos@example.com, laura@example.com

## 📚 Documentación

- [MANUAL.md](MANUAL.md) - Manual completo del usuario con capturas de pantalla
- [INSTALACION.md](INSTALACION.md) - Guía detallada de instalación

## 🏗️ Estructura del Proyecto

```
pp-web/
├── app/
│   ├── Http/Middleware/RoleMiddleware.php
│   ├── Livewire/Propiedades/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/livewire/propiedades/
└── routes/web.php
```

## 🔒 Seguridad

- Validación server-side de todos los formularios
- Sanitización automática de inputs
- Middleware de roles para protección de rutas
- Verificación de permisos en componentes
- Protección CSRF incluida por Laravel

## 📝 Requisitos del Trabajo Práctico

✅ Gestión de información (CRUD)
✅ Login y logout de usuarios
✅ Tres roles de usuarios (Admin, Agente, Cliente)
✅ Restricciones de acceso por rol
✅ Validación y sanitización de datos
✅ Paginación de registros
✅ Interfaz de usuario para gestión
✅ Protección de páginas y rutas
✅ Diseño personalizado (no template default)
✅ Patrón MVC
✅ Datos de prueba incluidos

## 🚀 Próximas Mejoras

- Sistema de favoritos para clientes
- Chat entre clientes y agentes
- Sistema de citas/visitas
- Reportes y estadísticas
- Galería múltiple de imágenes
- API REST

## 📄 Licencia

Este proyecto fue desarrollado como trabajo práctico académico.

---

Desarrollado con ❤️ usando Laravel y Livewire
