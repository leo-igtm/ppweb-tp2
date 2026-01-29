# Instrucciones de Instalación - Sistema Inmobiliaria

## ⚠️ Requisitos Previos

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL/MariaDB o SQLite

## 📋 Pasos de Instalación

### 1. Navegar al directorio del proyecto
```bash
cd pp-web
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Configurar el archivo de entorno
```bash
cp .env.example .env
```

Editar el archivo `.env` con tus configuraciones:
```env
APP_NAME="Sistema Inmobiliaria"
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
# O si usas MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=inmobiliaria
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Generar la clave de la aplicación
```bash
php artisan key:generate
```

### 5. Crear el archivo de base de datos SQLite (si usas SQLite)
```bash
touch database/database.sqlite
```

### 6. Ejecutar migraciones y seeders
```bash
php artisan migrate:fresh --seed
```

Este comando creará:
- Las tablas necesarias
- 1 Administrador
- 3 Agentes inmobiliarios
- 2 Clientes
- 10 Propiedades de ejemplo

### 7. Crear el enlace simbólico para las imágenes
```bash
php artisan storage:link
```

### 8. Instalar dependencias de Node.js
```bash
npm install
```

### 9. Compilar los assets
```bash
# Para desarrollo
npm run dev

# O para producción
npm run build
```

### 10. Iniciar el servidor de desarrollo
En otra terminal, ejecuta:
```bash
php artisan serve
```

## 🎉 ¡Listo!

Accede a la aplicación en: **http://localhost:8000**

## 👥 Usuarios de Prueba

### Administrador
- **Email:** admin@inmobiliaria.com
- **Contraseña:** password
- **Permisos:** Acceso total al sistema

### Agentes
- **Email:** maria@inmobiliaria.com
- **Email:** juan@inmobiliaria.com
- **Email:** ana@inmobiliaria.com
- **Contraseña:** password (para todos)
- **Permisos:** Gestión de sus propias propiedades

### Clientes
- **Email:** carlos@example.com
- **Email:** laura@example.com
- **Contraseña:** password (para todos)
- **Permisos:** Solo visualización de propiedades

## 🔧 Comandos Útiles

### Limpiar caché
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Recrear la base de datos con datos frescos
```bash
php artisan migrate:fresh --seed
```

### Ver rutas disponibles
```bash
php artisan route:list
```

### Ejecutar tests
```bash
php artisan test
```

## 📁 Estructura de Archivos Importantes

```
pp-web/
├── app/
│   ├── Http/Middleware/RoleMiddleware.php  # Middleware de roles
│   ├── Livewire/Propiedades/              # Componentes CRUD
│   └── Models/                             # Modelos
├── database/
│   ├── migrations/                         # Migraciones
│   └── seeders/                            # Datos de prueba
├── resources/
│   └── views/livewire/propiedades/        # Vistas de propiedades
└── routes/
    └── web.php                             # Rutas de la aplicación
```

## ❗ Solución de Problemas

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "No application encryption key"
```bash
php artisan key:generate
```

### Error: "Permission denied" en storage
```bash
chmod -R 775 storage bootstrap/cache
```

### Error: Imágenes no se muestran
```bash
php artisan storage:link
```

### Error: PHP version incompatible
Este proyecto requiere PHP 8.2 o superior. Verifica tu versión:
```bash
php -v
```

## 📱 Funcionalidades Implementadas

✅ Sistema de roles (Admin, Agente, Cliente)
✅ CRUD completo de propiedades
✅ Validación y sanitización de datos
✅ Paginación de resultados
✅ Filtros y búsqueda
✅ Carga de imágenes
✅ Protección de rutas por rol
✅ Diseño responsive
✅ Dark mode

## 📖 Documentación Adicional

Consulta el archivo `MANUAL.md` para la documentación completa del proyecto, incluyendo:
- Descripción de roles y permisos
- Capturas de pantalla
- Funcionalidades detalladas
- Seguridad implementada

---

**Nota:** Si encuentras algún problema durante la instalación, revisa que todos los requisitos previos estén instalados correctamente.
