Resumen de despliegue — Frontend en Netlify, Backend en Render

Frontend (Netlify):
- Netlify está configurado por netlify.toml en la raíz.
- Build command: cd pp-web && npm ci && npm run build
- Publish dir: pp-web/dist
- SPA: hay una regla de redirect para servir index.html en todas las rutas.
- Conectar el repo en Netlify, añadir cualquier variable de entorno necesarias para el build si aplica.

Backend (Render):
- Dockerfile en pp-web/Dockerfile preparado para PHP 8.2 y composer.
- El contenedor expone el servidor de desarrollo en el puerto 8000 (php artisan serve). Render usará el puerto interno que asigne.
- Antes de desplegar en producción: establecer variables de entorno en Render (APP_KEY, APP_ENV=production, APP_DEBUG=false, APP_URL, DB_CONNECTION=mysql, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.).
- Recomendado: crear una base de datos MySQL gestionada y configurar las credenciales en Render (o proporcionar credenciales externas).
- No se ejecutan migraciones automáticas en el Dockerfile. Ejecutar manualmente php artisan migrate desde la consola de Render o añadir un paso en el proceso de despliegue.

Notas para local / pruebas:
- Actualmente usas XAMPP para MySQL en local; eso está bien para pruebas pero no para producción.
- Para probar el Dockerfile localmente:
  cd pp-web
  docker build -t ark-home-backend .
  docker run --rm -p 8000:8000 --env-file .env ark-home-backend

Siguientes pasos opcionales que puedo hacer ahora:
- Añadir workflow de GitHub Actions para CI/CD (deploy a Netlify/Render)
- Añadir un script de entrypoint para ejecutar migraciones en deploy (si lo deseas)

Si quieres que haga las tareas opcionales, dime cuáles y las implemento y commiteo.
