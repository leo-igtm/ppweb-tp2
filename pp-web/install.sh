#!/bin/bash

# Script de instalación para Sistema de Gestión Inmobiliaria
# Este script automatiza la instalación del proyecto

echo "=========================================="
echo "  Sistema de Gestión Inmobiliaria"
echo "  Instalación Automática"
echo "=========================================="
echo ""

# Verificar PHP
echo "🔍 Verificando requisitos..."
php_version=$(php -r 'echo PHP_VERSION;')
echo "✓ PHP version: $php_version"

# Verificar Composer
if ! command -v composer &> /dev/null; then
    echo "❌ Composer no está instalado. Por favor, instálalo primero."
    exit 1
fi
echo "✓ Composer instalado"

# Verificar Node.js
if ! command -v node &> /dev/null; then
    echo "❌ Node.js no está instalado. Por favor, instálalo primero."
    exit 1
fi
echo "✓ Node.js instalado"

echo ""
echo "📦 Instalando dependencias de PHP..."
composer install

if [ $? -ne 0 ]; then
    echo "❌ Error al instalar dependencias de Composer"
    exit 1
fi

echo ""
echo "📝 Configurando archivo de entorno..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "✓ Archivo .env creado"
else
    echo "⚠️  El archivo .env ya existe, no se sobrescribirá"
fi

echo ""
echo "🔑 Generando clave de aplicación..."
php artisan key:generate

echo ""
echo "💾 Configurando base de datos..."
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    echo "✓ Archivo database.sqlite creado"
else
    echo "⚠️  El archivo database.sqlite ya existe"
fi

echo ""
echo "🗄️  Ejecutando migraciones y seeders..."
php artisan migrate:fresh --seed

if [ $? -ne 0 ]; then
    echo "❌ Error al ejecutar migraciones"
    exit 1
fi

echo ""
echo "🔗 Creando enlace simbólico para storage..."
php artisan storage:link

echo ""
echo "📦 Instalando dependencias de Node.js..."
npm install

if [ $? -ne 0 ]; then
    echo "❌ Error al instalar dependencias de NPM"
    exit 1
fi

echo ""
echo "🎨 Compilando assets..."
npm run build

if [ $? -ne 0 ]; then
    echo "❌ Error al compilar assets"
    exit 1
fi

echo ""
echo "=========================================="
echo "  ✅ Instalación completada exitosamente!"
echo "=========================================="
echo ""
echo "Para iniciar el servidor de desarrollo, ejecuta:"
echo "  php artisan serve"
echo ""
echo "Luego accede a: http://localhost:8000"
echo ""
echo "👥 Usuarios de prueba (contraseña: password):"
echo "  - Admin: admin@inmobiliaria.com"
echo "  - Agente: maria@inmobiliaria.com"
echo "  - Cliente: carlos@example.com"
echo ""
echo "📖 Consulta MANUAL.md para más información"
echo ""
