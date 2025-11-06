#!/bin/bash
set -e

# Generate APP_KEY first if not provided (before Laravel needs it)
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY not set, generating one..."
    # Generate a Laravel-compatible base64 key
    APP_KEY="base64:$(openssl rand -base64 32)"
    echo "Generated APP_KEY: $APP_KEY"
    export APP_KEY
fi

# Create .env file from environment variables
echo "Setting up .env file..."
cat > .env << EOF
APP_NAME=Laravel
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

LOG_CHANNEL=${LOG_CHANNEL:-stderr}
LOG_LEVEL=${LOG_LEVEL:-error}

DB_CONNECTION=${DB_CONNECTION:-pgsql}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT:-5432}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
EOF

# Clear any cached config first
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force || true

# Start server
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

