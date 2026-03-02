#!/bin/bash
# Script para ejecutar el entorno de desarrollo completo con PHP 8.2
export COMPOSER_ALLOW_SUPERUSER=1

# Verificar que npm esté instalado
if ! command -v npm &> /dev/null; then
    echo "Error: npm no está instalado"
    exit 1
fi

# Instalar dependencias de npm si es necesario
if [ ! -d "node_modules" ]; then
    echo "Instalando dependencias de npm..."
    npm install
fi

echo "🚀 Iniciando entorno de desarrollo..."
echo "   - Servidor Laravel en http://0.0.0.0:8000"
echo "   - Cola de trabajos"
echo "   - Vite dev server"
echo ""
echo "Presiona Ctrl+C para detener todos los servicios"
echo ""

/usr/bin/php8.2 /usr/local/bin/composer run dev
