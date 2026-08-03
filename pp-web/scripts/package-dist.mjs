import { rm, mkdir, copyFile, cp, writeFile } from 'node:fs/promises';
import path from 'node:path';

const root = process.cwd();
const distDir = path.join(root, 'dist');

const copyTargets = [
  'app',
  'bootstrap',
  'config',
  'database',
  'public',
  'resources',
  'routes',
  'artisan',
  'composer.json',
  'composer.lock',
  'package.json',
  'package-lock.json',
  'vite.config.js',
  'netlify.toml',
  'GUIA_PRUEBAS.md',
  'IMPLEMENTACION_COMPLETADA.md',
];

async function main() {
  await rm(distDir, { recursive: true, force: true });
  await mkdir(distDir, { recursive: true });

  for (const item of copyTargets) {
    const source = path.join(root, item);
    const destination = path.join(distDir, item);
    await cp(source, destination, {
      recursive: true,
      force: true,
      filter: (src) => {
        const relative = path.relative(root, src);
        if (!relative) return true;
        if (relative.startsWith('dist')) return false;
        if (relative.startsWith('node_modules')) return false;
        if (relative.startsWith('vendor')) return false;
        if (relative.startsWith('.git')) return false;
        if (relative.startsWith('.env')) return false;
        if (relative.startsWith('storage\\framework')) return false;
        if (relative.startsWith('storage\\logs')) return false;
        if (relative.startsWith('bootstrap\\cache')) return false;
        return true;
      },
    });
  }

  const indexHtml = `<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Arkham Inmobiliaria - Paquete de entrega</title>
    <style>
      body { margin: 0; font-family: Arial, sans-serif; background: #050816; color: #e5e7eb; }
      .wrap { max-width: 960px; margin: 0 auto; padding: 48px 24px; }
      .card { background: rgba(15, 23, 42, .72); border: 1px solid rgba(255,255,255,.12); border-radius: 20px; padding: 28px; backdrop-filter: blur(18px); }
      .logo { width: 96px; height: 96px; object-fit: cover; border-radius: 20px; box-shadow: 0 18px 40px rgba(0,0,0,.35); }
      .muted { color: #94a3b8; line-height: 1.6; }
      a { color: #93c5fd; }
      code { background: rgba(255,255,255,.08); padding: 2px 6px; border-radius: 6px; }
    </style>
  </head>
  <body>
    <div class="wrap">
      <div class="card">
        <img class="logo" src="./public/icon/inmobiliaria.png" alt="Arkham" />
        <h1>Arkham Inmobiliaria</h1>
        <p class="muted">Paquete de entrega generado para el proyecto Laravel + Livewire + Inertia/React.</p>
        <p class="muted">Para ejecutar la app completa necesitas levantar el backend de Laravel y el frontend de Vite.</p>
        <p class="muted">Archivos incluidos: código fuente, build frontend, documentación y configuración de despliegue.</p>
        <p class="muted">Consulta <code>GUIA_PRUEBAS.md</code> e <code>IMPLEMENTACION_COMPLETADA.md</code> para validar el alcance.</p>
      </div>
    </div>
  </body>
</html>`;

  await writeFile(path.join(distDir, 'index.html'), indexHtml, 'utf8');
}

main().catch((error) => {
  console.error(error);
  process.exit(1);
});
