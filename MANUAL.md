# Sistema de Gestión Inmobiliaria

## Información del Proyecto
**Nombre:** Sistema de Gestión Inmobiliaria
**Tecnología:** Laravel 11 + Livewire 3 + Tailwind CSS

## Integrantes
[Completar con los nombres de los integrantes del grupo]

---

## Descripción del Sistema

Sistema web para la gestión de propiedades inmobiliarias que permite a diferentes tipos de usuarios (Administradores, Agentes y Clientes) interactuar con el catálogo de propiedades disponibles.

---

## Roles y Permisos

### 1. Administrador (admin)
**Credenciales de prueba:**
- Email: admin@inmobiliaria.com
- Contraseña: password

**Funcionalidades:**
- ✅ Ver todas las propiedades de todos los agentes
- ✅ Crear nuevas propiedades asignándolas a cualquier agente
- ✅ Editar cualquier propiedad
- ✅ Eliminar cualquier propiedad
- ✅ Ver detalles completos de propiedades
- ✅ Filtrar y buscar propiedades
- ✅ Gestionar su perfil

**Capturas de pantalla:**
[Agregar captura del dashboard de admin]
[Agregar captura de la gestión de propiedades]

---

### 2. Agente Inmobiliario (agente)
**Credenciales de prueba:**
- Email: maria@inmobiliaria.com
- Contraseña: password

Otros agentes disponibles:
- juan@inmobiliaria.com / password
- ana@inmobiliaria.com / password

**Funcionalidades:**
- ✅ Ver solo sus propias propiedades
- ✅ Crear nuevas propiedades (asignadas automáticamente a sí mismo)
- ✅ Editar solo sus propias propiedades
- ✅ Eliminar solo sus propias propiedades
- ✅ Ver detalles completos de propiedades
- ✅ Filtrar y buscar propiedades
- ✅ Gestionar su perfil

**Capturas de pantalla:**
[Agregar captura del dashboard de agente]
[Agregar captura de creación de propiedad]

---

### 3. Cliente (cliente)
**Credenciales de prueba:**
- Email: carlos@example.com
- Contraseña: password

Otros clientes disponibles:
- laura@example.com / password

**Funcionalidades:**
- ✅ Ver todas las propiedades disponibles
- ✅ Ver detalles completos de propiedades
- ✅ Filtrar y buscar propiedades
- ✅ Gestionar su perfil
- ❌ No puede crear, editar ni eliminar propiedades

**Capturas de pantalla:**
[Agregar captura del dashboard de cliente]
[Agregar captura de la vista de propiedades]

---

## Funcionalidades Principales

### 1. Gestión de Propiedades (CRUD)

#### Crear Propiedad
- **Quién puede:** Admin y Agente
- **Campos requeridos:**
  - Título (mínimo 5 caracteres)
  - Descripción (mínimo 20 caracteres)
  - Tipo (Casa, Departamento, Terreno, Local, Oficina)
  - Operación (Venta, Alquiler)
  - Precio (numérico)
  - Dirección
  - Ciudad
  - Provincia
  - Superficie (m²)
- **Campos opcionales:**
  - Habitaciones
  - Baños
  - Imagen (máximo 2MB)
  - Estado (Disponible/No disponible)

**Validaciones:**
- Todos los campos se validan en el servidor
- Los datos se sanean automáticamente
- Las imágenes se validan por tipo y tamaño

[Agregar captura del formulario de creación]

#### Listar Propiedades
- **Quién puede:** Todos los usuarios autenticados
- **Características:**
  - Paginación de 10 registros por página
  - Búsqueda por texto en título, descripción, dirección y ciudad
  - Filtros por:
    - Tipo de propiedad
    - Operación (venta/alquiler)
    - Disponibilidad
  - Vista de tabla con información resumida
  - Acciones según permisos del usuario

[Agregar captura del listado con filtros]

#### Ver Detalles de Propiedad
- **Quién puede:** Todos los usuarios autenticados
- **Información mostrada:**
  - Imagen principal
  - Título y descripción completa
  - Precio y características
  - Ubicación
  - Datos del agente responsable
  - Estado de disponibilidad

[Agregar captura de la vista de detalle]

#### Editar Propiedad
- **Quién puede:** 
  - Admin: cualquier propiedad
  - Agente: solo sus propiedades
- **Proceso:**
  - Se cargan los datos actuales
  - Se validan los cambios
  - Se puede cambiar la imagen (conserva la anterior si no se sube nueva)

[Agregar captura del formulario de edición]

#### Eliminar Propiedad
- **Quién puede:**
  - Admin: cualquier propiedad
  - Agente: solo sus propiedades
- **Seguridad:**
  - Confirmación antes de eliminar
  - Se elimina la imagen asociada del servidor
  - No se puede deshacer

---

### 2. Sistema de Autenticación

#### Registro
- Los usuarios pueden registrarse como Cliente o Agente
- Solo los administradores se crean mediante seeders
- Validación de email único
- Contraseña segura requerida

[Agregar captura del registro]

#### Login
- Email y contraseña
- Redirección al dashboard según rol
- Sesión persistente

[Agregar captura del login]

#### Recuperación de Contraseña
- Sistema de reset por email
- Token temporal de seguridad

---

### 3. Protección y Seguridad

