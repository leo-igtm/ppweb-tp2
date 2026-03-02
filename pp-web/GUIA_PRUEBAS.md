# 🧪 GUÍA DE PRUEBAS - Sistema Inmobiliario

## Estado del Servidor

✅ **Servidor corriendo en:** http://0.0.0.0:8000

---

## 👥 USUARIOS DE PRUEBA

### Administrador
- **Email:** admin@inmobiliaria.com
- **Password:** password
- **Permisos:** Acceso total (crear, editar, eliminar todas las propiedades)

### Agentes (3 usuarios)
**Agente 1:**
- **Email:** maria@inmobiliaria.com
- **Password:** password
- **Permisos:** Crear propiedades, editar/eliminar solo las propias

**Agente 2:**
- **Email:** juan@inmobiliaria.com
- **Password:** password
- **Permisos:** Crear propiedades, editar/eliminar solo las propias

**Agente 3:**
- **Email:** ana@inmobiliaria.com
- **Password:** password
- **Permisos:** Crear propiedades, editar/eliminar solo las propias

### Clientes (2 usuarios)
**Cliente 1:**
- **Email:** carlos@example.com
- **Password:** password
- **Permisos:** Solo visualizar propiedades

**Cliente 2:**
- **Email:** laura@example.com
- **Password:** password
- **Permisos:** Solo visualizar propiedades

---

## 📋 CASOS DE PRUEBA

### 1️⃣ PRUEBAS COMO ADMINISTRADOR

#### Login
1. Ir a http://0.0.0.0:8000
2. Click en "Log in"
3. Ingresar: admin@inmobiliaria.com / password
4. ✅ Debe redirigir al Dashboard

#### Listar Propiedades
1. Click en "Propiedades" en el menú lateral
2. ✅ Debe mostrar tabla con 10 propiedades
3. ✅ Debe ver botón "+ Nueva Propiedad"
4. ✅ Debe ver 3 botones por propiedad: Ver, Editar, Eliminar

#### Búsqueda y Filtros
1. En el campo de búsqueda, escribir "casa"
2. ✅ Debe filtrar en tiempo real mostrando solo casas
3. Borrar búsqueda
4. En "Tipo", seleccionar "Departamento"
5. ✅ Debe mostrar solo departamentos
6. En "Operación", seleccionar "Venta"
7. ✅ Debe mostrar solo departamentos en venta
8. Click en "Limpiar filtros"
9. ✅ Debe mostrar todas las propiedades nuevamente

#### Crear Propiedad
1. Click en "+ Nueva Propiedad"
2. Completar formulario:
   - Título: "Casa de Prueba Admin"
   - Descripción: "Esta es una propiedad de prueba creada por el administrador del sistema"
   - Tipo: Casa
   - Operación: Venta
   - Precio: 150000
   - Dirección: "Calle Falsa 123"
   - Ciudad: "Córdoba"
   - Provincia: "Córdoba"
   - Habitaciones: 3
   - Baños: 2
   - Superficie: 120
   - ✅ Disponible (checkbox marcado)
   - Imagen: (opcional) subir cualquier imagen
3. Click en "Guardar Propiedad"
4. ✅ Debe redirigir al listado
5. ✅ Debe mostrar mensaje verde "Propiedad creada exitosamente"
6. ✅ La nueva propiedad debe aparecer primera en la lista

#### Ver Detalles
1. En la propiedad recién creada, click en "Ver"
2. ✅ Debe mostrar todos los detalles
3. ✅ Debe mostrar la imagen (o placeholder)
4. ✅ Debe mostrar precio destacado
5. ✅ Debe mostrar información del agente (admin)
6. ✅ Debe ver botón "Editar Propiedad"

#### Editar Propiedad
1. Click en "Editar Propiedad"
2. Cambiar el título a: "Casa de Prueba Admin - EDITADA"
3. Cambiar precio a: 175000
4. Marcar como NO disponible
5. Click en "Actualizar Propiedad"
6. ✅ Debe redirigir al listado
7. ✅ Debe mostrar mensaje "Propiedad actualizada exitosamente"
8. ✅ Los cambios deben reflejarse en la tabla

#### Eliminar Propiedad
1. En cualquier propiedad, click en "Eliminar"
2. ✅ Debe aparecer confirmación "¿Estás seguro de eliminar esta propiedad?"
3. Click en "Aceptar"
4. ✅ Debe mostrar mensaje "Propiedad eliminada correctamente"
5. ✅ La propiedad debe desaparecer de la tabla

#### Paginación
1. Scroll hasta abajo de la tabla
2. ✅ Debe ver controles de paginación
3. Click en "Next" o "2"
4. ✅ Debe cambiar a página 2 (si hay más de 10 propiedades)

---

### 2️⃣ PRUEBAS COMO AGENTE

