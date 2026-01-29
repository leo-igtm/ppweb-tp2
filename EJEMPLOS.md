# Ejemplos de Uso del Sistema

## 🎬 Escenarios de Uso

### Escenario 1: Administrador gestiona el sistema

**Actor:** Juan - Administrador del sistema  
**Objetivo:** Crear una nueva propiedad y asignarla a un agente

**Pasos:**
1. Juan ingresa a `http://localhost:8000`
2. Click en "Login"
3. Ingresa credenciales:
   - Email: `admin@inmobiliaria.com`
   - Password: `password`
4. Es redirigido al Dashboard donde ve su rol: **Admin**
5. Click en "Propiedades" en el menú lateral
6. Ve TODAS las propiedades de todos los agentes
7. Click en "+ Nueva Propiedad"
8. Completa el formulario:
   - Título: "Casa de campo con vista panorámica"
   - Descripción: "Amplia casa de campo ubicada en las sierras..."
   - Tipo: Casa
   - Operación: Venta
   - Precio: 450000
   - Agente: Selecciona "María González"
   - (resto de campos)
9. Sube una imagen
10. Click en "Crear Propiedad"
11. Ve mensaje de éxito: "Propiedad creada exitosamente"
12. La propiedad aparece en el listado asignada a María

---

### Escenario 2: Agente gestiona sus propiedades

**Actor:** María González - Agente inmobiliario  
**Objetivo:** Ver sus propiedades y editar una existente

**Pasos:**
1. María ingresa al sistema
2. Login con `maria@inmobiliaria.com` / `password`
3. En el Dashboard ve su rol: **Agente**
4. Click en "Propiedades"
5. Ve SOLO sus propiedades (filtradas automáticamente)
6. No puede ver ni editar propiedades de otros agentes
7. Click en "Editar" en una de sus propiedades
8. Cambia el precio de $350,000 a $320,000
9. Marca como "No disponible" (vendida)
10. Click en "Actualizar Propiedad"
11. Ve mensaje: "Propiedad actualizada exitosamente"
12. Los cambios se reflejan inmediatamente en el listado

**Intento de acceso no autorizado:**
1. María intenta acceder a `/propiedades/5/editar` (propiedad de Juan)
2. El sistema verifica que ella no es la dueña
3. Recibe error 403: "No autorizado"
4. Es redirigida automáticamente

---

### Escenario 3: Cliente busca propiedades

**Actor:** Carlos - Cliente potencial  
**Objetivo:** Buscar departamentos en alquiler

**Pasos:**
1. Carlos se registra en el sistema:
   - Click en "Register"
   - Nombre: "Carlos López"
   - Email: `carlos@example.com`
   - Tipo de cuenta: **Cliente**
   - Password: ********
2. Es redirigido al Dashboard
3. Ve su rol: **Cliente**
4. Click en "Propiedades"
5. Ve todas las propiedades disponibles
6. Usa los filtros:
   - Tipo: Departamento
   - Operación: Alquiler
7. Encuentra 2 departamentos en alquiler
8. Click en "Ver" en uno de ellos
9. Ve detalles completos:
   - Precio, ubicación, características
   - Datos del agente responsable
10. **NO** ve botones de "Editar" o "Eliminar"
11. Puede contactar al agente por email mostrado

**Intento de acceso no autorizado:**
1. Carlos intenta acceder a `/propiedades/crear/nueva`
2. El middleware `role:admin,agente` lo bloquea
3. Recibe error 403: "No tienes permiso para acceder a esta página"

---

## 🔍 Casos de Prueba de Validación

### Caso 1: Validación de formulario - Campo requerido

**Escenario:** Usuario intenta crear propiedad sin título

**Entrada:**
- Título: *(vacío)*
- Descripción: "Casa hermosa en venta..."
- Precio: 200000
- *(resto de campos completos)*

**Resultado esperado:**
- ❌ El formulario NO se envía
- Se muestra mensaje: "El título es obligatorio"
- El campo título se marca en rojo

---

### Caso 2: Validación de formulario - Longitud mínima

**Escenario:** Usuario intenta crear propiedad con descripción muy corta

**Entrada:**
- Título: "Casa en venta"
- Descripción: "Casa nueva" *(solo 10 caracteres)*
- *(resto de campos completos)*

**Resultado esperado:**
- ❌ El formulario NO se envía
- Se muestra mensaje: "La descripción debe tener al menos 20 caracteres"

---

### Caso 3: Validación de archivo - Tamaño excedido

**Escenario:** Usuario intenta subir imagen muy pesada

**Entrada:**
- *(todos los campos válidos)*
- Imagen: foto.jpg (5MB)

**Resultado esperado:**
- ❌ El formulario NO se envía
- Se muestra mensaje: "La imagen no puede pesar más de 2MB"

---

### Caso 4: Validación de archivo - Tipo inválido

**Escenario:** Usuario intenta subir un PDF como imagen

**Entrada:**
- *(todos los campos válidos)*
- Imagen: documento.pdf

