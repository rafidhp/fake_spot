#!/bin/bash

# Tunggu database siap (opsional, bisa pakai sleep atau healthcheck)

# Jalankan migrasi
php artisan migrate --force

# Jalankan seeder (opsional)
php artisan db:seed --force

# Start apache
apache2-foreground