#### Login
1. Cerrar sesión (menú usuario → Log Out)
2. Login con: maria@inmobiliaria.com / password
3. ✅ Debe redirigir al Dashboard

#### Listar Propiedades
1. Click en "Propiedades"
2. ✅ Debe ver todas las propiedades (de todos los agentes)
3. ✅ Debe ver botón "+ Nueva Propiedad"
4. ✅ Solo debe ver botones Editar/Eliminar en propiedades creadas por María

#### Crear Propiedad Propia
1. Click en "+ Nueva Propiedad"
2. Completar formulario:
   - Título: "Departamento María"
   - Descripción: "Departamento exclusivo gestionado por María"
   - Tipo: Departamento
   - Operación: Alquiler
   - Precio: 25000
   - Dirección: "Av. Colón 456"
   - Ciudad: "Córdoba"
   - Provincia: "Córdoba"
   - Habitaciones: 2
   - Baños: 1
   - Superficie: 65
3. Click en "Guardar Propiedad"
4. ✅ Debe crear exitosamente
5. ✅ Debe asignarse a María automáticamente

#### Intentar Editar Propiedad de Otro Agente
1. Buscar una propiedad creada por Juan o Ana
2. ✅ NO debe ver botones "Editar" o "Eliminar"
3. Solo debe ver botón "Ver"

#### Editar Propiedad Propia
1. En "Departamento María", click en "Editar"
2. Cambiar precio a: 27000
3. Click en "Actualizar Propiedad"
4. ✅ Debe actualizar correctamente

---

### 3️⃣ PRUEBAS COMO CLIENTE

#### Login
1. Cerrar sesión
2. Login con: carlos@example.com / password
3. ✅ Debe redirigir al Dashboard

#### Listar Propiedades
1. Click en "Propiedades"
2. ✅ Debe ver todas las propiedades
3. ✅ NO debe ver botón "+ Nueva Propiedad"
4. ✅ NO debe ver botones "Editar" o "Eliminar"
5. ✅ Solo debe ver botón "Ver" en cada propiedad

#### Ver Detalles
1. Click en "Ver" en cualquier propiedad
2. ✅ Debe mostrar todos los detalles
3. ✅ NO debe ver botón "Editar Propiedad"

#### Usar Búsqueda y Filtros
1. Volver al listado
2. Buscar por ciudad: "Buenos Aires"
3. ✅ Debe filtrar correctamente
4. Filtrar por Operación: "Alquiler"
5. ✅ Debe mostrar solo alquileres en Buenos Aires

#### Intentar Acceder a URLs Protegidas
1. En la barra de navegador, intentar ir a:
   - http://0.0.0.0:8000/propiedades/crear/nueva
2. ✅ Debe mostrar error 403 Forbidden o redirigir
3. Intentar:
   - http://0.0.0.0:8000/propiedades/1/editar
4. ✅ Debe mostrar error 403 Forbidden o redirigir

---

## 🎯 CHECKLIST DE VALIDACIONES

### Validación de Formularios

#### Crear Propiedad con Datos Inválidos
1. Login como Admin o Agente
2. Ir a "Nueva Propiedad"
3. Dejar el título vacío
4. Click en "Guardar Propiedad"
5. ✅ Debe mostrar error: "El título es obligatorio"

6. Escribir título: "AB" (solo 2 caracteres)
7. ✅ Debe mostrar error: "El título debe tener al menos 5 caracteres"

8. Título válido pero descripción vacía
9. ✅ Debe mostrar error: "La descripción es obligatoria"

10. No seleccionar Tipo
11. ✅ Debe mostrar error: "El tipo de propiedad es obligatorio"

12. Precio en negativo: -100
13. ✅ Debe mostrar error: "El precio debe ser mayor a 0"

14. Subir archivo muy grande (>2MB)
15. ✅ Debe mostrar error: "La imagen no debe superar los 2MB"

16. Completar todos los campos correctamente
17. ✅ Debe guardar sin errores

---

## 📊 VERIFICACIÓN DE PAGINACIÓN

### Probar Paginación
1. Login como Admin
2. Si hay menos de 11 propiedades, crear más hasta tener al menos 11
3. Ir a listado de propiedades
4. ✅ Debe mostrar solo 10 propiedades
5. ✅ Debe aparecer botón "Next" o número "2"
6. Click en página 2
7. ✅ Debe mostrar la propiedad 11 en adelante
8. ✅ URL debe cambiar a incluir ?page=2

### Paginación con Filtros
1. Aplicar un filtro (ej: Tipo = Casa)
2. Si hay más de 10 casas, debe paginar
3. Cambiar de página
4. ✅ El filtro debe mantenerse activo
5. ✅ URL debe incluir ?filterTipo=casa&page=2

---

## 🔒 VERIFICACIÓN DE SEGURIDAD

### Test de Permisos

