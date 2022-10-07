composer require laravel/sanctum \
php artisan vendor:publish \ --provider="Laravel\Sanctum\SanctumServiceProvider" \
php artisan migrate \
php artisan db:seed --class=UserSeeder  // Default user record \
php artisan db:seed    // Webinar faker records \
