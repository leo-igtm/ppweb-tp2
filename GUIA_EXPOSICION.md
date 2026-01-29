# Guía para la Exposición

## 🎯 Objetivo de la Presentación

Demostrar que el sistema cumple con TODOS los requisitos del trabajo práctico, mostrando:
1. CRUD completo
2. Sistema de roles (3)
3. Restricciones de acceso
4. Validaciones y sanitización
5. Paginación
6. Diseño personalizado

## ⏱️ Estructura Sugerida (15-20 minutos)

### 1. Introducción (2 min)
- Presentar el proyecto: "Sistema de Gestión Inmobiliaria"
- Tecnologías: Laravel 11 + Livewire 3 + Tailwind CSS
- Objetivo: Gestión de propiedades con diferentes roles

### 2. Demostración de Roles (5 min)

#### Login como Cliente (1 min)
```
Email: carlos@example.com
Password: password
```
**Mostrar:**
- ✅ Puede ver propiedades
- ❌ NO puede crear/editar/eliminar
- ❌ Intenta acceder a /propiedades/crear/nueva → Error 403

#### Login como Agente (2 min)
```
Email: maria@inmobiliaria.com
Password: password
```
**Mostrar:**
- ✅ Ve todas las propiedades pero solo puede editar/eliminar las suyas
- ✅ Crear nueva propiedad (se asigna automáticamente)
- ❌ Intenta editar propiedad de otro agente → Error 403

#### Login como Admin (2 min)
```
Email: admin@inmobiliaria.com
Password: password
```
**Mostrar:**
- ✅ Acceso total
- ✅ Puede editar cualquier propiedad
- ✅ Puede asignar propiedades a agentes

### 3. CRUD Completo (6 min)

#### CREATE - Crear Propiedad (2 min)
Como agente o admin:
1. Click en "+ Nueva Propiedad"
2. Completar formulario con datos válidos
3. Subir una imagen
4. Guardar
5. **Mostrar:** Mensaje de éxito y redirección

#### READ - Listar y Ver (2 min)
1. Mostrar listado con todas las propiedades
2. **Demostrar filtros:**
   - Buscar por texto: "departamento"
   - Filtrar por tipo: "Departamento"
   - Filtrar por operación: "Alquiler"
3. Click en "Ver" → Mostrar vista detallada

#### UPDATE - Editar Propiedad (1 min)
1. Click en "Editar" en una propiedad propia
2. Cambiar precio y disponibilidad
3. Guardar
4. **Mostrar:** Cambios reflejados

#### DELETE - Eliminar Propiedad (1 min)
1. Click en "Eliminar"
2. **Mostrar:** Confirmación JavaScript
3. Confirmar
4. **Mostrar:** Mensaje y eliminación

### 4. Validaciones (3 min)

#### Validación en Formulario
Intentar crear propiedad con:
1. Título vacío → **Mostrar error:** "El título es obligatorio"
2. Descripción muy corta → **Mostrar error:** "Mínimo 20 caracteres"
3. Imagen muy pesada (>2MB) → **Mostrar error:** "Máximo 2MB"
4. Completar correctamente → ✅ Se crea

#### Sanitización
1. **Mostrar** código en `CrearPropiedad.php` con reglas de validación
2. **Explicar** que Laravel sanitiza automáticamente

### 5. Características Adicionales (2 min)

#### Paginación
1. Ir a listado de propiedades
2. **Mostrar:** 10 registros por página
3. Navegar entre páginas
4. **Mostrar:** Filtros se mantienen

#### Diseño Responsive
1. Abrir DevTools
2. Cambiar a vista móvil
3. **Mostrar:** Layout adaptado
4. **Mostrar:** Menú hamburguesa

#### Dark Mode
1. **Mostrar:** Toggle de tema (si está visible)
2. Alternar entre claro y oscuro

### 6. Código y Arquitectura (2 min)

#### Mostrar Código Clave
1. **RoleMiddleware.php** → Control de acceso
2. **Rutas protegidas** en `web.php`
3. **Validaciones** en componente Livewire
4. **Migraciones** para ver estructura de BD

#### Explicar MVC
```
Modelo (Propiedad.php) ←→ Controlador (Livewire) ←→ Vista (Blade)
```

## 📋 Checklist de Demostración

Marcar durante la presentación:

- [ ] Mostrar los 3 roles funcionando
- [ ] Demostrar restricción de acceso (error 403)
- [ ] Crear una propiedad completa con imagen
- [ ] Editar una propiedad existente
- [ ] Eliminar una propiedad
- [ ] Mostrar validación de campos
- [ ] Demostrar búsqueda y filtros
- [ ] Navegar entre páginas (paginación)
- [ ] Mostrar responsive design
- [ ] Explicar arquitectura MVC
- [ ] Mostrar código de middleware
- [ ] Mencionar seeders con datos de prueba