#### Como Cliente (NO debe poder):
- ❌ Acceder a /propiedades/crear/nueva
- ❌ Acceder a /propiedades/{id}/editar
- ❌ Ver botones de crear/editar/eliminar

#### Como Agente (DEBE poder):
- ✅ Acceder a /propiedades/crear/nueva
- ✅ Acceder a /propiedades/{id}/editar (solo sus propiedades)
- ✅ Ver botón crear
- ✅ Ver botones editar/eliminar solo en sus propiedades

#### Como Admin (DEBE poder):
- ✅ Acceder a /propiedades/crear/nueva
- ✅ Acceder a /propiedades/{id}/editar (cualquier propiedad)
- ✅ Ver todos los botones en todas las propiedades

---

## 🎨 VERIFICACIÓN DE DISEÑO

### Responsividad
1. Reducir el ancho de la ventana (simular móvil)
2. ✅ El menú debe colapsar a hamburguesa
3. ✅ La tabla debe ser scrolleable horizontalmente
4. ✅ Los filtros deben apilarse verticalmente
5. ✅ El formulario debe ajustarse a una columna

### Colores y Estados
1. ✅ Badge "Venta" debe ser verde
2. ✅ Badge "Alquiler" debe ser púrpura
3. ✅ Badge "Disponible" debe ser verde
4. ✅ Badge "No disponible" debe ser rojo
5. ✅ Botón "Eliminar" debe ser rojo
6. ✅ Botón primario debe ser azul
7. ✅ Hover en botones debe cambiar color

---

## ⚡ VERIFICACIÓN DE RENDIMIENTO

### Búsqueda en Tiempo Real
1. En el campo de búsqueda, escribir letra por letra: "c-a-s-a"
2. ✅ Debe filtrar sin recargar la página
3. ✅ Debe haber un pequeño delay (debounce)
4. ✅ La URL debe actualizarse con ?search=casa

### Carga de Imágenes
1. Crear propiedad con imagen grande (pero <2MB)
2. ✅ Debe mostrar preview antes de guardar
3. Guardar y ver detalles
4. ✅ Debe cargar y mostrar la imagen

---

## 🐛 CASOS EDGE

### Eliminar Propiedad con Imagen
1. Crear propiedad con imagen
2. Anotar el nombre del archivo en storage
3. Eliminar la propiedad
4. ✅ La imagen debe eliminarse del storage

### Editar y Cambiar Imagen
1. Editar propiedad que tiene imagen
2. Subir nueva imagen
3. Guardar
4. ✅ La imagen anterior debe eliminarse
5. ✅ La nueva imagen debe guardarse

### Sin Resultados
1. Buscar algo que no existe: "xyzabc123"
2. ✅ Debe mostrar mensaje "No se encontraron propiedades"
3. ✅ No debe haber errores

---

## ✅ RESUMEN DE RESULTADOS ESPERADOS

| Funcionalidad | Admin | Agente | Cliente |
|---------------|-------|--------|---------|
| Ver listado | ✅ | ✅ | ✅ |
| Ver detalles | ✅ | ✅ | ✅ |
| Buscar/Filtrar | ✅ | ✅ | ✅ |
| Crear propiedad | ✅ | ✅ | ❌ |
| Editar cualquiera | ✅ | ❌ | ❌ |
| Editar propias | ✅ | ✅ | ❌ |
| Eliminar cualquiera | ✅ | ❌ | ❌ |
| Eliminar propias | ✅ | ✅ | ❌ |

---

## 📸 CAPTURAS RECOMENDADAS

Para la documentación o presentación, tomar capturas de:

1. **Login** - Pantalla de inicio de sesión
2. **Dashboard** - Vista principal
3. **Listado** - Tabla con propiedades
4. **Filtros** - Búsqueda y filtros en acción
5. **Crear** - Formulario de nueva propiedad
6. **Editar** - Formulario de edición
7. **Ver** - Vista de detalles de propiedad
8. **Validación** - Mensajes de error
9. **Éxito** - Mensaje de confirmación
10. **Responsive** - Vista móvil

---

## 🎓 TIPS PARA LA PRESENTACIÓN

1. **Demostrar el flujo completo**:
   - Login → Listar → Crear → Ver → Editar → Eliminar

2. **Mostrar las diferencias de roles**:
   - Login como cada tipo de usuario
   - Mostrar qué puede y qué no puede hacer cada uno

3. **Destacar características**:
   - Búsqueda en tiempo real
   - Filtros múltiples
   - Validaciones
   - Gestión de imágenes
   - Diseño responsivo

4. **Mencionar la seguridad**:
   - Middleware de autenticación
   - Middleware de roles
   - Verificación en componentes

5. **Hablar del diseño**:
   - Tailwind CSS personalizado
   - No usa diseño por defecto
   - Responsivo
   - UX intuitiva

---

**¡Todo listo para probar! 🚀**