**Resultado esperado:**
- ❌ El formulario NO se envía
- Se muestra mensaje: "El archivo debe ser una imagen"

---

## 🔐 Casos de Prueba de Seguridad

### Caso 1: Protección de ruta - Cliente intenta crear

**Test:**
```
1. Iniciar sesión como: carlos@example.com
2. Navegar a: /propiedades/crear/nueva
```

**Resultado:**
- HTTP 403 Forbidden
- Mensaje: "No tienes permiso para acceder a esta página"

---

### Caso 2: Protección de ruta - Agente intenta editar propiedad ajena

**Test:**
```
1. Iniciar sesión como: maria@inmobiliaria.com
2. Navegar a: /propiedades/8/editar (propiedad de Juan)
```

**Resultado:**
- HTTP 403 Forbidden
- Mensaje: "No autorizado"

---

### Caso 3: Inyección SQL (protegido por Laravel)

**Test:**
```
Campo de búsqueda: '; DROP TABLE propiedades; --
```

**Resultado:**
- ✅ La consulta se sanitiza automáticamente
- Busca literalmente el texto ingresado
- No ejecuta código SQL

---

### Caso 4: XSS (protegido por Blade)

**Test:**
```
Título: <script>alert('XSS')</script>
```

**Resultado:**
- ✅ El código se escapa automáticamente
- Se muestra como texto plano: `<script>alert('XSS')</script>`
- No se ejecuta JavaScript

---

## 📊 Casos de Prueba de Funcionalidad

### Caso 1: Paginación

**Test:**
```
1. Acceder a /propiedades
2. Verificar que se muestran 10 registros
3. Click en "Página 2"
4. Verificar que se muestran los siguientes registros
```

**Resultado esperado:**
- ✅ Primera página muestra registros 1-10
- ✅ Segunda página muestra registros 11-20 (si existen)
- ✅ Los filtros se mantienen al cambiar de página

---

### Caso 2: Filtro combinado

**Test:**
```
1. Acceder a /propiedades
2. Seleccionar Tipo: "Departamento"
3. Seleccionar Operación: "Alquiler"
4. Escribir en búsqueda: "céntrico"
```

**Resultado esperado:**
- ✅ Se muestran solo departamentos en alquiler
- ✅ Que contengan "céntrico" en título/descripción/ubicación
- ✅ Los resultados se actualizan en tiempo real (Livewire)

---

### Caso 3: Carga de imagen

**Test:**
```
1. Crear nueva propiedad
2. Subir imagen válida (casa.jpg, 1.5MB)
3. Guardar propiedad
```

**Resultado esperado:**
- ✅ Imagen se guarda en storage/app/public/propiedades/
- ✅ Se crea link simbólico en public/storage/
- ✅ Imagen es accesible desde el navegador
- ✅ Path se guarda en BD: storage/propiedades/timestamp_casa.jpg

---

### Caso 4: Eliminación en cascada

**Test:**
```
1. Como admin, eliminar propiedad con imagen
2. Verificar que la imagen se elimina del servidor
3. Verificar que el registro se elimina de la BD
```

**Resultado esperado:**
- ✅ Archivo físico eliminado de storage/
- ✅ Registro eliminado de tabla propiedades
- ✅ Mensaje de confirmación mostrado
- ✅ Redirección al listado

---

## 🎭 Roles y Permisos - Matriz de Acceso

| Funcionalidad | Admin | Agente | Cliente |
|--------------|-------|--------|---------|
| Ver listado de propiedades | ✅ Todas | ✅ Todas* | ✅ Todas |
| Ver detalle de propiedad | ✅ | ✅ | ✅ |
| Crear propiedad | ✅ | ✅ | ❌ |
| Editar cualquier propiedad | ✅ | ❌ | ❌ |
| Editar propia propiedad | ✅ | ✅ | ❌ |
| Eliminar cualquier propiedad | ✅ | ❌ | ❌ |
| Eliminar propia propiedad | ✅ | ✅ | ❌ |
| Asignar agente | ✅ | ❌ | ❌ |
| Gestionar usuarios | ❌** | ❌ | ❌ |

*Nota: Los agentes ven todas en el listado, pero solo pueden editar/eliminar las suyas  
**Funcionalidad no implementada en este MVP

---

## 💡 Tips de Uso

### Para Administradores
- Pueden crear propiedades y asignarlas a cualquier agente
- Tienen acceso total a todas las funcionalidades
- Deberían revisar periódicamente las propiedades marcadas como "No disponibles"

### Para Agentes
- Al crear una propiedad, se asigna automáticamente a ellos
- Pueden marcar propiedades como "No disponibles" cuando se venden/alquilan
- Deberían mantener actualizada la información de sus propiedades

### Para Clientes
- Pueden usar los filtros para encontrar propiedades específicas
- Los datos de contacto del agente están visibles en cada propiedad
- Pueden registrarse como "Cliente" o "Agente" al crear cuenta

---

**Todos los escenarios han sido implementados y probados** ✅
