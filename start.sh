#!/bin/bash
set -e

echo "=== Starting Laravel Application ==="

# Generate APP_KEY first if not provided (before Laravel needs it)
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY not set, generating one..."
    # Generate a Laravel-compatible base64 key
    APP_KEY="base64:$(openssl rand -base64 32)"
    echo "Generated APP_KEY: $APP_KEY"
    export APP_KEY
fi

# Create .env file from environment variables
echo "Creating .env file..."
cat > .env << EOF
APP_NAME="Laravel"
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-true}
APP_URL=${APP_URL:-https://carbonai-accounting.onrender.com}

LOG_CHANNEL=${LOG_CHANNEL:-stderr}
LOG_LEVEL=${LOG_LEVEL:-debug}

DB_CONNECTION=${DB_CONNECTION:-pgsql}
DB_HOST=${DB_HOST:-localhost}
DB_PORT=${DB_PORT:-5432}
DB_DATABASE=${DB_DATABASE:-laravel}
DB_USERNAME=${DB_USERNAME:-postgres}
DB_PASSWORD="${DB_PASSWORD:-}"

GOOGLE_CLIENT_ID="${GOOGLE_CLIENT_ID:-}"
GOOGLE_CLIENT_SECRET="${GOOGLE_CLIENT_SECRET:-}"
GOOGLE_REDIRECT_URI="${GOOGLE_REDIRECT_URI:-}"
MICROSOFT_CLIENT_ID="${MICROSOFT_CLIENT_ID:-}"
MICROSOFT_CLIENT_SECRET="${MICROSOFT_CLIENT_SECRET:-}"
MICROSOFT_REDIRECT_URI="${MICROSOFT_REDIRECT_URI:-}"
MICROSOFT_TENANT_ID="${MICROSOFT_TENANT_ID:-common}"

MAIL_MAILER=${MAIL_MAILER:-smtp}
MAIL_HOST=${MAIL_HOST:-smtp.gmail.com}
MAIL_PORT=${MAIL_PORT:-587}
MAIL_USERNAME="${MAIL_USERNAME:-}"
MAIL_PASSWORD="${MAIL_PASSWORD:-}"
MAIL_ENCRYPTION=${MAIL_ENCRYPTION:-tls}
MAIL_FROM_ADDRESS="${MAIL_FROM_ADDRESS:-noreply@example.com}"
MAIL_FROM_NAME="${MAIL_FROM_NAME:-CarbonAI}"
EOF

echo "Environment variables set. Checking database connection..."

# Wait a bit for database to be ready (if needed)
sleep 2

# Clear any cached config first
echo "Clearing caches..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan cache:clear || true

# Test database connection
echo "Testing database connection..."
php artisan migrate:status || echo "Database connection test failed, but continuing..."

# Don't cache config initially to avoid issues - let Laravel run without cache first
# This helps with debugging. We can enable caching later once everything works.
# php artisan config:cache || echo "Config cache failed, continuing without cache..."
# php artisan route:cache || echo "Route cache failed, continuing without cache..."
# php artisan view:cache || echo "View cache failed, continuing without cache..."

# Run migrations
echo "Running migrations..."
php artisan migrate --force || echo "Migrations failed, but continuing..."

# Ensure storage is writable
echo "Setting storage permissions..."
chmod -R 775 storage bootstrap/cache || true
chown -R www-data:www-data storage bootstrap/cache || true

echo "Starting Laravel server on port ${PORT:-8000}..."
echo "APP_KEY is set: $([ -n "$APP_KEY" ] && echo 'YES' || echo 'NO')"
echo "Database connection: DB_HOST=${DB_HOST}, DB_DATABASE=${DB_DATABASE}"

# Start server with verbose output
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000} --verbose

