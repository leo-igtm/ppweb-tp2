#!/bin/bash

echo "🚀 Instalando proyecto Arkham Inmobiliaria..."

# Copiar archivo .env si no existe
if [ ! -f .env ]; then
    echo "📝 Copiando archivo .env..."
    cp .env.example .env
fi

# Instalar dependencias de Composer
echo "📦 Instalando dependencias de PHP..."
composer install

# Generar key de aplicación
echo "🔑 Generando key de aplicación..."
php artisan key:generate

# Instalar dependencias de Node
echo "📦 Instalando dependencias de Node.js..."
npm install

# Crear base de datos SQLite si no existe
if [ ! -f database/database.sqlite ]; then
    echo "🗄️  Creando base de datos SQLite..."
    touch database/database.sqlite
fi

# Ejecutar migraciones y seeders
echo "🗃️  Ejecutando migraciones y seeders..."
php artisan migrate:fresh --seed

echo "✅ Instalación completada!"
echo ""
echo "Para iniciar el servidor de desarrollo ejecuta:"
echo "  composer run dev"
echo ""
echo "Credenciales de prueba:"
echo "  Admin:    admin@arkham.com    / password"
echo "  Gerente:  gerente@arkham.com  / password"
echo "  Agente:   carlos@arkham.com   / password"
echo "  Cliente:  juan@example.com    / password"