#### Protección de Rutas
- Todas las rutas de propiedades requieren autenticación
- Middleware `role` valida permisos según el rol
- Acceso denegado (403) si se intenta acceder sin permisos
- Las URLs protegidas no son accesibles por copy-paste

**Ejemplo:**
```
/propiedades/crear/nueva - Solo admin y agente
/propiedades/{id}/editar - Solo admin y el agente dueño
```

#### Validaciones
- Validación en el servidor de todos los formularios
- Sanitización automática de inputs
- Protección contra XSS y SQL Injection (framework)
- Validación de tipos de archivo (solo imágenes)
- Validación de tamaños (máximo 2MB para imágenes)

---

## Instalación y Configuración

### Requisitos
- PHP >= 8.2
- Composer
- Node.js y NPM
- MySQL/MariaDB

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
cd pp-web
```

2. **Instalar dependencias de PHP**
```bash
composer install
```

3. **Instalar dependencias de Node.js**
```bash
npm install
```

4. **Configurar el archivo .env**
```bash
cp .env.example .env
```
Editar `.env` con las credenciales de la base de datos

5. **Generar la clave de la aplicación**
```bash
php artisan key:generate
```

6. **Crear el enlace simbólico para storage**
```bash
php artisan storage:link
```

7. **Ejecutar migraciones y seeders**
```bash
php artisan migrate:fresh --seed
```

8. **Compilar assets**
```bash
npm run build
```

9. **Iniciar el servidor**
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

---

## Estructura del Proyecto

```
pp-web/
├── app/
│   ├── Http/
│   │   └── Middleware/
│   │       └── RoleMiddleware.php (Middleware de roles)
│   ├── Livewire/
│   │   ├── Auth/ (Componentes de autenticación)
│   │   ├── Propiedades/ (Componentes CRUD de propiedades)
│   │   └── Settings/ (Configuraciones de usuario)
│   └── Models/
│       ├── User.php (Modelo de usuario con roles)
│       └── Propiedad.php (Modelo de propiedades)
├── database/
│   ├── migrations/
│   │   ├── 2026_01_29_000001_add_role_to_users_table.php
│   │   └── 2026_01_29_000002_create_propiedades_table.php
│   └── seeders/
│       ├── UserSeeder.php (Crea usuarios de prueba)
│       └── PropiedadSeeder.php (Crea propiedades de prueba)
├── resources/
│   └── views/
│       ├── livewire/
│       │   └── propiedades/ (Vistas de propiedades)
│       └── components/
│           └── layouts/ (Layouts de la aplicación)
└── routes/
    └── web.php (Definición de rutas con middleware)
```

---

## Características Técnicas Implementadas

### ✅ Patrón MVC
- **Modelo:** User, Propiedad
- **Vista:** Blade components con Livewire
- **Controlador:** Livewire components

### ✅ Validación y Sanitización
- Validación server-side en todos los formularios
- Rules personalizadas para cada campo
- Mensajes de error en español
- Sanitización automática de Laravel

### ✅ Paginación
- 10 registros por página
- Integración con Livewire
- Mantiene filtros al cambiar de página

### ✅ Sistema de Roles
- 3 roles: Admin, Agente, Cliente
- Métodos helper en el modelo User
- Middleware personalizado
- Control granular de permisos

### ✅ Restricciones de Acceso
- Middleware en rutas
- Validación en componentes Livewire
- Verificación en vistas (botones condicionales)
- Protección contra acceso directo por URL

### ✅ Diseño Personalizado
- Basado en Tailwind CSS
- No es plantilla default de Laravel
- Responsive design
- Dark mode incluido
- Componentes Flux UI personalizados

---

## Datos de Prueba

El sistema incluye datos de prueba generados automáticamente:

- 1 Administrador
- 3 Agentes Inmobiliarios
- 2 Clientes
- 10 Propiedades variadas (casas, departamentos, terrenos, locales, oficinas)

Todas las contraseñas son: **password**

---

## Capturas de Pantalla

### Dashboard
[Insertar captura aquí]

### Listado de Propiedades
[Insertar captura aquí]

### Crear Propiedad
[Insertar captura aquí]

### Editar Propiedad
[Insertar captura aquí]

### Ver Detalle de Propiedad
[Insertar captura aquí]

### Login y Registro
[Insertar captura aquí]

### Filtros y Búsqueda
[Insertar captura aquí]

### Vista de Administrador
[Insertar captura aquí]

### Vista de Agente
[Insertar captura aquí]

### Vista de Cliente
[Insertar captura aquí]

---

## Notas Importantes

- El rol de administrador solo se puede asignar mediante seeders o base de datos directa (no desde el registro)
- Las imágenes de propiedades se almacenan en `storage/app/public/propiedades`
- Es necesario ejecutar `php artisan storage:link` para que las imágenes sean accesibles
- La aplicación usa SQLite por defecto, pero puede configurarse para MySQL/PostgreSQL
- Todas las validaciones están en español

---

## Desarrollo Futuro

Posibles mejoras:
- Sistema de favoritos para clientes
- Chat entre clientes y agentes
- Sistema de citas/visitas
- Reportes y estadísticas
- Exportación de datos a PDF
- API REST para aplicación móvil
- Sistema de notificaciones
- Galería múltiple de imágenes por propiedad

---

## Soporte y Contacto

[Agregar información de contacto del grupo]
