#!/bin/bash
set -e

echo "Starting entrypoint script..."

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
while ! mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" --silent; do
    echo "MySQL is unavailable - sleeping for 2 seconds"
    sleep 2
done

echo "MySQL is up and running!"

# Generate application key if not exists in .env
if ! grep -q "APP_KEY=base64:" .env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Optionally seed database
echo "Seeding database..."
php artisan db:seed --force || echo "Seeding failed or no seeders available"

# Clear caches
echo "Clearing caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting supervisor..."
# Start supervisor
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf