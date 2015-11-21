# bone-explorer
AMNH Hackathon Project

## Dev Dependencies
1. PHP ≥5.5.9
2. Composer
3. NPM
4. Bower
5. Postgres

## Installation
__Download Packages__
```
cd bone-explorer
composer install
npm install
bower install
```
__Create Config File__
```
cp .env.example .env
```

__Generate an Application Key__
```
php artisan key:generate
```

__Run Migrations__
```
php artisan migrate
```

## Local Development

__Update Hosts File__
```
127.0.0.1 bone-explorer.dev
```

__Serve the App__
```
php artisan serve --host=bone-explorer.dev
```

__Watch Assets While Developing__
```
gulp watch
```
