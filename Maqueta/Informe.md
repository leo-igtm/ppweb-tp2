# Informe de Progreso - Tablero "App Inmobiliaria"

El desarrollo del proyecto comenzó con la planificación de los requerimientos funcionales y
técnicos de la aplicación inmobiliaria. 
Se optó por PHP con el framework Laravel, empleando Blade para la maquetación de vistas y Bootstrap para los estilos visuales. Se definieron las siguientes funcionalidades principales: listado de propiedades, CRUD de usuarios, formulario de contacto y sistema de autenticación básico (maquetado).

## Principales Avances

- **Maquetado inicial** de páginas principales: Home, Propiedades, Detalle, Contacto.
- **CRUD visual de usuarios** implementado en HTML/CSS con Bootstrap.
- **Agregado de Bootstrap** para mejorar la presentación responsiva y uniforme en todas las vistas.
- **Simulación de login/logout** con JavaScript y localStorage.
- **Integración de componentes dinámicos** en la interfaz de usuario y la navegación.
- **Documentación continua** y entrega periódica de avances.

---

## Problemas y Desafíos Encontrados

### 1. Adaptación de Bootstrap al Maquetado Existente
**Problema:** 
Se detectaron conflictos entre estilos personalizados (CSS propio) y las clases de Bootstrap, lo que causaba inconsistencias visuales y comportamientos inesperados en botones, tablas y formularios.
**Solución Aplicada:** 
Se revisaron y ajustaron clases manualmente, priorizando las utilidades de Bootstrap y minimizando el CSS personalizado, logrando mayor coherencia visual.

2. Navegación Consistente Entre Vistas
**Problema:** 
Al agregar nuevas secciones (como el login y el CRUD de usuarios), algunas rutas en la navbar dejaron de funcionar correctamente o llevaban a páginas incompletas.
**Solución Aplicada:** 
Centralización de los enlaces en todas las plantillas, actualizando la barra de navegación en cada archivo y asegurando rutas relativas correctas.

3. Simulación de Autenticación y Estado de Sesión
**Problema:** 
No existía backend para gestionar sesiones reales, por lo que mostrar el usuario logueado y permitir cerrar sesión debía ser simulado a nivel frontend.
**Solución Aplicada:** 
Se usara JavaScript y localStorage para almacenar el usuario al loguear y manipular la navbar para mostrar un saludo personalizado y la opción de "Cerrar sesión". Esta simulación fue replicada en todas las páginas principales.

4. Control de Versiones y Organización de Archivos
**Problema:** 
Dificultades en mantener la trazabilidad y consistencia del avance cuando varias personas editan archivos HTML y CSS en paralelo sin un entorno centralizado.
**Solución Aplicada (Pendiente de Mejorar):** 
Hasta el momento se resolvió con acuerdos internos y generación de archivos comprimidos para cada entrega. Se propone como mejora la integración de todas las fuentes en un repositorio GitHub para mejor control de versiones y colaboración.

5. Integración Futura con Backend Real
**Problema Pendiente:** 
Todo el sistema de login, CRUD y visualización de datos es actualmente estático. La incorporación de PHP/Laravel y funcionalidad auténtica sigue pendiente.
**Solución Propuesta:** 
Migraremos los archivos de maquetado a vistas Blade de Laravel, usando controladores y modelos para alimentar dinámicamente los datos. Se recomienda emplear el sistema de autenticación nativo de Laravel para registrar, loguear y proteger rutas del portal.

Próximos Pasos

- Comenzar migración de maquetado HTML a vistas Blade dinámicas.
- Implementar autenticación real y CRUD funcional en backend.
- Mejorar documentación técnica y actualizar el tablero con la nueva estructura del proyecto.
- Adjuntar capturas de avance como respaldo en el tablero.
- Realizar validaciones y testeo de experiencia de usuario antes de entrega final.

---
Tablero trello : (https://trello.com/b/j0oNgVYt/app-portal-inmobiliaria)