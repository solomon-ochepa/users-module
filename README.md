# users-module
Users - Laravel module

## Installation
### Install nwidart/laravel-modules - https://nwidart.com/laravel-modules/v6/introduction
```
composer require nwidart/laravel-modules
```
```
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
```

#### Autoload: Update `/composer.json` - add `"Modules\\": "Modules/"` to `autoload->psr-4`
  ```json
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/",
      "Database\\Factories\\": "database/factories/",
      "Database\\Seeders\\": "database/seeders/"
    }
  }
  ```
  ```
  composer dumpautoload
  ```
  
- Replace `/config/modules.php` with - https://drive.google.com/file/d/1y0RdfQ0LJ_12yxN5qHrZvIQqZJgWJhrd/view?usp=sharing
- Replace `/stubs/nwidart-stubs` with - https://drive.google.com/file/d/1-FuBcvv2JJtNBjVJIEW9jMh6wS-DJhJW/view?usp=sharing

### Install user-modules - https://github.com/solomon-ochepa/user-module
```
composer require solomon-ochepa/user-module
```
```
php artisan module:enable
```