## 🎤 Frases Clave para Usar

**Al inicio:**
> "Implementamos un sistema completo de gestión inmobiliaria que cumple con todos los requisitos del TP: CRUD, 3 roles, validaciones, paginación y diseño personalizado."

**Al mostrar roles:**
> "Tenemos 3 roles: Admin con acceso total, Agentes que gestionan sus propias propiedades, y Clientes que solo consultan. Cada rol tiene restricciones a nivel de middleware, componente y vista."

**Al mostrar validaciones:**
> "Todas las validaciones se realizan en el servidor. Laravel sanitiza automáticamente los inputs contra ataques XSS y SQL Injection."

**Al mostrar CRUD:**
> "El CRUD está completo: podemos Crear, Leer, Actualizar y Eliminar propiedades. Los agentes solo pueden modificar las suyas, pero el admin puede modificar todas."

**Al mostrar paginación:**
> "Implementamos paginación de 10 registros por página con Livewire, manteniendo los filtros activos al cambiar de página."

**Al mostrar diseño:**
> "El diseño es completamente personalizado usando Tailwind CSS, no usamos ninguna plantilla por defecto. Es responsive y tiene soporte para dark mode."

## ⚠️ Posibles Preguntas y Respuestas

**P: ¿Cómo protegen las rutas contra acceso no autorizado?**
R: "Usamos middleware personalizado `RoleMiddleware` que verifica el rol del usuario. Si no tiene permiso, recibe un error 403. Además, validamos en el componente Livewire y ocultamos botones en la vista."

**P: ¿Dónde se validan los datos del formulario?**
R: "En el servidor, en el método `rules()` de cada componente Livewire. Validamos tipo de dato, longitud, valores permitidos, etc."

**P: ¿Cómo funciona la paginación?**
R: "Usamos el trait `WithPagination` de Livewire y el método `paginate(10)` de Eloquent. Livewire maneja automáticamente la navegación entre páginas sin recargar."

**P: ¿Qué pasa con las imágenes al eliminar una propiedad?**
R: "Antes de eliminar el registro, verificamos si existe la imagen en el servidor y la eliminamos físicamente con `unlink()`. Así evitamos archivos huérfanos."

**P: ¿Cómo diferencian entre los roles?**
R: "El modelo User tiene una columna `role` de tipo ENUM con valores 'admin', 'agente', 'cliente'. Agregamos métodos helper como `isAdmin()`, `isAgente()` para facilitar las verificaciones."

**P: ¿El administrador se puede crear desde el registro?**
R: "No, por seguridad el rol admin solo se puede asignar mediante seeders o directamente en la base de datos. En el registro solo se puede elegir Cliente o Agente."

## 💻 Preparación Técnica Pre-Presentación

### Antes de exponer:

1. **Limpiar la base de datos**
```bash
php artisan migrate:fresh --seed
```

2. **Verificar que el servidor esté corriendo**
```bash
php artisan serve
```

3. **Abrir pestañas del navegador** (para agilizar):
   - Pestaña 1: Login (para demostrar roles)
   - Pestaña 2: Listado de propiedades
   - Pestaña 3: VS Code con código abierto

4. **Tener preparado:**
   - Una imagen de prueba (menos de 2MB)
   - Una imagen muy pesada (para demostrar validación)
   - Los datos de login escritos en un archivo

5. **Cerrar sesión antes de empezar**

## 🎬 Orden Sugerido de Demostración

```
INICIO
  ↓
1. Login como CLIENTE → Mostrar limitaciones
  ↓
2. Logout → Login como AGENTE → Mostrar CRUD parcial
  ↓
3. Crear una propiedad → Mostrar validaciones
  ↓
4. Logout → Login como ADMIN → Mostrar acceso total
  ↓
5. Editar propiedad de otro agente
  ↓
6. Demostrar filtros y paginación
  ↓
7. Mostrar responsive design
  ↓
8. Abrir código → Explicar arquitectura
  ↓
FIN
```

## ✨ Tips para una Buena Presentación

1. **Hablar claro y pausado**
2. **Mostrar primero, explicar después**
3. **Usar el checklist para no olvidar nada**
4. **Tener la consigna a mano para referenciar requisitos**
5. **Si algo falla, tener un plan B (capturas de pantalla)**
6. **Practicar el flujo antes de exponer**
7. **Cronometrar la presentación (no más de 20 min)**

## 📸 Capturas de Pantalla Recomendadas

Tener preparadas en caso de problemas técnicos:
- Dashboard de cada rol
- Listado de propiedades con filtros
- Formulario de creación
- Formulario de edición
- Vista detallada de propiedad
- Mensajes de error de validación
- Error 403 de acceso denegado
- Código del middleware

---

**¡Éxito en la presentación!** 🚀

Recuerda: El proyecto cumple con TODOS los requisitos. Confía en el trabajo realizado.
